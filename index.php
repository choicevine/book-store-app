<?php

		include "./include/db.php";
		include "./include/functions.php";
		/*
<?php   
		include 'include/db.php';

		// Querrying the database

			function show($conn){

				$name = "doe";
				$conn->prepare("Select * from user where username = :n");
			
		 // BINDING PARAMETER

				$conn->bindparam(":name, $name");
					if ($conn->execute()){
								$conn->fetchAll();

								
		}
	}

		?>

		this is to define the maximum size of the pictures being uploaded
		*/
		define("MAX_FILES_SIZE", 2097152);

		$ext = ["image/png", "image/jpeg", "image/jpg"];

		if(array_key_exists("save", $_POST)) {

			//print_r($_FILES);

			$error = [];

			if (empty($_FILES['pics']['name'])) {

				$error[] = "Please select an image";
			}

			if ($_FILES['pics']['size'] > MAX_FILES_SIZE) {

				$error[] = "file too large. Maximum".MAX_FILES_SIZE;
			}

			if(!in_array($_FILES['pics']['type'], $ext)) {

				$error[] = "file format not supported";
			}

			if (empty($error)) {

				$info = uploadfiles($_FILES, 'pics', 'uploads/');

				if ($info[0]) {

					echo "file upload successful";
				}

			} else{

				foreach ($error as $err) {
					echo $err.'<br>';
				}
			}
			
		}

?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<form action="index.php" method="POST" enctype="multipart/form-data">
		
		<p>Please upload a file</p>

		<input type="file" name="pics">
		<input type="submit" name="save" value="submit">
	</form>

</body>
</html>