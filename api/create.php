<?php

require_once"../config/database.php";
require_once"../repository/siswarepository.php";
require"../service/siswaservice.php";

use database\connection;
use repository\siswarepositoryimpl;
use service\siswaserviceimpl;


header("Content-Type: application/json");

$database = connection::gas();
$repository = new siswarepositoryimpl($database);
$service = new siswaserviceimpl($repository);

$request = $_SERVER['REQUEST_METHOD'];

if($request === "POST"){
  
  $nama = $_POST['nama'];
  $alamat = $_POST['alamat'];
  
  $rest = $service->save($nama,$alamat);
  
  if($rest){
    
  $result = array("status" => true,
  "message" => "input berhasil");
  
  }else{
    
    $result = array("status" => false,
    "message" => "maaf, data tidak berhasil di input");
  }
  
}else{
  $result = array("status" => false,
  "message" => "method salah");
}
echo json_encode($result);