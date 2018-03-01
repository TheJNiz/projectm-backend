<?php
// get the HTTP method, path and body of the request
$method = $_SERVER['REQUEST_METHOD'];
$input = json_decode(file_get_contents('php://input'),true);
 
 
// escape the columns and values from the input object
$columns = preg_replace('/[^a-z0-9_]+/i','',array_keys($input));

 include '/../QueryScript/InsertAnsuran.php';

switch ($method) {
  case 'POST':
    $returnmsg = InsertAnsuran($input); 
	break;

}
 
 $array = $columns;

if ($method == 'POST') {
	echo json_encode($returnmsg);
} else {
  //echo mysqli_affected_rows($link);
}
 
// close mysql connection
//mysqli_close($link);