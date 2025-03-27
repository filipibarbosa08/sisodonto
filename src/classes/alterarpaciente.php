<?php



require_once '../back-end/classe-paciente.php';


$paciente = new Paciente ();
$nome = addslashes($_POST['nome']);
$foto = '';
$dataNascimento = addslashes($_POST['dataNascimento']);
$dataNascimento = implode('-', array_reverse(explode('/', $dataNascimento)));
$sexo = addslashes($_POST['sexo']);
$cpf = addslashes($_POST['cpf']);
$rg = addslashes($_POST['rg']);
$obs = addslashes($_POST['obs']);
$celular = addslashes($_POST['celular']);
$telefone = addslashes($_POST['telefone']);
$email = addslashes($_POST['email']);
$cep = addslashes($_POST['cep']);
$cidade = addslashes($_POST['cidade']);
$estado = addslashes($_POST['estado']);
$endereco = addslashes($_POST['endereco']);
$numero = addslashes($_POST['numero']);
$complemento = addslashes($_POST['complemento']);
$bairro = addslashes($_POST['bairro']);
$nomeResponsavel = addslashes($_POST['nomeResponsavel']);
$dataResponsavel = addslashes($_POST['dataResponsavel']);
$dataResponsavel = implode('-', array_reverse(explode('/', $dataResponsavel)));
$cpfResponsavel = addslashes($_POST['cpfResponsavel']);
$idConsultorio = 1;
$id = addslashes($_POST['id']);


/* Caso as datas não estiverem preenchidas, 
 * setar váriaveis como nulo para evitar erro no banco de dados.*/

if ($dataNascimento == "") $dataNascimento = null;
if ($dataResponsavel == "") $dataResponsavel = null;


$retornoFuncao =  $paciente->atualizarDados($nome, $foto, $dataNascimento,$sexo,$cpf,$rg,$obs,$celular,$telefone,$email,
  $cep,$cidade,$estado,$endereco,$numero,
  $complemento,$bairro,$nomeResponsavel,$dataResponsavel,
  $cpfResponsavel,$idConsultorio,$id);

  if($retornoFuncao == 1){
    echo "alteração efetuada";
  } else {
    echo $retornoFuncao;
  }

