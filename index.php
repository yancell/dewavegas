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
curl_setopt($ch, CURLOPT_POSTFIELDS, "_token=ptOgvIUoj0pgLlQi7I66z62a4yDChYPcZVg8SS2V&username=DAHYANI&password=cikande1");

$mh = curl_multi_init();
curl_multi_add_handle($mh, $ch);
$running = NULL;
do {
  usleep(10000);
  curl_multi_exec($mh, $running);
} while($running > 0);
$a = curl_multi_getcontent($ch);
curl_multi_remove_handle($mh, $ch);
curl_multi_close($mh);
echo $a;
