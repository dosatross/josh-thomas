<?php 
	session_start();
	include_once("tools.php");
	if(isset($_POST['done']))
	{
		unsetCart();
		header('Location: index.php');
	}
?>
<!DOCTYPE html>
<html lang="en-us">
	<?php
		include('common/head.php');
	?>
	<body>
		<?php
			include('common/header-nav.php');
		?>
		<main>
			<div class="sections-wrapper">
				<section>
					<div>
						<h1>Order Confirmation</h1>
						<div class="transparent-div">
							<p>Here is a summary of your order. A receipt has also been sent to your email.</p>
						</div>
						<div class="invoice">
						    <table>
						        <tr class="head">
						            <td colspan="2">
						                <table>
						                    <tr>
						                        <td>
						                            Invoice #: <?php echo rand(1,10000); ?><br>
						                            <?php
						                            	echo date('d F Y');
						                            ?>
						                        </td>
						                    </tr>
						                </table>
						            </td>
						        </tr>
						        
						        <tr class="head">
						            <td colspan="2">
						                <table >
						                    <tr>
						                        <td>
						                            <?php
						                            	echo $_SESSION['customer']['firstname'] . " " . $_SESSION['customer']['lastname'];
						                            	echo "<br>\n";
						                            	echo $_SESSION['customer']['shippingaddress'];
						                            	echo "<br>\n";
						                            ?>
						                        </td>
						                        
						                        <td>
						                            Josh Thomas<br>
						                            erin@token.com.au
						                        </td>
						                    </tr>
						                </table>
						            </td>
						        </tr>
						        
						        <tr class="heading">
						            <td>
						                Payment Method
						            </td>
						            
						            <td>
						                Transaction #
						            </td>
						        </tr>
						        
						        <tr>
						            <td>
						                Credit Card
						            </td>
						            
						            <td>
						                <?php echo rand(1,10000); ?>
						            </td>
						        </tr>
						        
						        <tr class="heading">
						            <td>
						                Item
						            </td>
						            
						            <td>
						                Price
						            </td>
						        </tr>
						        
						        <?php
						        	printOrderTableRows();
						        ?>
						    </table>
						</div>
						<form method="post">
							<input class="button" type="submit" name="done" value="Done" ></input>
						</form>
						
					</div>
				</section>
			</div>
		</main>
		<?php
			include('common/footer.php');
		?>
	</body>
</html>