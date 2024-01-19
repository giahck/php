<?php
namespace Ijdb\controller;
use \Ninja\DataB;
class jController{
    private $aTable;
    private $jTable;
    public function __construct(DataB $jTable, DataB $aTable){
        $this->jTable=$jTable;
        $this->aTable=$aTable;
    }
    public function list()
    {
        $result=$this->jTable->findAll();

        $tJoke=[];
        foreach ($result as $key){

            $autor=$this->aTable->findbyId($key['authorid']);
            $tJoke[]=[
                'name'=>$autor['name'],
                'email'=>$autor['email'],
                'id'=>$key['id'],
                'joketext'=>$key['joketext'],
                'jokedata'=>$key['jokedata']
            ];
        }
        if (isset($tJoke[0])) {
            /*ob_start();

            include __DIR__ . '/../templates/list.html.php';

            return ob_get_clean();*/
            return ['template'=>'list.html.php',
                   'var'=>['tJoke'=>$tJoke] ];
        }else
            header('location: /jo/edit');
    }
    public  function delete(){
        $this->jTable->delteD($_POST['idD']);
        header('location: /jo/list');
    }
    public function edit(){
        if (isset($_POST['joke']))            {
                $joke=$_POST['joke'];
                $joke['authorid']=1;
                $this->jTable->save($joke);
                header('location: /jo/list');
            }
            if (isset($_POST['id'])) {
                $list=$this->jTable->findbyId($_POST['id']);
            }
            else
              $list=null;
            return ['template'=>'add.html.php',
                        'var'=>['list'=>$list]];
            /*ob_start();

            include __DIR__ . '/../templates/add.html.php';

             return ob_get_clean();*/

              }
    public function home(){
     /*   ob_start();
    include '../templates/home.html.php';

    return  ob_get_clean();*/
    return ['template'=>'home.html.php'];
    }
}