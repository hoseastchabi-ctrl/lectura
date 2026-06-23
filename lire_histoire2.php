<?php
session_start();

// Vérification de l'authentification
if (!isset($_SESSION['user_id'])) {
    header('Location: Connexion.php');
    exit();
}

// Connexion à la base de données
$pdo = new PDO('mysql:host=localhost;dbname=lectura', 'root', '');

// Initialisation du compteur de lectures si nécessaire
if (!isset($_SESSION['lectures_gratuites'])) {
    $_SESSION['lectures_gratuites'] = 2;
}

// Vérification si l'utilisateur a déjà emprunté ce livre
$stmt = $pdo->prepare("SELECT * FROM emprunts WHERE user_id = ? AND histoire_id = 2");
$stmt->execute([$_SESSION['user_id']]);
$emprunt = $stmt->fetch();

$peutLire = false;
$message = '';

if ($emprunt) {
    // L'utilisateur a emprunté le livre
    $peutLire = true;
    $message = "Vous avez emprunté ce livre. Bonne lecture !";
} elseif ($_SESSION['lectures_gratuites'] > 0) {
    // L'utilisateur peut utiliser une lecture gratuite
    $peutLire = true;
    $_SESSION['lectures_gratuites']--;
    $message = "Il vous reste " . $_SESSION['lectures_gratuites'] . " lecture(s) gratuite(s).";
} else {
    $message = "Vous avez épuisé vos lectures gratuites. Veuillez emprunter le livre pour continuer.";
}

