<form id="zreg" method="post" action="<?php echo esc_url( admin_url('admin-post.php') ); ?>">
	<div class="row-group">
		<select name="mkstr-nog" required>
			<option value="">Select Number of golfers</option>
			<option value="1">1</option>
			<option value="2">2</option>
			<option value="3">3</option>
			<option value="4">4</option>
		</select>
	</div>
	<div class="zsep"><strong>Golfer # 1</strong>
		<div class="row-group">
			<div class="mkstr-inner">
				<div class="mkstr-col">
					<input type="text" placeholder="First Name *" name="zfnm[]" required/>
				</div>
				<div class="mkstr-col">
					<input type="text" placeholder="Last Name *" name="zlnm[]" required/>
				</div>
			</div>
		</div>	
		<div class="row-group">
			<input type="text" placeholder="Cell Phone *" name="zphone[]" required/>
		</div>	
		<div class="row-group">
			<input type="email" placeholder="E-Mail Address *" name="zemail[]" required/>
		</div>
	</div>
	<div class="zdynamic-row">

	</div>
	<div class="row-group">
		<label>
			<input type="checkbox" name="mkstr-mar" value="Yes"/>
			Opt in check box for marketing efforts
		</label>
	</div>
	<div class="row-group">
		<div class="zrow-total">
			<div>
				<label>AMOUNT = </label> $<?php echo $fees;?> (PER GOLFER)
			</div>
			<div>
				<label>TOTAL = </label> $<span id="ztotal"><?php echo $fees;?></span>
				(<span id="zqty">1</span> x <?php echo $fees;?>)
			</div>
			
		</div>    
	</div>
	<div class="row-group">
		<button type="submit" name="zreg-btn">Register</button>
	</div>
	<input type="hidden" name="mkstr_nonce" value="<?php echo $form_id;?>"/>
	<input type="hidden" name="action" value="mk_str_regsiter"/>
</form>
<script type="text/javascript">
	var $ = jQuery;
	$(function(){
		$('select[name="mkstr-nog"]').on('change',function(){

			var ele_val = $(this).val();
			var form_field = '';
			var field_pre = 'Golfer #';
			for(var i=1; i<ele_val; i++){
				var j = i+1; 
				form_field += '<div class="zsep"><strong>Golfer # '+j+'</strong>';
				form_field += '<div class="row-group"><div class="mkstr-inner"><div class="mkstr-col"><input type="text" placeholder="First Name *" name="zfnm[]" required/></div><div class="mkstr-col"><input type="text" placeholder="last Name *" name="zlnm[]" required/></div></div></div><div class="row-group"><input type="text" placeholder="Cell Phone *" name="zphone[]" required/></div><div class="row-group"><input type="email" placeholder="E-Mail Address *" name="zemail[]" required/></div></div>'; 
			}
			$('.zdynamic-row').html(form_field);

			var fees = '<?php echo $fees ?>';
			var sub_total = (fees * ele_val);
			$('#zqty').html(ele_val);
			$('#ztotal').html(sub_total);
		}); 
	});
</script>