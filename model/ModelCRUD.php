<?php

abstract class CRUD extends PDO {

    public function __construct(){
        parent::__construct("mysql:host=localhost;dbname=librairie;charset=utf8", "root", "");
    }

    public function insert($data){

        $nomChamp = implode(", ",array_keys($data));
        $valeurChamp = ":".implode(", :", array_keys($data));

        $sql ="INSERT INTO $this->table ($nomChamp) VALUES ($valeurChamp)";

        $query = $this->prepare($sql);
        foreach($data as $key=>$value){
            $query->bindValue(":$key", $value);
        }
        if(!$query->execute()){
            print_r($query->errorInfo());
            return $query->errorInfo();
        }else{
            return $this->lastInsertId();
        }
    }

    public function select($champOrdre = null, $ordre = null){
        if($champOrdre == null){
            $sql= "SELECT * FROM $this->table";
        }else{
            $sql = "SELECT * FROM $table ORDER BY $champOrdre $ordre";
        }
        $query = $this->query($sql);
        return $query->fetchAll();
    }

    public function selectId($id){
        $sql = "SELECT * FROM $this->table WHERE $this->primaryKey = :$this->primaryKey";
        $query = $this->prepare($sql);
        $query->bindValue(":$this->primaryKey", $id);
        $query->execute();
        return $query->fetch();
    }

    public function update($data){
        print_r($data);
        $id = $data[$this->primaryKey];
        $data_keys = array_fill_keys($this->fillable, '');
        $data = array_intersect_key($data, $data_keys);
   
        $champRequete = null;
        foreach($data as $key=>$value){
            $champRequete .=$key."=:".$key.", ";
        }
        $champRequete = rtrim($champRequete, ", ");
        $sql = "UPDATE $this->table SET $champRequete WHERE $this->primaryKey = :$this->primaryKey;commit;";

        
        $data[$this->primaryKey] = $id;

        $query= $this->prepare($sql);
        foreach($data as $key=>$value){
            $query->bindValue(":$key", $value);
        }
        print_r($query);
        if(!$query->execute()){
            print_r($query->errorInfo());
        }else{
            return $id;
        }
    }

    public function delete($id){
        $sql = "DELETE FROM $this->table WHERE $this->primaryKey = :id";
        $query = $this->prepare($sql);
        $query->bindValue(":id", $id);
        if(!$query->execute()){
            print_r($query->errorInfo());
        }
    }
}
?>