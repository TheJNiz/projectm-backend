<?php

function InsertAnsuran($data){
	include 'mysqlconnect.php';
	
	$sql = "INSERT INTO tblCustomer (ClientID,CustomerName,PhoneNumber, LoanAmount, LoanPeriod,LoanTypeID,DateCreated)VALUES (".$data['ClientID'].", '".$data['CustomerName']."','".$data['PhoneNumber']."',".$data['LoanAmount'].", ".$data['LoanPeriod'].",".$data['LoanTypeID'].",NOW())"; 
			
	if ($conn->query($sql) === TRUE) {
		return   array("Message" => "New record created successfully", "Data" => "","Success" => 0);
	} else {
		return  array("Message" => "Error: " . $sql . "<br>" . $conn->error, "Data" => "","Success" => -1);
	}
	
	return $data;
	
}
?>