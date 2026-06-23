<?php
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

// Traitement du formulaire
$success = $error = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = htmlspecialchars(trim($_POST["nom"]));
    $prenom = htmlspecialchars(trim($_POST["prenom"]));
    $email = htmlspecialchars(trim($_POST["email"]));
    $message = htmlspecialchars(trim($_POST["Message"]));

    if ($nom && $prenom && $email && $message) {
        $sql = "INSERT INTO contacts (nom, prenom, email, message, date_envoi) VALUES (?, ?, ?, ?, NOW())";
        $stmt = $pdo->prepare($sql);
        if ($stmt->execute([$nom, $prenom, $email, $message])) {
            $success = "Votre message a bien été envoyé !";
        } else {
            $error = "Erreur lors de l'envoi du message.";
        }
    } else {
        $error = "Merci de remplir tous les champs.";
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Contactez-nous - Lectura</title>
  <link rel="stylesheet" href="CSS/Inscription.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  <style>
    .alert-success {
      background: #d4f7d4;
      color: #218838;
      padding: 1rem;
      border-radius: 8px;
      margin-bottom: 1rem;
      text-align: center;
    }
    .alert-error {
      background: #ffe0e0;
      color: #c82333;
      padding: 1rem;
      border-radius: 8px;
      margin-bottom: 1rem;
      text-align: center;
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
      </nav>
    </div>
  </header>

  <main>
    <div class="register-box">
      <h2>Contactez-nous</h2>
      <?php if ($success): ?>
        <div class="alert-success"><?= $success ?></div>
      <?php endif; ?>
      <?php if ($error): ?>
        <div class="alert-error"><?= $error ?></div>
      <?php endif; ?>
      <form id="registerForm" action="" enctype="multipart/form-data" method="POST">
        <div class="form-row">
          <div class="form-group">
            <label for="nom">Nom</label>
            <input type="text" id="nom" name="nom" required>
          </div>
          <div class="form-group">
            <label for="prenom">Prénom</label>
            <input type="text" id="prenom" name="prenom" required>
          </div>
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" id="email" name="email" required>
        </div>
        <div class="form-group">
          <label for="Message">Message</label>
          <textarea name="Message" id="Message" class="text" rows="7" required></textarea>
        </div>
        <button type="submit" class="btn-register">
          <i class="fa-solid fa-paper-plane"></i> Envoyer le message
        </button>
      </form>
    </div>
  </main>
</body>
</html>