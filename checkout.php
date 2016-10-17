<?php
	session_start();
	include_once("tools.php");
	if (isset($_REQUEST['creditcard']) && isset($_REQUEST['expiryYear']) && isset($_REQUEST['expiryMonth']))
	{
		if(isValidOrder($_REQUEST['creditcard'],$_REQUEST['expiryYear'],$_REQUEST['expiryMonth']) == true)
		{
			//add customer details to session
			$_SESSION['customer']['firstname'] = $_POST['firstname'];
			$_SESSION['customer']['lastname'] = $_POST['lastname'];
			$_SESSION['customer']['shippingaddress'] = $_POST['shippingaddress'];
			$_SESSION['customer']['email'] = $_POST['email'];
			$_SESSION['customer']['phonenumber'] = $_POST['phonenumber'];
			$_SESSION['customer']['rememberMe'] = $_POST['rememberMe'];
			$_SESSION['customer']['deliverytype'] = $_POST['deliverytype'];

			$_SESSION['customer']['creditcard'] = $_POST['creditcard'];
			$_SESSION['customer']['expiryMonth'] = $_POST['expiryMonth'];
			$_SESSION['customer']['expiryYear'] = $_POST['expiryYear'];
			
			//write order details to file
			$fp = fopen('order.json', 'a');
			$order['customername'] = $_SESSION['customer']['firstname'] . " " . $_SESSION['customer']['lastname'];
			$order['shippingaddress'] = $_SESSION['customer']['shippingaddress'];
			$order['email'] = $_SESSION['customer']['email'];
			$order['deliverytype'] = $_SESSION['customer']['deliverytype'];
			$order['creditcard'] = $_SESSION['customer']['creditcard'];
			$order['items'] = $_SESSION['cart'];
			$order['total'] = getPlmTotal();
			fwrite($fp,json_encode($order) . ",\n");
			fclose($fp);
			

			header('Location: confirmation.php');
			
		}
	}
?>
<!DOCTYPE html>
<html lang="en-us">
	<?php
		include('common/head.php');
	?>
	<script src='js/tools.js'></script>
	<script src='js/creditcard-validation-message.js'></script>
	<script src='js/expiry-validation-message.js'></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

	<body>
		
		
		<?php
			include('common/header-nav.php');
		?>
		<main>
			<div class="sections-wrapper">
				<section>
					<div>
						<h1>Checkout</h1>
						<div>
							<h3>Order Summary</h3>
							<?php
								printOrder();
							?>
						</div>
						<div class="transparent-div" onload="printCustomerDetails()">
							<form name='checkoutForm' method='post'>
							<h3>Personal Details</h3>
							<p>
								<label>
									First Name:
								</label>
								<input type='text' id='firstname' name='firstname' onload="printCustomerDetails()" placeholder="John" pattern="[a-zA-Z\-\.' ]{1,50}" required />
							</p>
							
							<p>
								<label>
									Last Name:
								</label>
								<input type='text' id='lastname' name='lastname' onsubmit="handleCustomerDetails('lastname')" placeholder="Smith" pattern="[a-zA-Z\-\.' ]{1,50}" required />
							</p>
							
							<p>
								<label>
									Shipping Address:
								</label>
								<input type='text' id='shippingaddress' name='shippingaddress' onsubmit="handleCustomerDetails('shippingdetails')" placeholder="Address, City" required />
							<p>
							
							<p>
								<label>
									Email:
								</label>
								<input type='email' id='email' name='email' onsubmit="handleCustomerDetails('email')" placeholder="example@example.com" pattern="^[a-zA-Z0-9\-_\.]+@[a-zA-Z0-9]+\.[a-zA-Z]+$" required />
							</p>
							
							<p>
								<label>
									Phone Number:
								</label>
								<input type='number' id='phonenumber' name='phonenumber' onsubmit="handleCustomerDetails('phonenumber')" placeholder="01 2345 6789" pattern="[0-9+\ ]{1,14}" required />
							</p>
							 
							<p>
								<label>
									Credit Card: 
								</label>
								<input type='text' id="creditcard" name="creditcard" onkeyup="requestCreditCardValidationMessage()" required /> 
								<label id="expiryLabel">
									Expiry:
								</label>
								M:
								<input class="expiry" id='expiryMonth' name='expiryMonth' type='number' min='1' max='12' onkeyup='requestExpiryValidationMessage()' required />
								Y:

								<input class="expiry" id='expiryYear' name='expiryYear' min='0' type='number' onkeyup='requestExpiryValidationMessage()' required/> 
							
						
							</p>
						
							<p>
							<span id="creditcardmessage" ></span>
							<br>
							</p>
					
							
							
							<p>
								<label>
									Remember Me: 
								</label>
								<input type='checkbox' id='rememberMe' onchange="handleCustomerDetails('firstname')" name='rememberMe' value='on'/>
							</p>
							<p>
								<input type="radio" name="deliverytype" value="regulardelivery" checked>Regular delivery: free<br>
								<input type="radio" name="deliverytype" value="regularcourier">Regular Courier: $7.00<br>
								<input type="radio" name="deliverytype" value="expresscourier">Express Courier: $10.50
							</p>
					<div class="button3">
						<a href="cart.php"><input type="button" value="Back to Cart" class="button"></a>
						
						<input type="submit" value="Confirm & Buy" class="button">
					</div>
					</form>
						</div>
					</div>
				</section>
			</div>
		</main>
		<script>
			printCustomerDetails();
			document.getElementById("rememberMe").addEventListener("change", handleCustomerDetails);
			document.getElementsByName("checkoutForm")[0].addEventListener("submit", formValidate);
			document.getElementsByName("checkoutForm")[0].addEventListener("submit", handleCustomerDetails);
		</script>
		<?php
			include('common/footer.php');
		?>
	</body>
</html>