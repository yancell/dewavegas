<?php

@unlink("cookie.txt");
@unlink("cookie1.txt");

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://dwvgs.club/loginUser");
curl_setopt($ch, CURLOPT_COOKIEJAR, "cookie.txt");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, "username=DAHYANI&password=cikande1");
curl_exec($ch);
curl_close($ch);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://dwvgs.club/");
curl_setopt($ch, CURLOPT_COOKIEFILE, "cookie.txt");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_exec($ch);
curl_close($ch);

$ch2 = curl_init();
curl_setopt($ch2, CURLOPT_HEADER, 1);
curl_setopt($ch2, CURLOPT_NOBODY, 1);
curl_setopt($ch2, CURLOPT_URL, "https://dwvgs.club/dewafortune/DAHYANI");
curl_setopt($ch2, CURLOPT_COOKIEFILE, "cookie.txt");
curl_setopt($ch2, CURLOPT_RETURNTRANSFER, 1);
curl_exec($ch2);
$info = curl_getinfo($ch2, CURLINFO_REDIRECT_URL);
curl_close($ch2);

$ch3 = curl_init();
curl_setopt($ch3, CURLOPT_URL, $info);
curl_setopt($ch3, CURLOPT_COOKIEJAR, "cookie1.txt");
curl_setopt($ch3, CURLOPT_RETURNTRANSFER, 1);
curl_exec($ch3);
curl_close($ch3);

$ch3 = curl_init();
curl_setopt($ch3, CURLOPT_URL, "https://dewafortune.xyz/auth/select_game_v2.php");
curl_setopt($ch3, CURLOPT_COOKIEFILE, "cookie1.txt");
curl_setopt($ch3, CURLOPT_RETURNTRANSFER, 1);
curl_exec($ch3);
curl_close($ch3);

$ch4 = curl_init();
curl_setopt($ch4, CURLOPT_URL, "https://dewafortune.xyz/var_api.php");
curl_setopt($ch4, CURLOPT_COOKIEFILE, "cookie1.txt");
curl_setopt($ch4, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch4, CURLOPT_FOLLOWLOCATION, 1);
$cnt = curl_exec($ch4);
curl_close($ch4);

$value = cut($cnt, 'klanklcnaklasdac:',',anim');
$red = cut($cnt, "var rturl = '","';");

$cnt = str_replace('src="java/', 'src="https://dewafortune.xyz/java/', $cnt);
$cnt = str_replace('src="js/', 'src="https://dewafortune.xyz/js/', $cnt);
$cnt = str_replace('css/', 'https://dewafortune.xyz/css/', $cnt);
$cnt = str_replace('src="images/', 'src="https://dewafortune.xyz/images/', $cnt);
$cnt = str_replace('socket.io.js"', 'socket.io.js"  crossorigin="use-credentials"', $cnt);
$cnt = str_replace('var numb_kupn = 0;', 'var numb_kupn = 1;', $cnt);
$cnt = str_replace($value, '[0, 0,0,0, 0,0, 0, 1, 0, 0,0, 0, 0, 0,0,0,0,1,0,0]', $cnt);
$cnt = str_replace($red, base64_encode('https://'.$_SERVER['HTTP_HOST']), $cnt);

echo $cnt;

function cut($html, $start, $end){
	$first = explode($start, $html);
	$last = explode($end, $first[1]);
	return $last[0];
}
