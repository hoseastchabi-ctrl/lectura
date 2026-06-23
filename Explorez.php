<?php
session_start();
$pdo = new PDO('mysql:host=localhost;dbname=lectura', 'root', '');

$searchResults = [];
if (isset($_GET['q']) && !empty(trim($_GET['q']))) {
    $q = '%' . trim($_GET['q']) . '%';
    $stmt = $pdo->prepare("SELECT id, titre FROM histoires WHERE titre LIKE ?");
    $stmt->execute([$q]);
    $searchResults = $stmt->fetchAll();
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lectura - Explorez</title>
    <link rel="stylesheet" href="CSS/explorez.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        .search-result-title {
            text-align: center;
            font-size: 2rem;
            font-weight: bold;
            margin: 30px 0 20px 0;
            color: #222;
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
                <a href="Explorez.php">Explorez</a>
                <a href="A Propos.php">À propos</a>
                <a href="contact.php">Contact</a>
            </nav>
            <?php if (isset($_SESSION['user_id'])): ?>
                <a href="deconnexion.php" class="btn-header" style="color:var(--white);text-decoration:none;">
                    <i class="fa-solid fa-right-from-bracket"></i> Se Déconnecter
                </a>
            <?php else: ?>
                <a href="Connexion.php" class="btn-header" style="color:var(--white);text-decoration:none;">
                    <i class="fa-solid fa-sign-in-alt"></i> Se Connecter
                </a>
            <?php endif; ?>
        </div>
    </header>

    <main>
        <form class="search-bar" method="get" action="">
            <input type="text" name="q" placeholder="Rechercher un livre..." 
                   value="<?= isset($_GET['q']) ? htmlspecialchars($_GET['q']) : '' ?>">
            <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
        </form>

        <?php if (isset($_GET['q']) && !empty(trim($_GET['q']))): ?>
            <div class="search-result-title">
                Résultats pour "<?= htmlspecialchars($_GET['q']) ?>"
            </div>
        <?php endif; ?>

        <section class="books-list">
            <?php if (isset($_GET['q']) && !empty(trim($_GET['q']))): ?>
                <?php if (count($searchResults) > 0): ?>
                    <?php foreach ($searchResults as $book): ?>
                        <?php
                        // Détermine quelle page utiliser en fonction du titre
                        $page = '';
                        if ($book['titre'] == 'Le Canard Farceur') {
                            $page = 'lire_histoire1.php';
                        } elseif ($book['titre'] == 'La Vache qui Rit') {
                            $page = 'lire_histoire2.php';
                        } elseif ($book['titre'] == 'Le Chat et la Chaise') {
                            $page = 'lire_histoire3.php';
                        }
                        ?>
                        <a href="<?= $page ?>" class="book-card" style="text-decoration:none;color:inherit;">
                            <img src="images/cover1.webp" alt="<?= htmlspecialchars($book['titre']) ?>">
                            <div class="book-info">
                                <div class="book-title"><?= htmlspecialchars($book['titre']) ?></div>
                            </div>
                        </a>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p style="text-align: center; width: 100%;">Aucun résultat trouvé.</p>
                <?php endif; ?>
            <?php else: ?>
                <!-- Livres par défaut -->
                <a href="lire_histoire1.php" class="book-card" style="text-decoration:none;color:inherit;">
                    <img src="images/cover1.webp" alt="Le Canard Farceur">
                    <div class="book-info">
                        <div class="book-title">Le Canard Farceur</div>
                    </div>
                </a>
                <a href="lire_histoire2.php" class="book-card" style="text-decoration:none;color:inherit;">
                    <img src="images/cover1.webp" alt="La Vache qui Rit">
                    <div class="book-info">
                        <div class="book-title">La Vache qui Rit</div>
                    </div>
                </a>
                <a href="lire_histoire3.php" class="book-card" style="text-decoration:none;color:inherit;">
                    <img src="images/cover1.webp" alt="Le Chat et la Chaise">
                    <div class="book-info">
                        <div class="book-title">Le Chat et la Chaise</div>
                    </div>
                </a>
            <?php endif; ?>
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
                    <li><a href="index.php">Accueil</a></li>
                    <li><a href="categories.php">Catégories</a></li>
                    <li><a href="A Propos.php">À propos</a></li>
                    <li><a href="contact.php">Contact</a></li>
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