<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tp2 Claire Pereira Tortajada 2194800| Librairie </title>

    <!-- le lien vers le css -->
    <link rel="stylesheet" type="text/css" href="../styles/styles.css">
    <link rel="stylesheet" type="text/css" href="../../styles/styles.css">
</head>

<body>
    <header>
        <h1 class="hero-title">My favorites books</h1>
    </header>
    <main>
        <div class="livre__editer">
            {% if mode == 'creation'%}
            <a href="../index.php" class="btn">Retour a la liste</a>
            {% else %}
            <a href="../../index.php" class="btn">Retour a la liste</a>
            {% endif %}
        </div>

        <!-- Si il y a l'id on fera une modification sinon c est une creation -->
        {% if mode == 'creation'%}
            <h2>Créer</h2>
            <form method="POST" action="ajouter">
        {% else %}
            <h2>Modifier</h2>
            <form method="POST" action="../save">
                <input type="hidden" name="idLivre" value="{{idLivre}}">
        {% endif %}
                <div class="grid-detail">  
                    <div>
                        <h3>Livre</h3>
                        <div>
                        {% if errors is defined %}
                            <span class="error">{{ errors|raw }}</span>
                        {% endif %}
                        </div>
                        <div class="form">

                            <div class="form-left">
                                <div class="form__item">
                                    <div class="label">Titre:</div>
                                    <div class="input"><input type="text" name="titre" value="{{titre}}" ></div>
                                </div>
                                <div class="form__item flex">
                                    <div class="label">Auteur:</div>
                                    <div class="input flex">
                                        <select name="idAuteur">
                                            <option value="AuteurNotSeleted">Veuillez choisir un auteur</option>
                                            {% for auteur in auteurs %}
                                                <option value="{{auteur.idAuteur}}" {% if idAuteur==auteur.idAuteur %} selected {% endif %}>{{auteur.prenomAuteur}} {{auteur.nomAuteur}}</option>
                                            {% endfor %}
                                        </select>
                                        <a href="../auteur/index" class="btn-small">+</a>
                                    </div>
                                </div>



                                <div class="form__item">
                                    <div class="label">Date:</div>
                                    <div class="input"><input type="text" name="dateParution" placeholder="ex: 2022-05-21" value="{{dateParution}}" ></div>
                                </div>
                                <div class="form__item">
                                    <div class="label">Genre:</div>
                                    <div class="input">
                                        <select name="idGenre">
                                            <option value="GenrerNotSeleted">Veuillez choisir un genre</option>
                                            {% for genre in genres %}
                                                <option value="{{genre.idGenre}}" {% if idGenre==genre.idGenre %} selected {% endif %}>{{genre.genre}}</option>
                                            {% endfor %}
                                        </select>
                                    </div>
                                </div>
                                <div class="spacing"></div>

                                <div class="submit-container">
                                    <!-- si on a l'id on affiche le bouton supprimer -->
                                    <input class="submit" type="submit" value="{{ (mode == 'creation') ? 'Créer' : 'Sauvegarder' }}">
                                    {% if mode != 'creation' %}
                                    <a href="../supprimer/{{idLivre}}" class="supprimer">Supprimer</a>
                                    {% endif%}
                                </div>
                            </div>
                            <div class="form-right">
                                <div class="form__item">
                                    <div class="label">Editeur:</div>
                                    <div class="input flex">
                                        <select name="idEditeur">
                                            <option value="EditeurNotSeleted">Veuillez choisir un éditeur</option>
                                            {% for editeur in editeurs %}
                                                <option value="{{editeur.idEditeur}}" {% if idEditeur==editeur.idEditeur %} selected {% endif %}>{{editeur.nomEditeur}}</option>
                                            {% endfor %}
                                        </select>
                                        <a href="../editeur/index" class="btn-small">+</a>
                                    </div>
                                </div>
                                <div class="form__item">
                                    <div class="label">Résumé:</div>
                                    <div class="input">
                                        <textarea name="resume" rows="12" cols="36"  >{{resume}}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form> 
    </main>
</body>

</html>