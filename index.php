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
curl_exec($ch);
curl_close($ch);

$ch2 = curl_init();
curl_setopt($ch2, CURLOPT_HEADER, 1);
curl_setopt($ch2, CURLOPT_NOBODY, 1);
curl_setopt($ch2, CURLOPT_URL, "https://dwvgs.club/dewafortune/DAHYANI");
curl_setopt($ch2, CURLOPT_COOKIEFILE, "cookie.txt");
curl_setopt($ch2, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch2, CURLOPT_VERBOSE, 1);
curl_exec($ch2);
$info = curl_getinfo($ch2, CURLINFO_REDIRECT_URL);
curl_close($ch2);

echo $info."\n-----\n";

$ch3 = curl_init();
curl_setopt($ch3, CURLOPT_URL, $info);
curl_setopt($ch3, CURLOPT_COOKIEJAR, "cookie1.txt");
curl_setopt($ch3, CURLOPT_COOKIEFILE, "cookie1.txt");
curl_setopt($ch3, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch3, CURLOPT_VERBOSE, 1);
curl_setopt($ch3, CURLOPT_FOLLOWLOCATION, 1);
$cnt = curl_exec($ch3);
curl_close($ch3);


echo $cnt."\n-----\n";

$ch4 = curl_init();
curl_setopt($ch4, CURLOPT_URL, "https://dewafortune.xyz/var_api.php");
curl_setopt($ch4, CURLOPT_COOKIEFILE, "cookie1.txt");
curl_setopt($ch4, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch4, CURLOPT_VERBOSE, 1);
curl_setopt($ch4, CURLOPT_FOLLOWLOCATION, 1);
$cnt = curl_exec($ch4);
curl_close($ch4);

echo $cnt."\n-----\n";

$ch5 = curl_init();
curl_setopt($ch5, CURLOPT_URL, "https://dewafortune.xyz/bq2.php");
curl_setopt($ch5, CURLOPT_COOKIEFILE, "cookie1.txt");
curl_setopt($ch5, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch5, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch5, CURLOPT_POST, 1);
curl_setopt($ch5, CURLOPT_POSTFIELDS, "resres=76ufi2dcekjt6c3mldamhh1eci&res=76ufi2dcekjt6c3mldamhh1eci");
curl_setopt($ch5, CURLOPT_VERBOSE, 1);
curl_setopt($ch5, CURLOPT_FOLLOWLOCATION, 1);
$cnt = curl_exec($ch5);
curl_close($ch5);

echo $cnt."\n-----\n";
