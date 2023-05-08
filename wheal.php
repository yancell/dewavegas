<?php

$ch4 = curl_init();
curl_setopt($ch4, CURLOPT_URL, "https://dewafortune.xyz/wheel.php");
curl_setopt($ch4, CURLOPT_COOKIEFILE, "cookie1.txt");
curl_setopt($ch4, CURLOPT_RETURNTRANSFER, 1);
$cnt = curl_exec($ch4);
curl_close($ch4);

$var = [0, 10000,20000,35000, 0,50000, 75000, 100000, 250000, 50000,0,10000,20000, 35000,0,50000,75000,100000,250000,50000];
$value = cut($cnt, 'klanklcnaklasdac:',',anim');
$arr = json_decode($value);

foreach ($arr as $k => $v){
	if (!empty($v)) echo $var[$k];
}

function cut($html, $start, $end){
	$first = explode($start, $html);
	$last = explode($end, $first[1]);
	return $last[0];
}