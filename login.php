<?php

	require_once("config.php");

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, "https://dwvgs.club/loginUser");
	curl_setopt($ch, CURLOPT_COOKIEJAR, "cookie".$user.".txt");
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, "username=".$user."&password=".$password);
	curl_exec($ch);
	curl_close($ch);

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, "https://dwvgs.club/");
	curl_setopt($ch, CURLOPT_COOKIEFILE, "cookie".$user.".txt");
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_exec($ch);
	curl_close($ch);

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_HEADER, 1);
	curl_setopt($ch, CURLOPT_NOBODY, 1);
	curl_setopt($ch, CURLOPT_URL, "https://dwvgs.club/dewafortune/".$user);
	curl_setopt($ch, CURLOPT_COOKIEFILE, "cookie".$user.".txt");
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_exec($ch);
	$info = curl_getinfo($ch, CURLINFO_REDIRECT_URL);
	curl_close($ch);

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $info);
	curl_setopt($ch, CURLOPT_COOKIEJAR, "cookie1".$user.".txt");
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_exec($ch);
	curl_close($ch);

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, "https://dewafortune.xyz/auth/select_game_v2.php");
	curl_setopt($ch, CURLOPT_COOKIEFILE, "cookie1".$user.".txt");
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_exec($ch);
	curl_close($ch);

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, "https://dewafortune.xyz/var_api.php");
	curl_setopt($ch, CURLOPT_COOKIEFILE, "cookie1".$user.".txt");
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
	$cnt = curl_exec($ch);
	curl_close($ch);
	
	$value = cut($cnt, 'klanklcnaklasdac:',',anim');
	$arr = json_decode($value);
	
	if (is_array($arr)){
		$tar = is_array($target) ? $target : [];
		$key = array_search($tar, $var);
		if ($key != NULL){
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, "https://dewafortune.xyz/bq1.php");
			curl_setopt($ch, CURLOPT_COOKIEFILE, "cookie1".$user.".txt");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, 'resres='.$res[$key].'&res='.$res[$key]);
			curl_exec($ch);
			curl_close($ch);
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, "https://dewafortune.xyz/bq2.php");
			curl_setopt($ch, CURLOPT_COOKIEFILE, "cookie1".$user.".txt");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, 'resres='.$res[$key].'&res='.$res[$key]);
			curl_exec($ch);
			curl_close($ch);
			echo true;
			return;
		}
		foreach ($arr as $k => $v){
			if (!empty($v)){
				echo $var[$k];
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
