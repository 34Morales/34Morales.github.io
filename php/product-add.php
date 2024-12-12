<?php
include "./conexion.php";
$name = $_POST['txtName'];
$fecha = date('Y-m-d');

$file_name = $_FILES['txtFile']['name'];
$temp= explode(".",$file_name);
echo $file_name;
$destino = "../img/productos/";
$new_name = date('Y_m_d_h_i_s').rand(1000,9999).".";
if(move_uploaded_file($_FILES['txtFile']['tmp_name'],$destino.$new_name)){
echo "archivo subido correctamente";
$conn = 
}else{
    echo"nose pudo subir el archivo";
}
?>