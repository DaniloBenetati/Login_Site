<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<title>Projeto Login</title>
	<link rel="stylesheet" href="CSS/estilo.css">
</head>
<body>
<div id="corpo-form">
	<h1>Entrar</h1>
	<form method="POST">
		<input type="email" name="email" placeholder="Usuário">
		<input type="password" name="senha" placeholder="Senha">
		<input type="submit" value="ACESSAR">
		<a href="cadastrar.php">Ainda não é inscrito? <strong>Cadastre-se!</strong></a>
	</form>
</div>
<?php
if(isset($_POST['email']))
{
	$email = addslashes($_POST['email']);
	$senha = addslashes($_POST['senha']);
	
	if(!empty($email) && !empty($senha))
	{
		$u->conectar("sistema","localhost","root","");
		if($u->msgErro == "") //  não houve erro
		{
			if($u->logar($email,$senha))
			{
				header("location: areaPrivada.php");
			}
			else
			{
				echo '<div class="msg-erro">Email e/ou senha estão incorretos!</div>';			
			}
		}
		else
		{
			?>
			<div class="msg-erro">
				<?php echo "Erro: ".$u->msgErro;?>
			</div>
			<?php
		}	
	}
	else
	{
		echo '<div class="msg-erro">Preencha todos os campos!</div>';		
	}
}

?>
</body>