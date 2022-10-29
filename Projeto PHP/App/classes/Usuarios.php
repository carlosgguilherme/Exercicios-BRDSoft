<?php

namespace App\classes;
use App\classes\Crud as Crud;


class Usuarios extends Crud
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
        $this->id = (new Crud())->insert($dados,'usuario');
    }

    public static function  getUsuarios($where = null, $order = null, $limit = null,  $filds = '*'){
        return( new Crud())->select('usuarios',$where,$order, $limit, $filds)->fetchall();
    }

    public function ListaUsuarios($campos = '*' ,$condicao = null){
         $itens = [];
        /* $totalLinhas = 0;*/

         $result = self::getUsuarios($condicao,null,null, $campos);
         //print_r($result);
         //array_push($itens ,$result);
        /*$totalLinhas = count($result);*/

        /*for($i=0;$i<$totalLinhas;$i++){
            //print_r($result[$i]['marca']);
            array_push($itens , [
                'id' =>    $result[$i]['id'],
                'nome'=>  $result[$i]['nome'],
                'email'=> $result[$i]['email'],
                'telefone'=>    $result[$i]['telefone']
                
            ]);
        }*/
        foreach($result as $value){
           
            array_push($itens, [$value["id"], $value["nome"], $value["email"], $value["telefone"]]);
            
            
        }
            
         return $itens;
         
    }

    Public Function EditaCarro($id,$campos){
        Return(New Crud())->update('usuarios','id = '.$id,$campos);
    }

    Public Function DeletaCarro($id){
        return(new Crud())->delete('usuarios', 'id = '.$id);
    }

    public function LimpaTabelaUsuarios(){
        return(new Crud())->limpaTabela('usuarios');
    }
}