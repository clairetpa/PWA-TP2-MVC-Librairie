<?php
class ModelEditeur extends CRUD {
    protected $table = 'Editeur';
    protected $primaryKey = 'idEditeur'; 

    public function __construct(){
        parent::__construct();
    }

    public function __destruct(){
    }
}