<?php
require_once('sibas-db.class.php');
$link = new SibasDB();

$query="Select 
    ocupacion, codigo, producto, id_ef
from
    s_ocupacion
where
    producto = 'DE';";
$consult = $link->query($query,MYSQLI_STORE_RESULT);

$vec_dt = array();
$query2="Select 
		id_ocupacion, producto, id_ef
	from
		s_ocupacion
	where
		producto = 'TRD';";
$result = $link->query($query2,MYSQLI_STORE_RESULT);
$j=1;
while($row2 = $result->fetch_array(MYSQLI_ASSOC)){
	$vec_dt[$j] = $row2['id_ocupacion'];
	$j++;
}

$c=1;
while($row = $consult->fetch_array(MYSQLI_ASSOC)){
	//generamos un idusuario unico encriptado
    $prefijo = '@S#1$2015';
    $id_unico = '';
    $id_unico = uniqid($prefijo,true);
	
	if(empty($vec_dt[$c])){ $vec_dt[$c]=''; }
	$query3="Select 
		id_ocupacion, ocupacion, codigo, producto, id_ef
	from
		s_ocupacion
	where
		producto = 'TRD' and id_ocupacion='".$vec_dt[$c]."';";
	
	$result3 = $link->query($query3,MYSQLI_STORE_RESULT);
	if($result3->num_rows>0){
		$query_dat="Update s_ocupacion Set ocupacion = '".$row['ocupacion']."', codigo='".$row['codigo']."' where id_ocupacion = '".$vec_dt[$c]."';";
	}else{
		$query_dat="INSERT INTO s_ocupacion(id_ocupacion, ocupacion, codigo, producto, id_ef) "
				    ."VALUES('".$id_unico."', '".$row['ocupacion']."', '".$row['codigo']."', 'TRD', '".$row['id_ef']."')";
	}
	if($link->query($query_dat) === true){
		echo 'proceso correcto <br>';
	}else{
		echo 'error! no se proceso <br>';
	}
	$c++;
}
?>