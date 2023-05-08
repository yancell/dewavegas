<?php

$ch4 = curl_init();
curl_setopt($ch4, CURLOPT_URL, "https://dewafortune.xyz/wheel.php");
curl_setopt($ch4, CURLOPT_COOKIEFILE, "cookie1.txt");
curl_setopt($ch4, CURLOPT_RETURNTRANSFER, 1);
$cnt = curl_exec($ch4);
curl_close($ch4);

$value = cut($cnt, 'klanklcnaklasdac:',',anim');

echo json_decode($value);

function cut($html, $start, $end){
	$first = explode($start, $html);
	$last = explode($end, $first[1]);
	return $last[0];
}