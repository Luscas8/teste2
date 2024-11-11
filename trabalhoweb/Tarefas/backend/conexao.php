<?php   

session_start()
include_once ("db.php");

$usuario = filter_input(INPUT_POST, 'usuario', FILTER_SANITIZE_STRING);
$senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);

echo "usuario: $usuario <br>";
echo "senha: $senha <br>";

$result_usuario = "INSERT INTO usuarios (usuario, senha) VALUES('$usuario', '$senha', NOW());

$resultado_usuario =mysqli_query($conn, $result_usuario);
if(mysqli_insert_id($conn)){
$_SESSION['msg'} = 
header("Location: login.php");
)else(
header("Location: login.php");
}