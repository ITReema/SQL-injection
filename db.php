<?php
// Test SQL Injection
$connect = mysqli_connect('localhost','admin','','db_users') or die('MySQL not connected');
//uncomment to fix SQL injection
//$username = mysqli_real_escape_string($connect, $_POST['username']);
//$password = mysqli_real_escape_string($connect, $_POST['password']);
$query = "select * from users where username =  '$_POST[username]' AND password = '$_POST[password]'";
$result = mysqli_query($connect , $query) ;
if ($result AND mysqli_num_rows($result) != 0) {
	while($row = mysqli_fetch_assoc($result)) {
		print_r($row);
		echo '<br>' ;
	}
}
else if (!$result) {
	echo 'Error in query' . mysql_error();
}
else if (mysqli_num_rows($result) == 0)  {
	echo 'Not match';
}
?>