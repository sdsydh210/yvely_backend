<?php
error_reporting(E_ALL);
ini_set("display_errors",1);
//카카오 블로그 검색 준비 메소드
function KakaoBlogSearch ($question,$blogPage) {

  $header = array("Authorization: KakaoAK f5d8da6948d113b0c0266f97fe9824c8");
  $data = array(

    "size" => 30,
    "page" => $blogPage,
    "sort" => "recency",
    "query" => $question,

    );

    $url = 'https://dapi.kakao.com/v2/search/blog';
    $url = $url.'?'.http_build_query($data, '','&');

      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, $url);
      //curl_setopt($ch, CURLOPT_POST, true); //이 라인이 아예 없으면 기본적으로 GET으로 전송
      curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_BINARYTRANSFER, true);
      //curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data)); //GET으로 보내는 경우엔 이 라인이 필요 X
      $result = curl_exec($ch);
      if ($result === FALSE) {
          die('Curl failed: ' . curl_error($ch));
      }
      curl_close($ch);
      return $result;
}

//안드로이드에서 받아온 값을 array에 추가해주고 post값으로 카카오 블로그 검색 url로 넘겨준다.
$question = $_POST['question'];
$blogPage = $_POST['blogPage'];

//결과값을 안드로이드로 전송, 안드로이드에서 파싱 후 리스트뷰에 추가하면 끝
$ready = KakaoBlogSearch($question,$blogPage);
echo $ready;

 ?>
