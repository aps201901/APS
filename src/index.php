<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Igreja Caminho Pleno</title>
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/signin.css" rel="stylesheet">
    <script src="js/ie-emulation-modes-warning.js"></script>
  </head>
  <body>

    <div class="container">
<form class="form-signin" action="validar.php" method="post">
	<h2 class="form-signin-heading">Área Restrita</h2>
	<label for="inputEmail" class="sr-only">Email</label>
	<input type="text" name="email" id="inputEmail" class="form-control" placeholder="E-mail" required autofocus>
	<label for="inputPassword" class="sr-only">Senha</label>
	<input type="password" name="senha" id="inputPassword" class="form-control" placeholder="Senha" required>
	<button class="btn btn-lg btn-danger btn-block" type="submit">Acessar</button>
	
</form>
<p class="text-center text-danger">
			<?php if(isset($_SESSION['loginErro'])){
				echo $_SESSION['loginErro'];
				unset($_SESSION['loginErro']);
			}?>
		</p>
		<p class="text-center text-success">
			<?php 
			if(isset($_SESSION['logindeslogado'])){
				echo $_SESSION['logindeslogado'];
				unset($_SESSION['logindeslogado']);
			}
			?>
		</p>
    </div> <!-- /container -->

     <script src="js/ie10-viewport-bug-workaround.js"></script>
	</body>
</html>