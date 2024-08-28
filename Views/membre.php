<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cinema</title>
    <link rel="stylesheet" href="Assets/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />

</head>

<body>

    <div class="navbar">
        <h1 class='title'>Detail</h1>
    </div>
    <div class="film-container">
        <?php if (isset($memberDetails) && !empty($memberDetails)): ?>
            <div class="film-card">
                <h1><?php echo strtoupper(htmlspecialchars($memberDetails[0]['nom'])) . ' ' . htmlspecialchars($memberDetails[0]['prenom']); ?></h1>
                <div class="film-info">
                    <p>
                        Date de naissance :- <?php echo htmlspecialchars($memberDetails[0]['date_naissance']) ?><br>
                        Email :- <?php echo htmlspecialchars($memberDetails[0]['email']) ?><br>
                        adresse :- <?php echo htmlspecialchars($memberDetails[0]['adresse']) ?><br>
                        <?php echo htmlspecialchars($memberDetails[0]['cpostal']) ?><br>
                        <?php echo htmlspecialchars($memberDetails[0]['ville']) ?><br>
                        <?php echo htmlspecialchars($memberDetails[0]['pays']) ?><br>
                    </p>
                </div>
            </div>

        <?php elseif (isset($clientDetails) && !empty($clientDetails)): ?>
            <h1>Films seen by :- <?php echo strtoupper(htmlspecialchars($clientDetails[0]['nom'])) . ' ' . htmlspecialchars($clientDetails[0]['prenom']); ?> <br>
                Total Films viewed :- <?php echo count($clientDetails); ?>
            </h1>

            <?php for ($i = 0; $i < count($clientDetails); $i++): ?>
                <div class="film-card">
                    <div class="film-info">
                        <h3><?php echo htmlspecialchars($clientDetails[$i]['titre']); ?></h3>
                        <p><?php echo htmlspecialchars($clientDetails[$i]['resum']); ?></p>
                        <span>
                            <strong>Debut:</strong> <?php echo htmlspecialchars($clientDetails[$i]['date_debut_affiche']); ?> <br>
                            <strong>Fin:</strong> <?php echo htmlspecialchars($clientDetails[$i]['date_fin_affiche']); ?> <br>
                            <strong>Durée:</strong> <?php echo htmlspecialchars($clientDetails[$i]['duree_min']); ?> minutes <br>
                            <strong>Année:</strong> <?php echo htmlspecialchars($clientDetails[$i]['annee_prod']); ?>
                        </span>
                    </div>
                </div>
            <?php endfor; ?>
        <?php else : ?>
            <h2> Aucun details trouvé </h2>
        <?php endif ?>

    </div>


</body>

</html>