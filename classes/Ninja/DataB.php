<?php
namespace Ninja;
class DataB
{
    public $pdo;
    public $table;
    public $primarykey;
    public function __construct(\PDO $pdo,string $table, string $primarykey){
        $this->pdo=$pdo;
        $this->table=$table;
        $this->primarykey=$primarykey;
    }
    private function query($sql,$parm=[]){

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($parm);
        return $stmt;
    }
    public function cTotal($database)
    {
        $query = $database->prepare('SELECT COUNT(*) FROM `joke`');
        $query->execute();

        $row = $query->fetch();

        return $row[0];
    }
    private function upD($arr){
        $sql='UPDATE '.$this->table.' SET ';
        foreach ($arr as $key=>$value)
            $sql .= $key.'=:'.$key.',';
        $sql = rtrim($sql,',');
        $sql .=' WHERE '.$this->primarykey.'=:primarykey';
        $arr['primarykey']=$arr['id'];

        $this->query($sql,$arr);
    }
    public function findbyId($arr){
        $sql='SELECT * FROM '.$this->table.' WHERE '.$this->primarykey.'=:arr';
        $param=['arr'=>$arr];
        $sql=$this->query($sql,$param);
        return $sql->fetch();
    }
    public function find($colum,$arr){
        $sql='SELECT * FROM '.$this->table.' WHERE '.$colum.'=:arr';
        $param=['arr'=>$arr];
        $sql=$this->query($sql,$param);
        return $sql->fetchAll();
    }
    public function findAll(){
        $sql='SELECT * FROM '.$this->table;
        $result=$this->query($sql);
        return $result->fetchAll();
    }
    private function insertL($arr){
        $sql='INSERT INTO `'.$this->table.'` (';
        foreach ($arr as $key => $value)
            $sql .= '`'.$key.'`,';
        $sql=rtrim($sql,',');
        $sql .=') VALUES (';
        foreach ($arr as $key => $value)
            $sql .=':'.$key.',';
        $sql=rtrim($sql,',');
        $sql .=')';
        $this->query($sql,$arr);
    }
    public function delteD($id){
        $param=[':id'=>$id];
        $sql='DELETE FROM '.$this->table.' WHERE '.$this->primarykey.'=:id';
        $this->query($sql,$param);
    }
    public function save($record){
        try {
            if ($record[$this->primarykey] == '') {
                $record[$this->primarykey] = null;
            }
            $this->insertL($record);



        }catch (\PDOException $e){
            var_dump($record);
            $this->upD($record);

        }
    }
}