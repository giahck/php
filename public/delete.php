<?php
try {
    //include '../includes/DF.php';
    include '../includes/DC.php';
    include '../classes/DataB.php';
    $jTable=new DataB($pdo,'joke','id');
    $jTable->delteD($_POST['id']);
    //delteD($pdo,'joke','id',$_POST['id']);
    //deleteD($pdo,$_POST['id']);
   /* $sql = "DELETE FROM `joke` WHERE `id` = :id";
    $stmt = $pdo->prepare($sql);

    $stmt->bindValue(':id', $_POST['id']);
    $stmt->execute();*/

    header('location: list.php');
}catch (PDOException $e) {
    echo $output = 'dont todatabase connection esteibelshet   ',
        $e->getMessage() . '      ' . $e->getFile() . $e->getLine();

    include '../templates/layout.html.php';
}



