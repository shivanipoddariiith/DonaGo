<?php 
// DB connection info 
//TODO: Update the values for $host, $user, $pwd, and $db 
//using the values you retrieved earlier from the portal. 
$host = "eu-cdbr-azure-west-b.cloudapp.net"; 
$user = "b2e2f2884e76c1"; 
$pwd = "f4295963"; 
$db = "donagoAFQaflIUUO"; 
// Connect to database. 
try 
{ 
	$conn = new PDO( "mysql:host=$host;dbname=$db", $user, $pwd); 
	$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION ); 
} 
catch(Exception $e){ die(var_dump($e)); } 
// Insert registration info 
if(!empty($_POST)) 
{ try 
	{ 
		$phone = $_POST['normal-field1']; 
		$name = $_POST['normal-field2']; 
		$pass = $_POST['password-field']; 
		$loca = $_POST['with-placeholder']; 
		$email = $_POST['with-tooltip']; 
		// Insert data 
		$sql_insert = "INSERT INTO user (phone_no, name, pass, location, email) VALUES (?,?,?,?,?)"; 
		$stmt = $conn->prepare($sql_insert); $stmt->bindValue(1, $phone); 
		$stmt->bindValue(2, $name); 
		$stmt->bindValue(3, $pass); 
		$stmt->bindValue(3, $loca); 
		$stmt->bindValue(3, $email); 
		$stmt->execute(); 
	} 
	catch(Exception $e) 
	{ 
		die(var_dump($e)); 
	} 
	echo "<h3>Your're registered!</h3>"; } 
?>