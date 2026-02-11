<?php
function register_my_session(){
    if(!session_id() && ($_SERVER["REQUEST_METHOD"] === "POST" || isset($_COOKIE[session_name()]))){
        session_start();
    }
}
add_action('init', 'register_my_session');

// Hide admin bar for non-logged-in users
add_filter('show_admin_bar', function($show) {
    return is_user_logged_in() ? $show : false;
});

add_action("wp_enqueue_scripts", "wp_child_theme");
function wp_child_theme() 
{
    if((esc_attr(get_option("wp_child_theme_setting")) != "Yes")) 
    {
		wp_enqueue_style("parent-stylesheet", get_template_directory_uri()."/style.css");
    }

	wp_enqueue_style("child-stylesheet", get_stylesheet_uri(),'','1.1.6');
	wp_enqueue_script("child-scripts", get_stylesheet_directory_uri() . "/js/view.js", array("jquery"), "6.1.2", true);
}

function wp_child_theme_register_settings() 
{ 
	register_setting("wp_child_theme_options_page", "wp_child_theme_setting", "wct_callback");
}
add_action("admin_init", "wp_child_theme_register_settings");

function wp_child_theme_register_options_page() 
{
	add_options_page("Child Theme Settings", "Child Theme", "manage_options", "wp_child_theme", "wp_child_theme_register_options_page_form");
}
add_action("admin_menu", "wp_child_theme_register_options_page");

function wp_child_theme_register_options_page_form()
{ 
?>
<div id="wp_child_theme">
    <h1>Child Theme Options</h1>
    <h2>Include or Exclude Parent Theme Stylesheet</h2>
    <form method="post" action="options.php">
        <?php settings_fields("wp_child_theme_options_page"); ?>
        <p><label><input size="3" type="checkbox" name="wp_child_theme_setting" id="wp_child_theme_setting" <?php if((esc_attr(get_option("wp_child_theme_setting")) == "Yes")) { echo " checked "; } ?> value="Yes"> Tick To Disable The Parent Stylesheet (style.css) In Your Site HTML<label></p>
        <?php submit_button(); ?>
    </form>
    <p>Only Tick This Box If When You Inspect Your Source Code It Contains Your Parent Stylesheet style.css Two Times.</label></p>
</div>
<?php
}



$is_mode = get_option('zend_str_mode');
if($is_mode == 'test'){

    define('STRIPE_SECRET_KEY', get_option('zend_str_ts'));
    define('STRIPE_PUB_KEY', get_option('zend_str_tp'));
    define('DONATED_AMOUNT_OPTION_KEY', 'donated_amount_test');
    define('DONATED_AMOUNT', get_option(DONATED_AMOUNT_OPTION_KEY));

    define('AGT_OPTION_KEY', 'agt_donated_amount_test');
    define('AGT_DONATED_AMOUNT', get_option(AGT_OPTION_KEY));

}
else{

    define('STRIPE_SECRET_KEY', get_option('zend_str_ls'));
    define('STRIPE_PUB_KEY', get_option('zend_str_lp'));
    define('DONATED_AMOUNT_OPTION_KEY', 'donated_amount_live');
    define('DONATED_AMOUNT', get_option(DONATED_AMOUNT_OPTION_KEY));

    define('AGT_OPTION_KEY', 'agt_donated_amount_live');
    define('AGT_DONATED_AMOUNT', get_option(AGT_OPTION_KEY));
}

add_shortcode( 'zdonation', 'wpdocs_bartag_func' ); 
function wpdocs_bartag_func( $atts ) {
    
    $goal_total = get_option('zend_goal_amount');
    $donated_amount = mws_get_stripe_yearly_total(2026);

    if(empty($donated_amount)){
        $donated_amount = 0;
    }
    $per = ($donated_amount / $goal_total) * 100;
    $per = round($per);
    if($per > 100){
        $per = 100;
    }
    $donated_amount = number_format($donated_amount);
    $goal_total = number_format($goal_total);

    $html = '<div class="funds-content-space">
                <div class="funds-value"><strong>$'.$donated_amount.' / </strong>$'.$goal_total.'</div>
                <p>TOTAL FUNDS RAISED FOR 2026 SCHOLARSHIP</p>
                <div class="funds-progress">
                    <span style="width: '.$per.'%;"></span>
                </div>
            </div>'; 
 
    return $html;
}
//------------- Annual Golf Tournament
add_shortcode( 'zagt_donation', 'wpdocs_bartag_func2' ); 
function wpdocs_bartag_func2( $atts ) {
    
    $goal_total = get_option('zend_agt_goal_amount'); 
    $donated_amount = AGT_DONATED_AMOUNT;

    if(empty($donated_amount)){
        $donated_amount = 0;
    }
    $per = ($donated_amount / $goal_total) * 100;
    $per = round($per);
    if($per > 100){
        $per = 100;
    }
    $donated_amount = number_format($donated_amount);
    $goal_total = number_format($goal_total);

    $html = '<div class="funds-content-space">
                <div class="funds-value"><strong>$'.$donated_amount.' / </strong>$'.$goal_total.'</div>
                <p>TOTAL FUNDS RAISED</p>
                <div class="funds-progress">
                    <span style="width: '.$per.'%;"></span>
                </div>
            </div>';
  
    return $html;
}
//-------------END Annual Golf Tournament


// -----------> STRIPE SETTING AND HOOKS <----------- //
add_action( 'admin_menu', 'mk_admin_menu' );
function mk_admin_menu() {

    
    add_menu_page('Stripe Setting','Stripe Setting','manage_options','mkstr-stripe','mk_setting_fun');
    //CALL REGISTER OPTION FUNCTION
    add_action( 'admin_init', 'register_zender_plugin_settings' );
    
}

//-------> REGISTER OPTION SETTING
function register_zender_plugin_settings() {

    register_setting( 'zender-settings-group', 'zend_str_mode' );
    register_setting( 'zender-settings-group', 'zend_str_tp' );
    register_setting( 'zender-settings-group', 'zend_str_ts' );
    register_setting( 'zender-settings-group', 'zend_str_lp' );
    register_setting( 'zender-settings-group', 'zend_str_ls' );

    register_setting( 'zender-settings-group', 'zend_goal_amount' );
    register_setting( 'zender-settings-group', 'donated_amount_test' );
    register_setting( 'zender-settings-group', 'donated_amount_live' );
    register_setting( 'zender-settings-group', 'zend_btn_text' );

    register_setting( 'zender-settings-group', 'zend_golfer_amount' );
    register_setting( 'zender-settings-group', 'zend_sponsoship_amount' );

    register_setting( 'zender-settings-group', 'zend_str_redierct_page' );

}


