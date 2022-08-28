<?php
require_once './vendor/google/recaptcha/src/autoload.php';

define("RECAPTCHA_V3_SECRET_KEY",'6LeCvAAgAAAAAJdZ1kQpj8HTy86iKAzIZIV4Ypwe');

if(isset($_POST['email'] ) && $_POST['email']) {
    $email= filter_var($_POST['email'],FILTER_SANITIZE_STRING);
}else{
    header('location:subscribe_newsletter_form.php');
    exit;
}
$token=$_POST['token']; 
$action=$_POST['action'];
  
//use recaptcha client library for validation
$recaptcha= new \ReCaptcha\ReCaptcha(RECAPTCHA_V3_SECRET_KEY);
$resp = $recaptcha->setExpectedAction($action)
                  ->setScoreThreshold(0.5)
                  ->verify($token,$_SERVER['REMOTE_ADDR']);
                  
//verify the response
if($resp->isSuccess()){
     echo "welcome ";
}else{
    $errors=$resp->getErrorCodes();
}