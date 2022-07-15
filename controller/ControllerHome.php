<?php
RequirePage::requireModel('CRUD');
RequirePage::requireModel('Livre');

class ControllerHome{

    public function index(){
        $livre = new ModelLivre();
        $livres = $livre->select();

        return Twig::render('livre-list.php', ['livres' => $livres]);
    }

    public function error(){
        return Twig::render('error.php');
    }
}