<?php
require_once("dbconfirm.php");

//사용자 유저 id를 받아와서 별풍선 갯수를 조회
$user_id = $_POST['user_id'];
$sql = "select balloon_point from user where user_id='$user_id'";

$result = mysqli_query($db,$sql);

$data = array();

while($row = mysqli_fetch_array($result)){
  array_push($data,
  array('point' =>$row[0]));
}
//별풍선 갯수에 대한 정보를 유저에게 보여주기 위해 json으로 전달
$json = json_encode(array('result' =>$data));
echo $json;

mysqli_close($db);
 ?>
