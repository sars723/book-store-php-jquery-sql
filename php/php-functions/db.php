<?php
function Createdb(){
    $servername="localhost";
    $username="root";
    $password="";
    $dbname="bookstore";

//create connection
$con=mysqli_connect($servername,$username,$password);

//check connection
if(!$con){
    die("Connection Failed:" .mysqli_connect_error());
}

//create Database
$sql="CREATE DATABASE IF NOT EXISTS $dbname";

if(mysqli_query($con,$sql)){
   $con= mysqli_connect($servername,$username,$password,$dbname);
    //echo "database created";
    $sql="
    CREATE TABLE IF NOT EXISTS books(
    id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    book_name varchar(25) NOT NULL,
    book_publisher varchar(20) ,
    book_price float
    );
    ";
if(mysqli_query($con,$sql)){
//echo "table created";
return $con;
}else{
echo "table not created";
}
}else{
echo "Error while creating database".mysqli_connect_error();
}


}


?>