


<?php

function csvToArray($file,$delimiter)
{

 if (($handle = fopen($file, 'r')) !== FALSE) { 
    $i = 0; 
    while (($lineArray = fgetcsv($handle, 4000, $delimiter, '"')) !== FALSE) { 
      for ($j = 0; $j < count($lineArray); $j++) { 
        $arr[$i][$j] = $lineArray[$j]; 
      } 
      $i++; 
    } 
    fclose($handle); 
  } 
   return $arr; 
  
}
$data = csvToArray("testdate.csv", ',');
$count = count($data) - 1;
$labels = array_shift($data);  
foreach ($labels as $label) {
  $keys[] = $label;
}
$keys[] = 'id';
for ($i = 0; $i < $count; $i++) {
  $data[$i][] = $i;
}
for ($j = 0; $j < $count; $j++) {
  $d = array_combine($keys, $data[$j]);
  $newArray[$j] = $d;
}
$js= json_encode($newArray);


?>