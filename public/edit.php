<?php
//include '../includes/DF.php';
include '../includes/DC.php';
include '../classes/DataB.php';
$jTable=new DataB($pdo,'joke','id');

try {
        if (isset($_POST['joke']))
        {
            $joke=$_POST['joke'];
            $joke['authorid']=1;

            $jTable->save($joke);
            header('location: list.php');
        }

        if (isset($_POST['id'])) {
            $list=$jTable->findbyId($_POST['id']);
        }
        else
            $list=null;
        ob_start();

        include __DIR__ . '/../templates/add.html.php';

        $output = ob_get_clean();

}catch (PDOException $e) {
    echo $output = 'dont todatabase connection esteibelshet   ',
        $e->getMessage() . '      ' . $e->getFile() . $e->getLine();

    include '../templates/layout.html.php';
}




include '../templates/layout.html.php';