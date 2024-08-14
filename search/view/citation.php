<?php
header("Content-Type:application/json");

include "../resource/config/db.php";
// ============================VIEWS==============================//

// Research
if (isset($_POST['view_r']) && isset($_POST['id_r'])) {
      $id = $_POST['id_r'];
      $viewcount = $_POST['view_r'];
      $result1 = mysqli_query($con, "UPDATE tblresource set views = '$viewcount' WHERE id = '$id'");
      if($result1 > 0){
       response("Success");
      }else{
         response("Failed");
      }
} 
else{
   response("Invalid Request");
}


// =========================================================================

//CITATION
// Research
if (isset($_POST['cite_r']) && isset($_POST['id_r'])) {
   $id = $_POST['id_r'];
   $citecount = $_POST['cite_r'];
         
   $result = mysqli_query($con, "UPDATE tblresource set cites = '$citecount' WHERE id = '$id'");
   if($result > 0){
      response("Success");
   }else{
      response("Failed");
   }
}
else{
   response("Invalid Request");
}

function response($data){
   $response = $data;
     
   $json_response = json_encode($response);
   echo $json_response;
}
?>