function mk_setting_fun(){
    $is_mode = get_option('zend_str_mode');
    $pages_array = get_pages();
    $link = get_option('zend_str_redierct_page');
?>
<div class="wrap">
<h1>Stripe Settings</h1>
<hr/>
<style>
.zender input[type="number"], .zender input[type="text"], .zender select{width: 400px;height: 30px;padding-left: 10px;} 
</style>
<form method="post" action="options.php">
    <?php settings_fields( 'zender-settings-group' ); ?>
    <?php do_settings_sections( 'zender-settings-group' ); ?>
        <table class="form-table zender">
            <tr valign="top">
            <th scope="row">Payment Mode</th>
            <td>
                <select name="zend_str_mode">
                    <option <?php echo ($is_mode == 'test')?'selected':'';?> value="test">Test</option>
                    <option <?php echo ($is_mode == 'live')?'selected':'';?> value="live">Live</option>
                </select>

            </td>
            </tr>
             
            <tr valign="top">
            <th scope="row">Test Publishable key</th>
            <td><input type="text" name="zend_str_tp" value="<?php echo esc_attr( get_option('zend_str_tp') ); ?>"/></td>
            </tr>
            
            <tr valign="top">
            <th scope="row">Test Secret key</th>
            <td><input type="text" name="zend_str_ts" value="<?php echo esc_attr( get_option('zend_str_ts') ); ?>" /></td>
            </tr>
            
            <tr valign="top">
            <th scope="row">Live Publishable key</th>
            <td><input type="text" name="zend_str_lp" value="<?php echo esc_attr( get_option('zend_str_lp') ); ?>" /></td>
            </tr>
            
            <tr valign="top">
            <th scope="row">Live Secret key</th>
            <td><input type="text" name="zend_str_ls" value="<?php echo esc_attr( get_option('zend_str_ls') ); ?>" /></td>
            </tr>

            <tr valign="top">
            <th scope="row">Goal Amount (USD)</th>
            <td><input type="number" name="zend_goal_amount" value="<?php echo esc_attr( get_option('zend_goal_amount') ); ?>" /></td>
            </tr> 

            <tr valign="top">
            <th scope="row">Donated Amount (USD)</th>
            <td><input type="text" value="<?php echo esc_attr( get_option(DONATED_AMOUNT_OPTION_KEY) ); ?>" name="<?php echo DONATED_AMOUNT_OPTION_KEY;?>"/></td>
            </tr>

            <tr valign="top">
            <th scope="row">Donation Button Text</th>
            <td><input type="text" name="zend_btn_text" value="<?php echo esc_attr( get_option('zend_btn_text') ); ?>" /></td>
            </tr>

            <tr valign="top">
            <th scope="row">Golfer Registration Fees</th>
            <td><input type="text" name="zend_golfer_amount" value="<?php echo esc_attr( get_option('zend_golfer_amount') ); ?>" /></td>
            </tr>

            <tr valign="top">
            <th scope="row">Sponsoship Registration Fees</th>
            <td><input type="text" name="zend_sponsoship_amount" value="<?php echo esc_attr( get_option('zend_sponsoship_amount') ); ?>" /></td>
            </tr>
     
            <tr valign="top">
            <th scope="row">Thank You Page</th> 
            <td>
                <select name="zend_str_redierct_page" style="width:100%;" required>
                    <option value="">Select Page</option>
                    <?php 
                        
                            if(!empty($pages_array)){
                                foreach($pages_array as $value){
                                    $page_id = $value->ID;
                                    $page_title = $value->post_title;
                                    $url = get_the_permalink($page_id);?>
                                    <option value="<?php echo $url;?>" <?php echo ($link == $url)?"selected":"";?>><?php echo $page_title;?></option>
                                    <?php
                                }
                            }
                           ?>
                </select>
            </td>
            </tr>
        </table>
        
        <?php submit_button(); ?>
    
    </form>
    </div>
    <?php 
}


add_shortcode( 'winner_slider', 'winner_bartag_func' ); 
function winner_bartag_func( $atts ) {

    $args = array(
      'numberposts' => -1,
      'post_type'   => 'zwinners'
    );
     
    $winners = get_posts( $args );

    
    if(!empty($winners)){
        $slider = '';
        foreach($winners as $key => $val){

            $id = $val->ID;
            $title = $val->post_title;
            $sub_title = get_field('sub_title', $id);
            $winner_text = get_field('year_winner_text', $id);
            $image = wp_get_attachment_image_src( get_post_thumbnail_id($id), 'full' );
            $image_src = '';
            if(!empty($image)){
                $image_src = $image[0];
            }

            $slider .= '<div class="rsContent">
                        <div class="winner-slide-content">
                            <div class="winner-imgbox"><img src="'.$image_src.'" width="133" height="133" alt="' . esc_attr($title) . ', scholarship recipient"></div>
                            <h4>'.$title.'</h4>
                            <h2>'.$sub_title.'</h2>
                            <p>'.$winner_text.'</p>
                        </div>
                    </div>';

        }

    }

    
    $html = '<div class="winner-slider-space"><div class="winner-slider-wrap">
                <div id="winner-slider" class="royalSlider rsDefault winner-slider">';

    $html .= $slider;             
    $html .= '</div>';


    if(sizeof($winners) > 1 ){
        $html .= '<div class="custome-arrow"><a href="javascript:;" class="prev active">Prev</a>
        <a href="javascript:;" class="next">Next</a></div>';
    }
    

    $html .= '</div></div>';
                                        
    return $html;
}

if (!class_exists('\Stripe\Stripe')) {
    include_once get_stylesheet_directory() . '/stripe-lib/init.php';
}

function mws_get_stripe_yearly_total($year = 2026) {
    $cache_key = 'mws_stripe_total_' . $year;
    $cached = get_transient($cache_key);
    if ($cached !== false) {
        return (float) $cached;
    }

    try {
        $stripe = new \Stripe\StripeClient(STRIPE_SECRET_KEY);
        $total_cents = 0;
        $has_more = true;
        $starting_after = null;

        while ($has_more) {
            $params = [
                'limit' => 100,
                'created' => ['gte' => strtotime($year . '-01-01')],
            ];
            if ($starting_after) {
                $params['starting_after'] = $starting_after;
            }
            $charges = $stripe->charges->all($params);
            foreach ($charges->data as $charge) {
                if ($charge->status === 'succeeded' && !$charge->refunded) {
                    $total_cents += $charge->amount - $charge->amount_refunded;
                }
            }
            $has_more = $charges->has_more;
            if (!empty($charges->data)) {
                $last = end($charges->data);
                $starting_after = $last->id;
            } else {
                $has_more = false;
            }
        }

        $total = $total_cents / 100;
        set_transient($cache_key, $total, 4 * HOUR_IN_SECONDS);
        return $total;

    } catch (Exception $e) {
        return (float) get_option(DONATED_AMOUNT_OPTION_KEY, 0);
    }
}

// On frontend, override GiveWP global total with form 20160 earnings
add_filter('pre_option_give_earnings_total', function($pre) {
    if (is_admin()) {
        return $pre;
    }
    $earnings = get_post_meta(20160, '_give_form_earnings', true);
    return !empty($earnings) ? $earnings : 0;
});

add_shortcode( 'zstripe_form', 'zstripe_form_func' ); 

function zstripe_form_func( $atts ) {

    $btn_text = get_option('zend_btn_text');
    $html = '<form id="zender-pay-form" method="post" action="'.site_url('stripe').'">';

    $html .= '<div class="row-group zpreset-amounts">';
    $html .= '<button type="button" class="zpreset-btn" data-amount="25">$25</button>';
    $html .= '<button type="button" class="zpreset-btn" data-amount="50">$50</button>';
    $html .= '<button type="button" class="zpreset-btn" data-amount="100">$100</button>';
    $html .= '<button type="button" class="zpreset-btn" data-amount="250">$250</button>';
    $html .= '</div>';

    $html .= '<div class="row-group"><input type="number" placeholder="Amount to Donate" name="amount" id="amount" required min="1" step="1"/></div>';

    $html .= '<div class="row-group"><input type="text" placeholder="Your Email" name="zemail" id="zemail" required/></div>';

    $html .= '<div class="row-group"><button class="zbtn" id="zpay-btn">'
        .$btn_text.'<span><img src="'.get_stylesheet_directory_uri().'/images/arrow.png"/></span></button></div>';
    $html .= '<div class="zstripe-badge">&#128274; Secure payment powered by Stripe</div>';
    $html .= '</form>';

    return $html;

}

/////////
add_shortcode( 'zagtstripe_form', 'zstripe_form_func2' ); 