// Traitement de la demande d'emprunt
if (isset($_POST['emprunter'])) {
    $stmt = $pdo->prepare("INSERT INTO emprunts (user_id, histoire_id, date_emprunt) VALUES (?, 2, NOW())");
    if ($stmt->execute([$_SESSION['user_id']])) {
        $peutLire = true;
        $message = "Livre emprunté avec succès !";
        header("Refresh:0"); // Rafraîchit la page
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La Vache qui Rit - Lectura</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        :root {
            --primary: #7380ec;
            --danger: #ff7782;
            --success: #41f1b6;
            --warning: #ffbb55;
            --white: #fff;
            --info-dark: #7d8da1;
            --info-light: #dce1eb;
            --dark: #363949;
            --light: rgba(132, 139, 200, 0.18);
            --primary-variant: #111e88;
            --dark-variant: #677483;
            --background: #f6f6f9;
            --box-shadow: 0 2rem 3rem var(--light);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background: var(--background);
            color: var(--dark);
            line-height: 1.6;
        }

        .container {
            max-width: 1000px;
            margin: 2rem auto;
            padding: 0 2rem;
        }

        .book-container {
            background: var(--white);
            padding: 2rem;
            border-radius: 1rem;
            box-shadow: var(--box-shadow);
        }

        .book-header {
            display: flex;
            align-items: center;
            margin-bottom: 2rem;
        }

        .book-cover {
            width: 200px;
            height: 300px;
            object-fit: cover;
            border-radius: 0.5rem;
            margin-right: 2rem;
        }

        .book-info h1 {
            color: var(--dark);
            margin-bottom: 1rem;
        }

        .message {
            padding: 1rem;
            border-radius: 0.5rem;
            margin-bottom: 2rem;
            background: var(--light);
            color: var(--dark);
        }

        .book-content {
            line-height: 1.8;
            font-size: 1.1rem;
            text-align: justify;
        }

        .btn {
            display: inline-block;
            padding: 0.8rem 1.5rem;
            border-radius: 0.5rem;
            color: var(--white);
            background: var(--primary);
            border: none;
            cursor: pointer;
            font-size: 1rem;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .btn:hover {
            background: var(--primary-variant);
        }

        .btn-danger {
            background: var(--danger);
        }

        .btn-danger:hover {
            background: #ff4757;
        }

        nav {
            background: var(--white);
            padding: 1rem 2rem;
            box-shadow: var(--box-shadow);
        }

        nav a {
            color: var(--dark);
            text-decoration: none;
            margin-right: 2rem;
        }

        nav a:hover {
            color: var(--primary);
        }
    </style>
</head>
<body>
    <nav>
        <a href="index.php"><i class="fas fa-home"></i> Accueil</a>
        <a href="Explorez.php"><i class="fas fa-search"></i> Retour à l'exploration</a>
    </nav>

    <div class="container">
        <div class="book-container">
            <div class="book-header">
                <img src="images/cover1.webp" alt="La Vache qui Rit" class="book-cover">
                <div class="book-info">
                    <h1>La Vache qui Rit</h1>
                    <p>L'histoire hilarante d'une vache qui découvre le pouvoir du rire.</p>
                    <?php if (!$peutLire && !$emprunt): ?>
                        <form method="post" style="margin-top: 1rem;">
                            <button type="submit" name="emprunter" class="btn">Emprunter ce livre</button>
                        </form>
                    <?php endif; ?>
                </div>
            </div>

            <?php if ($message): ?>
                <div class="message">
                    <?= htmlspecialchars($message) ?>
                </div>
            <?php endif; ?>

            <?php if ($peutLire): ?>
                <div class="book-content">
                    <h2>Chapitre 1 : Le Don du Rire</h2>
                    <p>Dans une ferme pas comme les autres vivait Marguerite, une vache qui avait un don très particulier : elle pouvait faire rire n'importe qui rien qu'en les regardant. Ce n'était pas un rire moqueur, non, c'était un rire joyeux et contagieux qui réchauffait les cœurs.</p>
                    
                    <p>Tout avait commencé un matin d'été, quand Marguerite s'était réveillée avec une étrange sensation. Au lieu de son habituel "Meuh", elle émettait un son qui ressemblait étrangement à un rire cristallin. Les autres animaux de la ferme, d'abord surpris, ne purent s'empêcher de rire à leur tour.</p>

                    <h2>Chapitre 2 : La Ferme en Folie</h2>
                    <p>La nouvelle du don de Marguerite se répandit rapidement dans toute la région. Les animaux des fermes voisines venaient la voir, certains déprimés, d'autres simplement curieux. Mais tous repartaient avec le sourire aux lèvres et le cœur plus léger.</p>
                    
                    <p>Le fermier, Monsieur Martin, ne comprenait pas pourquoi sa ferme était devenue si populaire. Il remarquait simplement que ses animaux semblaient plus heureux que jamais, et que même les poules pondaient des œufs plus gros et plus nombreux.</p>

                    <h2>Chapitre 3 : Le Concours de Rire</h2>
                    <p>Un jour, on organisa un grand concours dans la région : "La Ferme la Plus Joyeuse". Les participants devaient démontrer le bonheur qui régnait dans leur ferme. Marguerite, bien sûr, était la star de sa ferme.</p>
                    
                    <p>Quand le jury arriva, ils furent accueillis par un spectacle extraordinaire : des cochons qui dansaient la valse, des poules qui chantaient en chœur, et au milieu de tout ça, Marguerite qui orchestrait ce joyeux chaos avec son rire contagieux.</p>

                    <h2>Chapitre 4 : Le Secret du Bonheur</h2>
                    <p>Le plus étonnant dans cette histoire, c'est que le rire de Marguerite avait un effet durable. Les animaux qui l'entendaient apprenaient à leur tour à voir le côté drôle des choses, à ne pas se prendre trop au sérieux.</p>
                    
                    <p>Même les jours de pluie, quand le ciel était gris et que l'humeur aurait pu être morose, on entendait des éclats de rire venant de la grange, où Marguerite racontait des histoires drôles à ses amis.</p>

                    <h2>Épilogue</h2>
                    <p>La ferme de Monsieur Martin remporta le concours, non pas parce qu'elle était la plus grande ou la plus moderne, mais parce qu'elle était la plus heureuse. Et tout ça grâce à une vache qui avait découvert que le vrai bonheur, c'était de le partager avec les autres.</p>
                    
                    <p>Depuis ce jour, quand les gens parlent de la "Vache qui Rit", ils ne pensent plus à une marque de fromage, mais à Marguerite, la vache qui a transformé une simple ferme en un endroit magique où le rire est roi.</p>
                </div>
            <?php else: ?>
                <div class="book-content">
                    <p>Pour lire cette histoire, vous devez soit utiliser une lecture gratuite, soit emprunter le livre.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>