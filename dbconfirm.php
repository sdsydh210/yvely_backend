<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

header('Content-Type:text/html; charset=utf-8');

$db = mysqli_connect("localhost","sdsydh210","ehdtjsdlz1","yvley");

if(!$db){
  echo "mysql 접속 에러 :";
  echo mysqli_connect_error();
  exit();
}else{
  // echo "성공";
}

mysqli_set_charset($db,"utf-8");

 ?>