function zstripe_form_func2( $atts ) {
    $title = get_the_title();
    $btn_text = get_option('zend_agt_btn_text');
    $html = '<form id="zender-pay-form-agt" method="post" action="'.site_url('stripe').'">';
    $html .= '<div class="row-group"><input type="number" placeholder="Amount to Donate" name="amount" id="amount" required min="1" step="1"/></div>';

    $html .= '<div class="row-group"><input type="text" placeholder="Your Email" name="zemail" id="zemail" required/></div>';
 
    $html .= '<div class="row-group"><button class="zbtn" id="zpay-btn">
        '.$btn_text.'<span><img src="'.get_stylesheet_directory_uri().'/images/arrow.png"/></span></button></div>';

    $html .= '<input type="hidden" value="'.$title.'" name="ztype"></form>';

    return $html;

}


function get_countries(){
    return '<option value="AF">Afghanistan</option><option value="AX">Åland Islands</option><option value="AL">Albania</option><option value="DZ">Algeria</option><option value="AD">Andorra</option><option value="AO">Angola</option><option value="AI">Anguilla</option><option value="AQ">Antarctica</option><option value="AG">Antigua &amp; Barbuda</option><option value="AR">Argentina</option><option value="AM">Armenia</option><option value="AW">Aruba</option><option value="AC">Ascension Island</option><option value="AU">Australia</option><option value="AT">Austria</option><option value="AZ">Azerbaijan</option><option value="BS">Bahamas</option><option value="BH">Bahrain</option><option value="BD">Bangladesh</option><option value="BB">Barbados</option><option value="BY">Belarus</option><option value="BE">Belgium</option><option value="BZ">Belize</option><option value="BJ">Benin</option><option value="BM">Bermuda</option><option value="BT">Bhutan</option><option value="BO">Bolivia</option><option value="BA">Bosnia &amp; Herzegovina</option><option value="BW">Botswana</option><option value="BV">Bouvet Island</option><option value="BR">Brazil</option><option value="IO">British Indian Ocean Territory</option><option value="VG">British Virgin Islands</option><option value="BN">Brunei</option><option value="BG">Bulgaria</option><option value="BF">Burkina Faso</option><option value="BI">Burundi</option><option value="KH">Cambodia</option><option value="CM">Cameroon</option><option value="CA">Canada</option><option value="CV">Cape Verde</option><option value="BQ">Caribbean Netherlands</option><option value="KY">Cayman Islands</option><option value="CF">Central African Republic</option><option value="TD">Chad</option><option value="CL">Chile</option><option value="CN">China</option><option value="CO">Colombia</option><option value="KM">Comoros</option><option value="CG">Congo - Brazzaville</option><option value="CD">Congo - Kinshasa</option><option value="CK">Cook Islands</option><option value="CR">Costa Rica</option><option value="CI">Côte d’Ivoire</option><option value="HR">Croatia</option><option value="CW">Curaçao</option><option value="CY">Cyprus</option><option value="CZ">Czechia</option><option value="DK">Denmark</option><option value="DJ">Djibouti</option><option value="DM">Dominica</option><option value="DO">Dominican Republic</option><option value="EC">Ecuador</option><option value="EG">Egypt</option><option value="SV">El Salvador</option><option value="GQ">Equatorial Guinea</option><option value="ER">Eritrea</option><option value="EE">Estonia</option><option value="SZ">Eswatini</option><option value="ET">Ethiopia</option><option value="FK">Falkland Islands</option><option value="FO">Faroe Islands</option><option value="FJ">Fiji</option><option value="FI">Finland</option><option value="FR">France</option><option value="GF">French Guiana</option><option value="PF">French Polynesia</option><option value="TF">French Southern Territories</option><option value="GA">Gabon</option><option value="GM">Gambia</option><option value="GE">Georgia</option><option value="DE">Germany</option><option value="GH">Ghana</option><option value="GI">Gibraltar</option><option value="GR">Greece</option><option value="GL">Greenland</option><option value="GD">Grenada</option><option value="GP">Guadeloupe</option><option value="GU">Guam</option><option value="GT">Guatemala</option><option value="GG">Guernsey</option><option value="GN">Guinea</option><option value="GW">Guinea-Bissau</option><option value="GY">Guyana</option><option value="HT">Haiti</option><option value="HN">Honduras</option><option value="HK">Hong Kong SAR China</option><option value="HU">Hungary</option><option value="IS">Iceland</option><option value="IN">India</option><option value="ID">Indonesia</option><option value="IQ">Iraq</option><option value="IE">Ireland</option><option value="IM">Isle of Man</option><option value="IL">Israel</option><option value="IT">Italy</option><option value="JM">Jamaica</option><option value="JP">Japan</option><option value="JE">Jersey</option><option value="JO">Jordan</option><option value="KZ">Kazakhstan</option><option value="KE">Kenya</option><option value="KI">Kiribati</option><option value="XK">Kosovo</option><option value="KW">Kuwait</option><option value="KG">Kyrgyzstan</option><option value="LA">Laos</option><option value="LV">Latvia</option><option value="LB">Lebanon</option><option value="LS">Lesotho</option><option value="LR">Liberia</option><option value="LY">Libya</option><option value="LI">Liechtenstein</option><option value="LT">Lithuania</option><option value="LU">Luxembourg</option><option value="MO">Macao SAR China</option><option value="MG">Madagascar</option><option value="MW">Malawi</option><option value="MY">Malaysia</option><option value="MV">Maldives</option><option value="ML">Mali</option><option value="MT">Malta</option><option value="MQ">Martinique</option><option value="MR">Mauritania</option><option value="MU">Mauritius</option><option value="YT">Mayotte</option><option value="MX">Mexico</option><option value="MD">Moldova</option><option value="MC">Monaco</option><option value="MN">Mongolia</option><option value="ME">Montenegro</option><option value="MS">Montserrat</option><option value="MA">Morocco</option><option value="MZ">Mozambique</option><option value="MM">Myanmar (Burma)</option><option value="NA">Namibia</option><option value="NR">Nauru</option><option value="NP">Nepal</option><option value="NL">Netherlands</option><option value="NC">New Caledonia</option><option value="NZ">New Zealand</option><option value="NI">Nicaragua</option><option value="NE">Niger</option><option value="NG">Nigeria</option><option value="NU">Niue</option><option value="MK">North Macedonia</option><option value="NO">Norway</option><option value="OM">Oman</option><option value="PK">Pakistan</option><option value="PS">Palestinian Territories</option><option value="PA">Panama</option><option value="PG">Papua New Guinea</option><option value="PY">Paraguay</option><option value="PE">Peru</option><option value="PH">Philippines</option><option value="PN">Pitcairn Islands</option><option value="PL">Poland</option><option value="PT">Portugal</option><option value="PR">Puerto Rico</option><option value="QA">Qatar</option><option value="KR">Republic of Korea</option><option value="RE">Réunion</option><option value="RO">Romania</option><option value="RU">Russia</option><option value="RW">Rwanda</option><option value="WS">Samoa</option><option value="SM">San Marino</option><option value="ST">São Tomé &amp; Príncipe</option><option value="SA">Saudi Arabia</option><option value="SN">Senegal</option><option value="RS">Serbia</option><option value="SC">Seychelles</option><option value="SL">Sierra Leone</option><option value="SG">Singapore</option><option value="SX">Sint Maarten</option><option value="SK">Slovakia</option><option value="SI">Slovenia</option><option value="SB">Solomon Islands</option><option value="SO">Somalia</option><option value="ZA">South Africa</option><option value="GS">South Georgia &amp; South Sandwich Islands</option><option value="SS">South Sudan</option><option value="ES">Spain</option><option value="LK">Sri Lanka</option><option value="BL">St. Barthélemy</option><option value="SH">St. Helena</option><option value="KN">St. Kitts &amp; Nevis</option><option value="LC">St. Lucia</option><option value="MF">St. Martin</option><option value="PM">St. Pierre &amp; Miquelon</option><option value="VC">St. Vincent &amp; Grenadines</option><option value="SR">Suriname</option><option value="SJ">Svalbard &amp; Jan Mayen</option><option value="SE">Sweden</option><option value="CH">Switzerland</option><option value="TW">Taiwan</option><option value="TJ">Tajikistan</option><option value="TZ">Tanzania</option><option value="TH">Thailand</option><option value="TL">Timor-Leste</option><option value="TG">Togo</option><option value="TK">Tokelau</option><option value="TO">Tonga</option><option value="TT">Trinidad &amp; Tobago</option><option value="TA">Tristan da Cunha</option><option value="TN">Tunisia</option><option value="TR">Turkey</option><option value="TM">Turkmenistan</option><option value="TC">Turks &amp; Caicos Islands</option><option value="TV">Tuvalu</option><option value="UG">Uganda</option><option value="UA">Ukraine</option><option value="AE">United Arab Emirates</option><option value="GB">United Kingdom</option><option value="US" selected>United States</option><option value="UY">Uruguay</option><option value="UZ">Uzbekistan</option><option value="VU">Vanuatu</option><option value="VA">Vatican City</option><option value="VE">Venezuela</option><option value="VN">Vietnam</option><option value="WF">Wallis &amp; Futuna</option><option value="EH">Western Sahara</option><option value="YE">Yemen</option><option value="ZM">Zambia</option><option value="ZW">Zimbabwe</option>';
}

