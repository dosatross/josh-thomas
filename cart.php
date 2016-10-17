<?php 
	session_start();
	include_once('tools.php');
	if (isset($_POST))
	{
		if (isValidCart($_POST['plm']) == true)
		{
			foreach($_POST['plm'] as $key => $value)
			{
				$_SESSION['cart']['plm'][$key] = $value;
				header('Location: checkout.php');
			}
		}
	}
?>
<!DOCTYPE html>
<html lang="en-us">
	<?php
	
		include_once('common/head.php');
	?>
	<body onload="updateCart()">
	<?php
		include('common/header-nav.php');
	?>
	<script src="js/remove-item.js"></script>
		<main>
			<div class="sections-wrapper">
				<section>
					<div>
						<h1>Cart</h1>
						<div class="transparent-div">
							<form method="post">
								<table>
									<tr>
										<th>Product</th>
										<th>Unit Price</th>
										<th>Quantity</th>
										<th>Subtotal</th>
										<th>Remove</th>
									</tr>
									<tr>
										<td>Please Like Me DVD -Season 1</td>
										<td>$17.00</td>
								        <td>
								        	<input class="quantity" id="s1qty-cart" type='number' name='plm[s1]' onchange="updateCart()" value = "<?php echo $_SESSION['cart']['plm']['s1']; ?>" min='0' max='5' />
								        </td>
								        <td><span id="s1sub-cart">$0.00</span></td>
								        <td><button class="button" type="button" onclick="removeSeasonFromCart(1)">Remove all</button></td>						
									</tr>
									<tr>
										<td>Please Like Me DVD -Season 2</td>
										<td>$22.00</td>
										<td>
								        	<input class="quantity" id="s2qty-cart" type='number' name='plm[s2]' onchange="updateCart()" value = "<?php echo $_SESSION['cart']['plm']['s2']; ?>" min='0' max='5' />
										</td>
								        <td><span id="s2sub-cart">$0.00</span></td>
								        <td><button class="button" type="button" onclick="removeSeasonFromCart(2)">Remove all</button></td>
									</tr>
									<tr>
										<td>Please Like Me DVD -Season 3</td>
										<td>$26.75</td>
										<td>
								        	<input class="quantity" id="s3qty-cart" type='number' name='plm[s3]' onchange="updateCart()" value = "<?php echo $_SESSION['cart']['plm']['s3']; ?>" min='0' max='5' />
										</td>
								        <td><span id="s3sub-cart">$0.00</span></td>
								        <td><button class="button" type="button" onclick="removeSeasonFromCart(3)">Remove all</button></td>
									</tr>
									<tr>
										<td></td>
										<td></td>
										<td><strong>Total</strong></td>
										<td><span id="cartTotal">$0.00</span></td>
										
									</tr>
								</table>
								<input class="button" type="submit" value="Checkout"/>
							</form>
						</div>
					</div>
				</section>
			</div>
		</main>
		<?php
			include('common/footer.php');
		?>
	</body>
</html>