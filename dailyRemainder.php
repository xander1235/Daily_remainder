<?php
$con = mysqli_connect("localhost","id5125154_sushma","gabbar","id5125154_database1");

$sql = "select position from metadata";
$query = mysqli_query($con,$sql);
$ret = mysqli_fetch_array($query);
$pos = $ret[0];

echo $pos;


$sql = "SELECT quote FROM quotations";
$ret = mysqli_query($con,$sql);

$row_num = mysqli_num_rows($ret);
echo $row_num;





if($pos > $row_num)
{
    $pos = $pos % $row_num;
}
for ( $i = 0; $i <= $pos; $i ++ )
{
    $array = mysqli_fetch_array($ret);
}
$quote = $array[0];
$pos++;
$pos = $pos % $row_num;

mail("rathodveerender25@gmail.com","subject",$quote);
$sql = "update metadata set position =".$pos;
$query = mysqli_query($con,$sql);
echo $quote;

    // sending sms  
     $username = "rathodveerender25@gmail.com";
	$hash = "47dcf09397f36bf08b78f277bb50b51407741ad3b67caead8c129b8ea0f30818";
	$test = "0";
	$sender = "TXTLCL";
	$numbers = "919129382373";
	$message = $quote.".\n"."\nFrom:"."\nFamily";
	$message = urlencode($message);
	$data = "username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$numbers."&test=".$test;
	$ch = curl_init('http://api.textlocal.in/send/?');
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$result = curl_exec($ch);
	echo $result;
	curl_close($ch);
?>