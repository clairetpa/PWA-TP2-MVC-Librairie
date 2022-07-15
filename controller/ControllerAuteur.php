<?php
RequirePage::requireModel('CRUD');
RequirePage::requireModel('Auteur');
RequirePage::requireLibrary('Validation');

class ControllerAuteur {


    public function index(){
        return Twig::render('auteur.php', 
                            []);
    }

    public function ajouter(){
        /* Validation */
        $validation = new Validation();
        extract($_POST);
        $validation->name('prenomAuteur')->value($prenomAuteur)->pattern('words')->required()->max(50);
        $validation->name('nomAuteur')->value($nomAuteur)->pattern('words')->required()->max(50);

        /*Si la validation est un succes on enregistre l'auteur dans la base de données
        et on redirige vers la page d'accueil */
        if($validation->isSuccess()){
            $modelAuteur = new ModelAuteur();
            $modelAuteur->insert($_POST);
            RequirePage::redirect('../index.php'); 
        }else{
            /* gestion des erreurs de validation */
            return Twig::render('auteur.php', 
                            ['errors' => $validation->displayErrors()]);
        }
    }

}