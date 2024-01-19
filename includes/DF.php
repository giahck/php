<?php
function query($pdo,$sql,$parm=[]){
    $stmt = $pdo->prepare($sql);
    $stmt->execute($parm);
    return $stmt;
}
/*function totList($pdo)
{
    $sql = "SELECT joke.`id`,jokedata, joketext,`name`,`email` FROM Qrdb.joke INNER JOIN Qrdb.author ON authorid=`author`.`id`";
    $querys=query($pdo,$sql);
    return $querys->fetchAll();
}*/
function cTotal($database)
{
    $query = $database->prepare('SELECT COUNT(*) FROM `joke`');
    $query->execute();

    $row = $query->fetch();

    return $row[0];
}
function upD($pdo,$table,$primarykey,$arr){
    $sql='UPDATE '.$table.' SET ';
    foreach ($arr as $key=>$value)
        $sql .= $key.'=:'.$key.',';
    $sql = rtrim($sql,',');
    $sql .=' WHERE '.$primarykey.'=:primarykey';
   $arr['primarykey']=$arr['id'];

    query($pdo,$sql,$arr);
}
/*function upD($pdo,$jText,$jData,$jId,$jAuthor){
      UPDATE joke SET jokeid=:jokeid,joketext=:joketext,jokedata=:jokedata,authorid=:authorid WHERE id:primarykey
$sql="UPDATE Qrdb.joke SET joketext=:joketext, jokedata=:jokedata,authorid=:authorid WHERE `id`=:id";
$param=[':joketext' =>$jText,':jokedata'=>$jData,':authorid'=>$jAuthor,':id'=>$jId];
query($pdo,$sql,$param);
}*/
function findbyId($pdo,$table,$primarykey,$arr){
    $sql='SELECT * FROM '.$table.' WHERE '.$primarykey.'=:arr';
    $param=['arr'=>$arr];
    $sql=query($pdo,$sql,$param);
    return $sql->fetch();
}
function findAll($pdo,$table){
    $sql='SELECT * FROM '.$table;
    $result=query($pdo,$sql);
    return $result->fetchAll();
}
/*function getJ($pdo,$jId){
    $sql=('SELECT * FROM Qrdb.joke where `id`=:id');
    $param=[':id' =>$jId];
    $query=query($pdo,$sql,$param);
    return $query->fetch();
}*/
function insertL($pdo,$table,$arr){
    $sql='INSERT INTO `'.$table.'` (';
    foreach ($arr as $key => $value)
        $sql .= '`'.$key.'`,';
    $sql=rtrim($sql,',');
    $sql .=') VALUES (';
    foreach ($arr as $key => $value)
        $sql .=':'.$key.',';
    $sql=rtrim($sql,',');
    $sql .=')';
    query($pdo,$sql,$arr);
}
/*function insertL($pdo,$jText,$jDate,$j){
    $parm=[':joketext' =>$jText,':jokedata'=>$jDate,':authorid'=>$j];
    $sql = "INSERT INTO Qrdb.joke SET `joketext`=:joketext,`jokedata`=:jokedata, `authorid`=:authorid";
    query($pdo,$sql,$parm);
}*/
function delteD($pdo,$table,$primarykey,$id){
    $param=[':id'=>$id];
    $sql='DELETE FROM '.$table.' WHERE '.$primarykey.'=:id';
    query($pdo,$sql,$param);
}
/*function deleteD($pdo,$id)
{
    $param=[':id'=>$id];
    $sql = "DELETE FROM `joke` WHERE `id` = :id";
    query($pdo,$sql,$param);
}*/
function save($pdo,$table,$primaryKey,$record){
    try {
        if ($record[$primaryKey] == '') {
            $record[$primaryKey] = null;
        }
       insertL($pdo,$table,$record);

    }catch (PDOException $e){
    upD($pdo,$table,$primaryKey,$record);
}
}