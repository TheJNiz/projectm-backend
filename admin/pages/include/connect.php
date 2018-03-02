	<?php
            $dsn = 'mysql:host=localhost;dbname=projectm;port=3306';
            $username = 'root';
            $password = '';
	try{
		$link= new PDO($dsn,$username,$password);
		$link->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		
	}catch(PDOException $e){
		echo $e->getMessage();
		die();
	}
	
	
	?>
	
	
	
	
	
	