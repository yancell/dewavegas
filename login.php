<?php

@unlink("cookie.txt");
@unlink("cookie1.txt");
$user = "DEWAMESUM";
$pass = "mesummesum1";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://dwvgs.club/loginUser");
curl_setopt($ch, CURLOPT_COOKIEJAR, "cookie.txt");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, "username=".$user."&password=".$pass);
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
curl_setopt($ch2, CURLOPT_URL, "https://dwvgs.club/dewafortune/".$user);
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

$var = [0, 10000,20000,35000, 0,50000, 75000, 100000, 250000, 50000,0,10000,20000, 35000,0,50000,75000,100000,250000,50000];
$value = cut($cnt, 'klanklcnaklasdac:',',anim');
$arr = json_decode($value);
$res = ["d1d813a48d99f0e102f7d0a1b9068001","48d6215903dff56238e52e8891380c8f","9f27410725ab8cc8854a2769c7a516b8","d487dd0b55dfcacdd920ccbdaeafa351","bda9643ac6601722a28f238714274da4","e90dfb84e30edf611e326eeb04d680de","61db47dac8aefe03fc67ee1b65ecd8f6","490a0db9793cd8cfae191676bbb860e5","9768feb3fdb1f267b06093bc572952dd","994ae1d9731cebe455aff211bcb25b93","d1d813a48d99f0e102f7d0a1b9068001","48d6215903dff56238e52e8891380c8f","9f27410725ab8cc8854a2769c7a516b8","d487dd0b55dfcacdd920ccbdaeafa351","bda9643ac6601722a28f238714274da4","e90dfb84e30edf611e326eeb04d680de","61db47dac8aefe03fc67ee1b65ecd8f6","490a0db9793cd8cfae191676bbb860e5","9768feb3fdb1f267b06093bc572952dd","994ae1d9731cebe455aff211bcb25b93"];
$target = [250000];
if (is_array($arr)){
	foreach ($arr as $k => $v){
		if (!empty($v)){
			if (in_array($var[$k], $target)){
				echo $var[$k];
				$ch = curl_init();
				curl_setopt($ch, CURLOPT_URL, "https://dewafortune.xyz/bq2.php");
				curl_setopt($ch, CURLOPT_COOKIEFILE, "cookie1.txt");
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
				curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
				curl_setopt($ch, CURLOPT_POST, 1);
				curl_setopt($ch, CURLOPT_POSTFIELDS, 'resres='.$res[$k].'&res='.$res[$k]);
				curl_exec($ch);
				curl_close($ch);
				break;
			}
			echo $var[$k];
			break;
		}
	}
}

function cut($html, $start, $end){
	$first = explode($start, $html);
	$last = explode($end, $first[1]);
	return $last[0];
}
