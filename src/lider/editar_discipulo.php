﻿<?php
require '../conexao.php';

// Recebe o id do discipulo do discipulo via GET
$idmembro = (isset($_GET['id'])) ? $_GET['id'] : '';

// Valida se existe um id e se ele é numérico
if (!empty($idmembro) && is_numeric($idmembro)):

	// Captura os dados do discipulo solicitado
	$conexao = conexao::getInstance();
	$sql = 'SELECT nome,rg,cpf,data,endereco,numero,complemento,bairro,cep,telefone,celular,estadocivil,naturalidade,grauinstrucao,profissao,email,lider, idmacro,status,grupo FROM cadmembro WHERE idmembro = :idmembro';
	$stm = $conexao->prepare($sql);
	$stm->bindValue(':idmembro', $idmembro);
	$stm->execute();
	$discipulo = $stm->fetch(PDO::FETCH_OBJ);



endif;

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
	<title>Edição de Discípulo</title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/custom.css">
</head>
<body>
<header>
		<nav class="navbar navbar-inverse">
	  		<div class="container-fluid">
		    	<ul class="nav navbar-nav">
		    		<li><a href="lider.php">Home</a></li>
			      	<li><a class="dropdown-toggle" data-toggle="dropdown">Cadastro<span class="caret"></span></a>
					    <ul class="dropdown-menu">
						    <li><a href="lista_membro.php">Membros</a></li>
					     </ul>
			      	</li>
			      	<li><a href="lista_presenca.php">Celulograma</a></li>
			      	<li><a href="estudos.html">Estudos de Celula</a></li>
			      	<li class="dropdown">
			        	<a href="../sair.php">Sair</a>
			      	</li>
		    	</ul>
	  		</div>
		</nav>
	</header>
	<div class='container'>
		<fieldset>
			<legend><h1>Formulário - Edição de Discípulo</h1></legend>
			
			<?php if(empty($discipulo)):?>
				<h3 class="text-center text-danger">Discipulo não encontrado!</h3>
			<?php else: ?>
				<form action="action_discipulo.php" method="post" id='form-contato' enctype='multipart/form-data'>
					
				<div class="form-group col-md-6">
			      <label for="Nome Do Discípulo">Nome Do Discípulo:</label>
			      <input type="text" class="form-control" id="nome" name="nome" value="<?=$discipulo->nome?>">
			      <span class='msg-erro msg-nome'></span>
			    </div>

			    <div class="form-group col-md-3">
					<label for="rg">RG</label>
				      <input type="text" class="form-control" id="rg" maxlength="14" name="rg" value="<?=$discipulo->rg?>" placeholder="Informe o RG">
				      <span class='msg-erro msg-rg'></span>
				</div>

				<div class="form-group col-md-3">
			      <label for="cpf">CPF</label>
				      <input type="text" class="form-control" id="cpf" maxlength="14" name="cpf" value="<?=$discipulo->cpf?>" placeholder="Informe o CPF">
				      <span class='msg-erro msg-cpf'></span>
			    </div>

			    <div class="form-group col-md-3">
				      <label for="data_nascimento">Data de Nascimento</label>
				      <input type="date" class="form-control" id="data" maxlength="10" value="<?=$discipulo->data?>" name="data">
				      <span class='msg-erro msg-data'></span>
				</div>

				<div class="form-group col-md-6">
					<label for="Endereço">Endereço:</label>
				    <input type="Text" class="form-control" id="endereco" name="endereco" value="<?=$discipulo->endereco?>">
				    <span class='msg-erro msg-endereco'></span>
				</div>

				<div class="form-group col-md-3">
					<label for="Numero">Numero:</label>
				    <input type="number" class="form-control" id="numero" name ="numero" value="<?=$discipulo->numero?>">
				    <span class='msg-erro msg-numero'></span>
				</div>

				<div class="form-group col-md-5">
					<label for="Complemento">Complemento:</label>
					<input type="Text" class="form-control" id="complemento" name ="complemento" value="<?=$discipulo->complemento?>">
					<span class='msg-erro msg-complemento'></span>
				</div>

				<div class="form-group col-md-5">
					<label for="Bairro">Bairro:</label>
				    <input type="Text" class="form-control" id="bairro" name ="bairro" value="<?=$discipulo->bairro?>">
				    <span class='msg-erro msg-bairro'></span>
				</div>

				<div class="form-group col-md-2">
					<label for="CEP">CEP:</label>
				    <input type="Text" class="form-control" id="cep" name ="cep" value="<?=$discipulo->cep?>">
				    <span class='msg-erro msg-cep'></span>
				</div>

				<div class="form-group col-md-4">
					<label for="Fone Residencial">Fone Residencial:</label>
				    <input type="Text" class="form-control" id="telefone" name ="telefone" value="<?=$discipulo->telefone?>">
				    <span class='msg-erro msg-telefone'></span>
				</div>
				<div class="form-group col-md-4">
					<label for="Fone Celular">Fone Celular:</label>
				    <input type="Text" class="form-control" id="celular" name ="celular" value="<?=$discipulo->celular?>">
				    <span class='msg-erro msg-celular'></span>
				</div>
				<div class="form-group col-md-4">
				    <label for="Estado Civil">Estado Civil:</label>
				    <input type="Text" class="form-control" id="estadocivil" name ="estadocivil" value="<?=$discipulo->estadocivil?>">
				    <span class='msg-erro msg-estadocivil'></span>
				</div>
				<div class="form-group col-md-6">
				    <label for="Naturalidade">Naturalidade:</label>
				    <input type="Text" class="form-control" id="naturalidade" name ="naturalidade" value="<?=$discipulo->naturalidade?>">
				    <span class='msg-erro msg-naturalidade'></span>
				</div>
				<div class="form-group col-md-6">
				    <label for="Grau de Instrução">Grau de Instrução:</label>
				    <input type="Text" class="form-control" id="grauinstrucao" name ="grauinstrucao" value="<?=$discipulo->grauinstrucao?>">
				    <span class='msg-erro msg-grauinstrucao'></span>
				</div>
				<div class="form-group col-md-4">
				    <label for="Profissão">Profissão:</label>
				    <input type="Text" class="form-control" id="profissao" name ="profissao" value="<?=$discipulo->profissao?>">
				    <span class='msg-erro msg-profissao'></span>
				</div>
			    <div class="form-group col-md-4">
			      <label for="email">E-mail</label>
			      <input type="email" class="form-control" id="email" name="email" value="<?=$discipulo->email?>">
			      <span class='msg-erro msg-email'></span>
			    </div>
			    <div class="form-group col-md-4">
					<label for="codlider">Lider:</label>
						<input type="Text" class="form-control" id="lider" name ="lider" value="<?=$discipulo->lider?>">
			      		<span class='msg-erro msg-email'></span>
				</div>
				<div class="form-group col-md-4">
					<label for="codlider">Macro:</label>
						<input type="Text" class="form-control" id="idmacro" name ="idmacro" value="<?=$discipulo->idmacro?>">
			      		<span class='msg-erro msg-email'></span>
				</div>
			    <div class="form-group col-md-4">
			      <label for="status">Status</label>
			      <select class="form-control" name="status" id="status">
					    <option value="<?=$discipulo->status?>"><?=$discipulo->status?></option>
					    <option value="Ativo">Ativo</option>
					    <option value="Inativo">Inativo</option>
					  </select>
				  <span class='msg-erro msg-status'></span>
			    </div>

			    <div class="form-group col-md-4">
			      <label for="status">Grupo de Investimento</label>
			      <select class="form-control" name="grupo" id="grupo">
				    <option value="<?=$discipulo->grupo?>"><?=$discipulo->grupo?></option>
				    <option value="abordado">Abordado</option>
				    <option value="simpatizante">Simpatizante</option>
				    <option value="comprometido">Comprometido</option>
				  </select>
				  <span class='msg-erro msg-grupo'></span>
			    </div>

				    <input type="hidden" name="acao" value="editar">
				    <input type="hidden" name="idmembro" value="<?=$discipulo->idmembro?>">
				    <button type="submit" class="btn btn-primary" id='botao'> 
				      Gravar
				    </button>
				    <a href='lista_membro.php' class="btn btn-danger">Cancelar</a>
				</form>
				<?php endif; ?>
		</fieldset>

	</div>
	<!-- <script type="text/javascript" src="../js/custom_discipulo.js"></script> -->
</body>
</html>