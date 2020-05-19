<?php 

//esto es para permitir las consultas externas a nuestro dominio

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');


$email = $_POST["eml"];
$password = $_POST["pssw"];

if (strpos($email, '\'') == false and strpos($password, '\'') == false and !empty($email) and !empty($password)) {
   

$con = mysqli_connect("la direccion de tu mysql server por ejemplo localhost:3306", "tu usuario de la base de datos", "el password de la base de datos", "el nombre de la base de datos");

if (!$con) {
    echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
    echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
    echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
    exit;
}


$sql = "SELECT * FROM usuarios WHERE email='$email' and password='$password'";


if (mysqli_query($con, $sql)) {

$rslt = mysqli_query($con, $sql);

$filas = mysqli_num_rows($rslt);

if ($filas > 0) {
	$fila = mysqli_fetch_row($rslt);

	echo $fila[0];
}else{
	echo "incorrCYC";
}

	
} else {
	echo "Error Por Favor Indica el codigo y contatctate con nosotros". $sql . mysqli_error($con);
}
mysqli_free_result($rslt);
mysqli_close($con);

}else{
	echo "Error Pusiste Comillas En Tu Oracion";
}
?>