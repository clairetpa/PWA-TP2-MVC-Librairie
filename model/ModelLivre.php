<?php
class ModelLivre extends CRUD {
    protected $table = 'Livre';
    protected $primaryKey = 'idLivre'; 
    protected $fillable = ['titre', 'resume', 'dateParution', 'idAuteur', 'idEditeur', 'idGenre'];
    
    public function __construct(){
        parent::__construct();
    }

    /* Avec Jointure */
    public function select($champOrdre = null, $ordre = null){
        $sql= "SELECT * FROM $this->table 
               JOIN Auteur ON Auteur.idAuteur = $this->table.idAuteur 
               JOIN Editeur ON Editeur.idEditeur = $this->table.idEditeur
               JOIN Genre ON Genre.idGenre = $this->table.idGenre";
        $query = $this->query($sql);
        return $query->fetchAll();
    }

    public function __destruct(){
    }
}

?>