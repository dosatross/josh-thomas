<?php 
	session_start();
	include_once("tools.php");
	foreach($_POST['plm'] as $key => $value)
	{
		if(isValidCart() == true)
		{
			$_SESSION['cart']['plm'][$key] += $value;
			header('Location: cart.php');
		}
	}
?>
<!DOCTYPE html>
<html>
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
						<h1>Please Like Me - DVD</h1>
						
						<div>
							<h1>Season 3</h1>
							<img class="image feature-image" src="assets\s3.jpg" alt="Season 3">
							<p>Kicking off with a half-hour romcom and ending with an unforgettable family Christmas lunch, this season is filled with food, sex, drugs, dancing, singing, secrets and a transgender chicken.</p>
							<details>
								<summary>See more..</summary><br>
								<p>
									In this hilarious third season, Thomas is enchanting as always as he reprises his role of an unconventionally astute twenty-something whose blasé yet sensitive attitude to -coming out' will have you hooked from the very beginning. After coming to terms with his homosexuality whilst also supporting his bipolar mother Rose (Debra Lawrance, Home and Away, Blue Heelers) post her attempted suicide, Josh cleverly navigates this heavy content in a way that can be described as no less than authentically human.
									The season starts with Josh desperately trying to court his love-interest Arnold with elaborate dates, nearly inedible vegetarian meals and grand romantic gestures. Despite this relentless attempt however, he still can't seem to win him over. Meanwhile, Arnold is preoccupied formulating a -coming-out' strategy for his charmingly wealthy parents, which does not go entirely as planned. This along with life threatening surgery, infidelities and an unforgettable family Christmas lunch are all the reasons you need to indulge in this endearingly delightful instalment of Please Like Me. Join Thomas as he navigates through a cacophony of life's most fabulous exploits and creature comforts; food, sex, drugs, dancing, singing, secrets and a transgender chicken with his trademark obscure hilarity.
									With special guest appearances from Geoff Morrell (Ned Kelly, Rogue), Emily Barclay (Glitch, Suburban Mayhem) and Gina Riley (Kath & Kim, Open Slather), Please Like Me: Season 3 will take you on an emotional journey like no other.
								</p>
							</details>
							<p>Item price: $26.75</p>
							<form method='post' action="https://titan.csit.rmit.edu.au/~e54061/wp/processing.php" target='_blank'>
								<p>Quantity: <input class="quantity" id ="s3qty-itemcard" type='number' name='plm[s3]' onchange="updateShopFromItemCards()" value = '0' min='1' max='5'/></p>
							</form>
							<p>Subtotal: <span id="s3sub-itemcard">$0.00</span></p>
						</div>
						
						<div>
							<h1>Season 2</h1>
							<img class="image feature-image" src="assets\s2.jpg" alt="Season 2">
							<p>Josh and Tom have a new housemate named Patrick in the second season of the Australian comedy</p>
							<details>
								<summary>See more..</summary><br>
								<p>
									The second season of Please Like Me jumps a few years ahead of where the show last left off, but Josh hasn’t changed much. Sure, he has a new baby stepsister and a hot new roommate that he’s secretly in love with, but the only notable sign of maturity is that he’s finally started flossing. Josh still says the wrong thing at the wrong time. He still makes wildly inappropriate jokes at parties. He’ll spend a whole episode neglecting his friends’ problems while trying to get them to affirm that he’s a nice person. His parents are wondering if he’ll ever get a job.
								</p>
							</details>
							<p>Item price: $22.00</p>
							<form method='post' action="https://titan.csit.rmit.edu.au/~e54061/wp/processing.php" target='_blank'>
								<p>Quantity: <input class="quantity" id ="s2qty-itemcard" type='number' name='plm[s2]' onchange="updateShopFromItemCards()" value = '0' min='1' max='5' /></p>
							</form>
							<p>Subtotal: <span id="s2sub-itemcard">$0.00</span></p>
						</div>
						
						<div>
							<h1>Season 1</h1>
							<img class="image feature-image" src="assets\s1.jpg" alt="Season 1">
							<p>
								Josh’s life is turned upside down when he’s dumped by his girlfriend, finds a weird new boyfriend and has to move back in with his mother after she overdoses on painkillers. </p>
							<details>
								<summary>See more..</summary><br>
								<p>
									The first season sent Josh a fit, affectionate boyfriend named Geoffrey (Wade Briggs) to help him address his sexuality, like a sexy angel on a mission. Over those six episodes, Josh and Geoffrey try to get together and then split up three different times. As Geoffrey says, Josh only likes him when he’s lonely. In season two, the roles reverse, but with the permabuzzing Patrick instead of Geoffrey. When either Patrick or Josh brings another date back to their apartment, it’s Patrick and Josh trading subtext. But when they get together, it’s only out of convenience for Patrick. And then there’s Arnold, a patient at the same psychiatric hospital as Josh’s mum. Where Josh and Geoffrey were always crystal clear about their relationship, Josh’s romances in season two live in the tension between singlehood and a relationship. Even Geoffrey’s return thrives on the question of what Josh and Geoffrey are to each other now.
								</p>
							</details>
							<p>Item price: $17.00</p>
							<form method='post' action="https://titan.csit.rmit.edu.au/~e54061/wp/processing.php" target='_blank'>
								<p>Quantity: <input class="quantity" id ="s1qty-itemcard" type='number' name='plm[s1]' onchange="updateShopFromItemCards()" value = '0' min='1' max='5' /></p>
							</form>
							<p>Subtotal: <span id="s1sub-itemcard">$0.00</span></p>
						</div>
						
						<div>
							<form method="post">
								<table>
									<tr>
										<th>Season</th>
										<th>Unit Price</th>
										<th>Quantity</th>
										<th>Subtotal</th>
									</tr>
									<tr>
										<td>1</td>
										<td>$17.00</td>
								        <td><input class="quantity" id="s1qty-summary" name='plm[s1]' type='number' onchange="updateShopFromSummary()" value = '0' min='0' max='5'/></td>
								        <td><span id="s1sub-summary">$0.00</span></td>
									</tr>
									<tr>
										<td>2</td>
										<td>$22.00</td>
										<td><input class="quantity" id="s2qty-summary" name='plm[s2]' type='number' onchange="updateShopFromSummary()" value = '0' min='0' max='5'/></td>
								        <td><span id="s2sub-summary">$0.00</span></td>
									</tr>
									<tr>
										<td>3</td>
										<td>$26.75</td>
										<td><input class="quantity" id="s3qty-summary" name='plm[s3]' type='number' onchange="updateShopFromSummary()" value = '0' min='0' max='5'/></td>
								        <td><span id="s3sub-summary">$0.00</span></td>
									</tr>
									<tr>
										<td></td>
										<td></td>
										<td><strong>Total</strong></td>
										<td><span id="shopTotal">$0.00</span></td>
										
									</tr>
								</table>
								<input class="button" name="addToCart" type="submit" value="Add To Cart"></input>
							</form>
						</div>
						<div class='transparent-div row-div'>
							<a href= 'https://play.google.com/store/tv/show/Please_Like_Me?id=RtnabrwLBEs'><img src='assets/google-play.png' height= '50'></a>
							<a href= 'https://itunes.apple.com/us/tv-season/please-like-me-season-3/id1041583976'><img src='assets/itunes.svg' height= '50'></a>
						</div>
					</div>
				</section>
			</div>
		</main>
	</body>
	<?php
		include('common/footer.php');
	?>
</html>