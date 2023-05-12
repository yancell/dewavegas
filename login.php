<?php

	require_once("config.php");

	$ch1 = curl_init();
	curl_setopt($ch1, CURLOPT_URL, "https://dwvgs.club/loginUser");
	curl_setopt($ch1, CURLOPT_COOKIEJAR, "cookie".$user.".txt");
	curl_setopt($ch1, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch1, CURLOPT_CUSTOMREQUEST, "POST");
	curl_setopt($ch1, CURLOPT_POST, 1);
	curl_setopt($ch1, CURLOPT_POSTFIELDS, "username=".$user."&password=".$password);
	curl_exec($ch1);
	curl_close($ch1);

	$ch1 = curl_init();
	curl_setopt($ch1, CURLOPT_URL, "https://dwvgs.club/");
	curl_setopt($ch1, CURLOPT_COOKIEFILE, "cookie".$user.".txt");
	curl_setopt($ch1, CURLOPT_RETURNTRANSFER, 1);
	curl_exec($ch1);
	curl_close($ch1);

	$ch2 = curl_init();
	curl_setopt($ch2, CURLOPT_HEADER, 1);
	curl_setopt($ch2, CURLOPT_NOBODY, 1);
	curl_setopt($ch2, CURLOPT_URL, "https://dwvgs.club/dewafortune/".$user);
	curl_setopt($ch2, CURLOPT_COOKIEFILE, "cookie".$user.".txt");
	curl_setopt($ch2, CURLOPT_RETURNTRANSFER, 1);
	curl_exec($ch2);
	$info = curl_getinfo($ch2, CURLINFO_REDIRECT_URL);
	curl_close($ch2);

	$ch3 = curl_init();
	curl_setopt($ch3, CURLOPT_URL, $info);
	curl_setopt($ch3, CURLOPT_COOKIEJAR, "cookie1".$user.".txt");
	curl_setopt($ch3, CURLOPT_RETURNTRANSFER, 1);
	curl_exec($ch3);
	curl_close($ch3);

	$ch4 = curl_init();
	curl_setopt($ch4, CURLOPT_URL, "https://dewafortune.xyz/auth/select_game_v2.php");
	curl_setopt($ch4, CURLOPT_COOKIEFILE, "cookie1".$user.".txt");
	curl_setopt($ch4, CURLOPT_RETURNTRANSFER, 1);
	curl_exec($ch4);
	curl_close($ch4);

	$ch5 = curl_init();
	curl_setopt($ch5, CURLOPT_URL, "https://dewafortune.xyz/var_api.php");
	curl_setopt($ch5, CURLOPT_COOKIEFILE, "cookie1".$user.".txt");
	curl_setopt($ch5, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch5, CURLOPT_FOLLOWLOCATION, 1);
	$cnt = curl_exec($ch5);
	curl_close($ch5);
	
	$value = cut($cnt, 'klanklcnaklasdac:',',anim');
	$arr = json_decode($value);
	
	if (is_array($arr)){
		foreach ($arr as $k => $v){
			if (!empty($v)){
				echo $var[$k];
				if (in_array($var[$k], $target)){
					$ch6 = curl_init();
					curl_setopt($ch6, CURLOPT_URL, "https://dewafortune.xyz/bq2.php");
					curl_setopt($ch6, CURLOPT_COOKIEFILE, "cookie1".$user.".txt");
					curl_setopt($ch6, CURLOPT_RETURNTRANSFER, 1);
					curl_setopt($ch6, CURLOPT_CUSTOMREQUEST, "POST");
					curl_setopt($ch6, CURLOPT_POST, 1);
					curl_setopt($ch6, CURLOPT_POSTFIELDS, 'resres='.$res[$k].'&res='.$res[$k]);
					curl_exec($ch6);
					curl_close($ch6);
				}
				break;
			}
		}
	}