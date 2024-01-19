<?php

namespace Ijdb\Controller;
use Ninja\DataB;

class Register
{
    private $aTable;
    public function __construct(DataB $aTable)
    {
        $this->aTable=$aTable;
    }
    public function registerForm(){
        return ['template'=>'login.html.php'];
    }
    public function success(){
        return ['template'=>'home.html.php'];
    }
    public function registerUser(){
        $author=$_POST['author'];
        $erorr=[];
        $valid=true;
        if (empty($author['Fname'])||empty($author['Sname'])||empty($author['email'])||empty($author['password']))
        {
            $valid=false;
            $erorr['Fname']='Name cannot be black';
            $erorr['Sname']='Surname cannot be black';
            $erorr['email']='Email cannot be black';
            $erorr['password']='Insert Password';
        }else if (filter_var($author['email'], FILTER_VALIDATE_EMAIL) == false) {
            $valid = false;
            $author['email']=null;
            $erorr['email'] = 'Invalid email address';
        }else if (count($this->aTable->find('email',$author['email']))>0){
            $erorr['email']='that email already registred';
            $author['email']=null;
            $valid=false;
        }
        if ($valid==true){
            $author['password']=password_hash($author['password'],PASSWORD_DEFAULT);
            $author['email']=strtolower($author['email']);
            $author=['email'=>$author['email'],'password'=>$author['password'],'name'=>$author['Fname'].' '.$author['Sname']
                ];
            var_dump($author);
            $this->aTable->save($author);
            header('location: /');
        }else{
            return['template'=>'login.html.php',
                'var'=>[
                    'erorr'=>$erorr,
                    'author'=>$author
                ]
            ];
        }

    }
}