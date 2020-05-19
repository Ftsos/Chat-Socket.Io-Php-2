<?php

//esto es para permitir las peticiones externas a nuestro dominio


header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');

//$ip = "localhost:3306";
//$userdb = "root";
//$pass = "";
//$db = "chat-socket-io";

$usuario = $_POST["usero"];
$email = $_POST["email"];
$password = $_POST["pass"];

if (strpos($usuario, '\'') == false and strpos($email, '\'') == false and strpos($password, '\'') == false and !empty($email) and !empty($password) and !empty($usuario)) {
	


$con = mysqli_connect("localhost:3306", "root", "", "chat-socket-io");

if (!$con) {
    echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
    echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
    echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
    exit;
}
	//echo "se pudo conectar a la db";


$sql = "INSERT INTO usuarios (user, email, password) VALUES ('$usuario', '$email', '$password')";
if (mysqli_query($con, $sql)) {
	echo "Tu usuario se registro";
			//echo $usuario
			//echo $email;
			//echo $password;
} else {
	echo "Error Por Favor Indica el codigo y contatctate con nosotros". $sql . mysqli_error($con);
}

mysqli_close($con);
}else{
	echo "Tu Usuario No Se registro debido a que dejaste todo vacio o incluiste una comilla simple o tambien conocida como apostrofe por favor si intentabas una injeccion sql deja de hacerlo POR FAVOR Rellena Todos Los Campos O retira las apostrofes, Gracias";
}
?>