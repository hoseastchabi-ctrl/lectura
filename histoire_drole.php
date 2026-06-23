<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Histoires Drôles - Lectura</title>
  <link rel="stylesheet" href="CSS/categories.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  <style>
    .funny-hero {
      background: var(--primary-gradient);
      color: var(--white);
      padding: 2.5rem 0 2rem 8%;
      border-radius: 0 0 24px 24px;
      margin-bottom: 2rem;
    }
    .funny-hero h1 {
      font-family: 'Fredoka', cursive;
      font-size: 2.2rem;
      margin-bottom: 0.7rem;
    }
    .funny-books-list {
      width: 90%;
      max-width: 1100px;
      margin: 0 auto 2rem auto;
      display: flex;
      gap: 2rem;
      flex-wrap: wrap;
      justify-content: flex-start;
    }
    .funny-book-card {
      background: var(--white);
      border-radius: var(--radius);
      box-shadow: var(--card-shadow);
      overflow: hidden;
      width: 320px;
      display: flex;
      flex-direction: column;
      margin-bottom: 2rem;
      transition: box-shadow 0.2s, transform 0.2s;
    }
    .funny-book-card:hover {
      box-shadow: 0 8px 32px rgba(58, 141, 222, 0.15);
      transform: translateY(-8px) scale(1.04);
    }
    .funny-book-card img {
      width: 100%;
      height: 170px;
      object-fit: cover;
    }
    .funny-book-info {
      padding: 1.2rem 1.2rem 1.2rem 1.2rem;
      display: flex;
      flex-direction: column;
      flex: 1;
    }
    .funny-book-title {
      color: var(--primary);
      font-weight: 700;
      font-size: 1.1rem;
      margin-bottom: 0.2rem;
    }
    .funny-book-author {
      color: var(--text-light);
      font-size: 0.98rem;
      margin-bottom: 0.5rem;
    }
    .funny-book-desc {
      color: var(--text-light);
      font-size: 0.98rem;
      margin-bottom: 1rem;
    }
    .btn-story {
      background: var(--primary);
      color: var(--white);
      padding: 0.5rem 1.2rem;
      border-radius: 2rem;
      font-weight: 600;
      text-decoration: none;
      font-size: 1rem;
      box-shadow: 0 2px 8px rgba(58, 141, 222, 0.10);
      transition: background 0.2s, color 0.2s;
      display: inline-flex;
      align-items: center;
      gap: 0.5rem;
      margin-top: auto;
    }
    .btn-story:hover {
      background: var(--primary-light);
      color: var(--white);
    }
    @media (max-width: 900px) {
      .funny-books-list {
        flex-direction: column;
        align-items: center;
      }
    }
  </style>
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
        <a href="A Propos.php">À propos</a>
        <a href="contact.php">Contact</a>
      </nav>
      <a href="Inscription.php" class="btn-header">Se Déconnecter</a>
    </div>
  </header>

  <section class="funny-hero">
    <h1><i class="fa-regular fa-face-laugh-beam"></i> Histoires Drôles</h1>
    <p>Retrouvez ici une sélection de livres pour rire et passer un bon moment !</p>
  </section>

  <section class="funny-books-list">
    <div class="funny-book-card">
      <img src="https://images.unsplash.com/photo-1519681393784-d120267933ba?auto=format&fit=crop&w=400&q=80" alt="Le Canard Farceur">
      <div class="funny-book-info">
        <div class="funny-book-title">Le Canard Farceur</div>
        <div class="funny-book-author">Par Jean Rigolo</div>
        <div class="funny-book-desc">Un canard qui fait des blagues à tout le village... jusqu'au jour où il rencontre plus malin que lui !</div>
        <a href="lire_histoire1.php" class="btn-story"><i class="fa-solid fa-book"></i> Lire l'histoire</a>
      </div>
    </div>
    <div class="funny-book-card">
      <img src="https://images.unsplash.com/photo-1464983953574-0892a716854b?auto=format&fit=crop&w=400&q=80" alt="La Vache qui Rit (vraiment)">
      <div class="funny-book-info">
        <div class="funny-book-title">La Vache qui Rit (vraiment)</div>
        <div class="funny-book-author">Par Sophie Blague</div>
        <div class="funny-book-desc">Une vache qui ne peut s'empêcher de rire à toutes les blagues... même les plus nulles !</div>
        <a href="lire_histoire2.php" class="btn-story"><i class="fa-solid fa-book"></i> Lire l'histoire</a>
      </div>
    </div>
    <div class="funny-book-card">
      <img src="https://images.unsplash.com/photo-1512820790803-83ca734da794?auto=format&fit=crop&w=400&q=80" alt="Le Chat et la Chaise">
      <div class="funny-book-info">
        <div class="funny-book-title">Le Chat et la Chaise</div>
        <div class="funny-book-author">Par Tom Minet</div>
        <div class="funny-book-desc">Un chat qui veut absolument s'asseoir sur la chaise préférée de son maître... mais la chaise n'est pas d'accord !</div>
        <a href="lire_histoire3.php" class="btn-story"><i class="fa-solid fa-book"></i> Lire l'histoire</a>
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