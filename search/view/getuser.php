<?php
header("Content-Type:application/json");

include "/xampp/htdocs/CustomLandingPage/resource/config/db.php";
// ============================VIEWS==============================//
//Get User 
// $loggeid = $_SESSION['id'];
if(isset($_GET['logged_id']))
{
   $id = $_GET['logged_id'];
   $query="SELECT * FROM tblaccount WHERE id = '$id'";
   $exec=mysqli_query($con, $query);
   if(mysqli_num_rows($exec)>0){
     $row= mysqli_fetch_assoc($exec);
     
     $user_id = $row['id'];
     $user_email = $row['email'];
     
     $response1['user_id'] = $user_id;
     $response1['user_email'] = $user_email;
     
     // encode data as json
     $display = json_encode($response1);
     echo $display;
   }else{
     return $row=[];
   }

}