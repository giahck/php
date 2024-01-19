<?php
if (isset($_POST['id']))
    include  __DIR__ . 'delete.php';
if (isset($_POST['joketext']) && isset($_POST['jokedata'])){
    try {
        include '../includes/DC.php';
        include '../includes/DF.php';

        insertL($pdo,'joke',['joketext'=>$_POST['joketext'],'jokedata'=>$_POST['jokedata'],'authorid'=>1]);
        //insertL($pdo,$_POST['joketext'],$_POST['jokedata'],1);
       /* $sql = "INSERT INTO Qrdb.joke SET `joketext`=:joketext,`jokedata`=:jokedata";
        $stmt = $pdo->prepare($sql);

        $stmt->bindValue(':joketext', $_POST['joketext']);
        $stmt->bindValue(':jokedata', $_POST['jokedata']);
        $stmt->execute();*/

        header('location: list.php');
    }catch (PDOException $e) {
        echo $output = 'dont todatabase connection esteibelshet   ',
            $e->getMessage() . '      ' . $e->getFile() . $e->getLine();

        include '../templates/layout.html.php';
    }


}else {
    $list=null;
    ob_start();

    include __DIR__ . '/../templates/add.html.php';

    $output = ob_get_clean();
}
include '../templates/layout.html.php';