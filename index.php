<?php
/**
$ch = curl_init();
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_NOBODY, false);
curl_setopt($ch, CURLOPT_URL, "https://dwvgs.club/loginUser");
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEJAR, "cookie.txt");
curl_setopt($ch, CURLOPT_COOKIEFILE, "cookie.txt");
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 0);
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

$ch3 = curl_init();
curl_setopt($ch3, CURLOPT_HEADER, false);
curl_setopt($ch3, CURLOPT_NOBODY, false);
curl_setopt($ch3, CURLOPT_URL, "https://dewafortune.xyz/var_api.php");
curl_setopt($ch3, CURLOPT_COOKIEFILE, "cookie.txt");
curl_setopt($ch3, CURLOPT_RETURNTRANSFER, 1);

curl_setopt($ch3, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch3, CURLOPT_POST, 1);
curl_setopt($ch3, CURLOPT_POSTFIELDS, "resres=bda9643ac6601722a28f238714274da4&res=bda9643ac6601722a28f238714274da4");
curl_setopt($ch3, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch3, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch3, CURLOPT_FOLLOWLOCATION, 0);

curl_setopt($ch3, CURLOPT_VERBOSE, 1);
**/
$ch4 = curl_init();
curl_setopt($ch4, CURLOPT_HEADER, 0);
curl_setopt($ch4, CURLOPT_NOBODY, 0);
curl_setopt($ch4, CURLOPT_URL, "https://dewafortune.xyz/auth/login_defor.php?userid=DAHYANI&sessid=dqf7JfTEW5W5X7hfXquqZBFzQifVfXFIwbl1JeQm&access_token=805f6c37fa1eb7e50c2507cbe7128280&sesskey=202304093.236.66.167");
curl_setopt($ch4, CURLOPT_COOKIEJAR, "cookie1.txt");
curl_setopt($ch4, CURLOPT_COOKIEFILE, "cookie1.txt");
curl_setopt($ch4, CURLOPT_FOLLOWLOCATION, 0);
curl_setopt($ch4, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch4, CURLOPT_VERBOSE, 1);
/**
$ch5 = curl_init();
curl_setopt($ch5, CURLOPT_HEADER, 0);
curl_setopt($ch5, CURLOPT_NOBODY, 0);
curl_setopt($ch5, CURLOPT_URL, "https://dewafortune.xyz/var_api.php");
curl_setopt($ch5, CURLOPT_COOKIEFILE, "cookie1.txt");
curl_setopt($ch5, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch5, CURLOPT_VERBOSE, 1);
**/
$mh = curl_multi_init();
//curl_multi_add_handle($mh, $ch);
//curl_multi_add_handle($mh, $ch2);
//cur№l_multi_add_handle($mh, $ch3);
curl_multi_add_handle($mh, $ch4);
//curl_multi_add_handle($mh, $ch5);
$running = NULL;
do {
  usleep(10000);
  curl_multi_exec($mh, $running);
} while($running > 0);
//$a = curl_multi_getcontent($ch);
//$b = curl_multi_getcontent($ch2);
//$c = curl_multi_getcontent($ch3);
$d = curl_multi_getcontent($ch4);
//$e = curl_multi_getcontent($ch5); 
//curl_multi_remove_handle($mh, $ch);
//curl_multi_remove_handle($mh, $ch2);
//curl_multi_remove_handle($mh, $ch3);
//curl_multi_remove_handle($mh, $ch4);
curl_multi_remove_handle($mh, $ch5);
curl_multi_close($mh);
//echo $a;
//echo $b;
//echo $c;
echo $d;
//echo $e;
