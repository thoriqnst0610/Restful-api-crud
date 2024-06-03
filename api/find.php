<?php

require_once"../config/database.php";
require_once"../repository/siswarepository.php";
require_once"../service/siswaservice.php";
require_once"../service/paginationservice.php";

use database\connection;
use service\siswaserviceimpl;
use repository\siswarepositoryimpl;
use paginations\pagination;

header("Content-Type: application/json");


$database = connection::gas();
$repository = new siswarepositoryimpl($database);
$service = new siswaserviceimpl($repository);
$pagination = new pagination($service,$repository);

$method = $_SERVER['REQUEST_METHOD'];

if($method === 'GET'){
  
 if(isset($_GET['halaman'])){
   
   $halaman = $pagination->pagination($_GET['halaman']);
   $mulai = $_GET['halaman'];
   
 }else{
   
 $halaman = $pagination->pagination();
 $mulai = 1;
 
 }
 
 $pagination->halaman();
 $jumlah_halaman = $pagination->halaman;
 $jumlah_siswa = $pagination->jumlah_data;
 $siswa = $pagination->data;
 
 if($mulai > $jumlah_halaman){
   
   $result = array("status" => false,
   "jumlah_siswa" => $jumlah_siswa,
   "jumlah_halaman" => $jumlah_halaman,
   "message" => "Tidak ada data");
   
 }else{
   
  $result = array("status" => true,
  "jumlah_siswa" => $jumlah_siswa,
  "jumlah_halaman" => $jumlah_halaman,
  "siswa" => $siswa);
  
 }
 
}else{
  
  $result = "method tidak dikenali";
  $result = array("status" => false,
  "message" => $result);
  
}

echo json_encode($result);