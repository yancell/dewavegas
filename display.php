<?php

	require_once("config.php");
	
	$ch1 = curl_init();
	curl_setopt($ch1, CURLOPT_URL, "https://dewafortune.xyz/wheel.php");
	curl_setopt($ch1, CURLOPT_COOKIEFILE, "cookie1".$user.".txt");
	curl_setopt($ch1, CURLOPT_RETURNTRANSFER, 1);
	$cnt = curl_exec($ch1);
	curl_close($ch1);
	
	$value = cut($cnt, 'klanklcnaklasdac:',',anim');
	$arr = json_decode($value);
	
	if (is_array($arr)){
		foreach ($arr as $k => $v){
			if (!empty($v)){
				echo $var[$k];
				if (in_array($var[$k], $target)){
					$ch2 = curl_init();
					curl_setopt($ch2, CURLOPT_URL, "https://dewafortune.xyz/bq2.php");
					curl_setopt($ch2, CURLOPT_COOKIEFILE, "cookie1".$user.".txt");
					curl_setopt($ch2, CURLOPT_RETURNTRANSFER, 1);
					curl_setopt($ch2, CURLOPT_CUSTOMREQUEST, "POST");
					curl_setopt($ch2, CURLOPT_POST, 1);
					curl_setopt($ch2, CURLOPT_POSTFIELDS, 'resres='.$res[$k].'&res='.$res[$k]);
					curl_exec($ch2);
					curl_close($ch2);
				}
				break;
			}
		}
	}