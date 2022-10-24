<?php

require_once __DIR__.'/vendor/autoload.php';


use App\Classes\Carros;
use App\Classes\Operacoes;

include 'App/includes/header.php';
?>

<hr/>
<p>Com base em uma data digitada pelo usuário
    Exiba separadamente o dia, mes e ano.</p>
<div class="card">
    <div class="card-body">
        <form class="form-inline" method="post">

            <div class="form-group mx-sm-3 mb-2">
                <label for="data" class="sr-only">Data</label>
                <input type="date" class="form-control" id="data" placeholder="data" name="data">
            </div>
            <button type="submit" class="btn btn-primary mb-2">Separar</button>
        </form>
    </div>
</div>
<?php
if(!empty($_POST['data'])){
    $date = new DateTime($_POST['data']);
    $d = $date->format('d');
    $m = $date->format('m');
    $y = $date->format('Y');
    echo $d .', '.$m .', '.$y ;
    echo"<br>";
    echo $d .'-'.$m .'-'.$y ;
    echo"<br>";
    echo $d ;
    echo"<br>";
    echo $m ;
    echo"<br>";
    echo $y ;
    echo"<br>";
}
?>
<hr/>
<p>
    Faça uma página Web que pede duas notas de um aluno. Em seguida ele deve
    calcular a média do aluno e dar o seguinte resultado:
    A mensagem "Aprovado", se a média alcançada for maior ou igual a sete;
    A mensagem "Reprovado", se a média for menor do que sete;
    A mensagem "Aprovado com Distinção", se a média for igual a dez.
</p>
<div class="card">
    <div class="card-body">
        <form class="form-inline" method="post">

            <div class="form-group mx-sm-3 mb-2">
                <label for="nota1" class="sr-only">Nota 1</label>
                <input type="number" class="form-control" id="nota1" placeholder="Nota 1" name="nota1">
            </div>
            <div class="form-group mx-sm-3 mb-2">
                <label for="nota2" class="sr-only">Nota 2</label>
                <input type="number" class="form-control" id="nota2" placeholder="Nota 2" name="nota2">
            </div>
            <button type="submit" class="btn btn-primary mb-2">Média</button>
        </form>
    </div>
</div>
<?php
if(!empty($_POST['nota1'])){

    $nota = new Operacoes;
    $msg = "";
    $tipo = "";
    $result = $nota->media($_POST['nota1'],$_POST['nota2']);
if($result == -1){
   $msg = "Insira uma Nota entre 0 e 10.";
   $tipo = "danger";
}elseif ($result == 1){
    $msg =  "Aprovado com Distinção.";
    $tipo = "success";
}elseif ($result == 2){
    $msg =  "Aprovado.";
    $tipo = "success";
}else{
    $msg =  "Reprovado.";
    $tipo = "danger";
}
?>
    <p></p>
    <div class="<?php echo "alert alert-".$tipo;?>" role="alert">
        <?php echo $msg;?>
    </div>

<?php
}
?>
<hr/>
<p>
Faça um script que leia um número e exiba o dia correspondente da semana.
(1-Domingo, 2- Segunda, etc.), se digitar outro valor deve aparecer valor
inválido.
</p>
<div class="card">
    <div class="card-body">
        <form class="form-inline" method="post">
            <div class="form-group mx-sm-3 mb-2">
                <label for="semana" class="sr-only">Dia da Semana</label>
                <input type="number" class="form-control" id="semana" placeholder="Dia da Semana" name="semana">
            </div>
            <button type="submit" class="btn btn-primary mb-2">Exibir Semana</button>
        </form>
    </div>
</div>
<?php
if(!empty($_POST['semana'])){
    $semana = new Operacoes;
    $msg = "";
    $tipo = "";
    $result = $semana->semana($_POST['semana']);

    if($result == -1 ){
         $msg =  "Valor Inválido.";
         $tipo = "danger";
    }else{
      $msg = $result;
      $tipo = "success";
    }

    ?>
    <p></p>
    <div class="<?php echo "alert alert-".$tipo;?>" role="alert">
        <?php echo $msg;?>
    </div>

<?php
}
?>
<hr/>

<?php
$carro = new Carros;

/*
$dados = [
    "0" => [
        "Marca" => "Fiat",
        "Modelo" => "Uno",
        "Ano" => 2012
    ],
    "1" => [
        "Marca" => "VW",
        "Modelo" => "Gol",
        "Ano" => 1998
    ],
    "2" => [
        "Marca" => "GM",
        "Modelo" => "Onix",
        "Ano" => 2022
    ],
    "3" => [
        "Marca" => "VW",
        "Modelo" => "Fusca",
        "Ano" => 1970
    ],
    "4" => [
        "Marca" => "Fiat",
        "Modelo" => "Strada",
        "Ano" => 2015
    ],
    "5" => [
        "Marca" => "Ford",
        "Modelo" => "Camaro",
        "Ano" => 2002
    ],
    "6" => [
        "Marca" => "VW",
        "Modelo" => "Brasilia",
        "Ano" => 1985
    ],
    "7" => [
        "Marca" => "VW",
        "Modelo" => "Kombi",
        "Ano" => 1978
    ],
    "8" => [
        "Marca" => "VW",
        "Modelo" => "Fusca",
        "Ano" => 1978
    ],
    "9" => [
        "Marca" => "VW",
        "Modelo" => "Fusca",
        "Ano" => 1988
    ]];

$total = count($dados);


//Truncate da tabela
if ($carro->LimpaTabelaCarros()) {
    echo "Tabela truncada com sucesso";
}

//Inseri o Arry na tabela
for ($j = 0; $j < $total; $j++) {
    echo "<pre>";
    //print_r($dados[$j]);
    echo "</pre>";
    //$carros->insert($dados[$j],'carros');
    $carro->Cadastrar($dados[$j]);
}
//Edita tabela
$editCarro = ["modelo" => "Onix"];
//$carro->EditaCarro(3,$editCarro);

//Lista Tabela
echo "<pre>";
print_r($carro->ListaCarros());
echo "</pre>";

//Deleta valor
//if($carro->DeletaCarro(3)){
//echo "Carro deletado com sucesso.";
//}

//Cadastra valor
/*
$carro->Cadastrar([
    "Marca" => "GM",
    "Modelo" => "Onix",
    "Ano" => 2022
]);
*/

?>



<?php
include 'App/includes/footer.php';
?>
