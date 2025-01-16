<?php
// Verifica se estamos em produção (Heroku) e utiliza a variável de ambiente
if (getenv("JAWSDB_URL")) {
    // Pega as informações da URL do ClearDB
    $url = parse_url(getenv("JAWSDB_URL"));
    
    $host = $url["host"];
    $dbname = substr($url["path"], 1);
    $user = $url["user"];
    $password = $url["pass"];
} else {
    // Configurações locais (para desenvolvimento)
    $host = 'localhost';
    $dbname = 'alertdashboard';
    $user = 'root';
    $password = '';
}

try {
    // Conecta ao banco de dados
    $db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $user, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
    
    date_default_timezone_set('Europe/Paris');
    
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}
?>
