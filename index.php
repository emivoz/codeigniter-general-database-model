<?

$vectorList = array();

for ($i = 0 ; $i<16; $i++) {
	$binaryRepresentation = decextbin($i,4) . "<br>";
	
	// hier habe ich mein erste 4 dimension mit binaries gefüllt von 0000 bis 1111
	$vectorList[$i][0] = intval(substr($binaryRepresentation,0,1));
	$vectorList[$i][1] = intval(substr($binaryRepresentation,1,1));
	$vectorList[$i][2] = intval(substr($binaryRepresentation,2,1));
	$vectorList[$i][3] = intval(substr($binaryRepresentation,3,1));	
	
	// hier der rest 8-bits werden random mit binaries gefüllt
	for($j=4; $j<12; $j++) {
			$vectorList[$i][$j] = rand(0,1);
	}
}


for ($i = 0 ; $i<16; $i++) {
	for	($j=0; $j<12; $j++) {
		echo $vectorList[$i][$j];
	}
	echo "<br>";
}
$minimalAbstand = 16; // definieren den Minimalabstand erst mit Max Value
for($i = 0; $i<15; $i++) {
	for($k = 0; $k<15; $k++) {
	$erreichteMinimalAbstand = 0; // definieren wir erreichteMinimalAbstand als 0 bei jedem Vergleich
		for	($j=0; $j<12; $j++) {		
			if($vectorList[$i][$j] != $vectorList[$k][$j]) {
				$erreichteMinimalAbstand++;				
			}				
		}
		
		if($erreichteMinimalAbstand < $minimalAbstand && $erreichteMinimalAbstand != 0) {
		
			$minimalAbstand = $erreichteMinimalAbstand;
		}
	}
}

echo $minimalAbstand;	

echo "<pre>";
//var_dump($vectorList);
echo "</pre>";

function decextbin($decimalnumber,$bit)
{

   $maxval = 1;
   $sumval = 1;
   for($i=1;$i<$bit;$i++)
   {
       $maxval = $maxval * 2;
       $sumval = $sumval + $maxval;
   }
   
    

   for($bitvalue=$maxval;$bitvalue>=1;$bitvalue=$bitvalue/2)
   {
       
       if (($decimalnumber/$bitvalue) >= 1) $thisbit = 1; else $thisbit = 0;
      
   
       if ($thisbit == 1) $decimalnumber = $decimalnumber - $bitvalue;
   
   $binarynumber .= $thisbit;
   }

return $binarynumber;
}


?>
