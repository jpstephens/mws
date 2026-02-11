<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Alone
 * @since Alone 7.0
 */

?>

	<footer id="colophon" class="site-footer">

		<?php
			/**
			 * Hook: alone_site_footer_content
			 *
			 * @hooked alone_site_footer_widgets - 10
			 * @hooked alone_site_footer_info - 30
			 */
			do_action( 'alone_site_footer_content' );
		?>

	</footer><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?>
<script type="text/javascript">
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
	         	
	         	if(data !== ''){
	         		jQuery('button[name="zsponer-btn"]').prop("disabled", false);
	         		jQuery('#ztotal').html(data);
	         		
	         	} 
	         	else{
	         		
	         	}  
	         	 
	   
	         },
	         error: function (jqXHR, exception) {
	         		console.log('error: '+exception) 
	         }
	    }); 
	}
 
});
</script>
</body>
</html>
