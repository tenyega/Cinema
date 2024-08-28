<?php

class Film extends Database
{

    public function getAll()
    {
        $request = $this->db->prepare("SELECT * FROM film");
        $request->execute();
        $data = $request->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public function getTitles()
    {
        $request = $this->db->prepare("SELECT titre FROM film");
        $request->execute();
        $data = $request->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
    public function getProj_Date()
    {
        $request = $this->db->prepare("SELECT date_debut_affiche FROM film");
        $request->execute();
        $data = $request->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public function getYear()
    {
        $request = $this->db->prepare("SELECT annee_prod FROM film");
        $request->execute();
        $data = $request->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
    public function getSelectedTitle($title)
    {
        $request = $this->db->prepare("SELECT * FROM film WHERE titre LIKE :title");
        $titleParam = '%' . $title . '%';
        $request->bindParam(':title', $titleParam, PDO::PARAM_STR);
        $request->execute();
        $data = $request->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public function getGenre()
    {
        $request = $this->db->prepare("SELECT nom FROM genre");
        $request->execute();
        $data = $request->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public function getFilmsByProjectionDate($proj_date)
    {
        $query = $this->db->prepare("SELECT * FROM film WHERE date_debut_affiche = :proj_date");
        $query->bindParam(':proj_date', $proj_date);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getFilmsByProductionYear($year)
    {
        $query = $this->db->prepare("SELECT * FROM film WHERE annee_prod = :year");
        $query->bindParam(':year', $year);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getFilms($filmSearch)
    {

        $query = $this->db->prepare("SELECT * FROM film WHERE titre LIKE :filmSearch");
        $filmSearch = '%' . $filmSearch . '%'; // Add wildcards to the search term
        $query->bindParam(':filmSearch', $filmSearch);
        $query->execute();

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getFilmsByGenre($genre)
    {
        $query = $this->db->prepare("
            SELECT * FROM film
            JOIN genre ON film.genre_id = genre.id
            WHERE genre.nom = :genre
        ");
        $query->bindParam(':genre', $genre);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
}
