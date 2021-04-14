<?php
require '../monkeylearn-php-3.3.0/autoload.php';
require 'connection.php';

$ml = new MonkeyLearn\Client('54af991ba52399798bc04bc4975d1b5c566d5966');

if(isset($_COOKIE["cid"]))
	$cid = $_COOKIE["cid"];
else { 
	echo "<h1>Channel Not Found</h1>";
	exit();
}
$q1 = "select * from suggest where cid='$cid'";
$qres = $con->query($q1);
if($qres->num_rows > 0) {
	$data = [];
	while($row = $qres->fetch_assoc()) {
		array_push($data, $row["Sugg"]);
	}
}
else {
	echo "<h1>Not Questions Found Last Week</h1>";
	exit();
}
//$data = ["samsung hello my name is sandeep", "oh! samsung is ok"];

$model_id = 'ex_YCya9nrn';
$res = ($ml->extractors->extract($model_id, $data))->result;
//var_dump(($res));
$keywords = [];
$high=0;
foreach($res as $r1) {
	foreach($r1["extractions"] as $r2) {
		//echo $r2["parsed_value"];
		$r3 = $r2["parsed_value"];
		if(isset($keywords[$r3]))
			$keywords[$r3]++;
		else
			$keywords[$r3] = 1;
		//echo $r2["parsed_value"];
		if(($keywords[$r3]) > $high)
			$high = $keywords[$r3];
	}
}
$relv = [];
foreach($keywords as $key=>$val) {
	 if($val == $high) 
		//echo $key; 
		array_push($relv, $key);
}
echo json_encode($relv);
?>