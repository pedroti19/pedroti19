<?php
if($_SERVER['REQUEST_METHOD'] == 'POST') {
	
$mysqli_connection = new MySQLi('localhost', 'root', '', 'injection');
if($mysqli_connection->connect_error){
   echo "Desconectado! Erro: " . $mysqli_connection->connect_error;
}else{
   echo "Conectado!";
}

	
	$usuario = $_POST['usuario'];
	$senha = md5($_POST['senha']);
	$query = "select usuario, senha from usuario where usuario='$usuario' and senha='$senha'";
	//$result = mysql_query($query);
	//$rows = mysql_fetch_array($result);


$result = mysqli_query($mysqli_connection, $query) or die(mysqli_error($mysqli_connection));



	$rows = mysqli_fetch_array($result);



	if($rows) {
		echo "Logado com sucesso";
	}
	else {
		echo "Nao logou. Tente novamente.";
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Demonstrando Injection </title>
</head>
<body>
<form action="login.php" method="POST">
  <h2>Demonstrando SQL Injection - Canal TI</h2><br>
  Usuario:<br>
  <input type="text" name="usuario"><br><br>
  Senha:<br>
  <input type="text" name="senha"><br><br>
  <input type="submit" value="Logar">
</form>
</body>
</html>