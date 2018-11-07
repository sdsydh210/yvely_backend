<?php
error_reporting(E_ALL);
ini_set("display_errors",1);
//카카오페이 준비 메소드
function KakaoPayReady ($itemName, $quantity, $totalAmount) {

  $url = 'https://kapi.kakao.com/v1/payment/ready';
  $header = array("Authorization: KakaoAK f5d8da6948d113b0c0266f97fe9824c8");
  $data = array(
    "cid" => "TC0ONETIME",
    "partner_order_id" => "partner_order_id",
    "partner_user_id" => "partner_user_id",
    "item_name" => $itemName,
    "quantity" => $quantity,
    "total_amount" => $totalAmount,
    "tax_free_amount" => 0,
    "cancel_url" => "http://13.125.210.22/kakaopay/Cancel.php",
    "approval_url" => "http://13.125.210.22/kakaopay/KakaopayApproval.php",
    "fail_url" => "http://13.125.210.22/kakaopay/Fail.php"
    );

      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, $url);
      curl_setopt($ch, CURLOPT_POST, true);
      curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_BINARYTRANSFER, true);
      curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
      $result = curl_exec($ch);
      if ($result === FALSE) {
          die('Curl failed: ' . curl_error($ch));
      }
      curl_close($ch);
      return $result;
}


//안드로이드에서 받아온 값을 array에 추가해주고 post값으로 카카오페이에 넘겨준다.
$itemName = $_POST['itemName'];
$quantity = $_POST['quantity'];
$totalAmount = $_POST['totalAmount'];

require_once("dbconfirm.php");
$sql = "update user set balloon_point=balloon_point+'$quantity' where user_id='sdsydh210'";
$result = mysqli_query($db,$sql);
mysqli_close($db);

//결과값을 안드로이드로 전송, 웹뷰에 띄워주기 위한 준비
$ready = KakaoPayReady($itemName, $quantity, $totalAmount);
echo $ready;


 ?>
