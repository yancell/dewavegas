<?php

	$user = !empty($_POST["user"]) ? strtoupper(trim($_POST["user"])) : "";
	$password = !empty($_POST["password"]) ? trim($_POST["password"]) : "";
	$target = !empty($_POST["val"]) ? $_POST["val"] : "";
	$var = [0, 10000,20000,35000, 0,50000, 75000, 100000, 250000, 50000,0,10000,20000, 35000,0,50000,75000,100000,250000,50000];
	$res = ["d1d813a48d99f0e102f7d0a1b9068001","48d6215903dff56238e52e8891380c8f","9f27410725ab8cc8854a2769c7a516b8","d487dd0b55dfcacdd920ccbdaeafa351","bda9643ac6601722a28f238714274da4","e90dfb84e30edf611e326eeb04d680de","61db47dac8aefe03fc67ee1b65ecd8f6","490a0db9793cd8cfae191676bbb860e5","9768feb3fdb1f267b06093bc572952dd","994ae1d9731cebe455aff211bcb25b93","d1d813a48d99f0e102f7d0a1b9068001","48d6215903dff56238e52e8891380c8f","9f27410725ab8cc8854a2769c7a516b8","d487dd0b55dfcacdd920ccbdaeafa351","bda9643ac6601722a28f238714274da4","e90dfb84e30edf611e326eeb04d680de","61db47dac8aefe03fc67ee1b65ecd8f6","490a0db9793cd8cfae191676bbb860e5","9768feb3fdb1f267b06093bc572952dd","994ae1d9731cebe455aff211bcb25b93"];
	function cut($html, $start, $end){
		$first = explode($start, $html);
		if (empty( $first[1])) return;
		$last = explode($end, $first[1]);
		return $last[0];
	}