add_shortcode( 'mkstr_reg', 'zregister_form_fun' ); 
function zregister_form_fun($atts) {


    $form_id = $atts['id'];
    
    if($form_id == 1){
        $fees = get_option('zend_golfer_amount'); 
        $form_title = "Golfer Registration";
    }
    else{
        $fees = get_option('zend_sponsoship_amount');
        $form_title = "Sponsoship Registration";
    }

    ob_start(); 
    include_once dirname( __FILE__ ) . '/register.php';
    return ob_get_clean();

}

add_action( 'admin_post_mk_str_regsiter', 'mk_str_regsiter_fun' );
add_action( 'admin_post_nopriv_mk_str_regsiter', 'mk_str_regsiter_fun' );
function mk_str_regsiter_fun(){

    if(isset($_POST['mkstr_nonce'])){
        $form_id = $_POST['mkstr_nonce'];
        if($form_id == 1){
            $fees = get_option('zend_golfer_amount'); 
            $title = "Golfer Registration";
        }
        else{
            $fees = get_option('zend_sponsoship_amount');
            $title = "Sponsoship Registration";
        } 

        $is_marketing = '';
        if(isset($_POST['mkstr-mar'])){
            $is_marketing = $_POST['mkstr-mar'];
        }

        $qty = $_POST['mkstr-nog'];
        $amount = $fees;

        $meta = [];
        $meta_array = [];
        $j = 1;
        for($i=0; $i<$qty; $i++){
                
                $meta[$j] = [
                    "Golfer $j FirstName" => $_POST['zfnm'][$i],
                    "Golfer $j LastName" => $_POST['zlnm'][$i],
                    "Golfer $j CellPhone" => $_POST['zphone'][$i],
                    "Golfer $j EMailAddress" => $_POST['zemail'][$i]
                ];

                $meta_array = array_merge($meta_array, $meta[$j]);
            $j++; 
        }

        $stripe = new \Stripe\StripeClient(STRIPE_SECRET_KEY);
        try {
            $amount = $amount * 100;
            $session = $stripe->checkout->sessions->create([
              'success_url' => site_url('success').'?session_id={CHECKOUT_SESSION_ID}',
              'cancel_url' => site_url('annual-golf-tournament/golfer-registration/'),
              'payment_method_types' => ['card'], 
                    'line_items' => [
                            [
                                'price_data' => array(
                                    'currency' => 'usd', 
                                    'unit_amount' => $amount, 
                                    'product_data' => array('name'=>$title), 
                                ),
                                'quantity' => $qty,
                            ],
                    ],
              'payment_intent_data' => ['metadata' => $meta_array, 'description' => $title],      
              'mode' => 'payment',
            ]);

            $_SESSION['zreg_id'] = $session->id;
            $_SESSION['ztype'] = $type;
            $_SESSION['zamount'] = $amount;
            $_SESSION['zreg_data'] = $_POST;
            wp_redirect($session->url);
            exit;

       } 
       catch (Exception $e) {
          echo $e->getMessage();
       }

    }

}
function mk_mail($to, $subject, $body, $attc){

    $headers[] = 'From: Michaelwilliamsscholarship <info@michaelwilliamsscholarship.com>';
    $headers[] = 'Content-Type: text/html; charset=UTF-8';
    //$headers[] = 'Bcc: kalathiyamayur@gmail.com';
    if(!empty($attc)){
        $uploads_path = wp_upload_dir();
        $attch_path = $uploads_path['basedir'].'/custom_uploads/'.$attc;   
        return wp_mail( $to, $subject, $body, $headers, $attch_path); 
    }
    else{
        return wp_mail( $to, $subject, $body, $headers );
    }
     
}
function mk_shortcode_func( $atts ){
    
    $id = $atts['id'];
    $cost = get_field('cost', $id);
    $stock = get_field('stock', $id);

    if($stock < 1){
        return '<p class="zos">Sold Out</p>';
    }

    $v = 0;
    
    if(isset($_SESSION['ZCART'])){
        if(!empty($_SESSION['ZCART'])){
            if(isset($_SESSION['ZCART'][$id])){
                $v = $_SESSION['ZCART'][$id]['qty'];
            }
        }
    }

    ob_start(); 
    $html = '<div class="quantity buttons_added">
    <input type="button" value="-" class="minus" data-zid="'.$id .'" data-sid="'.$stock .'"><input type="number" step="1" min="0" max="'.$stock.'" name="quantity[]" value="'.$v.'" title="Qty" class="input-text qty text" size="4" pattern="" inputmode="" readonly><input type="button" value="+" class="plus" data-zid="'.$id .'" data-sid="'.$stock .'"><input type="hidden" value="'.$id .'" name="zendp[]"></div>';
    $html .= '<span class="zst"></span>';

    echo $html;

    return ob_get_clean();
}
add_shortcode('zcart', 'mk_shortcode_func' );

function mk_spon_func( $atts ){
    $total = 0;
    $disabled = 'disabled';

    if(isset($_SESSION['ZTOTAL']) && !empty($_SESSION['ZTOTAL'])){
        $total = $_SESSION['ZTOTAL'];
        $disabled = '';
    }

    ob_start(); 
    include_once dirname( __FILE__ ) . '/spo_register.php';
    return ob_get_clean();

}
add_shortcode('mkstr_spn', 'mk_spon_func' );

add_action("wp_ajax_mkstr_ajax_atc", "mkstr_ajax_atc");
add_action("wp_ajax_nopriv_mkstr_ajax_atc", "mkstr_ajax_atc");

function mkstr_ajax_atc() { 

    $lev_id = $_POST['a'];
    $qty = $_POST['b'];
    $action = $_POST['c'];
    $cost = get_field('cost',$lev_id);
    $stock = get_field('stock',$lev_id);
    $title = get_the_title($lev_id,'cost',true);
    $total = 0;

    if($stock >= $qty){

        if($qty > 0){
            $_SESSION['ZCART'][$lev_id] = ['title'=>$title, 'lev_id' => $lev_id, 'qty' => $qty, 'cost' => $cost];
        }
        else{
            if(isset($_SESSION['ZCART'][$lev_id])){
                unset($_SESSION['ZCART'][$lev_id]);
            }
        }

        if(!empty($_SESSION['ZCART'])){
            foreach($_SESSION['ZCART'] as $k => $v){
                $temp_qty = $v['qty'];
                $total += ($v['cost'] * $temp_qty);
            }
        } 
        $_SESSION['ZTOTAL'] = $total;
    }
    echo $total;
    die();
} 

