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
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];

    // Vérification des champs
    if ($nom && $prenom && $email && $password && $confirm_password) {
        if ($password !== $confirm_password) {
            $error = "Les mots de passe ne correspondent pas.";
        } else {
            // Vérifier si l'email existe déjà
            $check = $pdo->prepare("SELECT id FROM utilisateurs WHERE email = ?");
            $check->execute([$email]);
            if ($check->rowCount() > 0) {
                $error = "Cet email est déjà utilisé.";
            } else {
                // Hash du mot de passe
                $password_hash = password_hash($password, PASSWORD_DEFAULT);
                $sql = "INSERT INTO utilisateurs (nom, prenom, email, mot_de_passe, date_inscription) VALUES (?, ?, ?, ?, NOW())";
                $stmt = $pdo->prepare($sql);
                if ($stmt->execute([$nom, $prenom, $email, $password_hash])) {
                    // Redirection vers la page de connexion après inscription réussie
                    header("Location: Connexion.php?inscription=success");
                    exit;
                } else {
                    $error = "Erreur lors de la création du compte.";
                }
            }
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
  <title>Inscription Lectura</title>
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
        <a href="#">Accueil</a>
        <a href="#">Catégories</a>
        <a href="#">À propos</a>
      </nav>
    </div>
  </header>

  <main>
    <div class="register-box">
      <h2>Rejoignez Lectura</h2>
      <p class="subtitle">Créez votre compte pour commencer votre aventure littéraire</p>
      <div class="role-select">
        <div class="role active">
          <i class="fa-solid fa-book"></i>
          <div>
            <span class="role-title">Lecteur</span>
            <span class="role-desc">Découvrez et lisez des histoires</span>
          </div>
        </div>
        <div class="role">
          <i class="fa-solid fa-pen"></i>
          <div>
            <span class="role-title">Auteur</span>
            <span class="role-desc">Publiez vos œuvres</span>
          </div>
        </div>
      </div>
      <?php if ($success): ?>
        <div class="alert-success"><?= $success ?></div>
      <?php endif; ?>
      <?php if ($error): ?>
        <div class="alert-error"><?= $error ?></div>
      <?php endif; ?>
      <form id="registerForm" action="" enctype="multipart/form-data" method="POST">
        <div class="form-row">
          <div class="form-group">
            <label for="prenom">Nom</label>
            <input type="text" id="prenom" name="nom" required>
          </div>
          <div class="form-group">
            <label for="nom">Prénom</label>
            <input type="text" id="nom" name="prenom" required>
          </div>
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" id="email" name="email" required>
        </div>
        <div class="form-group">
          <label for="password">Mot de passe</label>
          <input type="password" id="password" name="password" required>
        </div>
        <div class="form-group">
          <label for="confirm-password">Confirmer le mot de passe</label>
          <input type="password" id="confirm-password" name="confirm_password" required>
        </div>
        <div class="form-group checkbox-group">
          <input type="checkbox" id="cgu" required>
          <label for="cgu">
            J’accepte les <a href="#">conditions d’utilisation</a> et la <a href="#">politique de confidentialité</a>
          </label>
        </div>
        <button type="submit" class="btn-register">
          <i class="fa-solid fa-user-plus"></i> Créer mon compte
        </button>
      </form>
      <div class="login-link">
        Déjà inscrit ? <a href="Connexion.php">Connectez-vous</a>
      </div>
    </div>
  </main>
</body>
</html>