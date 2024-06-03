<?php

require_once"../config/database.php";
require_once"../repository/siswarepository.php";
require_once"../service/siswaservice.php";

use database\connection;
use service\siswaserviceimpl;
use repository\siswarepositoryimpl;

header("Content-Type: appliaction/json");


$database = connection::gas();
$repository = new siswarepositoryimpl($database);
$service = new siswaserviceimpl($repository);

$method = $_SERVER['REQUEST_METHOD'];

if($method === 'DELETE'){
  
  $data = file_get_contents("php://input");
  
  $data = json_decode($data,true);
  
  $id = $data['id'];
  $rest = $service->delete($id);
  
  if($rest){
    
    $result = array("status" => true,
    "message" => "berhasil menghapus data");
    
  }else{
    
    $result = array("status" => false,
    "message" => "gagal / id tidak ditemukan");
    
  }
  
}else{
  
  $result = array("status" => false,
  "message" => "method tidak valid");
  
}

echo json_encode($result);