add_action( 'admin_post_mk_str_spn_regsiter', 'mk_str_spn_regsiter' );
add_action( 'admin_post_nopriv_mk_str_spn_regsiter', 'mk_str_spn_regsiter' );
function mk_str_spn_regsiter(){

    if(isset($_POST)){

        $cname = $_POST['zbnm'];
        $fname = $_POST['zfnm'];
        $lname = $_POST['zlnm'];
        $email = $_POST['zemail'];
        $phone = $_POST['zphone'];
        $new_name = '';
        $ext_type = array('jpg','jpeg','png');
        if(!empty($_FILES['zlogo']['size'] > 0)){
            if($_FILES['zlogo']['error'] == 0){
                $file_name = $_FILES['zlogo']['name'];
                $ext = pathinfo($file_name, PATHINFO_EXTENSION);
                if(in_array($ext, $ext_type)){
                    $tmp_file = $_FILES['zlogo']['tmp_name'];
                    $new_name = uniqid('mws_').'.'.$ext;
                    $uploads_path = wp_upload_dir();
                    $uploads_dir = $uploads_path['basedir'].'/custom_uploads';
                    move_uploaded_file($tmp_file, "$uploads_dir/$new_name");
                }
                else{
                    $_SESSION['ERR_MSG'] = 'ONLY UPLOAD FILE TYPE IMAGE';
                    wp_redirect(site_url('annual-golf-tournament/sponsorship-registration/'));
                    exit;
                }
            }
            else{
                $_SESSION['ERR_MSG'] = $_FILES['zlogo']['error'];
                wp_redirect(site_url('annual-golf-tournament/sponsorship-registration/'));
                exit;
            }
        }
        else{
            if(isset($_POST['no-logo'])){
                $logo_name = $_POST['logo-name'];
            }
        }

        if(!empty($_SESSION['ZCART'])){

            foreach($_SESSION['ZCART']  as $key => $val){
                $title = $val['title'];
                $cost = $val['cost'] * 100;
                $qty = $val['qty'];
                $line_items[] = [
                    'price_data' => 
                        [
                            'currency' => 'usd', 
                            'unit_amount' => $cost, 
                            'product_data' => array('name'=>$title)
                        ],
                    'quantity' => $qty
                ];

            }
            
            try{
                $stripe = new \Stripe\StripeClient(STRIPE_SECRET_KEY);
                $session = $stripe->checkout->sessions->create([
                    'success_url' => site_url('success').'?session_id={CHECKOUT_SESSION_ID}',
                    'cancel_url' => site_url('annual-golf-tournament/sponsorship-registration/'),
                    'customer_email' => $email,
                    'payment_method_types' => ['card'], 
                    'line_items' => $line_items,
                    'mode' => 'payment',
                ]);

                $_SESSION['zspo_id'] = $session->id;
                $_SESSION['zspo_logo_url'] = $new_name;
                $_SESSION['zpost_data'] = $_POST;
                wp_redirect($session->url);
                exit;
            }
            catch (Exception $e) {
                echo $e->getMessage();
            }        
        }
        else{
            $_SESSION['ERR_MSG'] = 'Session is expired try again';
            wp_redirect(site_url('annual-golf-tournament/sponsorship-registration/'));
            exit;
        }
    }

} 

function mkstr_script_fun(){
    ?>
    <script type="text/javascript">
        function wcqib_refresh_quantity_increments() {
            jQuery("div.quantity:not(.buttons_added), td.quantity:not(.buttons_added)").each(function(a, b) {
                var c = jQuery(b);
                c.addClass("buttons_added"), c.children().first().before('<input type="button" value="-" class="minus" />'), c.children().last().after('<input type="button" value="+" class="plus" />')
            })
        }
        String.prototype.getDecimals || (String.prototype.getDecimals = function() {
            var a = this,
                b = ("" + a).match(/(?:\.(\d+))?(?:[eE]([+-]?\d+))?$/);
            return b ? Math.max(0, (b[1] ? b[1].length : 0) - (b[2] ? +b[2] : 0)) : 0
        }), jQuery(document).ready(function() {
            wcqib_refresh_quantity_increments()
        }), jQuery(document).on("updated_wc_div", function() {
            wcqib_refresh_quantity_increments()
        }), jQuery(document).on("click", ".plus, .minus", function() {
            var a = jQuery(this).closest(".quantity").find(".qty"),
                b = parseFloat(a.val()),
                c = parseFloat(a.attr("max")),
                d = parseFloat(a.attr("min")),
                e = a.attr("step");
            b && "" !== b && "NaN" !== b || (b = 0), "" !== c && "NaN" !== c || (c = ""), "" !== d && "NaN" !== d || (d = 0), "any" !== e && "" !== e && void 0 !== e && "NaN" !== parseFloat(e) || (e = 1), jQuery(this).is(".plus") ? c && b >= c ? a.val(c) : a.val((b + parseFloat(e)).toFixed(e.getDecimals())) : d && b <= d ? a.val(d) : b > 0 && a.val((b - parseFloat(e)).toFixed(e.getDecimals())), a.trigger("change")
        });
        jQuery('.zpreset-btn').on('click', function() {
            jQuery('.zpreset-btn').removeClass('active');
            jQuery(this).addClass('active');
            jQuery('#amount').val(jQuery(this).data('amount'));
        });
        jQuery('#amount').on('input', function() {
            jQuery('.zpreset-btn').removeClass('active');
            var val = parseInt(jQuery(this).val());
            jQuery('.zpreset-btn').each(function() {
                if (parseInt(jQuery(this).data('amount')) === val) {
                    jQuery(this).addClass('active');
                }
            });
        });

        jQuery(function() {

            console.log('1');
            jQuery(document).on("click", ".quantity .plus, .minus", function(e) {

                let lev_id = jQuery(this).attr('data-zid');
                let stoke = jQuery(this).attr('data-sid');
                let qty = jQuery(this).closest(".quantity").find(".qty").val();
                let action = jQuery(this).val();

                stoke = parseInt(stoke);
                qty = parseInt(qty);
                if(qty > stoke){
                    console.log('Not allowed');
                }
                else{
                    jQuery.ajax({
                         type : "post",
                         url : "<?php echo admin_url('admin-ajax.php'); ?>",
                         data : {action: "mkstr_ajax_atc",a:lev_id, b:qty, c:action},
                         success: function(data) {
                            
                            if(data !== '' && data != '0'){
                                jQuery('button[name="zsponer-btn"]').prop("disabled", false);
                                jQuery('#ztotal').html(data);
                                //$('#sp-error').hide();
                            } 
                            else{
                                jQuery('#ztotal').html(0);
                                //jQuery('button[name="zsponer-btn"]').prop("disabled", true);
                                //$('#sp-error').show();
                            }  
                             
                   
                         },
                         error: function (jqXHR, exception) {
                                console.log('error: '+exception) 
                         }
                    }); 
                }
             
            });

        });
    </script>
    <?php
}
add_action( 'wp_footer', 'mkstr_script_fun' );



//------------- Quinnipiac Hockey Game
function wpdocs_bartag_func3(){

    ob_start(); 
    include_once dirname( __FILE__ ) . '/hockey_event.php';
    return ob_get_clean();

}
add_shortcode( 'zagt_hockey', 'wpdocs_bartag_func3' ); 

