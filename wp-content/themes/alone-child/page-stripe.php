<?php
if(isset($_POST['amount']) && !empty($_POST['amount'])){

	$title = 'Donate';
	$description = 'michaelwilliamsscholarship';
	$type = 1;

	$stripe = new \Stripe\StripeClient(STRIPE_SECRET_KEY);
   try {
   	$amount = $_POST['amount'];
   	$amount_actual = $amount;
	 	$amount = $amount * 100;
		$zemail = $_POST['zemail'];
		$frequency = isset($_POST['frequency']) ? $_POST['frequency'] : 'one-time';
		$is_monthly = ($frequency === 'monthly');

		$price_data = array(
			'currency' => 'usd',
			'unit_amount' => $amount,
			'product_data' => array('name' => $is_monthly ? 'Monthly Donation' : $title, 'description' => $description),
		);

		if ($is_monthly) {
			$price_data['recurring'] = array('interval' => 'month');
		}

		$session = $stripe->checkout->sessions->create([
		  'success_url' => site_url('success').'?session_id={CHECKOUT_SESSION_ID}',
		  'cancel_url' => site_url('donate'),
		  'customer_email' => $zemail,
		  'payment_method_types' => ['card'],
		  'line_items' => [
				[
					'price_data' => $price_data,
					'quantity' => 1,
				],
		  ],
		  'mode' => $is_monthly ? 'subscription' : 'payment',
		]);

		$_SESSION['zcheckout_id'] = $session->id;
		$_SESSION['ztype'] = $type;
		$_SESSION['zamount'] = $amount_actual;
		wp_redirect($session->url);
		exit;

   }
   catch (Exception $e) {
      echo $e->getMessage();
   }
}