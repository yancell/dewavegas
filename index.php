<?php
$ch = curl_init();
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_NOBODY, false);
curl_setopt($ch, CURLOPT_URL, "https://dwvgs.biz/loginUser");
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEJAR, "cookie.txt");
curl_setopt($ch, CURLOPT_COOKIEFILE, "cookie.txt");
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, "_token=OTbouH1x5Xw2Gt2ISp5er1wOlWuFvBbrzsbK3Ktv&username=DAHYANI&password=cikande1");

$ch2 = curl_init();
curl_setopt($ch2, CURLOPT_HEADER, false);
curl_setopt($ch2, CURLOPT_NOBODY, false);
curl_setopt($ch2, CURLOPT_URL, "https://dewafortune.xyz//auth/select_game_v2.php");
curl_setopt($ch2, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEJAR, "cookie.txt");
curl_setopt($ch2, CURLOPT_COOKIEFILE, "cookie.txt");
curl_setopt($ch2, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch2, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch2, CURLOPT_RETURNTRANSFER, 1);
//curl_setopt($ch2, CURLOPT_CUSTOMREQUEST, "POST");
//curl_setopt($ch2, CURLOPT_POST, 1);
//curl_setopt($ch2, CURLOPT_POSTFIELDS, "res=d1d813a48d99f0e102f7d0a1b9068001&resres=d1d813a48d99f0e102f7d0a1b9068001");

$mh = curl_multi_init();
curl_multi_add_handle($mh, $ch);
curl_multi_add_handle($mh, $ch2);
$running = NULL;
do {
  usleep(10000);
  curl_multi_exec($mh, $running);
} while($running > 0);
$a = curl_multi_getcontent($ch);
$b = curl_multi_getcontent($ch2);
curl_multi_remove_handle($mh, $ch);
curl_multi_remove_handle($mh, $ch2);
curl_multi_close($mh);
echo $a;
echo $b;
