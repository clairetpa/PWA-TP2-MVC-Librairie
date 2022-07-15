<?php
RequirePage::requireModel('CRUD');
RequirePage::requireModel('Genre');
RequirePage::requireModel('Auteur');
RequirePage::requireModel('Editeur');
RequirePage::requireModel('Livre');
RequirePage::requireLibrary('Validation');

class ControllerLivre {

    public function creer(){

        $modelGenre = new ModelGenre();
        $genres = $modelGenre->select();

        $modelAuteur = new ModelAuteur();
        $auteurs = $modelAuteur->select();

        $modelEditeur = new ModelEditeur();
        $editeurs = $modelEditeur->select();

        return Twig::render('livre.php', 
                            ['mode' => 'creation',
                            'titre'=>'',
                            'dateParution'=>'', 
                            'resume'=>'',
                            'genres'=> $genres,
                            'auteurs' => $auteurs,
                            'editeurs' => $editeurs]);
    }

    public function ajouter(){
        /* Validation */
        $validation = new Validation();
        extract($_POST);
        $validation->name('titre')->value($titre)->required()->max(200);
        $validation->name('dateParution')->value($dateParution)->pattern('date_ymd')->required()->max(200);
        $validation->name('idAuteur')->value($idAuteur)->pattern('int')->required();
        $validation->name('idGenre')->value($idGenre)->pattern('int')->required();
        $validation->name('idEditeur')->value($idEditeur)->pattern('int')->required();
        $validation->name('resume')->value($resume)->required()->max(2000);

        /*Si la validation est un succes on enregistre le livre dans la base de données
        et on redirige vers la page d'accueil */
        if($validation->isSuccess()){
            $modelLivre = new ModelLivre();
            $modelLivre->insert($_POST);
            RequirePage::redirect('../index.php'); 
        }else{
            /* gestion des erreurs de validation */
            $modelGenre = new ModelGenre();
            $genres = $modelGenre->select();
            $modelAuteur = new ModelAuteur();
            $auteurs = $modelAuteur->select();
            $modelEditeur = new ModelEditeur();
            $editeurs = $modelEditeur->select();
            return Twig::render('livre.php', 
                            ['mode' => 'creation',
                            'titre'=>$titre,
                            'dateParution'=>$dateParution, 
                            'resume'=>$resume,
                            'genres'=> $genres,
                            'auteurs' => $auteurs,
                            'editeurs' => $editeurs,
                            'errors' => $validation->displayErrors()]);
        }
    }

    /* Editer un Livre */
    public function editer($livreId){
        $modelGenre = new ModelGenre();
        $genres = $modelGenre->select();

        $modelAuteur = new ModelAuteur();
        $auteurs = $modelAuteur->select();

        $modelEditeur = new ModelEditeur();
        $editeurs = $modelEditeur->select();

        $modelLivre = new ModelLivre();
        $livre = $modelLivre->selectId($livreId);

        return Twig::render('livre.php', 
                            ['mode' => 'edition',
                            'idLivre' => $livre['idLivre'],
                            'titre'=> $livre['titre'],
                            'dateParution'=>$livre['dateParution'], 
                            'resume'=>$livre['resume'],
                            'idAuteur'=>$livre['idAuteur'],
                            'idGenre'=>$livre['idGenre'],
                            'idEditeur'=>$livre['idEditeur'],
                            'genres'=> $genres,
                            'auteurs' => $auteurs,
                            'editeurs' => $editeurs]);
    }


    public function save(){
        /* Validation */
        $validation = new Validation();
        extract($_POST);
        $validation->name('titre')->value($titre)->required()->max(200);
        $validation->name('dateParution')->value($dateParution)->pattern('date_ymd')->required()->max(200);
        $validation->name('idAuteur')->value($idAuteur)->pattern('int')->required();
        $validation->name('idGenre')->value($idGenre)->pattern('int')->required();
        $validation->name('idEditeur')->value($idEditeur)->pattern('int')->required();
        $validation->name('resume')->value($resume)->required()->max(2000);

        /*Si la validation est un succes on enregistre le livre dans la base de données
        et on redirige vers la page d'accueil */
        if($validation->isSuccess()){
            $modelLivre = new ModelLivre();
            $modelLivre->update($_POST);
            RequirePage::redirect('../index.php'); 
        }else{
            /* gestion des erreurs de validation */
            $modelGenre = new ModelGenre();
            $genres = $modelGenre->select();
            $modelAuteur = new ModelAuteur();
            $auteurs = $modelAuteur->select();
            $modelEditeur = new ModelEditeur();
            $editeurs = $modelEditeur->select();
            return Twig::render('livre.php', 
                            ['mode' => 'creation',
                            'titre'=>$titre,
                            'dateParution'=>$dateParution, 
                            'resume'=>$resume,
                            'genres'=> $genres,
                            'auteurs' => $auteurs,
                            'editeurs' => $editeurs,
                            'errors' => $validation->displayErrors()]);
        }
    }

    /* Supprimer un livre */
    public function supprimer($livreId){
        $modelLivre = new ModelLivre();
        $modelLivre->delete($livreId);
        RequirePage::redirect('../../index.php'); 
    }
}