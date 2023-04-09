<?php

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://dwvgs.club/loginUser");
curl_setopt($ch, CURLOPT_COOKIEJAR, "cookie.txt");
curl_setopt($ch, CURLOPT_COOKIEFILE, "cookie.txt");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, "username=DAHYANI&password=cikande1");
curl_setopt($ch, CURLOPT_VERBOSE, 1);

$ch2 = curl_init();
curl_setopt($ch2, CURLOPT_HEADER, 1);
curl_setopt($ch2, CURLOPT_NOBODY, 1);
curl_setopt($ch2, CURLOPT_URL, "https://dwvgs.club/dewafortune/DAHYANI");
curl_setopt($ch2, CURLOPT_COOKIEFILE, "cookie.txt");
curl_setopt($ch2, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch2, CURLOPT_FOLLOWLOCATION, 0);
curl_setopt($ch2, CURLOPT_VERBOSE, 1);

$mh = curl_multi_init();
curl_multi_add_handle($mh, $ch);
curl_multi_add_handle($mh, $ch2);
$running = NULL;
do {
  usleep(30000);
  curl_multi_exec($mh, $running);
} while($running > 0);
curl_multi_remove_handle($mh, $ch);
curl_multi_remove_handle($mh, $ch2);
curl_multi_close($mh);
