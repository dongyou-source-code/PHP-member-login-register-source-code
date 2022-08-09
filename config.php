<?php
$host="localhost";
$user="root";
$pass="";
$db="test";
$conn=mysqli_connect($host,$user,$pass,$db);
if(!$conn){
    echo "連線失敗:" . mysqli_connect_error();
}
else{
    // echo "連線成功" ;

}
?>