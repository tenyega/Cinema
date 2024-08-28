<?php

require_once('./Models/Database.class.php');
require_once('./Models/Membre.class.php');



$membreModel = new Membre;
$clients = $membreModel->getClients();


if (isset($_GET['search'])) {
    $searchMember = $_GET['search'];
    $memberDetails = $membreModel->getMember($searchMember);
    $films = [];
}
if (isset($_GET['clientHistory'])) {
    $client = $_GET['clientHistory'];
    $clientDetails = $membreModel->getClientDetail($client);
    $films = [];
}
require_once('./Views/membre.php');