add_action( 'admin_post_mk_str_hockey_event', 'mk_str_hockey_event_fun' );
add_action( 'admin_post_nopriv_mk_str_hockey_event', 'mk_str_hockey_event_fun' );
function mk_str_hockey_event_fun(){

    if(isset($_POST['user_email'])){

        $user_name = $_POST['user_name'];
        $user_email = $_POST['user_email'];
        $user_phone = $_POST['user_phone'];
        $adult_ticket = $_POST['adult-tickets'];
        $kids_ticket = $_POST['kids-tickets'];

        $adult_total = $adult_ticket * 50;
        $kids_total = $kids_ticket * 20;
        $total = $adult_total + $kids_total;
        $amount = $total * 100;

        $title = 'Quinnipiac Hockey Event';
        $descrtiption = "Adult Ticket: $adult_ticket - Kids Ticket: $kids_ticket";
        $meta_array = [
            'Adult_ticket' => $adult_ticket,
            'kids_ticket' => $kids_ticket,
        ];

        try{
            $stripe = new \Stripe\StripeClient(STRIPE_SECRET_KEY);
            $session = $stripe->checkout->sessions->create([
                'success_url' => site_url('success').'?session_id={CHECKOUT_SESSION_ID}',
                'cancel_url' => site_url('2025-quinnipiac-hockey-game/'),
                'customer_email' => $user_email,
                'payment_method_types' => ['card'], 
                'line_items' => [
                    [
                        'price_data' => array(
                            'currency' => 'usd', 
                            'unit_amount' => $amount, 
                            'product_data' => array('name'=>$title, 'description' => $descrtiption), 
                        ),
                        'quantity' => 1,
                    ],
                ],
                'payment_intent_data' => ['metadata' => $meta_array, 'description' => $title],
                'mode' => 'payment',
            ]);

            $_SESSION['zhoky_id'] = $session->id;
            $_SESSION['zhpost_data'] = $_POST;
            wp_redirect($session->url);
            exit;
        }
        catch (Exception $e) {
            echo $e->getMessage();
        }

    }

}

// Volleyball Tournament Registration Shortcode
function mws_volleyball_func(){
    ob_start(); 
    include_once dirname( __FILE__ ) . '/volleyball_event.php';
    return ob_get_clean();
}
add_shortcode( 'mws_volleyball', 'mws_volleyball_func' );

// Hockey Fundraiser 2026 Shortcode
function mws_hockey_2026_func(){
    ob_start();
    include_once dirname( __FILE__ ) . '/hockey_event_2026.php';
    return ob_get_clean();
}
add_shortcode( 'mws_hockey_2026', 'mws_hockey_2026_func' );

// ============================================
// PERFORMANCE OPTIMIZATIONS
// ============================================

// 1. Disable WordPress emoji scripts/styles (saves ~50KB)
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('admin_print_scripts', 'print_emoji_detection_script');
remove_action('admin_print_styles', 'print_emoji_styles');
remove_filter('the_content_feed', 'wp_staticize_emoji');
remove_filter('comment_text_rss', 'wp_staticize_emoji');
remove_filter('wp_mail', 'wp_staticize_emoji_for_email');


// 3. Remove duplicate Font Awesome 4.7 (theme already loads v5 via Elementor)
function mws_remove_duplicate_fa() {
    wp_dequeue_style('font-awesome');
    wp_deregister_style('font-awesome');
}
add_action('wp_enqueue_scripts', 'mws_remove_duplicate_fa', 100);

// 4. Restrict Sermone assets to only sermon pages
function mws_dequeue_sermone() {
    if (is_admin()) return;
    if (!is_singular('sermon') && !is_post_type_archive('sermon')) {
        wp_dequeue_script('sermone-frontend');
        wp_deregister_script('sermone-frontend');
        wp_dequeue_style('sermone-frontend');
        wp_deregister_style('sermone-frontend');
    }
}
add_action('wp_enqueue_scripts', 'mws_dequeue_sermone', 100);


// 6. Remove duplicate Magnific Popup CSS
function mws_remove_duplicate_magnific() {
    // Keep the one from wp-team-showcase, remove duplicate from bearsthemes
    wp_dequeue_style('bears-magnific-popup');
}
add_action('wp_enqueue_scripts', 'mws_remove_duplicate_magnific', 100);

// 7. Add defer to non-critical scripts
function mws_defer_scripts($tag, $handle, $src) {
    if (is_admin()) return $tag;
    // Don't defer jQuery core or inline scripts
    $no_defer = array('jquery-core', 'jquery-migrate', 'jquery');
    if (in_array($handle, $no_defer)) return $tag;
    if (strpos($tag, 'defer') !== false || strpos($tag, 'async') !== false) return $tag;
    return str_replace(' src=', ' defer src=', $tag);
}
add_filter('script_loader_tag', 'mws_defer_scripts', 10, 3);

// 8. Remove WordPress oEmbed scripts
remove_action('wp_head', 'wp_oembed_add_discovery_links');
remove_action('wp_head', 'wp_oembed_add_host_js');

// 9. Remove wlwmanifest, RSD, shortlink, generator meta tags
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wp_shortlink_wp_head');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'rest_output_link_wp_head');

// 10. Preconnect to key external domains
function mws_resource_hints($urls, $relation_type) {
    if ($relation_type === 'preconnect') {
        $urls[] = array('href' => 'https://fonts.googleapis.com', 'crossorigin' => true);
        $urls[] = array('href' => 'https://fonts.gstatic.com', 'crossorigin' => true);
    }
    return $urls;
}
add_filter('wp_resource_hints', 'mws_resource_hints', 10, 2);


// ============================================
// PHASE 2 — UX IMPROVEMENTS
// ============================================

// 1. Style the "Donate" nav button
function mws_donate_btn_css() {
?>
<style>
.menu-item.nav-donate-btn > a,
.menu-item.nav-donate-btn > a.elementor-item,
.menu-item.nav-donate-btn > a.elementor-sub-item {
    background: #cda33b !important;
    color: #fff !important;
    padding: 8px 22px !important;
    border-radius: 6px !important;
    font-weight: 600 !important;
    letter-spacing: 0.5px !important;
    transition: background 0.15s !important;
    margin-left: 12px !important;
}
.menu-item.nav-donate-btn > a:hover,
.menu-item.nav-donate-btn > a.elementor-item:hover {
    background: #b8930e !important;
    color: #fff !important;
}
@media (max-width: 1024px) {
    .menu-item.nav-donate-btn > a,
    .menu-item.nav-donate-btn > a.elementor-item {
        margin-left: 0 !important;
        display: inline-block !important;
        margin-top: 8px !important;
    }
}
</style>
<?php
}
add_action('wp_head', 'mws_donate_btn_css');

// 1b. Fix nav dropdown "white slab" — dark dropdown matching header
function mws_nav_dropdown_css() {
?>
<style>
/* ============================
   NAV DROPDOWNS — Dark style
   Applies to Elementor nav + classic fallback
   ============================ */

/* Elementor nav dropdown container */
.elementor-nav-menu--dropdown .sub-menu,
.elementor-nav-menu .sub-menu,
nav.elementor-nav-menu--main ul.sub-menu,
.tg-primary-menu .sub-menu {
    background: #1f2433 !important;
    border: 1px solid rgba(255, 255, 255, 0.14) !important;
    border-radius: 12px !important;
    padding: 8px !important;
    min-width: 240px !important;
    box-shadow: 0 16px 44px rgba(0, 0, 0, 0.28) !important;
    margin-top: 10px !important;
    z-index: 9999 !important;
}

/* Dropdown links */
.elementor-nav-menu--dropdown .sub-menu a,
.elementor-nav-menu .sub-menu a,
nav.elementor-nav-menu--main ul.sub-menu a,
.tg-primary-menu .sub-menu a {
    color: #ffffff !important;
    font-weight: 500 !important;
    padding: 10px 12px !important;
    border-radius: 10px !important;
    text-decoration: none !important;
    white-space: nowrap !important;
    background: transparent !important;
}

/* Hover + keyboard focus */
.elementor-nav-menu--dropdown .sub-menu a:hover,
.elementor-nav-menu--dropdown .sub-menu a:focus,
.elementor-nav-menu .sub-menu a:hover,
.elementor-nav-menu .sub-menu a:focus,
nav.elementor-nav-menu--main ul.sub-menu a:hover,
nav.elementor-nav-menu--main ul.sub-menu a:focus,
.tg-primary-menu .sub-menu a:hover,
.tg-primary-menu .sub-menu a:focus {
    background: rgba(255, 255, 255, 0.10) !important;
    color: #ffffff !important;
}

/* Accessible focus ring */
.elementor-nav-menu--dropdown .sub-menu a:focus-visible,
.elementor-nav-menu .sub-menu a:focus-visible,
nav.elementor-nav-menu--main ul.sub-menu a:focus-visible,
.tg-primary-menu .sub-menu a:focus-visible {
    outline: 2px solid #cda33b !important;
    outline-offset: 2px !important;
}

/* Submenu caret inherits nav color */
.elementor-nav-menu .wp-block-navigation-item__label + svg,
.elementor-nav-menu .sub-arrow svg {
    fill: currentColor !important;
}

/* Mobile open menu: keep submenu clean (no nested dark boxes) */
@media (max-width: 1024px) {
    .elementor-nav-menu--dropdown .sub-menu,
    .elementor-nav-menu .sub-menu,
    .tg-primary-menu .sub-menu {
        background: transparent !important;
        border: 0 !important;
        box-shadow: none !important;
        padding: 0 !important;
        margin-top: 0 !important;
    }
}
</style>
<?php
}
add_action('wp_head', 'mws_nav_dropdown_css');

