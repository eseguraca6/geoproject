<?php
$servername = "localhost";
$username = "root";
$password = "sylmar123";
$db = "geocities";

$con = new mysqli($servername, $username, $password, $db);
if($con->connect_error)
{
	die("connection failed:" .$con->connect_error);
}
mysqli_select_db($con, $db);

/**
$my_sql = "CREATE TABLE locations (
id int(11) NOT NULL AUTO_INCREMENT,
country varchar(25) NOT NULL,
city varchar(40) NOT NULL, 
latitude double(10,7) NOT NULL,
longitude float(10,7) NOT NULL, 
altitude float(5,1) NOT NULL,
PRIMARY KEY (id) 
) ENGINE=MyISAM";

if($con->query($my_sql)){
	echo "tables created succesfully!";
}else{
	echo "error creating table: " . $con->error;
}
**/

$w_data = "World_Cities_Location_table.csv"; 

$q_data = "LOAD DATA LOCAL INFILE 
'$w_data'" .
" INTO TABLE locations FIELDS TERMINATED BY ';' ";

$e_query = $con->query($q_data);

if($e_query == true){
	echo"it worked!"; 
} else {
	die("query not done!" . $con->error);
}
$con->close(); 
?>
