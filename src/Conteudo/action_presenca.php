<?php 
require '../conexao.php';

$presencas = array();


// Inicia a variável
$cadastrados = 0;



// Para cada elemento de $usuários, faça:
foreach ($presencas as $presenca) {
  $nome = $presenca['nome'];
 
  $datapresenca = $presenca['dtpresenca'];
  $presencadiscipulo = $presenca['presenca'];

  // Monta a consulta
  $sql = "INSERT INTO `cadcelulograma` (`membro_Idmembro`,  `datacelula`, `presencadiscipulo`) VALUES  VALUES 
  					   ('{$membro_Idmembro}', '{$datapresenca}', '{$presencadiscipulo}')";

  // Executa a consulta verificando se foi inserido com sucesso
  if (mysql_query($sql)) {
    // Incrementa o contador
    $cadastrados++;
  }
}
echo 'Presenças cadastradas: ' . $cadastrados;

 ?>