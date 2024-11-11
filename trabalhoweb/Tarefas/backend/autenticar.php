<?php
// Configurações do banco de dados
$host = 'localhost';
$dbname = 'trabalhoweb';
$username = 'root';
$password = '';

try {
    // Conexão com o banco de dados
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Coleta as informações de login do formulário
    $usuario = $_POST['username'];
    $senha = $_POST['password'];

    // Consulta o usuário no banco de dados
    $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE username = :username");
    $stmt->bindParam(':username', $usuario);
    $stmt->execute();

    // Verifica se o usuário foi encontrado
    if ($stmt->rowCount() > 0) {
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Verifica a senha
        if (md5($senha) === $user['senha_hash']) {
            echo "Login bem-sucedido! Bem-vindo, " . htmlspecialchars($user['username']) . "!";
        } else {
            echo "Senha incorreta!";
        }
    } else {
        echo "Usuário não encontrado!";
    }
} catch (PDOException $e) {
    echo "Erro de conexão: " . $e->getMessage();
}
?>
