<?php
try {
    //include '../includes/DF.php';
    include '../includes/DC.php';
    include '../classes/DataB.php';
    $jTable=new DataB($pdo,'joke','id');
    $autTable=new DataB($pdo,'author','id');

    //$cTotal = cTotal($pdo);

    $result=$jTable->findAll();

    $tJoke=[];
    foreach ($result as $key){
       // $autor=$autTable->findbyId($pdo,'author','id',$key['authorid']);
        $autor=$autTable->findbyId($key['authorid']);
        $tJoke[]=[
            'name'=>$autor['name'],
            'email'=>$autor['email'],
            'id'=>$key['id'],
            'joketext'=>$key['joketext'],
            'jokedata'=>$key['jokedata']
        ];

    }


    /* $tJoke=totList($pdo);
       $sql = "SELECT joke.`id`,jokedata, joketext,`name`,`email` FROM Qrdb.joke INNER JOIN Qrdb.author ON authorid=`author`.`id`";
        //$out=$pdo->exec($sql); exec mi serve per le query di insert e update
        $out = $pdo->query($sql);
        while ($row = $out->fetch()) {//$jokes=[$row['id']=>$row['joketext']];
            $jText[] = $row['joketext'];
            $jData[] = $row['jokedata'];
            $jId[] = $row['id'];
            $jName[] = $row['name'];
            $jEmail[] = $row['email'];
        }*/
    if (isset($tJoke[1])) {
        ob_start();

        include __DIR__ . '/../templates/list.html.php';

        $output = ob_get_clean();
    }else
        header('location: add.php');
} catch (PDOException $e) {
    echo $output = 'dont todatabase connection esteibelshet   ',
        $e->getMessage() . '      ' . $e->getFile() . $e->getLine();

    include '../templates/layout.html.php';
}

 //   echo current($jText).'<br>'.next($jText);

//foreach ($jokes as $x=>$x_val)
  //  echo "key: ".$x." valore=".$x_val;


