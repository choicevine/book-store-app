<?php
//establishing a connection
// defin('HOST', "localhost")
							
							define ('DBNAME', "pdo1");
							define('USERNAME', "root");
							define('PASSWORD', "philip");

		try {
			$conn = new PDO("mysql:host=localhost; dbname=" .DBNAME, USERNAME, PASSWORD);
	
		}	catch(PDOExecption $e)
	{
			
				echo $e->getMessage();
			}

			
	


?>
