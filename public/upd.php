<?php
include '../includes/DC.php';
include '../includes/DF.php';

    try {
        if (!isset($_POST['id']) ){

            upD($pdo,'joke','id',['id'=>$_POST['jokeid'],'joketext'=>$_POST['joketext'],'jokedata'=>$_POST['jokedata'],'authorid'=>1]);
            // upD($pdo,$_POST['joketext'],$_POST['jokedata'],$_POST['jokeid'],1);

            header('location: list.php');

        }else {
            $list=findbyId($pdo,'joke','id',$_POST['id']);
           // $list = getJ($pdo, $_POST['id']);
            ob_start();

            include __DIR__ . '/../templates/add.html.php';

            $output = ob_get_clean();
        }
    }catch (PDOException $e) {
        echo $output = 'dont todatabase connection esteibelshet   ',
            $e->getMessage() . '      ' . $e->getFile() . $e->getLine();

        include '../templates/layout.html.php';
    }




    include '../templates/layout.html.php';
