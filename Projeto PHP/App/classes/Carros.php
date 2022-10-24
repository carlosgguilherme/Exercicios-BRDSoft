<?php

namespace App\classes;
use App\classes\Crud as Crud;


class Carros extends Crud
{
  public $id;
  public $marca;
  public $modelo;
  public $ano;

    public function __construct()
    {
        parent::__construct();
    }

    Public function Cadastrar($dados){
        $this->id = (new Crud())->insert($dados,'carros');
    }

    public static function  getCarros($where = null, $order = null, $limit = null,  $filds = '*'){
        return( new Crud())->select('carros',$where,$order, $limit, $filds)->fetchall();
    }

    public function ListaCarros($campos = '*' ,$condicao = null){
         $itens = [];
         $totalLinhas = 0;

         $result = self::getCarros($condicao,null,null, $campos);
         //print_r($result);
         //array_push($itens ,$result);
        $totalLinhas = count($result);

        for($i=0;$i<$totalLinhas;$i++){
            //print_r($result[$i]['marca']);
            array_push($itens , [
                'id' =>    $result[$i]['id'],
                'Marca'=>  $result[$i]['marca'],
                'Modelo'=> $result[$i]['modelo'],
                'Ano'=>    $result[$i]['ano']
            ]);
        }

         return $itens;
         //print_r($result);
    }

    Public Function EditaCarro($id,$campos){
        Return(New Crud())->update('carros','id = '.$id,$campos);
    }

    Public Function DeletaCarro($id){
        return(new Crud())->delete('carros', 'id = '.$id);
    }

    public function LimpaTabelaCarros(){
        return(new Crud())->limpaTabela('carros');
    }
}