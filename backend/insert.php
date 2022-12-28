<?php

header ("Access-Control-Allow-Origin: *");
header ("Access-Control-Allow-Headers: access");
header ("Access-Control-Allow-Methords: POST");
header ("Content-Type: application/json; charset=UTF-8");
header ("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization,X-Requested-With ");

$data= json_decode(file_get_contents("php://input"));

$first_name = $data->first_name;
$last_name = $data->last_name;
$email= $data->email;
$password = $data->password;


$con = mysqli_connect("localhost","root","");
if(mysqli_select_db($con,"react-register"))
{
    echo "connected";
}
else
{
    echo "not";
}


// $sql = ;
$result = mysqli_query($con,"insert into register( 
    
    first_name,
    last_name,
    email,
    password )
values(
    
    '$first_name',
    '$last_name',
    '$email',
    '$password' 

)");
if($result){

    $response['data']=array(
        'status'=>'valid'
    );
    echo json_encode($response);
}
else{
    $response['data']=array(
        'status'=>'invalid'
    );
    echo json_encode($response);
}

?>
