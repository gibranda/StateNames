<?php

$data = json_decode(file_get_contents("data/states.json"));

header("Content-type: application/json");

$ret = $data;
if (isset($_GET["s"])){

	$ret = [];
	foreach(explode(",", $_GET["s"]) as $state){
		$aliases = objectWithKey($state);
		if ($aliases !== null)
		$ret [$state] = $aliases[0];
	}
}

if (isset($_GET["s"]) && isset($_GET["f"])){

	if (!array_key_exists("error", $ret)) {
		if (property_exists($ret, $_GET["f"])) {
			$ret = $ret->$_GET["f"];
		}
		else {
			$ret = ["error" => "format not found."];
		}
	}
}

echo json_encode($ret,JSON_PRETTY_PRINT);

// get json object with any property matching value s
function objectWithKey ($s){

	if (strcmp($s, "") == 0) return;
	global $data;
	//echo $ret;

	$ret = [];

	// iterate through dat a
	foreach ($data as $state){
		// if any field matches, add it to $ret
		foreach(get_object_vars($state) as $key => $value){
			if (strcmp($key, "status") == 0) continue;
			if (strcmp(clean($s), clean($value)) === 0) {
				//echo json_encode($state);
				//echo $s . " matches " . $value . ": . " . clean($s) . "=" . clean($value) . "\n";
				array_push($ret, $state);
				break;
			}
		}
	}
	//$ret = ["error" => "state not found."];

	//echo "----\n";
	//echo json_encode($ret);
	return $ret;
	
}

// remove non-alpha characters
// set to lower case
function alpha($s){

	$len = strlen($s);
	$ret = "";

	for ($i = 0; $i < $len; $i++){
		if (ctype_alpha($s[$i])) $ret .= $s[$i];
	}

	return $ret;
	//return strtolower($ret);
}

function clean($s){
	return strtolower(alpha($s));

}

?>