// 2. Open Graph & Twitter Card meta tags
function mws_og_meta_tags() {
    $og_title = 'The Michael Williams Memorial Scholarship';
    $og_desc = 'Honoring Michael Williams\' legacy by awarding scholarships to RFH seniors who demonstrate excellence in music, art, academics, and community service.';
    $og_url = home_url('/');
    $og_image = get_stylesheet_directory_uri() . '/images/tournament.jpg';
    $og_type = 'website';

    if (is_singular()) {
        $og_title = get_the_title() . ' — MWS';
        $og_url = get_permalink();
    }
    ?>
    <meta property="og:title" content="<?php echo esc_attr($og_title); ?>">
    <meta property="og:description" content="<?php echo esc_attr($og_desc); ?>">
    <meta property="og:url" content="<?php echo esc_url($og_url); ?>">
    <meta property="og:image" content="<?php echo esc_url($og_image); ?>">
    <meta property="og:type" content="<?php echo esc_attr($og_type); ?>">
    <meta property="og:site_name" content="The Michael Williams Memorial Scholarship">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?php echo esc_attr($og_title); ?>">
    <meta name="twitter:description" content="<?php echo esc_attr($og_desc); ?>">
    <meta name="twitter:image" content="<?php echo esc_url($og_image); ?>">
    <?php
}
add_action('wp_head', 'mws_og_meta_tags', 1);


// Our Team Page Shortcode
function mws_our_team_func(){
    ob_start();
    include_once dirname( __FILE__ ) . '/our_team_page.php';
    return ob_get_clean();
}
add_shortcode( 'mws_our_team', 'mws_our_team_func' );

// Scholarship Info Page Shortcode
function mws_scholarship_func(){
    ob_start();
    include_once dirname( __FILE__ ) . '/scholarship_page.php';
    return ob_get_clean();
}
add_shortcode( 'mws_scholarship', 'mws_scholarship_func' );

// About Us Page Shortcode
function mws_about_us_func(){
    ob_start();
    include_once dirname( __FILE__ ) . '/about_us_page.php';
    return ob_get_clean();
}
add_shortcode( 'mws_about_us', 'mws_about_us_func' );

// Homepage Shortcode
function mws_homepage_func(){
    ob_start();
    include_once dirname( __FILE__ ) . '/homepage.php';
    return ob_get_clean();
}
add_shortcode( 'mws_homepage', 'mws_homepage_func' );


// ============================================
// PHASE 3 — STRUCTURED DATA (Schema.org)
// ============================================

function mws_schema_org_markup() {
    $schema = array(
        '@context' => 'https://schema.org',
        '@type' => 'NGO',
        'name' => 'The Michael Williams Memorial Scholarship',
        'url' => home_url('/'),
        'email' => 'info@michaelwilliamsscholarship.com',
        'description' => 'A 501(c)(3) memorial scholarship foundation supporting graduating seniors from Rumson-Fair Haven Regional High School who embody excellence in music, art, academics, and community service.',
        'foundingDate' => '2019',
        'nonprofitStatus' => '501c3',
        'sameAs' => array(
            'https://www.linkedin.com/company/the-michael-williams-memorial-scholarship'
        )
    );
    echo '<script type="application/ld+json">' . wp_json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) . '</script>' . "\n";
}
add_action('wp_head', 'mws_schema_org_markup', 5);

// ============================================
// PHASE 4 — GLOBAL DESIGN SYSTEM
// ============================================

// Global typography, contrast, spacing, hover, header, face cropping
function mws_global_design_css() {
?>
<style>
/* --- Unified Header System --- */
header,
.site-header,
#masthead,
.tg-site-header,
.elementor-location-header,
.elementor-location-header .elementor-section,
.elementor-location-header .elementor-container,
.tg-site-header .tg-header,
.tg-site-header .tg-header-wrap {
    background-color: #1d2338 !important;
}

/* Keep the nav visually separate from dark hero sections */
header,
.site-header,
#masthead,
.tg-site-header,
.elementor-location-header {
    border-bottom: 1px solid rgba(255, 255, 255, 0.16) !important;
    box-shadow: 0 8px 26px rgba(0, 0, 0, 0.22) !important;
}

/* Consistent nav contrast */
.tg-site-header a,
.elementor-location-header a,
.elementor-location-header .elementor-nav-menu a {
    color: #ffffff !important;
}

.tg-site-header a:hover,
.elementor-location-header a:hover,
.elementor-location-header .elementor-nav-menu a:hover {
    color: #cda33b !important;
}

/* --- WCAG AA Contrast Fix (Task 5) --- gold text on light backgrounds --- */
/* --gold-text: #8a6d1b provides 4.6:1 on white */
</style>
<?php
}
add_action('wp_head', 'mws_global_design_css');

// ============================================
// NAVIGATION — Rename "About Michael" to "About Mikey" (Task 7)
// ============================================
function mws_rename_about_nav_label($items) {
    foreach ($items as $item) {
        if ($item->title === 'About Michael') $item->title = 'About Mikey';
    }
    return $items;
}
add_filter('wp_nav_menu_objects', 'mws_rename_about_nav_label');

// ============================================
// NEW PAGE SHORTCODES
// ============================================

// Past Winners Page Shortcode
function mws_past_winners_func(){
    ob_start();
    include_once dirname( __FILE__ ) . '/past_winners_page.php';
    return ob_get_clean();
}
add_shortcode( 'mws_past_winners', 'mws_past_winners_func' );

// Donate Page Shortcode
function mws_donate_func(){
    ob_start();
    include_once dirname( __FILE__ ) . '/donate_page.php';
    return ob_get_clean();
}
add_shortcode( 'mws_donate', 'mws_donate_func' );

// Gallery Page Shortcode
function mws_gallery_func($atts){
    $atts = shortcode_atts(array('year' => ''), $atts);
    ob_start();
    $gallery_year = $atts['year'];
    include dirname( __FILE__ ) . '/gallery_page.php';
    return ob_get_clean();
}
add_shortcode( 'mws_gallery', 'mws_gallery_func' );

// ============================================
// PHASE 4 — ACCESSIBILITY FIXES
// ============================================

