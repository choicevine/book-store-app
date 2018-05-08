
	<?php 
			include "./include/header.php";


			include "./include/db.php";

				$error = array();

				if(array_key_exists("register", $_POST)){

					if (empty($_POST['fname'])){
					$error[] = "enter your firstname";
					}
				 
					if (empty($_POST['lname'])){

						$error[] = "enter lastname please";
					}

					if (empty($_POST['email'])){

						$error[] = "enter email address";
					}

					if(doesEmailExists($conn, $_POST['email'])){
						$error['email'] = "email Alrerady exists";

					}

					if (empty($_POST['password'])){

						$error[] = "enter password";

					}

					if(empty($_POST['pword'])){

						$error[] = "renter Password*confirm password";
					}

					if(empty($error)) {

					}
				
			}
	?>
	<div class="wrapper">
		<h1 id="register-label">Register</h1>
		<hr>
		<form id="register"  action ="register.php" method ="POST">
			<div>
				<label>first name:</label>
				<input type="text" name="fname" placeholder="first name">
			</div>
			<div>
				<label>last name:</label>	
				<input type="text" name="lname" placeholder="last name">
			</div>

			<div>
				<label>email:</label>
				<input type="text" name="email" placeholder="email">
			</div>
			<div>
				<label>password:</label>
				<input type="password" name="password" placeholder="password">
			</div>
 
			<div>
				<label>confirm password:</label>	
				<input type="password" name="pword" placeholder="password">
			</div>

			<input type="submit" name="register" value="register">
		</form>

		<h4 class="jumpto">Have an account? <a href="login.php">login</a></h4>
	</div>


	<?php

			include "include/footer.php"

	?>

