<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Lectura - Catégories</title>
  <link rel="stylesheet" href="CSS/categories.css">
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
        <a href="index.php">Accueil</a>
        <a href="categories.php">Catégories</a>
        <a href="Explorez.php">Explorez</a>
        <a href="A Propos.php">À propos</a>
        <a href="contact.php">Contact</a>
      </nav>
      <a href="Connexion.php" class="btn-header">Se Déconnecter</a>
    </div>
  </header>

  <section class="hero-categories">
    <h1>Découvrez nos catégories</h1>
    <p>Explorez une sélection d’histoires captivantes pour tous les goûts</p>
  </section>

  <section class="categories">
    <div class="categories-grid">
      <div class="category-card" onclick="window.location.href='histoire_drole.php'" style="cursor:pointer;">
  <i class="fa-regular fa-face-laugh-beam"></i>
  <h3>Histoires drôles</h3>
  <p>Des récits qui te feront rire aux éclats</p>
</div>
      <div class="category-card" onclick="window.location.href='histoire_drole.php'" style="cursor:pointer;">
        <i class="fa-solid fa-heart"></i>
        <h3>Amour</h3>
        <p>Des histoires d’amour touchantes</p>
      </div>
      <div class="category-card" onclick="window.location.href='histoire_drole.php'" style="cursor:pointer;">
        <i class="fa-solid fa-ghost"></i>
        <h3>Horreur</h3>
        <p>Des récits qui te feront frissonner</p>
      </div>
      <div class="category-card" onclick="window.location.href='histoire_drole.php'" style="cursor:pointer;">
        <i class="fa-solid fa-rocket"></i>
        <h3>Science-Fiction</h3>
        <p>Voyagez dans le futur et l’espace</p>
      </div>
      <div class="category-card" onclick="window.location.href='histoire_drole.php'" style="cursor:pointer;">
        <i class="fa-solid fa-dragon"></i>
        <h3>Fantasy</h3>
        <p>Des mondes magiques et enchantés</p>
      </div>
      <div class="category-card" onclick="window.location.href='histoire_drole.php'" style="cursor:pointer;">
        <i class="fa-solid fa-map-marked-alt"></i>
        <h3>Aventure</h3>
        <p>Des explorations palpitantes</p>
      </div>
    </div>
  </section>

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
          <li><a href="#">À propos</a></li>
          <li><a href="#">Contact</a></li>
        </ul>
      </div>
      <div class="footer-col">
        <h3>Catégories</h3>
        <ul>
          <li><a href="#">Humour</a></li>
          <li><a href="#">Romance</a></li>
          <li><a href="#">Horreur</a></li>
          <li><a href="#">Aventure</a></li>
        </ul>
      </div>
      <div class="footer-col">
        <h3>Contactez-nous</h3>
        <ul>
          <li><i class="fa-solid fa-envelope"></i> contact@lectura.com</li>
          <li><i class="fa-solid fa-phone"></i> +33 1 23 45 67 89</li>
          <li><i class="fa-solid fa-location-dot"></i> 123 Rue de la Lecture, Paris</li>
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