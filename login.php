<?php 
header('Content-Type:application/json');
header('Access-Control-Allow_origin: * ');
header('Access-Control-Allow_methods: POST');
header('Access-Control-Allow-Header:Access-Control-Allow-Header,Content-Type,Access-Control-Allow_methods,Auhtorization');
require_once "config/database.php";
$responseArray = array('status'=>0,'message'=>'Something went wrong','resultData'=>[]);
if($_SERVER['REQUEST_METHOD']==='GET'){
if((isset($_REQUEST['username']))&&(isset($_REQUEST['password']))){
    $username = $_REQUEST['username'];
    $password = $_REQUEST['password'];
    $query = "SELECT * FROM users WHERE username='$username' AND pwd='$password'";
    $queryResult = mysqli_query($conn,$query);
    if((mysqli_num_rows($queryResult)>0)){
        $resultData = mysqli_fetch_all($queryResult , MYSQLI_ASSOC);
        $responseArray['message']= 'Successfully Login';
		$responseArray['status']= 1;
		$responseArray['resultData']= $resultData;
    }else{
        $responseArray['message']='Invalid username or password';
    }
}else{
    $responseArray['message']='Invad params';
}
}else{
    $responseArray['message']='Bad request';
}
echo json_encode($responseArray);exit();
?>