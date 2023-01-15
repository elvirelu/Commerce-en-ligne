<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Etui Papeterie</title>
    <link rel="stylesheet" href="client/utilitaires/bootstrap-5.3.0-alpha1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="client/css/style.css">
    <script src="client/utilitaires/jquery-3.6.3.min.js"></script>
    <script src="client/utilitaires/bootstrap-5.3.0-alpha1-dist/js/bootstrap.min.js"></script>
    <script src="client/js/global.js"></script>
</head>
<body>

<nav class="navbar navbar-expand-lg border">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="client/images/logo.png" class="logo" alt="logo">
          </a>
        <a class="navbar-brand" href="#"><h3>Papeterie Laura</h3></a>

        <form class="d-flex col-md-5" role="search">
            <input class="form-control" type="search" placeholder="Rechercher Produit" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Rechercher</button>
        </form>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
        <li class="nav-item">                
            <a class="nav-link link-dark" href="#" data-bs-toggle="modal" data-bs-target="#modalEnregistrer">Devenir Membre</a>
        </li>
        <li class="nav-item">              
            <a class="nav-link link-dark" href="#" data-bs-toggle="modal" data-bs-target="#modalConnexion">Connexion</a>
        </li>
        <li class="nav-item">
            <a class="nav-link link-dark" href="#">Contactez nous</a>
        </li>
        </ul>
        </div>
    </div>
</nav>

<!-- Modal enregistrer -->       
        <!-- Modal -->
        <div class="modal fade" id="modalEnregistrer" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Devenir Membre</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="row g-3" action="serveur/membres/enregistrerMembre.php" method="POST" onSubmit="return validerFormEnreg();">
                            <div class="col-md-6">
                                <label for="nom" class="form-label">Nom</label>
                                <input type="text" class="form-control is-valid" id="nom" name="nom" required>
                            </div>
                            <div class="col-md-6">
                                <label for="prenom" class="form-label">Prénom</label>
                                <input type="text" class="form-control is-valid" id="prenom" name="prenom" required>
                            </div>
                            <div class="col-md-12">
                                <label for="courriel" class="form-label">Courriel</label>
                                <input type="email" class="form-control is-valid" id="courriel" name="courriel" required>
                            </div>
                            
                            <div class="col-md-12">
                                <label for="motdepass" class="form-label">Mot de pass<br><span class="fw-light">(entre 8 et 10 caractères 
                                    qui incluent des lettres minuscules, majuscules, des chiffres et les caractères specials)</span></label>
                                <input type="password" class="form-control is-valid" id="motdepass" name="motdepass" required>
                            </div>
                            <span id="msgErrEnregm"></span>

                            <div class="col-md-12">
                                <label for="motdepass" class="form-label">Confirmer Mot de pass</label>
                                <input type="password" class="form-control is-valid" id="motdepassc" name="motdepassc" required>
                            </div>
                            <span id="msgErrEnregc"></span>

                            <div class="col-md-12">
                                <label for="daten" class="form-label">Date de Naissance</label>
                                <input type="date" class="form-control is-valid" id="daten" name="daten" required>
                            </div>

                            <div class="form-check">
                            <input class="form-check-input" type="radio" name="sexe" value="H" checked>
                            <label class="form-check-label" for="H">
                                Homme
                            </label>
                            </div>
                            <div class="form-check">
                            <input class="form-check-input" type="radio" name="sexe" value="F">
                            <label class="form-check-label" for="F">
                                Femme
                            </label>
                            </div>
                            <br/>
                            <div class="col-6">
                                <button class="btn btn-primary" type="submit">Enregistrer</button>
                            </div>
                            <div class="col-6">
                                <button class="btn btn-danger" type="reset">Vider</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <!-- Fin modal enregistrer -->

    <!-- Modal connexion -->       
        <!-- Modal -->
        <div class="modal fade" id="modalConnexion" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="ModalLabel">Connexion</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="row g-3" action="serveur/membres/connexion.php" method="POST" onSubmit="return validerFormCon();">

                            <div class="col-md-12">
                                <label for="courrielcon" class="form-label">Courriel</label>
                                <input type="email" class="form-control is-valid" id="courrielcon" name="courrielcon" required>
                            </div>
                            
                            <div class="col-md-12">
                                <label for="motdepasscon" class="form-label">Mot de pass</label>
                                <input type="password" class="form-control is-valid" id="motdepasscon" name="motdepasscon" required>
                            </div>
                            <span id="msgErrCon"></span>

                            <br/>
                            <div class="col-6">
                                <button class="btn btn-primary" type="submit">Connecter</button>
                            </div>
                            <div class="col-6">
                                <button class="btn btn-danger" type="reset">Vider</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <!-- Fin modal connexion -->

<div class="container">
    <img src="client/images/stationary.jpg" class="d-block w-100" alt="bg-logo"><br/>
    <h4>Magasinez Par Categorie</h4><br/>
    <div class="row">
        <div class="card border-0" style="width: 15rem;">
        <img src="client/images/equipment.png" class="card-img-top" alt="...">
        <div class="card-body">
            <p class="card-text">Équipement d'affaires</p>
        </div>
        </div>

        <div class="col-md-1"></div>
        <div class="card border-0" style="width: 19rem;">
        <img src="client/images/office.png" class="card-img-top" alt="...">
        <div class="card-body">
            <p class="card-text">Fournitures de bureau</p>
        </div>
        </div>

        <div class="col-md-1"></div>
        <div class="card border-0" style="width: 15rem;">
        <img src="client/images/school.png" class="card-img-top" alt="...">
        <div class="card-body">
            <p class="card-text">Fournitures scolaires</p>
        </div>
        </div>
    </div>
</div>
<br/>

<div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
    © 2023 Copyright:
    <a class="text-reset fw-bold" href="#">Papeterie Laura</a>
  </div>

</body>
</html>