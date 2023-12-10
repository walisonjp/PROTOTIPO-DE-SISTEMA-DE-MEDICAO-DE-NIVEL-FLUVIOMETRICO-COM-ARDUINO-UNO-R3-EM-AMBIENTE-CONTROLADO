<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" href="css/estilo.css">
<title>Sistema de Alerta ao Usuario: Alagamentos e Enchentes</title>
</head>
<body>
<center>
<h1>Sistema de Alerta ao Usuario: Alagamentos e Enchentes</h1>
</center>
<br>
<br>
<center>
<fieldset id="quadro"><br>

<?php

echo "<meta HTTP-EQUIV='refresh' CONTENT='5;URL=index.php'>";


// Conecta na porta
$port = fopen("COM3", "r");
sleep(1);

$inteiro = fgets($port); //Captura o valor da COM3
echo "Centimetro.: " .$inteiro; // Mostra o valor na página web
echo "<br>"; 

fclose($port); //Fecha a conexão com a porta COM3

//Condição para mostrar as informações na página web - Alerta Verde / Amarelo / Vermelho
//Se for menor ou igual a 3 mostrar o sinal verde
if ($inteiro <= 3){
	echo '<img  src="images/sinalverde.png"/>';
	echo "<br>";
	echo "<center><b>Sinal Verde - Altura considerada segura para passagem de veiculos.</b></center>";
}
//Se for igual a 4 mostrar o sinal amarelo
if ($inteiro == 4){
	echo '<img  src="images/sinalamarelo.png"/>';
	echo "<br>";
	echo "<center><b>Sinal Amarelo - Altura considerada não segura para passagem de veiculos.</b></center>";
}
//Se for maior ou igual a 5 mostrar o sinal vermelho
if ($inteiro >= 5) {
	echo '<img  src="images/sinalvermelho.png"/>';
	echo "<br>";
	echo "<center><b>Sinal Vermelho - Trafego de veiculo não permitido. Procure outra rota.</b></center>";
}

if ($inteiro >= 5) {
    //Conexão com o banco de dados
    $connect = mysqli_connect('localhost', 'root', '', 'usuario');

    // Verifica a conexão
    if (!$connect) {
        die("Erro na conexão: " . mysqli_connect_error());
    }

    $consulta = mysqli_query($connect, "SELECT * FROM usuarios GROUP BY email") or die(mysqli_error($connect));

    // Verifica se a consulta retornou resultados
    if (mysqli_num_rows($consulta) > 0) {
        while ($array = mysqli_fetch_assoc($consulta)) {
            $conteudo = "Alerta de Alagamento ou enchente, no cruzamento Teotonio Segurado proximo ao BIG. Sinal Vermelho - Trafego de veiculo não permitado. Procure outra rota.";
            $assunto = "Alerta de Alagamento ou enchente";
            $para = $array['email']; // Receberá os e-mails da consulta do banco de dados
            $email_origem = "walison@wjpconsultoria.com.br";
            $headers  = "MIME-Version: 1.0\r\n";
            $headers .= "Content-type: text/plain; charset=iso-8859-1\r\n";
            $headers .= "From: $email_origem <$email_origem>\r\n";

            if (mail($para, $assunto, $conteudo, $headers)) {
                echo "Enviado com sucesso para " . $para . "<br/>";
            } else {
                echo "Falha ao enviar para " . $para . " =/<br/>";
            }
        }
    } else {
        echo "Nenhum resultado encontrado na consulta.";
    }

    // Fecha a conexão
    mysqli_close($connect);
}

?>

<br>
<br>
Para cadastrar no sistema <a href="cadastro.php" title="clique aqui" target="_blank">clique aqui</a>
</fieldset>

<br>
<br>
<center>
<p id="rodape">Desenvolvido por Walison Justiniano Pinto</p>
</center>
</body>
</html>
