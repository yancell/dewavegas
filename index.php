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
curl_setopt($ch3, CURLOPT_FOLLOWLOCATION, 1);
$cnt = curl_exec($ch);
curl_close($ch);

echo $cnt;
