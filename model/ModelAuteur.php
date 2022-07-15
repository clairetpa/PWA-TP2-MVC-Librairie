<?php
class ModelAuteur extends CRUD {
    protected $table = 'Auteur';
    protected $primaryKey = 'idAuteur';

    public function __construct(){
        parent::__construct();
    }

    public function __destruct(){
    }
}