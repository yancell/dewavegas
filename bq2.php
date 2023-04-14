$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://dewafortune.xyz/bq2.php");
curl_setopt($ch, CURLOPT_COOKIEFILE, "cookie1.txt");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_VERBOSE, 1);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_exec($ch);
curl_close($ch);
