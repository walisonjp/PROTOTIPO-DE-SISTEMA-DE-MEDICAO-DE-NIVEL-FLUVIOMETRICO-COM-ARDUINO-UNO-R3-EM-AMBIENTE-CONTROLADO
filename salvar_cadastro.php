<?php
$nome = $_POST["nome"];
$email = $_POST["email"];
$sexo = $_POST["sexo"];
$ddd = $_POST["ddd"];
$telefone = $_POST["telefone"];

// Conex�o com o banco de dados usando MySQLi
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'usuario';

$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conex�o
if ($conn->connect_error) {
    die("Erro na conex�o: " . $conn->connect_error);
}

// Prepara a consulta SQL
$query = "INSERT INTO usuarios (nome, email, sexo, ddd, telefone) VALUES ('$nome', '$email', '$sexo', '$ddd', '$telefone')";

// Executa a consulta
if ($conn->query($query) === TRUE) {
    echo "<script language='javascript' type='text/javascript'>alert('Usu�rio cadastrado com sucesso!');window.location.href='index.php'</script>";
} else {
    echo "<script language='javascript' type='text/javascript'>alert('N�o foi poss�vel cadastrar esse usu�rio');window.location.href='index.php'</script>";
}

// Fecha a conex�o
$conn->close();
?>
