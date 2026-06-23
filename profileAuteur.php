<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Profil Auteur - Lectura</title>
  <link rel="stylesheet" href="CSS/profileAuteur.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>
<body>
  <header>
    <div class="container nav-container">
      <div class="logo">
        <i class="fa-solid fa-book-open"></i>
        <span>Lectura</span>
      </div>
      <nav>
        <a href="#">Espace auteur</a>
        <a href="#">Profil</a>
      </nav>
      <i class="fa-solid fa-right-from-bracket logout-icon"></i>
    </div>
  </header>

  <main>
    <section class="profile-hero">
      <h1>Profil Auteur</h1>
      <p>Gérez vos informations personnelles et vos paramètres</p>
    </section>

    <section class="profile-card">
      <div class="profile-header">
        <img src="https://randomuser.me/api/portraits/men/33.jpg" alt="Sidney ASSOGBA">
        <div>
          <h2>Sidney ASSOGBA</h2>
          <p class="profile-bio">Auteur passionné de romans policiers et de science-fiction. J’aime créer des histoires qui captivent et inspirent mes lecteurs.</p>
          <div class="profile-stats">
            <div><span>5</span><br>Histoires</div>
            <div><span>1,234</span><br>Lectures</div>
            <div><span>89</span><br>Favoris</div>
            <div><span>45</span><br>Téléchargements</div>
          </div>
          <a href="#" class="btn-edit"><i class="fa-solid fa-pen"></i> Modifier le profil</a>
        </div>
      </div>
    </section>

    <section class="settings-card">
      <h3>Paramètres du compte</h3>
      <form>
        <div class="form-row">
          <div class="form-group">
            <label>Nom complet</label>
            <input type="text" value="Sidney ASSOGBA">
          </div>
          <div class="form-group">
            <label>Email</label>
            <input type="email" value="sidney.assogba@example.com">
          </div>
        </div>
        <div class="form-row">
          <div class="form-group">
            <label>Téléphone</label>
            <input type="text" value="+229 12345678">
          </div>
          <div class="form-group">
            <label>Pays</label>
            <input type="text" value="Bénin">
          </div>
        </div>
        <div class="form-group">
          <label>Bio</label>
          <textarea rows="2">Auteur passionné de romans policiers et de science-fiction. J’aime créer des histoires qui captivent et inspirent mes lecteurs.</textarea>
        </div>
        <div class="form-group">
          <label>Changer la photo de profil</label>
          <input type="file">
        </div>
        <button class="btn-save" type="submit"><i class="fa-solid fa-floppy-disk"></i> Enregistrer les modifications</button>
      </form>
    </section>

    <section class="settings-card">
      <h3>Paramètres de sécurité</h3>
      <form>
        <div class="form-group">
          <label>Mot de passe actuel</label>
          <input type="password">
        </div>
        <div class="form-row">
          <div class="form-group">
            <label>Nouveau mot de passe</label>
            <input type="password">
          </div>
          <div class="form-group">
            <label>Confirmer le nouveau mot de passe</label>
            <input type="password">
          </div>
        </div>
        <button class="btn-save" type="submit"><i class="fa-solid fa-key"></i> Mettre à jour le mot de passe</button>
      </form>
    </section>
  </main>

  <footer>
    <div class="container footer-container">
      <div class="footer-col">
        <h3>Lectura</h3>
        <p>Votre destination pour des histoires captivantes. Découvrez, lisez et partagez vos moments préférés avec notre communauté de passionnés de lecture.</p>
        <div class="footer-socials">
          <a href="#"><i class="fab fa-facebook"></i></a>
          <a href="#"><i class="fab fa-twitter"></i></a>
          <a href="#"><i class="fab fa-instagram"></i></a>
          <a href="#"><i class="fab fa-linkedin"></i></a>
        </div>
      </div>
      <div class="footer-col">
        <h3>Liens Rapides</h3>
        <ul>
          <li><a href="#">Accueil</a></li>
          <li><a href="#">Catégories</a></li>
          <li><a href="#">Favoris</a></li>
          <li><a href="#">Profil</a></li>
          <li><a href="#">Téléchargement</a></li>
        </ul>
      </div>
      <div class="footer-col">
        <h3>Catégories</h3>
        <ul>
          <li><a href="#">Romance</a></li>
          <li><a href="#">Science-Fiction</a></li>
          <li><a href="#">Fantasy</a></li>
          <li><a href="#">Aventure</a></li>
        </ul>
      </div>
      <div class="footer-col">
        <h3>Contactez-nous</h3>
        <ul>
          <li><i class="fa-solid fa-envelope"></i> contact@lectura.com</li>
          <li><i class="fa-solid fa-phone"></i> +229 12345678</li>
          <li><i class="fa-solid fa-location-dot"></i> Parakou quartier Okédama</li>
        </ul>
      </div>
    </div>
    <div class="footer-bottom">
      <span>© 2024 Lectura. Tous droits réservés.</span>
      <a href="#">Mentions légales</a>
      <a href="#">Politique de confidentialité</a>
    </div>
  </footer>
</body>
</html>