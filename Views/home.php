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
        <h1 class='title'>Cinema</h1>

        <div class="navbar-row">
            <form action="./membre.php" method="GET">
                <input type="search" name="search" id="search" placeholder="Search Person...">
                <button type="submit"><i class="fas fa-search"></i></button>
            </form>
            <form action="" method="GET">
                <input type="search" name="filmSearch" id="filmSearch" placeholder="Search Film...">
                <button type="submit"><i class="fas fa-search"></i></button>
            </form>



            <form action="" method="GET">
                <label for="proj_date">Date:</label>
                <select id="proj_date" name="proj_date">
                    <?php foreach ($proj_Dates as $proj_Date) : ?>
                        <option value="<?php echo htmlspecialchars($proj_Date['date_debut_affiche']); ?>"><?php echo htmlspecialchars($proj_Date['date_debut_affiche']); ?></option>
                    <?php endforeach; ?>
                </select>
                <button type="submit"><i class="fas fa-calendar-alt"></i></button>
            </form>


        </div>

        <div class="navbar-row">
            <form action="" method="GET">
                <label for="production">Production Year:</label>
                <select id="production" name="production">
                    <?php foreach ($productions as $production) : ?>
                        <option value="<?php echo htmlspecialchars($production['annee_prod']); ?>"><?php echo htmlspecialchars($production['annee_prod']); ?></option>
                    <?php endforeach; ?>
                </select>
                <button type="submit"><i class="fas fa-calendar"></i></button>
            </form>
            <form action="" method="GET">
                <label for="genre">Genre:</label>
                <select id="genre" name="genre">
                    <?php foreach ($genres as $genre) : ?>
                        <option value="<?php echo htmlspecialchars($genre['nom']); ?>"><?php echo htmlspecialchars($genre['nom']); ?></option>
                    <?php endforeach; ?>
                </select>
                <button type="submit"><i class="fas fa-film"></i></button>
            </form>

            <form action="./membre.php" method="GET">
                <label for="clientHistory">Client:</label>
                <select id="clientHistory" name="clientHistory">
                    <?php foreach ($clients as $client) : ?>
                        <option value="<?php echo htmlspecialchars($client['nom']); ?>"><?php echo htmlspecialchars($client['nom']); ?></option>
                    <?php endforeach; ?>
                </select>
                <button type="submit"><i class="fas fa-user"></i></button>
            </form>
        </div>
    </div>


    <div class="film-container">

        <?php if (!empty($films)): ?>
            <?php foreach ($films as $film) : ?>
                <div class="film-card">
                    <div class="film-info">
                        <h3><?php echo htmlspecialchars($film['titre']); ?></h3>
                        <p><?php echo htmlspecialchars($film['resum']); ?></p>
                        <span>
                            Debut :- <?php echo htmlspecialchars($film['date_debut_affiche']); ?> <br>
                            Fin :- <?php echo htmlspecialchars($film['date_fin_affiche']); ?> <br>
                            Durée :- <?php echo htmlspecialchars($film['duree_min']); ?> <br>
                            Année :- <?php echo htmlspecialchars($film['annee_prod']); ?>
                        </span>
                    </div>
                </div>
            <?php endforeach; ?>


        <?php elseif (isset($memberDetails) && !empty($memberDetails)): ?>
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