<?php  
	//$url = $_POST['url'];
	$url = 'https://en.wikipedia.org/wiki/Malcolm_Turnbull';
	$file = file_get_contents($url);
	// $tmp = explode("was born in ",$file);
	// echo substr($tmp,0,15);
	$patterns = array('/was born in (.*?)on/s','/was born in (.*?)to/s','/was born in (.*?),/s');
	
	

	foreach ($patterns as $key => $value) {
		# code...
		preg_match($value,$file,$rs);
		print_r($rs);
		// echo "<br>";
		// echo ($rs[1]);
		// echo "<br>";
		$output = 'wrong';
		// if find an <a> tag
		if (strpos($rs[1],'href') && strpos($rs[1],'</a>')){
			preg_match("/>(.*?)</s",$rs[1],$tmp);
			//print_r($tmp);
			$output = $tmp[1];
		}
		echo $output;
		echo "<br>";
	}
	
	

?>