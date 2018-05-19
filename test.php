<?php
$conn=mysqli_connect("localhost","root","","countries_with_regional_code");
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
$filename="all.json";
$data=file_get_contents($filename);
$array=json_decode($data, true);

foreach($array as $row){
	$sql="INSERT INTO  countries(name, alpha2, alpha3, country-code, region, sub-region, intermediate-region, region-code, sub-region-code, intermediate-region-code) VALUES('".$row["name"]."', '".$row["alpha-2"]."', '".$row["alpha-3"]."', '".$row["country-code"]."','".$row["region"]."','".$row["sub-region"]."', '".$row["intermediate-region"]."','".$row["region-code"]."','".$row["sub-region-code"]."','".$row["intermediate-region-code"]."',)";


	 mysqli_query($conn,$sql);
}


echo "Data successfully inserted";
?>