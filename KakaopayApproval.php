<?php
error_reporting(E_ALL);
ini_set("display_errors",1);

  $pgToken = $_POST['pg_token'];
  $tid = $_POST['tid'];

  $url = 'https://kapi.kakao.com/v1/payment/approve';
  $header = array("Authorization: KakaoAK f5d8da6948d113b0c0266f97fe9824c8");
  $data = array(
    "cid" => "TC0ONETIME",
    "partner_order_id" => "partner_order_id",
    "partner_user_id" => "partner_user_id",
    "pg_token" => "$pgToken",
    "tid" => "$tid"
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
      // echo $result;




 ?>

 <html>
 <head>
 <meta charset="utf-8" />
 <script>
 document.write("결제가 정상적으로 완료되었습니다!");
 </script>
 </head>
 <body>
   <!-- <div>
     <button type="button" style="font-weight: 700; margin-right: 20px;" onclick="ok.performClick ();">확인</button>
</div> -->
 </body>
 </html>
