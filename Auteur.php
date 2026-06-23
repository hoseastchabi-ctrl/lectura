<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Espace Auteur - Lectura</title>
  <link rel="stylesheet" href="CSS/auteur.css">
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
    <section class="author-hero">
      <h1>Espace Auteur</h1>
      <p>Bienvenue dans votre espace personnel, Sidney ASSOGBA</p>
    </section>

    <section class="author-stats">
      <div class="stat-card">
        <i class="fa-solid fa-book"></i>
        <div class="stat-value">5</div>
        <div class="stat-label">Histoires publiées</div>
      </div>
      <div class="stat-card">
        <i class="fa-solid fa-eye"></i>
        <div class="stat-value">1,234</div>
        <div class="stat-label">Lectures totales</div>
      </div>
      <div class="stat-card">
        <i class="fa-solid fa-heart"></i>
        <div class="stat-value">89</div>
        <div class="stat-label">Favoris</div>
      </div>
      <div class="stat-card">
        <i class="fa-solid fa-download"></i>
        <div class="stat-value">45</div>
        <div class="stat-label">Téléchargements</div>
      </div>
    </section>

    <div class="add-story">
      <a href="#" class="btn-add-story"><i class="fa-solid fa-plus"></i> Créer une nouvelle histoire</a>
    </div>

    <section class="stories-list">
      <div class="story-card">
        <div class="story-title">
          <a href="#">Le Mystère de la Tour</a>
        </div>
        <div class="story-meta">
          <span><i class="fa-solid fa-eye"></i> 523 lectures</span>
          <span><i class="fa-solid fa-heart"></i> 45 favoris</span>
          <span><i class="fa-solid fa-download"></i> 12 téléchargements</span>
        </div>
        <div class="story-desc">
          Une enquête palpitante dans les rues de Paris, où chaque indice mène à un nouveau mystère...
        </div>
        <a href="#" class="story-edit"><i class="fa-solid fa-pen"></i> Modifier</a>
      </div>
      <div class="story-card">
        <div class="story-title">
          <a href="#">Les Chemins de l'Espoir</a>
        </div>
        <div class="story-meta">
          <span><i class="fa-solid fa-eye"></i> 342 lectures</span>
          <span><i class="fa-solid fa-heart"></i> 28 favoris</span>
          <span><i class="fa-solid fa-download"></i> 8 téléchargements</span>
        </div>
        <div class="story-desc">
          Une histoire d’amour et de courage dans un monde en reconstruction...
        </div>
        <a href="#" class="story-edit"><i class="fa-solid fa-pen"></i> Modifier</a>
      </div>
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