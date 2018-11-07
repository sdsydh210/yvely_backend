<?php
require_once("dbconfirm.php");

//vod 목록을 보여주기 위해 저장된 vod를 조회 후에
//json으로 vod 정보를 보내준다.
$sql = "select * from vod order by v_no desc";

$result = mysqli_query($db,$sql);

$data = array();

while($row = mysqli_fetch_array($result)){
  array_push($data,
  array('id' =>$row[1],
        'title' =>$row[2],
        'thumbnailUrl' =>$row[3],
        'vodUrl' =>$row[4]));
}
$json = json_encode(array('result' =>$data));
echo $json;

mysqli_close($db);
 ?>
