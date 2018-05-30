<?php
$con = mysqli_connect("localhost","id5125154_sushma","gabbar","id5125154_database1");

function is_not_dublicate($name,$quote){
    $con = mysqli_connect("localhost","id5125154_sushma","gabbar","id5125154_database1");
    $sql="select * from quotations where name='".$name."' and quote='".$quote."'";
    $retVal=mysqli_query($con,$sql);
    $num_rows = mysqli_num_rows($retVal);
    if($num_rows==0){
        return 1;
    }
    else{
        return 0;
    }
}
if(isset($_POST['submit']) and $_POST['name'] != "" and $_POST['quote'] != "" and is_not_dublicate($_POST['name'],$_POST['quote']))
{
    
    $query = "INSERT INTO quotations (name,quote) VALUES ('".$_POST['name']."','".$_POST['quote']."')";
    
    $ret = mysqli_query($con,$query);
    $message=$_POST['quote'].".\n"."\nThank you for submitting";
    
    mail( $_POST['email'], "Your quote has been stored",$message);
    if($ret){
        header('Location: submitted.php');
    }
    
}
$sql = "SELECT id FROM quotations";
$ret = mysqli_query($con,$sql);
$array = mysqli_fetch_array($ret);
$row_num = mysqli_num_rows($ret);


?>
<html>
    <head>
        <title>sushma loves gabbar singh.</title>
    </head>
    <body>
        <form action="index.php" method="POST" enctype="multipart/form-data">
            <input name="name" type="text" placeholder="name"><br><br>
            <input name="quote" type="text" placeholder="quote"><br><br>
            <input name="email" type="email" placeholder="email"><br><br>
            <input type="submit" name="submit"><br><br>
            <p>providing email id is optional, it is for the confirmation about your quote is stored or not</p>
        </form>
    </body>
</html>