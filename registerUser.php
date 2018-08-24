
<?php

require_once 'C:\wamp64\www\android_login_api\include\DbOperation.php';


$response = array();
if($_SERVER['REQUEST_METHOD']=='POST'){
  if(
      isset($_POST['username']) and
          isset($_POST['password']) and
            isset($_POST['realname']) and
              isset($_POST['phone'])
    ){

      $db = new DbOperation();
      if($db->createUser(
          $_POST['username'],
          $_POST['password'],
          $_POST['realname'],
          $_POST['phone']
        )){
          $response['error'] = false;
          $response['message'] = "User registered successfully";
        }else{
          $response['error'] = true;
          $response['message'] = "Some error occurred";
        }

    }else{
      $response['error'] = true;
      $response['message'] = "Required fields ar missing";
    }



}else{
  $response['error'] = true;
  $response['message'] = "Invalid Request";
}

echo json_encode($response);
?>
