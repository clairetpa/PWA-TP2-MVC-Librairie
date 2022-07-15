<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tp2 Claire Pereira Tortajada 2194800| Librairie </title>

    <!-- le lien vers le css -->
    <link rel="stylesheet" type="text/css" href="styles/styles.css">
</head>

<body>
    <header>
        <h1 class="hero-title">My favorites books</h1>
    </header>
    <main>
        <div class="livre__editer">
            <a href="livre/creer" class="btn">Ajouter un livre</a>
        </div>
        <h2>liste des livres</h2>
        <div class="grid-list">
            {% for livre in livres %}
            <div class="livre">
                <div class="livre__image">
                    <img src="images/generic-cover.jpg" alt="couverture livre">
                </div>
                <div class="livre__detail">
                    <div class="livre__title">{{livre.titre}}</div>
                    <div class="livre__auteur">{{livre.prenomAuteur}} {{livre.nomAuteur}}</div>
                    <div class="livre__annee">{{livre.dateParution}}</div>
                    <div class="livre__editeur">{{livre.nomEditeur}}</div>
                    <div class="livre__genre">{{livre.genre}}</div>
                    <div class="livre__editer">
                        <a href="livre/editer/{{livre.idLivre}}" class="btn">Modifier</a>
                    </div>
                </div>
            </div>
            {% endfor %}
        </div>
    </main>
</body>

</html>