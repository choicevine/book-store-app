<?php

	function uploadFiles($files, $name, $loc){
		$result = [];
 
		$rnd = rand(0000000000, 9999999999);
		$strip_name = str_replace(' ', '_', $files[$name]['name']);

		$filename = $rnd.$strip_name;
		$destination = $loc.$filename;

		if(move_uploaded_file($files[$name]['tmp_name'], $destination)){
			$result[] = true;
		}else{
			$result[] = false;
		}

		return $result;
	}

	function displayErrors($err, $key){
		$result = "";

		if(isset($err[$key])){
			$result = '<span class="err">'.$err[$key].'</span>';
		}
		return $result;
	}

	function adminRegister($dbconn, $input){
	//	$result = [];
		$hash = password_hash($input['password'], PASSWORD_BCRYPT);

		$stmt = $dbconn->prepare("INSERT INTO admin(first_name, last_name, email, hash) 
									VALUES(:f, :l, :e, :h)");

		$data = [

					":f" => $input['fname'],
					 ":l" => $input['lname'],
					 ":e" => $input['email'],
					 ":h" => $hash  
				];

				$stmt->execute($data);
	}

	function doesEmailExists($dbconn, $email){
		$result = false;
		$stmt = $dbconn->prepare("SELECT email FROM admin WHERE email=:e");

		$stmt->bindParam(":e", $email);
		$stmt->execute();

		$count = $stmt->rowCount();

		if($count > 0){
			$result = true;
		}

		return $result;
	}

	function adminLogin($dbconn, $input){
		$result = [];
		$stmt = $dbconn->prepare("SELECT * FROM admin WHERE email=:e" );

		$stmt->bindParam(":e", $input['email']);
		$stmt->execute();

		$count = $stmt->rowCount();
		$row = $stmt->fetch(PDO::FETCH_ASSOC);

		//print_r($count); exit();

		if($count !== 1 || !password_verify($input['password'], $row['hash'])){
			$result[] = false;
		}else{
			//$result[] = true;
			$result[] = $row;
		}
		return $result;
	}

	function redirect($loc, $msg){
		header("Location: ".$loc.$msg);
	}

	function addCategory($dbconn, $input){
		$stmt = $dbconn->prepare("INSERT INTO category(category_name) VALUES(:catName)");
		$stmt->bindParam(":catName", $input['cat_name']);

		$stmt->execute();


	}
	
	function checkLogin(){
		if(!isset($_SESSION["aid"])){
			redirect("login.php", "");
		}
	}

	function viewCategory($dbconn){
		$result = [];

		$stmt = $dbconn->prepare("SELECT * FROM category");
		$stmt->execute();

		while($row = $stmt->fetch(PDO::FETCH_BOTH)){
			$result .= '<tr><th>'.$row[0].'</th>';
			$result .= '<th>'.$row[1].'</th>';
			$result .= '<th><a href="edit_category.php?cat_id='.$row[0].'">edit</a></th>';
			$result .= '<th><a href="delect_category.php?cat_id='.$row[0]. '">delete</a></th></tr>';
		}
		return $result;
	}

	function getCategoryById($dbconn, $catId){

		$stmt = $dbconn->prepare("SELECT * FROM category WHERE category_id=:catId");

		$stmt->bindParam(":catId", $catId);

		$stmt->execute();

		$row = $stmt->fetch(PDO::FETCH_BOTH);

		return $row;
	}

	function editCategory($dbconn, $input){

		$stmt = $dbconn->prepare("UPDATE category SET category_name WHERE category_id=:catId");

		$stmt->bindParam(":catId", $input['cat_id']);

		$stmt->bindParam(":cat_name", $input['cat_name']);

		$stmt->execute();

		$count = $stmt->rowCount();

		redirect("view_category.php", "");
	}

?>