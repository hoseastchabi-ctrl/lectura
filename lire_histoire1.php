<?php
session_start();
$message = "";

// Connexion à la base de données
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "lectura";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}


?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= htmlspecialchars($livre['titre']) ?> - Lectura</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  <style>
    :root {
      --primary: #3a8dde;
      --primary-light: #5ec6fa;
      --primary-gradient: linear-gradient(135deg, #3a8dde 0%, #5ec6fa 100%);
      --white: #fff;
      --gray: #f7f8fa;
      --text: #222;
      --text-light: #666;
      --card-shadow: 0 4px 24px rgba(58, 141, 222, 0.07);
      --radius: 18px;
      --success: #28a745;
      --warning: #ffc107;
      --danger: #dc3545;
    }
    body {
      font-family: 'Montserrat', Arial, sans-serif;
      background: var(--gray);
      color: var(--text);
      margin: 0;
      padding: 0;
    }
    header {
      background: var(--primary-gradient);
      color: var(--white);
      padding: 0.5rem 0;
    }
    .container {
      width: 90%;
      max-width: 1200px;
      margin: 0 auto;
    }
    .nav-container {
      display: flex;
      align-items: center;
      justify-content: space-between;
    }
    .logo {
      display: flex;
      align-items: center;
      font-family: 'Fredoka', cursive;
      font-size: 1.7rem;
      font-weight: 700;
      gap: 0.5rem;
    }
    .logo i {
      font-size: 2rem;
    }
    nav {
      display: flex;
      gap: 2rem;
    }
    nav a {
      color: var(--white);
      text-decoration: none;
      font-weight: 500;
      font-size: 1.1rem;
      transition: opacity 0.2s;
    }
    nav a:hover {
      opacity: 0.8;
    }
    .story-hero {
      background: var(--primary-gradient);
      color: var(--white);
      padding: 2.5rem 0 2rem 8%;
      border-radius: 0 0 24px 24px;
      margin-bottom: 2rem;
    }
    .story-hero h1 {
      font-family: 'Fredoka', cursive;
      font-size: 2.2rem;
      margin-bottom: 0.5rem;
    }
    .story-hero .author {
      font-size: 1.1rem;
      margin-bottom: 1.5rem;
      color: var(--white);
      opacity: 0.9;
    }
    .story-content-section {
      width: 90%;
      max-width: 800px;
      margin: 0 auto 2rem auto;
      background: var(--white);
      border-radius: var(--radius);
      box-shadow: var(--card-shadow);
      padding: 2.5rem 2rem;
      color: var(--text);
    }
    .story-content-section h2 {
      color: var(--primary);
      font-size: 1.3rem;
      margin-bottom: 1.2rem;
      font-family: 'Fredoka', cursive;
    }
    .story-content-section p {
      margin-bottom: 1.2rem;
      font-size: 1.13rem;
      line-height: 1.8;
      color: var(--text-light);
    }
    .back-link {
      display: inline-block;
      margin-bottom: 2rem;
      color: var(--primary);
      text-decoration: none;
      font-weight: 600;
      font-size: 1rem;
      transition: color 0.2s;
    }
    .back-link i {
      margin-right: 0.5rem;
    }
    .back-link:hover {
      color: var(--primary-light);
      text-decoration: underline;
    }
    /* Styles pour le système de prêt */
    .alert-success {
      background: linear-gradient(135deg, #d4f7d4 0%, #c3e6c3 100%);
      color: var(--success);
      padding: 1.5rem;
      border-radius: 12px;
      margin: 1rem 0;
      border-left: 5px solid var(--success);
      display: flex;
      align-items: center;
      gap: 1rem;
    }
    .alert-warning {
      background: linear-gradient(135deg, #fff3cd 0%, #ffeaa7 100%);
      color: #856404;
      padding: 1.5rem;
      border-radius: 12px;
      margin: 1rem 0;
      border-left: 5px solid var(--warning);
    }
    .alert-error {
      background: linear-gradient(135deg, #f8d7da 0%, #f5c6cb 100%);
      color: var(--danger);
      padding: 1.5rem;
      border-radius: 12px;
      margin: 1rem 0;
      border-left: 5px solid var(--danger);
      display: flex;
      align-items: center;
      gap: 1rem;
    }
    .compteur {
      background: linear-gradient(135deg, var(--gray) 0%, #e9ecef 100%);
      padding: 1.5rem;
      border-radius: 12px;
      margin: 1rem 0;
      border: 2px solid #dee2e6;
      text-align: center;
    }
    .compteur i {
      font-size: 1.5rem;
      color: var(--primary);
      margin-bottom: 0.5rem;
    }
    .limite-atteinte {
      background: linear-gradient(135deg, #ff6b6b 0%, #ee5a24 100%);
      color: var(--white);
      padding: 2rem;
      border-radius: 12px;
      margin: 1rem 0;
      text-align: center;
      box-shadow: 0 5px 15px rgba(255, 107, 107, 0.3);
    }
    .limite-atteinte h3 {
      margin: 0 0 1rem 0;
      font-size: 1.5rem;
    }
    .form-pret {
      background: linear-gradient(135deg, var(--gray) 0%, #e9ecef 100%);
      padding: 2rem;
      border-radius: 12px;
      margin: 1rem 0;
      border: 2px solid #dee2e6;
    }
    .form-pret h3 {
      color: var(--primary);
      margin-bottom: 1.5rem;
      display: flex;
      align-items: center;
      gap: 0.5rem;
    }
    .form-group {
      margin-bottom: 1.5rem;
    }
    .form-group label {
      display: block;
      margin-bottom: 0.5rem;
      font-weight: 600;
      color: var(--text);
    }
    .form-group select,
    .form-group input {
      width: 100%;
      padding: 0.8rem;
      border: 2px solid #dee2e6;
      border-radius: 8px;
      font-size: 1rem;
      transition: border-color 0.3s;
    }
    .form-group select:focus,
    .form-group input:focus {
      outline: none;
      border-color: var(--primary);
    }
    .btn-pret {
      background: linear-gradient(135deg, var(--primary) 0%, var(--primary-light) 100%);
      color: var(--white);
      padding: 1rem 2rem;
      border: none;
      border-radius: 8px;
      cursor: pointer;
      font-size: 1.1rem;
      font-weight: 600;
      transition: transform 0.2s, box-shadow 0.2s;
      display: inline-flex;
      align-items: center;
      gap: 0.5rem;
    }
    .btn-pret:hover {
      transform: translateY(-2px);
      box-shadow: 0 5px 15px rgba(58, 141, 222, 0.3);
    }
    .info-note {
      background: #e3f2fd;
      padding: 1rem;
      border-radius: 8px;
      margin-top: 1rem;
      font-size: 0.9rem;
      color: #1976d2;
      border-left: 4px solid #2196f3;
    }
    @media (max-width: 700px) {
      .story-hero {
        padding-left: 5%;
        padding-right: 5%;
        text-align: center;
      }
      .story-content-section {
        width: 98%;
        padding: 1.2rem 0.5rem;
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
      <a href="deconnexion.php" class="btn-header" style="color:var(--white);text-decoration:none;">Se Déconnecter</a>
    </div>
  </header>
  <section class="story-hero">
    <h1><?= htmlspecialchars($livre['titre']) ?></h1>
    <div class="author">Par <?= htmlspecialchars($livre['auteur']) ?></div>
  </section>
  <main>
    <div class="story-content-section">
      <a href="histoire_drole.php" class="back-link"><i class="fa-solid fa-arrow-left"></i>Retour aux histoires drôles</a>
      <?php echo $message; ?>
      <?php if ($id_utilisateur): ?>
        <div class="compteur">
          <i class="fa-solid fa-book-open"></i>
          <div><strong>Lectures gratuites :</strong> <?= $lectures_utilisees ?>/2 utilisées</div>
          <?php if ($lectures_utilisees >= 2): ?>
            <div style="color: var(--danger); font-weight: bold; margin-top: 0.5rem;">
              ⚠️ Limite atteinte !
            </div>
          <?php endif; ?>
        </div>
      <?php endif; ?>
      <?php if ($acces['acces']): ?>
        <h2><?= htmlspecialchars($livre['titre']) ?></h2>
        <p>
          Il était une fois, dans un petit village paisible, un canard pas comme les autres. Ce canard, nommé Gustave, avait un don particulier : il adorait faire des blagues à tous les habitants du village.
        </p>
        <p>
          Un matin, alors que le soleil se levait à peine, Gustave décida de commencer sa journée par une farce. Il se faufila dans la cour de la fermière Marguerite et remplaça toutes ses chaussures par des bottes en caoutchouc géantes. Quand Marguerite voulut sortir, elle trébucha et éclata de rire en voyant ses pieds énormes.
        </p>
        <p>
          Mais Gustave ne s'arrêta pas là. Il alla ensuite chez le boulanger et mit du sel à la place du sucre dans la pâte à pain. Les clients furent surpris par le goût, mais le boulanger, bon joueur, offrit des croissants gratuits à tout le monde pour se faire pardonner.
        </p>
        <p>
          Un jour, Gustave décida de s'attaquer au maire du village. Il accrocha une pancarte sur la porte de la mairie : "Fermé pour cause de canard farceur !". Le maire, d'abord surpris, éclata de rire en voyant Gustave se dandiner fièrement devant la porte.
        </p>
        <p>
          Mais un matin, Gustave trouva devant lui un renard, nouvel habitant du village, qui lui dit : "On m'a dit que tu étais le roi des blagues ici. Es-tu prêt à relever un défi ?" Gustave, sûr de lui, accepta.
        </p>
        <p>
          Le renard proposa alors un concours de farces. Chacun leur tour, ils devaient faire une blague à un habitant sans se faire prendre. Gustave commença, mais le renard était encore plus malin. Il réussit à faire croire à tout le village que Gustave allait offrir des glaces gratuites sur la place. Quand tout le monde arriva, Gustave fut encerclé par une foule joyeuse réclamant leur glace !
        </p>
        <p>
          Finalement, Gustave comprit qu'il avait trouvé un adversaire à sa taille. Les deux compères devinrent inséparables et, ensemble, ils firent rire le village chaque jour un peu plus.
        </p>
        <p>
          Depuis ce jour, le village n'a jamais été aussi joyeux, et Gustave, le canard farceur, n'a jamais été aussi heureux d'avoir trouvé un ami aussi blagueur que lui.
        </p>
        <p style="text-align:right;font-style:italic;color:var(--primary);margin-top:2rem;">
          Fin
        </p>
      <?php elseif ($acces['type'] == 'non_connecte'): ?>
        <div class="alert-warning">
          <h3><i class="fa-solid fa-user-lock"></i> Connexion requise</h3>
          <p>Vous devez être connecté pour lire cette histoire.</p>
          <a href="Connexion.php" class="btn-pret">
            <i class="fa-solid fa-sign-in-alt"></i> Se connecter
          </a>
        </div>
      <?php else: ?>
        <div class="limite-atteinte">
          <h3><i class="fa-solid fa-exclamation-triangle"></i> Limite de lectures gratuites atteinte</h3>
          <p>Vous avez déjà lu <?= $acces['lectures_utilisees'] ?> livres gratuitement sur les 2 autorisés.</p>
          <p>Pour continuer à lire, demandez un prêt temporaire :</p>
        </div>
        <div class="form-pret">
          <h3><i class="fa-solid fa-clock"></i> Demander un prêt</h3>
          <form method="POST">
            <div class="form-group">
              <label for="duree_jours">Durée du prêt :</label>
              <select name="duree_jours" id="duree_jours" required>
                <option value="3">3 jours</option>
                <option value="7" selected>7 jours</option>
                <option value="14">14 jours</option>
                <option value="30">30 jours</option>
              </select>
            </div>
            <div class="form-group">
              <label for="heure_retour">Heure de retour :</label>
              <input type="time" name="heure_retour" id="heure_retour" value="18:00" required>
            </div>
            <button type="submit" name="demander_pret" class="btn-pret">
              <i class="fa-solid fa-book"></i> Demander le prêt
            </button>
          </form>
          <div class="info-note">
            <i class="fa-solid fa-info-circle"></i>
            <strong>Note :</strong> Le prêt sera automatiquement accordé et vous pourrez lire le livre immédiatement.
          </div>
        </div>
      <?php endif; ?>
    </div>
  </main>
</body>
</html>
