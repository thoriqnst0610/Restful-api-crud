<?php

namespace service;

use repository\siswarepositoryimpl;

interface siswaservice{
  public function save($nama,$alamat):bool;
  public function delete($id):bool;
  public function update($id,$nama,$alamat):bool;
  public function findAll():array;
  public function find($siswa):array;
  
}

class siswaserviceimpl implements siswaservice{
  
  private $repository;
  
  public function __construct($repository){
    $this->repository = $repository;
  }
  
  public function save($nama,$alamat):bool{
    if($nama == " " or $alamat == " " or !isset($nama) or !isset($alamat)){
      return false;
    }else{
    $this->repository->save($nama,$alamat);
    return true;
    }
    
  }
  
  
  public function delete($siswa):bool{
    if($siswa == " "){
      
      return false;
      
    }else{
      
    $this->repository->delete($siswa);
    return true;
    
    }
  }
  
  public function update($id,$nama,$alamat):bool{
    
    if($id === " " or $nama === " " or $alamat === " "){
      return false;
      
    }else{
      
    $this->repository->update($id,$nama,$alamat);
    return true;
    
    }
    
  }
  
  public function find($siswa):array{
    
    $result = $this->repository->find($siswa);
    
    if($result){
      return $result;
    }else{
      
    }
  }
  
  public function findAll():array{
    
    return $this->repository->findAll();
  }
  
}