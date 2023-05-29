<?php

	require_once("config.php");
	
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, "https://dewafortune.xyz/wheel.php");
	curl_setopt($ch, CURLOPT_COOKIEFILE, "cookie1".$user.".txt");
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	$cnt = curl_exec($ch);
	curl_close($ch);
	
	$value = cut($cnt, 'klanklcnaklasdac:',',anim');
	$arr = json_decode($value);
	
	if (is_array($arr)){
		foreach ($arr as $k => $v){
			if (!empty($v)){
				echo $var[$k];
				$tar = is_array($target) ? $target : [];
				if (in_array($var[$k], $tar)){
					$ch = curl_init();
					curl_setopt($ch, CURLOPT_URL, "https://dewafortune.xyz/bq2.php");
					curl_setopt($ch, CURLOPT_COOKIEFILE, "cookie1".$user.".txt");
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
					curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
					curl_setopt($ch, CURLOPT_POST, 1);
					curl_setopt($ch, CURLOPT_POSTFIELDS, 'resres='.$res[$k].'&res='.$res[$k]);
					curl_exec($ch);
					curl_close($ch);
				}
				break;
			}
		}
	}
