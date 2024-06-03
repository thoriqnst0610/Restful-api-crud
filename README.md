##cara menggunakan api crud

1. create data
2. update data
3. find data
4. delete data

##endpoint create data

url : http://0.0.0.0:8080/api/create.php
method : POST
header : Content-type: application/x-www-form-urlencoded\r\n
key : 1.nama(string) , 2.alamat(string)

##endpoint update data

url : http://0.0.0.0:8080/api/update.php
method : PUT
header : Content-Type: application/json
key : 1.id(int), 2.nama(string), 3.alamat(string)

##endpoint delete data

url : http://0.0.0.0:8080/api/delete.php
method : DELETE 
header : Content-Type: application/json
key : id(int)

##endpoint find/menampilkan data

url : http://0.0.0.0:8080/api/find.php
url : http://0.0.0.0:8080/api/create.php?halaman=halamanyangdiinginkan(int)
method : GET 
key : id(int);

###----###

perhatian !!!
sesuaikan url dengan link project yang kalain buat...


