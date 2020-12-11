<?php 
header('Content-Type:application/json');
header('Access-Control-Allow_origin: * ');
header('Access-Control-Allow_methods: POST');
header('Access-Control-Allow-Header:Access-Control-Allow-Header,Content-Type,Access-Control-Allow_methods,Auhtorization');
require_once "../config/database.php";
$responseArray = array('status'=>0,'message'=>'Something went wrong','resultData'=>[]);
if($_SERVER['REQUEST_METHOD']==='GET'){
if((isset($_REQUEST['make']))){
    $godigit2wMake = $_REQUEST['make'];
    $query = 'SELECT make,vcode FROM godigit2w WHERE make LIKE "%' .$godigit2wMake. '%" LIMIT 10';
            
    $queryResult = mysqli_query($conn,$query);
    if((mysqli_num_rows($queryResult)>0)){
        $resultData = mysqli_fetch_all($queryResult , MYSQLI_ASSOC);
        $responseArray['message']= 'Data Found';
		$responseArray['status']= 1;
		$responseArray['resultData']= $resultData;
    }else{
        $responseArray['message']='No record found';
    }
}else{
    $responseArray['message']='Invalid params';
}
}else{
    $responseArray['message']='Bad request';
}
echo json_encode($responseArray);exit();
?>