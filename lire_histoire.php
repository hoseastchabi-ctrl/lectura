<?php
$pdo = new PDO('mysql:host=localhost;dbname=lectura', 'root', '');
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$stmt = $pdo->prepare("SELECT * FROM histoires WHERE id = ?");
$stmt->execute([$id]);
$livre = $stmt->fetch();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title><?= $livre ? htmlspecialchars($livre['titre']) : 'Livre non trouvé' ?></title>
  <link rel="stylesheet" href="CSS/explorez.css">
</head>
<body>
  <?php if ($livre): ?>
    <h1><?= htmlspecialchars($livre['titre']) ?></h1>
    <!-- Ajoute ici le contenu du livre si tu as d'autres champs -->
  <?php else: ?>
    <p>Livre non trouvé.</p>
  <?php endif; ?>
  <a href="Explorez.php">Retour</a>
</body>
</html> 