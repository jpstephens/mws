<?php
if(isset($_SESSION['zcheckout_id']) && !empty($_SESSION['zcheckout_id'])){
	
	$_ID = $_SESSION['zcheckout_id'];
	$stripe = new \Stripe\StripeClient(STRIPE_SECRET_KEY);
	try{
		
		$result_array = $stripe->checkout->sessions->retrieve($_ID);
		if($result_array){
    		
    		if($_SESSION['ztype'] == "1"){
	    		$donated_amount = DONATED_AMOUNT;
				$amount = $_SESSION['zamount'];
	    		$add_amount = $donated_amount + $amount;
	    		update_option(DONATED_AMOUNT_OPTION_KEY,$add_amount);
	    		$url = get_option('zend_str_redierct_page');
    		}
    		else{
    			$url = site_url('registration-thank-you/');
	   		}
    		unset($_SESSION['zcheckout_id']);
    		wp_redirect($url);
    		exit;
    	}
		
	}
	catch(Exception $e){
		echo $error3 = $e->getMessage();
	}
}
else if(isset($_SESSION['zspo_id']) && !empty($_SESSION['zspo_id'])){
	$_ID = $_SESSION['zspo_id'];
	$stripe = new \Stripe\StripeClient(STRIPE_SECRET_KEY);
	try{
		$result_array = $stripe->checkout->sessions->retrieve($_ID);
		if($result_array){
    		global $wpdb;
    		$stripe_cus = $result_array->customer;
    		$total = $_SESSION['ZTOTAL'];
    		$logo_url = $_SESSION['zspo_logo_url'];
    		$cname = $_SESSION['zpost_data']['zbnm'];
	        $fname = $_SESSION['zpost_data']['zfnm'];
	        $lname = $_SESSION['zpost_data']['zlnm'];
	        $email = $_SESSION['zpost_data']['zemail'];
	        $phone = $_SESSION['zpost_data']['zphone'];
    	
	        if(!empty($logo_url)){
	        	$logo_name = '(See Attachment)';
	        }
	        else{
	        	if(isset($_SESSION['zpost_data']['no-logo'])){
	                $logo_name = $_SESSION['zpost_data']['logo-name'];
	            }
            }

	        $table = $wpdb->prefix.'spo';
			$data = [
						'c_name' => $cname,
						'f_name' => $fname,
						'l_name' => $lname,
						'email' => $email,
						'phone' => $phone,
						'logo_name' => $logo_url,
						'total' => $total, 
						'stripe_cus_id' => $stripe_cus,
					];
			$wpdb->insert($table, $data); 
			$my_id = $wpdb->insert_id;

			$table_details = $wpdb->prefix.'spo_details';
			foreach($_SESSION['ZCART'] as $key => $val){
				$newdata = [
					'spo_id' => $my_id,
					'level_id' => $val['lev_id'],
					'leval_title' => $val['title'],
					'qty' => $val['qty'],
					'cost' => $val['cost'],
				];
				$wpdb->insert($table_details, $newdata); 
			}
 
			$header = "";
			$body_user = "";
			$footer = "";
			$body = "";
			$body_admin = "";
			$header .= "<img src='https://michaelwilliamsscholarship.com/wp-content/uploads/2025/05/s_confirm_new.png' width='100%'/><br><br><br><br>";

			
			$body_user .= "<p style='padding:10px;text-align:center;font-size:16px;'>Thank you for participating as a sponsor of The Michael Williams Memorial Golf Outing!<br> Your support will help grow this scholarship to keep Mike’s spirit and personality alive and extend his legacy into the next generation!<p>";
			$body_user .= "<div style='text-align:center;'>";
			$body_user .= "<h2 style='margin-bottom:0px'>Sponsorship Details:</h2>";
			$body_user .= "<p><b>Business Name: </b><br>$cname";
			$body_user .= "<br><br><b>First Name: </b><br>$fname";
			$body_user .= "<br><br><b>Last Name: </b><br>$lname";
			$body_user .= "<br><br><b>E-Mail Address: </b><br>$email";
			$body_user .= "<br><br><b>Phone #: </b><br>$phone";
			$body_user .= "<br><br><b>Logo #: </b><br>$logo_name";
			$body_user .= "<br><br><b>Total amount paid: </b><br>$".$total."";
			$body_user .= "</p>";

			$i = 1;
			foreach($_SESSION['ZCART'] as $key => $val){
				$title = $val['title'];
				$des = get_field('sponsorship_includes', $key);
				$body_user .= "<h3 style='margin-bottom:0px;font-size:13px;'>Sponsorship Purchased #$i:</h3>";
				$body_user .= "$title (".$val['qty']." x $".$val['cost'].")<br>$des";
				$i++;
			}
			$body_user .= "</div>";
			////////
			$body_admin .= "<h2 style='margin-bottom:0px'>Sponsorship Details:</h2>";
			$body_admin .= "<p><b>Business Name: </b><br>$cname";
			$body_admin .= "<br><br><b>First Name: </b><br>$fname";
			$body_admin .= "<br><br><b>Last Name: </b><br>$lname";
			$body_admin .= "<br><br><b>E-Mail Address: </b><br>$email";
			$body_admin .= "<br><br><b>Phone #: </b><br>$phone";
			$body_admin .= "<br><br><b>Logo #: </b><br>$logo_name";
			$body_admin .= "<br><br><b>Total amount paid: </b><br>$".$total."";
			$body_admin .= "</p>";

			$i = 1;
			foreach($_SESSION['ZCART'] as $key => $val){
				$title = $val['title'];
				$des = get_field('sponsorship_includes', $key);
				$body_admin .= "<h3 style='margin-bottom:0px;font-size:13px;'>Sponsorship Purchased #$i:</h3>";
				$body_admin .= "$title (".$val['qty']." x $".$val['cost'].")<br>$des";
				$i++;
			}
	
			///////////
 
			$body_user .= "<p style='padding:10px;text-align:center;font-size:16px;'>You will be receiving an email approximately 4 weeks prior to the event to review your sponsorship package. <br><br>Michael Williams Memorial Golf Outing<br>Thursday, September 11, 2025<br><a href='https://www.gallopinghillgolfcourse.com/'>Galloping Hills Golf Course</a><br>3 Golf Drive Kenilworth NJ, 07033</p>";
		

			$footer .= "<br><br><br><br><table style='font-family: Montserrat, Sans-serif;background-color:#232842;margin-bottom:10px;text-align: left;width:100%;'>";
			$footer .= "<tr><td style='border-right: 1px solid #fff;padding: 10px 50px;color: #fff;
    font-size: 18px;border-right:1px solid #fff;'>For more event information please contact us at<br><b><a style='color:#fff'> info@michaelwilliamsscholarship.com</a></b> </td>
		    <td style='padding: 10px 50px;color: #fff;font-size: 18px;'><b><a style='color:#fff'>michaelwilliamsscholarship.com</a><b></td>
		    </tr>";
		    $footer .= "</table>";	

		    // SEND TO ADMIN
		    $body = $header.$body_admin.$footer;

			
			mk_mail('jstephens@michaelwilliamsscholarship.com','Michael Williams Scholarship (Sponsorship Registration Details)', $body, $logo_url);
			mk_mail('vfabrico@michaelwilliamsscholarship.com','Michael Williams Scholarship (Sponsorship Registration Details)', $body, $logo_url);
			mk_mail('jprota@michaelwilliamsscholarship.com','Michael Williams Scholarship (Sponsorship Registration Details)', $body, $logo_url);
			mk_mail('ceckstein@michaelwilliamsscholarship.com','Michael Williams Scholarship (Sponsorship Registration Details)', $body, $logo_url);
			mk_mail('jlogin@michaelwilliamsscholarship.com','Michael Williams Scholarship (Sponsorship Registration Details)', $body, $logo_url);

			// SEND TO USER
			$body = $header.$body_user.$footer;
			mk_mail($email,'Michael Williams Scholarship (Sponsorship Registration Details)', $body, $logo_url);
		
			
			foreach($_SESSION['ZCART'] as $key => $val){
				$level_id = $val['lev_id'];
				$qty = $val['qty'];
				$stock = get_field('stock',$level_id);
				$new_qty = ($stock - $qty);
				update_field('stock', $new_qty, $level_id);
				
			}
			
			
			$url = site_url('registration-thank-you/');
    		unset($_SESSION['zspo_id']);
    		unset($_SESSION['ZCART']);
    		unset($_SESSION['ZTOTAL']);
    		unset($_SESSION['zspo_logo_url']);
    		unset($_SESSION['zpost_data']);
    		wp_redirect($url);
    		exit;
    	}
		
	}
	catch(Exception $e){
		echo $error3 = $e->getMessage();
	}
}

