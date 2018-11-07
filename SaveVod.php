<?php
require_once("dbconfirm.php");

//vod 정보를 받아와 db에 저장하는 과정
$id = $_POST['id'];
$title = $_POST['title'];
$thumbnailUrl = $_POST['thumbnailUrl'];
$vodUrl = $_POST['vodUrl'];

$sql = "insert into vod(id,title,thumbnailUrl,vodUrl) values ('$id','$title','$thumbnailUrl','$vodUrl')";

$result = mysqli_query($db,$sql);

mysqli_close($db);
 ?>
