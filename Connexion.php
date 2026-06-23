<?php
session_start();

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

$error = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST["email"]);
    $password = $_POST["password"];

    if ($email && $password) {
        $stmt = $pdo->prepare("SELECT * FROM utilisateurs WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user["mot_de_passe"])) {
            // Connexion réussie, on stocke les infos en session
            $_SESSION["user_id"] = $user["id"];
            $_SESSION["user_nom"] = $user["nom"];
            $_SESSION["user_prenom"] = $user["prenom"];
            $_SESSION["user_email"] = $user["email"];
            header("Location: index.php");
            exit;
        } else {
            $error = "Email ou mot de passe incorrect.";
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
  <title>Connexion - Lectura</title>
  <link rel="stylesheet" href="CSS/Connexion.css">
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
    <div class="login-box">
      <h2>Bienvenue</h2>
      <p class="subtitle">Connectez-vous pour accéder à votre espace personnel</p>
      <?php if (isset($_GET['inscription']) && $_GET['inscription'] == 'success'): ?>
        <div class="alert-success">Votre compte a bien été créé, vous pouvez vous connecter !</div>
      <?php endif; ?>
      <?php if ($error): ?>
        <div class="alert-error"><?= $error ?></div>
      <?php endif; ?>
      <form method="POST" action="">
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" id="email" name="email" required>
        </div>
        <div class="form-group">
          <label for="password">Mot de passe</label>
          <input type="password" id="password" name="password" required>
        </div>
        <div class="form-row">
          <a href="#" class="forgot-link"> Mot de passe oublié ?</a>
        </div>
        <button type="submit" class="btn-login">
          <i class="fa-solid fa-right-to-bracket"></i> Se connecter
        </button>
      </form>
      <div class="divider">
        <span>Ou connectez-vous avec</span>
      </div>
      <div class="social-login">
        <button class="social-btn google"><i class="fab fa-google"></i></button>
        <button class="social-btn facebook"><i class="fab fa-facebook-f"></i></button>
        <button class="social-btn twitter"><i class="fab fa-twitter"></i></button>
      </div>
      <div class="register-link">
        Pas encore de compte ? <a href="Inscription.php">Inscrivez-vous</a>
      </div>
    </div>
  </main>
</body>
</html>