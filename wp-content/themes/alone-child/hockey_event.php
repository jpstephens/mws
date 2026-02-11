<div class="hockey-form">
	<form id="zhockey_event" method="POST" action="<?php echo esc_url( admin_url('admin-post.php') ); ?>"> 
		<?php
			if(isset($_SESSION['ERR_MSG'])){
				echo $_SESSION['ERR_MSG'];
				unset($_SESSION['ERR_MSG']);
			}
		?>
		<div class="content-container">
				<div class="left-column">
				  <img src="<?php echo get_stylesheet_directory_uri();?>/images/logos.jpg" alt="Quinnipiac Bobcats vs Clarkson Golden Knights">
				  <h2>Quinnipiac Hockey Event</h2>
				  <h3>Clarkson University vs Quinnipiac University</h3>
				  <div class="event-details">
					<p><strong>Date & Time:</strong> Sat, Feb 8, 2025 &bull; 7:00 PM</p>
					<p><strong>Location:</strong> M&T Bank Arena &bull; Hamden, CT</p>
				  </div>
				  <hr>
				  <!-- <div class="section-title">Pre-game Reception</div>
				  <div class="event-details">
					<p><strong>Included with Ticket</strong></p>
					<p><strong>Time:</strong> 5:00PM</p>
					<p><strong>Location:</strong>Sidestreet Bar & Grille</p>
					<p><strong>Address:</strong> 15 Dickerman St, Hamden, CT 06518</p>
				  </div> -->
				</div>
				<div class="right-column">
				  <div class="section-title">Your Information</div>
				  <label for="user_name">Name:</label>
				  <input type="text" name="user_name" id="user_name" placeholder="Your Full Name" required>

				  <label for="user_email">Email:</label>
				  <input type="email" name="user_email" id="user_email" placeholder="Your Email Address" required>

				  <label for="user_phone">Phone Number:</label>
				  <input type="tel" name="user_phone" id="user_phone" placeholder="Your Phone Number" required>

				  <div class="section-title">Ticket Selection</div>
				  <label for="adult-tickets">Adult Ticket ($50):</label>
				  <select id="adult-tickets" name="adult-tickets" class="tickets">
					<option value="0">0</option>
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
					<option value="6">6</option>
					<option value="7">7</option>
					<option value="8">8</option>
				  </select>

				  <label for="kids-tickets">Kids Ticket (Under 13) ($20):</label>
				  <select id="kids-tickets" name="kids-tickets" class="tickets">
					<option value="0">0</option>
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
					<option value="6">6</option>
					<option value="7">7</option>
					<option value="8">8</option>
				  </select>
				  <div class="total-section">
					<p id="total-adult">Total Adult Tickets: $0</p>
					<p id="total-kids">Total Kids Tickets: $0</p>
					<p id="total-amount">Total Amount: $0</p>
				  </div>
				  <input type="submit" name="hockey-btn" id="hockey-btn" value="Checkout"/>
				</div>
		</div>
		<input type="hidden" name="action" value="mk_str_hockey_event"/>
	</form>
</div>
<script type="text/javascript">
	var $ = jQuery;
	$('.tickets').on('change',function(){
		let adultTickets = $('#adult-tickets').val();
		let kidsTickets = $('#kids-tickets').val();
		let adultTotal = adultTickets * 50;
		let kidsTotal = kidsTickets * 20;
		let totalAmount = adultTotal + kidsTotal;
		$('#total-adult').html('Total Adult Tickets: $'+adultTotal);
		$('#total-kids').html('Total Kids Tickets: $'+kidsTotal);
		$('#total-amount').html('Total Amount: $'+totalAmount);
	});
	const regFrm = document.querySelector("#zhockey_event");
    regFrm.addEventListener("submit", handleRegSubmit);
    async function handleRegSubmit(e){
    	e.preventDefault();
    	let adultTickets = $('#adult-tickets').val();
		let kidsTickets = $('#kids-tickets').val();
		let adultTotal = adultTickets * 50;
		let kidsTotal = kidsTickets * 20;
		let totalAmount = adultTotal + kidsTotal;
		if(totalAmount == 0){
			alert('Select either Adult or kids Tickets');
		}
		else{
			regFrm.submit();
		}
	}
</script>