<form id="zspnreg" method="post" action="<?php echo esc_url( admin_url('admin-post.php') ); ?>" enctype="multipart/form-data"> 
	<?php
		if(isset($_SESSION['ERR_MSG'])){
			echo $_SESSION['ERR_MSG'];
			unset($_SESSION['ERR_MSG']);
		}
	?>
	<div class="zsep"><strong></strong>
		<div class="row-group">
			<input type="text" placeholder="Business Name or Name for Signage *" name="zbnm" required/>
		</div>	
		<div class="row-group">
			<div class="mkstr-inner">
				<div class="mkstr-col">
					<input type="text" placeholder="First Name *" name="zfnm" required/>
				</div>
				<div class="mkstr-col">
					<input type="text" placeholder="Last Name *" name="zlnm" required/>
				</div>
			</div>
		</div>	
		<div class="row-group">
			<input type="email" placeholder="E-Mail Address *" name="zemail" required/>
		</div>
		<div class="row-group">
			<input type="text" placeholder="Phone Number *" name="zphone" required/>
		</div>	
		<div class="row-group">
			<label>Upload artwork</label>
			<div><input type="file" name="zlogo" accept="image/png, image/gif, image/jpeg"/></div>
			<label style="margin-top: 5px;">
				<input type="checkbox" id="no-logo" name="no-logo" value="yes"/>
				Check if No Logo is Available
			</label>
			<div style="display: none;" id="logo-name-row">
				<input type="text" placeholder="Sponsor Name" name="logo-name" id="logo-name" />
			</div>
		</div>
	</div>

	<div class="zdynamic-row">

	</div>
	<div class="row-group">
		<div class="zrow-total">
			<div> 
				<label>TOTAL = </label> $<span id="ztotal"><?php echo $total;?></span>
			</div>
			<div id="sp-error" style="display:none;border: 1px solid #ff0000;padding: 10px 15px;color: #ff0000;">
				Please add atleast one SPONSORSHIP LEVELS
			</div>
		</div>    
	</div>
	<div class="row-group">
		<button type="submit" name="zsponer-btn" <?php echo $disabled;?>>Register</button>
	</div>
	<input type="hidden" name="action" value="mk_str_spn_regsiter"/>
</form>
<script type="text/javascript">
	var $ = jQuery;
	$(function(){
 		$('#no-logo').on('click', function(){
 			if($(this).prop("checked") == true){
 				$('#logo-name-row').show();
 			}
 			else{
 				$('#logo-name-row').hide();	
 			}
 		});
	});
</script>