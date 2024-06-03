<?php

require_once"../config/database.php";
require_once"../repository/siswarepository.php";
require_once"../service/siswaservice.php";

use database\connection;
use repository\siswarepositoryimpl;
use service\siswaserviceimpl;

header("Content-Type: application/json");


$database = connection::gas();
$repository = new siswarepositoryimpl($database);
$service = new siswaserviceimpl($repository);

$method = $_SERVER['REQUEST_METHOD'];

if($method === 'PUT'){
  
  $data = file_get_contents("php://input");
  
  $data = json_decode($data,true);
  
  $id = $data['id'];
  $nama = $data['nama'];
  $alamat = $data['alamat'];
  
  $rest = $service->update($id,$nama,$alamat);
  
  if($rest){
    
    $result = array("status" => true,
    "message" => "berhasil update data");
    
  }else{
    
    $result = array("status" => false,
    "message" =>"gagal update data");
  }
  
}else{
  
  $result = array("status" => false,
  "message" => "method tidak dikenali");
  
}
echo json_encode($result);