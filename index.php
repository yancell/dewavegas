<?php

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://dwvgs.club/loginUser");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, "username=DAHYANI&password=cikande1");
curl_setopt($ch, CURLOPT_VERBOSE, 1);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_HEADER, 1);
$result = curl_exec($ch);
curl_close($ch);
preg_match_all('/^Set-Cookie:\s*([^;]*)/mi', $result, $matches);
$cookies = array();
foreach($matches[1] as $item) {
    parse_str($item, $cookie);
    $cookies = array_merge($cookies, $cookie);
}
setcookie('XSRF-TOKEN', $cookies['XSRF-TOKEN'], time() + (86400 * 30), "/");
setcookie('dewavegas_session', $cookies['dewavegas_session'], time() + (86400 * 30), "/");

$ch2 = curl_init();
curl_setopt($ch2, CURLOPT_URL, "https://dwvgs.club/dewafortune/DAHYANI");
curl_setopt($ch2, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch2, CURLOPT_VERBOSE, 1);
curl_setopt($ch2, CURLOPT_FOLLOWLOCATION, 1);
$cnt = curl_exec($ch2);
curl_close($ch2);
echo $cnt;
