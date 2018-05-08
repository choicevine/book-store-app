
	<?php 
			include "./include/dashboard_header.php";


			include "./include/db.php";

			include "./include/functions.php";


				$error = array();

				$flag = ["top"]

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
		<h1 id="register-label">Add Product</h1>
		<hr>
		<form id="register"  action ="add_product.php" method ="POST" enctype="multiparh/form-data">
			<div>
				<?php ?>
				<label>Book Title:</label>
				<input type="text" name="title" placeholder="book title">
			</div>
			<div>
				<label>Author:</label>	
				<input type="text" name="lname" placeholder="last name">
			</div>

			<div>
				<label>Price:</label>
				<input type="text" name="email" placeholder="email">
			</div>

			<div>
				
				$errr = displayErrors($error, 'date');

				echo $err;
			</div>
			<div>
				<label>publication date:</label>
				<input type="password" name="password" placeholder="password">
			</div>
			<label>flag:</label>
				<input type="password" 
				<select name="flag">
					<option value=""></option>
					<?php foreach ($flag as :fl) {?>

						<option value="<?php echo $fl; <?php ?>"<?php echo $fl?>></option>

			</div>

			<label>category_id:</label>
				<input type="password" name="password" placeholder="password">
			</div>
			<div>
				
				<label>category id:</label>

				echo $err;
			</div>
 
			<div>
				<label>image:</label>	
				<input type="file" name="pics">
			</div>
		<input type="submit" name="save" value="submit">
	</form>
			</div>

			<input type="submit" name="register" value="register">
		</form>

		<h4 class="jumpto">Have an account? <a href="login.php">login</a></h4>
	</div>


	<?php

			include "include/footer.php"

	?>

