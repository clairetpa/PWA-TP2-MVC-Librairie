<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tp2 Claire Pereira Tortajada 2194800| Librairie </title>

    <!-- le lien vers le css -->
    <link rel="stylesheet" type="text/css" href="../styles/styles.css">
</head>

<body>
    <header>
        <h1 class="hero-title">My favorites books</h1>
    </header>
    <main>
        <div class="livre__editer">
            <a href="../index.php" class="btn">Retour a la liste</a>
        </div>
        <div class="grid-detail">  
            <div>
                <form method="POST" action="ajouter">
                    <h3>Auteur</h3>
                    <div>
                        {% if errors is defined %}
                            <span class="error">{{ errors|raw }}</span>
                        {% endif %}
                    </div>
                    <div class="form">
                        <div class="form-left">
                            <div class="form__item">
                                <div class="label">Prénom:</div>
                                <div class="input">
                                    <input type="text" name="prenomAuteur" value="">
                                </div>
                            </div>
                        </div>
                        <div class="form-right">
                            <div class="form__item">
                                <div class="label">Nom:</div>
                                <div class="input">
                                    <input type="text" name="nomAuteur" value="" >
                                </div>
                            </div>
                        </div>
                        <div class="submit-container">
                            <!-- si on a l'id on affiche le bouton supprimer -->
                            <input class="submit" type="submit" value="Sauvegarder">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>

</html>