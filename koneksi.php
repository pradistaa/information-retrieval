<?php

$db = mysqli_connect('localhost','root','','dbir');
if(mysqli_connect_errno()){
	echo 'Gagal melakukan koneksi ke Database : '.mysqli_connect_error();
} 

?>