<?php


		session_start();


		include "./include/dashboard_header.php";

		include "./include/db.php";

		include "./include/functions.php";

			//checklogin();

		$error = [];

			if(array_key_exists("add", $_POST)){

				if(empty($_POST['email']) or empty($_POST['password'])){
					$erro['cat_name'] = "please Enter a category name";
					header("location:index.php");
				}

				if(empty(error)){
					$clean = array_map("trim", $_POST);
					addcategory($conn, $clean);

				}

			}
?>


	<div class="wrapper">
		<div id="stream">

				<form id="register"  action ="add_category.php" method ="POST">
			<div>
				<?php 
				if(!empty($errors)){
				$info = displayErrors($errors, 'cat_name'); echo $info; }?>
				<label>Add Category:</label>
				<input type="text" name="cat_name" placeholder="cat_name">
			</div>
			
			<input type="submit" name="add" value="Add">
		</form>
		

		</div>

	</div>

	<?php

		include "./include/footer.php"
	?>
