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
$stmt = $pdo->prepare("SELECT * FROM emprunts WHERE user_id = ? AND histoire_id = 3");
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
    $stmt = $pdo->prepare("INSERT INTO emprunts (user_id, histoire_id, date_emprunt) VALUES (?, 3, NOW())");
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
    <title>Le Chat et la Chaise - Lectura</title>
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
                <img src="images/cover1.webp" alt="Le Chat et la Chaise" class="book-cover">
                <div class="book-info">
                    <h1>Le Chat et la Chaise</h1>
                    <p>Une histoire amusante sur l'amitié improbable entre un chat et une chaise.</p>
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
                    <h2>Chapitre 1 : Une Rencontre Inattendue</h2>
                    <p>Dans un petit appartement au cœur de la ville vivait Monsieur Moustache, un chat noir et blanc très distingué. Il menait une vie tranquille et ordonnée jusqu'au jour où sa propriétaire ramena une nouvelle chaise de cuisine, une chaise rouge vif qui détonnait complètement avec le reste du mobilier.</p>
                    
                    <p>Au début, Monsieur Moustache regardait la chaise avec méfiance. Elle était différente des autres meubles, plus moderne, plus audacieuse. Et surtout, elle grinçait ! Chaque fois que quelqu'un s'asseyait dessus, elle émettait un petit "couic" qui agaçait terriblement notre chat sophistiqué.</p>

                    <h2>Chapitre 2 : Le Grincement Mystérieux</h2>
                    <p>Un soir, alors que tout le monde dormait, Monsieur Moustache entendit le fameux grincement. Mais cette fois, c'était différent. La chaise grinçait toute seule, et le son ressemblait presque à... une mélodie ? Intrigué, il s'approcha doucement.</p>
                    
                    <p>"Bonsoir", dit une voix douce. Monsieur Moustache sursauta. La chaise venait de lui parler ! "Je m'appelle Charlotte", continua la chaise. "Je sais que mon grincement t'agace, mais c'est ma façon de chanter. Je m'ennuie tellement quand personne ne s'assoit sur moi..."</p>

                    <h2>Chapitre 3 : Une Amitié Particulière</h2>
                    <p>À partir de cette nuit-là, Monsieur Moustache et Charlotte devinrent amis. Chaque soir, quand les humains dormaient, ils discutaient de tout et de rien. Charlotte racontait ses aventures dans le magasin de meubles, et Monsieur Moustache partageait ses observations sur les oiseaux qu'il voyait par la fenêtre.</p>
                    
                    <p>Un jour, Charlotte confia à Monsieur Moustache qu'elle avait toujours rêvé de danser. Le chat eut alors une idée. Il commença à sauter sur le coussin de Charlotte en rythme, la faisant doucement basculer d'avant en arrière. Les grincements de Charlotte se transformèrent en une joyeuse musique de valse.</p>

                    <h2>Chapitre 4 : Le Grand Spectacle</h2>
                    <p>Les autres meubles de l'appartement, qui au début trouvaient ce duo improbable, commencèrent à apprécier leurs petits concerts nocturnes. Le vieux fauteuil tapait la mesure avec ses accoudoirs, pendant que l'armoire fredonnait doucement.</p>
                    
                    <p>Même la propriétaire remarqua que quelque chose avait changé. Elle trouvait que sa chaise grinçait moins, ou peut-être différemment, et que son chat semblait plus heureux que jamais. Elle ne se doutait pas que la nuit, son appartement se transformait en une salle de spectacle unique en son genre.</p>

                    <h2>Épilogue</h2>
                    <p>Les années passèrent, et bien que la peinture rouge de Charlotte commençât à s'écailler par endroits, ses grincements restaient aussi mélodieux. Monsieur Moustache, devenu un chat âgé et sage, continuait de passer ses soirées avec sa meilleure amie.</p>
                    
                    <p>Leur histoire nous rappelle que l'amitié peut naître dans les endroits les plus inattendus, et que parfois, ce qui nous agace au premier abord peut devenir ce qui nous apporte le plus de joie. Après tout, qui aurait cru qu'un chat distingué et une chaise qui grince pourraient former un duo aussi parfait ?</p>
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