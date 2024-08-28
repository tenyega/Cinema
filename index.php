<?php

require_once('./Models/Database.class.php');
require_once('./Models/Film.class.php');
require_once('./Models/Membre.class.php');

$model = new Film;
$genres = $model->getGenre();
$titles = $model->getTitles();
$proj_Dates = $model->getProj_Date();
$productions = $model->getYear();

$membreModel = new Membre;
$clients = $membreModel->getClients();

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['proj_date']) && !empty($_GET['proj_date'])) {
        $proj_date = $_GET['proj_date'];
        $films = $model->getFilmsByProjectionDate($proj_date);
    } elseif (isset($_GET['production']) && !empty($_GET['production'])) {
        $production = $_GET['production'];
        $films = $model->getFilmsByProductionYear($production);
    } elseif (isset($_GET['genre']) && !empty($_GET['genre'])) {
        $genre = $_GET['genre'];
        $films = $model->getFilmsByGenre($genre);
    } elseif (isset($_GET['filmSearch']) && !empty($_GET['filmSearch'])) {
        $filmSearch = $_GET['filmSearch'];
        $films = $model->getFilms($filmSearch);
    } else {
        // This block executes if none of the above parameters are set or they are empty
        $films = $model->getAll();
    }
} else {
    // This block will execute if the request method is not GET
    $films = $model->getAll();
}


require_once('./Views/home.php');
