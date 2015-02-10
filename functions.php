<?php
function secsToTime($ss) { // recibe cantidad de segundos y regresa hora y asi
$s 	= 	$ss%60;
$fs = 	str_pad($s, 2, "00", STR_PAD_LEFT);
$m 	= 	floor(($ss%3600)/60);
$fm = 	str_pad($m, 2, "00", STR_PAD_LEFT);
$h 	= 	str_pad(floor(($ss%86400)/3600), 2, "0", STR_PAD_LEFT);
$fh = 	str_pad($h, 2, "00", STR_PAD_LEFT);
return "$fh:$fm:$fs";
};

function barbg($done, $tgt, $green= '030', $red = '300'){ // usar: barbg(metric, target [color done, color faltante])
	$donexcent = (($done * 100) / $tgt);
	// $donexcent = ($tgt * 100) / $done;
	$donexcent2 += 1;
	if($donexcent > 99){
		$donexcent = 100;
	}
	if($donexcent2 > 99){
		$donexcent2 = 100;
	}
	return "style='background: #". $green .";
background: -moz-linear-gradient(left,  #". $green ." " . $donexcent . "%, #". $red ." " . $donexcent2 . "%);
background: -webkit-gradient(linear, left top, right top, color-stop(" . $donexcent . "%,#". $green ."), color-stop(" . $donexcent2 . "%,#". $red ."));
background: -webkit-linear-gradient(left,  #". $green ." " . $donexcent . "%,#". $red ." " . $donexcent2 . "%);
background: -o-linear-gradient(left,  #". $green ." " . $donexcent . "%,#". $red ." " . $donexcent2 . "%);
background: -ms-linear-gradient(left,  #". $green ." " . $donexcent . "%,#". $red ." " . $donexcent2 . "%);
background: linear-gradient(to right,  #". $green ." " . $donexcent . "%,#". $red ." " . $donexcent2 . "%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#". $green ."', endColorstr='#". $red ."',GradientType=1 );";
};
?>