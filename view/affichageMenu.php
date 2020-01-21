
      <!-- Affichage du menu -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="     Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
    
      <a class="navbar-brand col-md-3 " href="index.php"><em>Billet simple pour l'Alaska </em></a>

    <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
        
          <li class="nav-item">
            <a class="nav-link" href="index.php">Accueil</a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" href="index.php?action=listeChapitres">Chapitres</a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" href="index.php?action=pageRenseignements">Renseignements</a>
          </li>

      <!-- Si une session est ouverte alors on affiche le menu d'un utilisateur -->
  <?php if(isset($_SESSION['id'])) { ?>
      
            <li class="nav-item">
              <a class="nav-link" href="index.php?action=pageProfil">Profil</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="index.php?action=pageDeconnexion">Se deconnecter</a>
            </li>
         
      <!-- Si une session est ouverte et si c'est un admin alors on affiche le menu admin
            <li class="nav-item">
              <a class="nav-link" href="index.php?action=pageAjoutChapitre">Ajouter un chapitre</a>
            </li>  -->
          
      <!-- Sinon on affiche le menu de base -->    
  <?php } else { ?>
            
            <li class="nav-item">
              <a class="nav-link" href="index.php?action=pageInscription">Inscription</a>
            </li>
            
            <li class="nav-item">
              <a class="nav-link" href="index.php?action=pageConnexion">Connexion</a>
            </li> 

            <li class="nav-item">
              <a class="nav-link" href="index.php?action=pageAjoutChapitre">Ajouter un chapitre</a>
            </li> 

  <?php } ?>     
        </ul>
    </div>
</nav>