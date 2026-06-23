<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Lectura - Tableau de bord</title>
  <link rel="stylesheet" href="CSS/dashboard.css">
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
        <a href="index.html">Accueil</a>
        <a href="categories.html">Catégories</a>
        <a href="#">Favoris</a>
        <a href="Profile.html">Profil</a>
      </nav>
      <i class="fa-solid fa-right-from-bracket logout-icon"></i>
    </div>
  </header>

  <main>
    <section class="hero-banner">
      <img src="https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=800&q=80" alt="Bannière" />
      <div class="hero-banner-text">
        <i class="fa-solid fa-ghost"></i> Frissonne avec nos histoires
        <br>
        <a href="#" class="btn-ghost"><i class="fa-solid fa-book"></i> Plonger dans l'horreur</a>
      </div>
    </section>

    <div class="search-bar">
      <input type="text" placeholder="Rechercher un livre, un auteur...">
      <button><i class="fa-solid fa-magnifying-glass"></i></button>
    </div>

    <section class="continue-section">
      <div class="continue-title">
        <i class="fa-solid fa-book-open"></i>
        <span>Continuer la lecture</span>
      </div>
      <div class="continue-card">
        <div class="continue-book-title">Le Secret du Temps</div>
        <div class="continue-book-author">Par Marie Dubois</div>
        <div class="continue-book-desc">
          Une histoire captivante sur les mystères du temps et les aventures d’un jeune explorateur...
        </div>
        <div class="progress-bar">
          <div class="progress" style="width: 65%"></div>
        </div>
        <div class="progress-label">65% lu</div>
      </div>
    </section>

    <section class="categories-filter">
      <button class="active">Tous</button>
      <button>Romance</button>
      <button>Science-Fiction</button>
      <button>Fantasy</button>
      <button>Mystère</button>
      <button>Aventure</button>
      <button>Historique</button>
    </section>

    <section class="books-list">
      <div class="book-card">
        <img src="https://images.unsplash.com/photo-1519681393784-d120267933ba?auto=format&fit=crop&w=400&q=80" alt="Le Mystère de la Tour">
        <div class="book-info">
          <div class="book-title">Le Mystère de la Tour</div>
          <div class="book-author">Par Pierre Durand</div>
          <div class="book-desc">Une enquête palpitante dans les rues de Paris, où chaque indice mène à un nouveau mystère...</div>
          <a href="#" class="btn-story"><i class="fa-solid fa-book"></i> Voir l'histoire</a>
        </div>
      </div>
      <div class="book-card">
        <img src="https://images.unsplash.com/photo-1464983953574-0892a716854b?auto=format&fit=crop&w=400&q=80" alt="Les Chemins de l'Espoir">
        <div class="book-info">
          <div class="book-title">Les Chemins de l'Espoir</div>
          <div class="book-author">Par Sophie Bernard</div>
          <div class="book-desc">Une histoire d’amour et de courage dans un monde en reconstruction...</div>
          <a href="#" class="btn-story"><i class="fa-solid fa-book"></i> Voir l'histoire</a>
        </div>
      </div>
      <div class="book-card">
        <img src="https://images.unsplash.com/photo-1512820790803-83ca734da794?auto=format&fit=crop&w=400&q=80" alt="L'Écho du Passé">
        <div class="book-info">
          <div class="book-title">L'Écho du Passé</div>
          <div class="book-author">Par Thomas Moreau</div>
          <div class="book-desc">Un voyage dans le temps qui changera à jamais la vie de notre héros...</div>
          <a href="#" class="btn-story"><i class="fa-solid fa-book"></i> Voir l'histoire</a>
        </div>
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