else if(isset($_SESSION['zreg_id']) && !empty($_SESSION['zreg_id'])){
	$_ID = $_SESSION['zreg_id'];
	$stripe = new \Stripe\StripeClient(STRIPE_SECRET_KEY);
	try{
		$result_array = $stripe->checkout->sessions->retrieve($_ID);
		if($result_array){
    		
			$stripe_cus = $result_array->customer;
    		$total = $_SESSION['zamount'] / 100;
    		$qty = $_SESSION['zreg_data']['mkstr-nog'];
    		$total = $total * $qty;
			$header = "";
			$body_user = "";
			$footer = "";
			$body = "";
			$body_admin = "";
	
			
			$header .= "<img src='https://michaelwilliamsscholarship.com/wp-content/uploads/2025/05/r_confirm_new.png' width='100%'/><br><br><br><br>";

			$body_user .= "<p style='padding:10px;text-align:center;font-size:16px;'>Thank you for registering for The Michael Williams Memorial Golf Outing!<br><br>Your support will help grow this scholarship to keep Mike’s spirit and personality alive and extend his legacy into the next generation!<p>";

			$body_user .= "<h2 style='margin-bottom:0px;text-align:center;'>Registration Details:</h2>";

			$j = 1;
	        for($i=0; $i<$qty; $i++){
	            $body_user .= "<p style='text-align:center;'><b>Golfer #$j</b><br>".$_SESSION['zreg_data']['zfnm'][$i].' '.$_SESSION['zreg_data']['zlnm'][$i]."</p>";
	            $j++; 
	        }

			//$body_user .= "<tr><td><b>Total amount paid<br>$".$total."</b><br>";

			////////
			$body_admin .= "<h2 style='margin-bottom:0px;text-align:left;'>Golfer Details:</h2>";
			$j = 1;
	        for($i=0; $i<$qty; $i++){
	            $body_admin .= "<h3 style='margin-bottom:0px;font-size:13px;'>Golfer #$j</h3><p style='text-align:left;'>";
	            $body_admin .= "<b>First Name: </b><br>".$_SESSION['zreg_data']['zfnm'][$i];
	            $body_admin .= "<br><br><b>Last Name: </b><br>".$_SESSION['zreg_data']['zlnm'][$i];
	            $body_admin .= "<br><br><b>Email: </b><br>".$_SESSION['zreg_data']['zemail'][$i];
	            $body_admin .= "<br><br><b>Phone: </b><br>".$_SESSION['zreg_data']['zphone'][$i];
	            $body_admin .= "</p>";
	            $j++; 
	        }
			$body_admin .= "<p style='text-align:left;'><b>Total amount paid<br>$".$total."</b><br>";
			$body_admin .= "</p>";

			///////////

			
			$body_user .= "<h3 style='padding:10px;text-align:center;'>Registration begins at 7:30am on Thursday, September 11, 2025
<br><a href='https://www.gallopinghillgolfcourse.com/'>Galloping Hills Golf Course</a><br>3 Golf Drive Kenilworth NJ, 07033</h3>";

			$body_user .= "<img src='https://michaelwilliamsscholarship.com/wp-content/uploads/2023/06/gr.jpg' style='display:block;margin:auto;' width='40%'/>";

			$body_user .= "<h4 style='padding:10px;text-align:center;font-size:16px;'><strong><u>Hotel Information</u></strong></h4>";

			$body_user .= "<p style='padding:10px;text-align:center;font-size:16px;'>For anyone coming to town the night before the event, a block of rooms has been reserved at <strong><i><a style='text-decoration: none;color: #222;' href='https://www.kenilworthinn.com'>The Kenilworth</a></i></strong>, one mile from Galloping Hills Golf Course.<br><br><u>Please call the hotel directly</u> at <a style='text-decoration: none;' href='tel: 8007753645'>800-775-3645</a> and request the <strong><i>Michael Williams Memorial Golf Outing Block</i></strong> in order to receive the discounted rate.</p>";

			$footer .= "<br><br><br><br><table style='font-family: Montserrat, Sans-serif;background-color:#232842;margin-bottom:10px;text-align: left;width:100%;max-width:100%;'>";
			$footer .= "<tr><td style='border-right: 1px solid #fff;padding: 10px 50px;color: #fff;
    font-size: 18px;border-right:1px solid #fff;'>For more event information or sponsorship opportunities<br>please contact us at <b><a style='color:#fff'>info@michaelwilliamsscholarship.com</a></b> </td>
		    <td style='padding: 10px 50px;color: #fff;font-size: 18px;'><b><a style='color:#fff'>michaelwilliamsscholarship.com</a><b></td>
		    </tr>";
		    $footer .= "</table>";	

		    // SEND TO ADMIN
		    $body = $header.$body_admin.$footer;
			
			mk_mail('jstephens@michaelwilliamsscholarship.com','Michael Williams Scholarship (Golfer Registration Details)', $body,'');
			mk_mail('vfabrico@michaelwilliamsscholarship.com','Michael Williams Scholarship (Golfer Registration Details)', $body,'');
			mk_mail('jprota@michaelwilliamsscholarship.com','Michael Williams Scholarship (Golfer Registration Details)', $body,'');
			mk_mail('ceckstein@michaelwilliamsscholarship.com','Michael Williams Scholarship (Golfer Registration Details)', $body,'');
			mk_mail('jlogin@michaelwilliamsscholarship.com','Michael Williams Scholarship (Golfer Registration Details)', $body,'');
			
			// SEND TO USER
			$body = $header.$body_user.$footer;

			$j = 1;
	        for($i=0; $i<$qty; $i++){
	            $email = $_SESSION['zreg_data']['zemail'][$i];
	            mk_mail($email,'Michael Williams Scholarship (Golfer Registration Details)', $body,'');
	            $j++; 
	        }

	   		$url = site_url('registration-thank-you/');
    		unset($_SESSION['zreg_id']);
    		unset($_SESSION['ztype']);
    		unset($_SESSION['zamount']);
    		unset($_SESSION['zreg_data']);
    		wp_redirect($url);
    		exit;
    	}
		
	}
	catch(Exception $e){
		echo $error3 = $e->getMessage();
	}
}

