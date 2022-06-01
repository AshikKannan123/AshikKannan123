<?php
/* connection code */
$con=mysqli_connect('localhost','root','','ashik');
/* insert code */
$name=$_POST['name'];
$email=$_POST['email'];
$sub=$_POST['subject'];
$msg=$_POST['message'];
$sql="INSERT INTO `contact`(`Id`,`Name`,`Email`,`Subject`,`Message`) VALUES ('0','$name','$email','$sub','$msg')";
$as=mysqli_query($con,$sql);
if($as)
{
    echo "Request Submited";
}
else 
{
    echo "Request not Submited";
}
/* Message send to Telegram API bot */
  $apiToken = "5470283698:AAFcRRhndlXQmA4M6jAeprxTUuhZepqpHz8";
  $chat_id = '-1001592220656';
  $name = $_POST['name'];
  $email = $_POST['email'];
  $msg = $_POST['message'];
  $sub = $_POST['subject'];
  $message = urlencode("Name : $name \n E-Mail : $email \n Subject : $sub \n Message : $msg");
  $response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?text=".$message."&chat_id=".$chat_id."&parse_mode=HTML");
?>