<?php 
	session_start();
	include_once("tools.php");
?>
<!DOCTYPE html>
<html>
	<?php
		include('common/head.php');
	?>
	<script src='js/tools.js'></script>
	
	<body>
		<?php
			include('common/header-nav.php');
		?>
		<main>
			<section>
				<div>
					<h1>Fill out the form below to make a booking enquiry.</h1>
					<form method='post' action="/~e54061/wp/processing.php" target='_blank'>
						<fieldset>
							<legend>Personal Details</legend>
							<p>
								<label>
									First Name:
								</label>
								<input type='text' name='firstname' placeholder="John" required />
							</p>
							
							<p>
								<label>
									Last Name:
								</label>
								<input type='text' name='lastname' placeholder="Smith" required />
							</p>
							
							<p>
								<label>
									Email-Address:
								</label>
								<input type='email' name='email' placeholder="example@example.com" required />
							</p>
							
							<p>
								<label>
									Phone Number:
								</label>
								<input type='number' name='phonenumber' placeholder="01 2345 6789" pattern="[0-9+\ ]{1,14}" required />
							</p>
						</fieldset>
						<fieldset>
							<legend>Event Details</legend>
							<p>
								<label>
									Event Date:
								</label>
								<input type='date' name='eventdate' required />
							</p>
							
							<p>
								<label>
									Date Flexibility: <span id="flexibility">flexible</span>
								</label>
								<input type="range" id="flexibilityInput" onchange="updateFlexibility()" min="0" max="2" required>
							</p>
							
							<p>
								<label>
									Event Time:
								</label>
								<input type='time' name='eventtime' required />
							</p>
							
							<p>
								<label>
									Event Location:
								</label>
								<input type='text' name='eventlocation'  placeholder="Address, City" required />
							<p>
								
							<p>
								<label>
									Event Description:
								</label>
								<textarea name='text' name='eventdescription' cols="60" rows="5" placeholder="Enter Event Description here" required></textarea>
							</p>
							
							<p>
								<label>
									Performance Required:
								</label>
								<select name='performance' required>
								<option value='none' selected>- None -</option>
								<option value='mc'>MC</option>
								<option value='comedyspot'>Comedy Spot</option>
								<option value='fullshow'>Full Show</option>
								<option value='other'>Other</Other>
							</select></p>
						</fieldset>
						<input type="submit" value="Send" class="button">
					</form>
				</div>
			</section>
		</main>
	</body>
	
	<?php
		include('common/footer.php');
	?>
</html>