else if(isset($_SESSION['zhoky_id']) && !empty($_SESSION['zhoky_id'])){
	$_ID = $_SESSION['zhoky_id'];
	$stripe = new \Stripe\StripeClient(STRIPE_SECRET_KEY);
	try{
		
		$result_array = $stripe->checkout->sessions->retrieve($_ID);
		if($result_array){

			$user_name = $_SESSION['zhpost_data']['user_name'];
	        $user_email = $_SESSION['zhpost_data']['user_email'];
	        $user_phone = $_SESSION['zhpost_data']['user_phone'];
	        $adult_ticket = $_SESSION['zhpost_data']['adult-tickets'];
	        $kids_ticket = $_SESSION['zhpost_data']['kids-tickets'];

	        $adult_total = $adult_ticket * 50;
	        $kids_total = $kids_ticket * 20;
	        $total = $adult_total + $kids_total;

			$body_user .= "<p>Thank you for Registration of The Quinnipiac Hockey Event!<p>";
			$body_user .= "<div>";
			$body_user .= "<h2 style='margin-bottom:0px'>Registration Details:</h2>";
			$body_user .= "<br><br><b>Full name: </b><br>$user_name";
			$body_user .= "<br><br><b>E-Mail address: </b><br>$user_email";
			$body_user .= "<br><br><b>Phone: </b><br>$user_phone";
			$body_user .= "<br><br><b>Adult ticket: </b>x$adult_ticket = $$adult_total";
			$body_user .= "<br><br><b>Kids ticket: </b>x$kids_ticket = $$kids_total";
			$body_user .= "<br><br><b>Total amount paid: </b>$".$total."";
			$body_user .= "</p>";
			$body_user .= "</div>";

			$body_admin .= "<h2 style='margin-bottom:0px'>Registration Details:</h2>";
			$body_admin .= "<br><br><b>Full name: </b><br>$user_name";
			$body_admin .= "<br><br><b>E-Mail address: </b><br>$user_email";
			$body_admin .= "<br><br><b>Phone: </b><br>$user_phone";
			$body_admin .= "<br><br><b>Adult ticket: </b>x$adult_ticket = $$adult_total";
			$body_admin .= "<br><br><b>Kids ticket: </b>x$kids_ticket = $$kids_total";
			$body_admin .= "<br><br><b>Total amount paid: </b>$".$total."";
			$body_admin .= "</p>";


			$footer .= "<br><br><br><br><table style='font-family: Montserrat, Sans-serif;background-color:#232842;margin-bottom:10px;text-align: left;width:100%;'>";
			$footer .= "<tr><td style='border-right: 1px solid #fff;padding: 10px 50px;color: #fff;
    font-size: 18px;border-right:1px solid #fff;'>For more event information please contact us at<br><b><a style='color:#fff'> info@michaelwilliamsscholarship.com</a></b> </td>
		    <td style='padding: 10px 50px;color: #fff;font-size: 18px;'><b><a style='color:#fff'>michaelwilliamsscholarship.com</a><b></td>
		    </tr>";
		    $footer .= "</table>";	

		    // SEND TO ADMIN
		    $body = $header.$body_admin.$footer;

			
			mk_mail('jstephens@michaelwilliamsscholarship.com','Michael Williams Scholarship (Quinnipiac Hockey Event Registration Details)', $body,'');
			mk_mail('vfabrico@michaelwilliamsscholarship.com','Michael Williams Scholarship (Quinnipiac Hockey Event Registration Details)', $body,'');
			mk_mail('jprota@michaelwilliamsscholarship.com','Michael Williams Scholarship (Quinnipiac Hockey Event Registration Details)', $body,'');
			mk_mail('ceckstein@michaelwilliamsscholarship.com','Michael Williams Scholarship (Quinnipiac Hockey Event Registration Details)', $body,'');
			mk_mail('jlogin@michaelwilliamsscholarship.com','Michael Williams Scholarship (Quinnipiac Hockey Event Registration Details)', $body,'');
			

			//mk_mail('mayur.kalathiya1@gmail.com','Michael Williams Scholarship (Quinnipiac Hockey Event Registration Details)', $body,'');

			// SEND TO USER
			$body = $header.$body_user.$footer;
			mk_mail($user_email,'Michael Williams Scholarship (Quinnipiac Hockey Event Registration Details)', $body,'');

    		$url = site_url('registration-thank-you/');
    		unset($_SESSION['zhoky_id']);
    		wp_redirect($url);
    		exit;
    	}
		
	}
	catch(Exception $e){
		echo $error3 = $e->getMessage();
	}
}
