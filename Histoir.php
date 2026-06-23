<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Créer une nouvelle histoire - Lectura</title>
  <link rel="stylesheet" href="CSS/histoire.css">
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
    <section class="create-hero">
      <h1>Créer une nouvelle histoire</h1>
      <p>Partagez votre créativité avec notre communauté de lecteurs</p>
    </section>

    <section class="create-form-card">
      <form>
        <div class="form-group">
          <label for="titre">Titre de l’histoire</label>
          <input type="text" id="titre" placeholder="Entrez le titre de votre histoire">
        </div>
        <div class="form-group">
          <label for="categorie">Catégorie</label>
          <select id="categorie">
            <option>Sélectionnez une catégorie</option>
            <option>Romance</option>
            <option>Science-Fiction</option>
            <option>Fantasy</option>
            <option>Mystère</option>
            <option>Aventure</option>
            <option>Historique</option>
          </select>
        </div>
        <div class="form-group">
          <label for="contenu">Contenu de l’histoire</label>
          <textarea id="contenu" rows="7" placeholder="Collez votre texte ici..."></textarea>
        </div>
        <div class="form-group">
          <label for="image">Image de couverture</label>
          <input type="file" id="image">
        </div>
        <div class="form-actions">
          <button type="submit" class="btn-publish"><i class="fa-solid fa-paper-plane"></i> Publier l’histoire</button>
          <button type="button" class="btn-cancel"><i class="fa-solid fa-xmark"></i> Annuler</button>
        </div>
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