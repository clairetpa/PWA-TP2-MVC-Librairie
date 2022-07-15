<?php
class ModelGenre extends CRUD {
    protected $table = 'Genre';
    protected $primaryKey = 'idGenre'; 

    public function __construct(){
        parent::__construct();
    }

    public function __destruct(){
    }
}