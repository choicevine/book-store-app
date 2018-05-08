<?php

		session_start();


		include "./include/dashboard_header.php";

		include "./include/db.php";

		include "./include/functions.php";

			checklogin();

		$error = [];

				if(isset($_GET['cat_id'])){
					$catId = $_GET['cat_id'];

				}

				$data = getCategoryById($dbconn, $catId);


			if(array_key_exists("edit", $_POST)){

				if(empty($_POST)){
					$erro['cat_name'] = "please Enter a category name";
				}

				if(empty(error)){
					$clean = array_map("trim", $_POST);
					

					$
				}

			}
?>


	<div class="wrapper">
		<div id="stream">

				<form id="register"  action ="edit_category.php" method ="POST">
			<div>
				<?php 

					$info = displayErrors($errors, 'cat_name');

					 echo $info;
				 ?>


				<label>Edit Category:</label>


				<input type="text" name="cat_name" value="<?php echo $data[1] ?>">
			</div>
			
			<input type="submit" name="edit" value="edit">
		</form>
		

		</div>

	</div>

	<?php

		include "./include/footer.php"
	?>
