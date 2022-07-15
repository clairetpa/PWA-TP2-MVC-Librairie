<?php
RequirePage::requireModel('CRUD');
RequirePage::requireModel('Editeur');
RequirePage::requireLibrary('Validation');

class ControllerEditeur {


    public function index(){
        return Twig::render('editeur.php', 
                            []);
    }

    public function ajouter(){
        /* Validation */
        $validation = new Validation();
        extract($_POST);
        $validation->name('nomEditeur')->value($nomEditeur)->pattern('words')->required()->max(50);

        /*Si la validation est un succes on enregistre l'editeur dans la base de données
        et on redirige vers la page d'accueil */
        if($validation->isSuccess()){
            $modelEditeur = new ModelEditeur();
            $modelEditeur->insert($_POST);
            RequirePage::redirect('../index.php'); 
        }else{
            /* gestion des erreurs de validation */
            return Twig::render('editeur.php', 
                            ['errors' => $validation->displayErrors()]);
        }
    }

}