// Prevent screen readers from reading duplicate navigation
function mws_nav_aria_hidden_script() {
?>
<script>
(function() {
    var mobileMenu = document.getElementById('mobile-primary-menu');
    var desktopNav = document.querySelector('.elementor-nav-menu--main');
    if (!mobileMenu && !desktopNav) return;

    var mql = window.matchMedia('(max-width: 1024px)');

    function updateNavAria(e) {
        if (e.matches) {
            // Mobile viewport: hide desktop nav from screen readers
            if (desktopNav) desktopNav.setAttribute('aria-hidden', 'true');
            if (mobileMenu) mobileMenu.removeAttribute('aria-hidden');
        } else {
            // Desktop viewport: hide mobile nav from screen readers
            if (mobileMenu) mobileMenu.setAttribute('aria-hidden', 'true');
            if (desktopNav) desktopNav.removeAttribute('aria-hidden');
        }
    }

    updateNavAria(mql);
    mql.addEventListener('change', updateNavAria);
})();
</script>
<?php
}
add_action('wp_footer', 'mws_nav_aria_hidden_script');

// ============================================
// HEADER + FOOTER RENDER FIXES
// ============================================
function mws_header_footer_render_fixes() {
?>
<style>
/* Prevent logo clipping across desktop/mobile header variants */
.tg-site-header .site-logo,
.tg-site-header .site-branding,
.tg-site-header .site-branding a,
.tg-site-header .custom-logo-link,
.elementor-location-header .custom-logo-link,
.elementor-location-header .site-logo {
    overflow: visible !important;
}

header,
.site-header,
#masthead,
.tg-site-header,
.elementor-location-header {
    overflow: visible !important;
}

.tg-site-header .custom-logo,
.tg-site-header .site-logo img,
.elementor-location-header .custom-logo,
.elementor-location-header .site-logo img {
    display: block !important;
    width: auto !important;
    max-height: 104px !important;
    height: auto !important;
    object-fit: contain !important;
    object-position: center !important;
}

@media (max-width: 1024px) {
    .tg-site-header .custom-logo,
    .tg-site-header .site-logo img,
    .elementor-location-header .custom-logo,
    .elementor-location-header .site-logo img {
        max-height: 82px !important;
    }
}

</style>
<?php
}
add_action('wp_head', 'mws_header_footer_render_fixes', 99);

// Hide fallback/duplicate footer blocks only when custom footer is present.
function mws_footer_visibility_guard() {
?>
<script>
(function() {
    if (document.body.classList.contains('wp-admin')) return;
    var customFooter = document.querySelector('.mws-footer');
    if (!customFooter) return;
    var selectors = [
        '.elementor-location-footer',
        '[data-elementor-type=\"footer\"]',
        '.tg-site-footer',
        '.tg-footer-wrap',
        '.tg-site-footer-bar',
        '#footer-wrap'
    ];
    selectors.forEach(function(sel) {
        document.querySelectorAll(sel).forEach(function(el) {
            if (!el.classList.contains('mws-footer') && !el.closest('.mws-footer')) {
                el.style.display = 'none';
            }
        });
    });
})();
</script>
<?php
}
add_action('wp_footer', 'mws_footer_visibility_guard', 999);

// ============================================
// NEWSLETTER (MAILCHIMP) INTEGRATION
// ============================================
function mws_register_newsletter_settings() {
    register_setting('general', 'mws_mailchimp_form_action', array(
        'type' => 'string',
        'sanitize_callback' => 'esc_url_raw',
        'default' => ''
    ));

    add_settings_field(
        'mws_mailchimp_form_action',
        'Mailchimp Form Action URL',
        'mws_mailchimp_form_action_field',
        'general'
    );
}
add_action('admin_init', 'mws_register_newsletter_settings');

function mws_mailchimp_form_action_field() {
    $value = esc_url(get_option('mws_mailchimp_form_action', ''));
    echo '<input type="url" id="mws_mailchimp_form_action" name="mws_mailchimp_form_action" value="' . $value . '" class="regular-text" placeholder="https://...list-manage.com/subscribe/post?...">';
    echo '<p class="description">Paste the Mailchimp hosted form action URL from your audience signup form. This powers newsletter forms across the site.</p>';
}

function mws_render_newsletter_signup($args = array()) {
    $defaults = array(
        'title' => 'Stay Connected',
        'description' => 'Get scholarship updates, event news, and ways to support students.',
        'button_text' => 'Subscribe',
        'source' => 'site',
        'class' => '',
        'compact' => false,
    );
    $a = wp_parse_args($args, $defaults);

    $action = trim((string) get_option('mws_mailchimp_form_action', ''));

    if (empty($action)) {
        if (current_user_can('manage_options')) {
            return '<div class="mws-newsletter mws-newsletter--unconfigured"><p>Newsletter form is not configured. Add the Mailchimp action URL in Settings > General.</p></div>';
        }
        return '';
    }

    $classes = 'mws-newsletter ' . ($a['compact'] ? 'mws-newsletter--compact ' : '') . $a['class'];

    $html  = '<section class="' . esc_attr(trim($classes)) . '" aria-label="Newsletter signup">';
    $html .= '<h3 class="mws-newsletter-title">' . esc_html($a['title']) . '</h3>';
    $html .= '<p class="mws-newsletter-copy">' . esc_html($a['description']) . '</p>';
    $html .= '<form class="mws-newsletter-form" action="' . esc_url($action) . '" method="post" target="_blank" novalidate>';
    $html .= '<label class="screen-reader-text" for="mws-newsletter-email-' . esc_attr($a['source']) . '">Email address</label>';
    $html .= '<input id="mws-newsletter-email-' . esc_attr($a['source']) . '" class="mws-newsletter-input" type="email" name="EMAIL" placeholder="Enter your email" required>';
    $html .= '<button class="mws-newsletter-btn" type="submit">' . esc_html($a['button_text']) . '</button>';
    $html .= '</form>';
    $html .= '<p class="mws-newsletter-note">No spam. Unsubscribe anytime.</p>';
    $html .= '</section>';

    return $html;
}

function mws_newsletter_global_css() {
?>
<style>
.mws-newsletter {
    border: 1px solid rgba(205, 163, 59, 0.35);
    border-radius: 14px;
    padding: 20px;
    background: rgba(205, 163, 59, 0.07);
}
.mws-newsletter-title {
    margin: 0 0 6px;
    font-size: 22px;
    font-weight: 700;
    color: #232842;
    line-height: 1.2;
}
.mws-newsletter-copy {
    margin: 0 0 12px;
    color: #4b5563;
    font-size: 14px;
}
.mws-newsletter-form {
    display: flex;
    gap: 10px;
}
.mws-newsletter-input {
    flex: 1;
    min-height: 44px;
    border: 1px solid #cbd5e1;
    border-radius: 10px;
    padding: 10px 12px;
    font-family: 'Poppins', sans-serif;
    font-size: 14px;
}
.mws-newsletter-input:focus {
    outline: none;
    border-color: #cda33b;
    box-shadow: 0 0 0 3px rgba(205, 163, 59, 0.18);
}
.mws-newsletter-btn {
    min-height: 44px;
    border: none;
    border-radius: 10px;
    padding: 10px 18px;
    font-family: 'Poppins', sans-serif;
    font-size: 14px;
    font-weight: 700;
    background: #cda33b;
    color: #fff;
    cursor: pointer;
}
.mws-newsletter-btn:hover {
    background: #b8930e;
}
.mws-newsletter-note {
    margin: 10px 0 0;
    font-size: 12px;
    color: #6b7280;
}
.mws-newsletter--compact {
    padding: 16px;
}
.mws-newsletter--compact .mws-newsletter-title {
    font-size: 18px;
}
.mws-newsletter--compact .mws-newsletter-copy {
    font-size: 13px;
}
.mws-newsletter--unconfigured {
    background: #fff7ed;
    border-color: #fdba74;
}
@media (max-width: 680px) {
    .mws-newsletter-form {
        flex-direction: column;
    }
}
</style>
<?php
}
add_action('wp_head', 'mws_newsletter_global_css', 101);
