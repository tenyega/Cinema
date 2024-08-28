<?php
class Membre extends Database
{
    public function getMember($member)
    {
        $memberName = strtolower($member);
        $query = $this->db->prepare("
            SELECT * FROM detail
            WHERE nom = :nom
        ");
        $query->bindParam(':nom', $memberName);
        $query->execute();
        $data = $query->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public function getClients()
    {
        $request = $this->db->prepare("SELECT nom FROM detail");
        $request->execute();
        $data = $request->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public function getClientDetail($clientNom)
    {
        $query = $this->db->prepare("
                    SELECT * 
            FROM film
            JOIN historique_membre ON film.id = historique_membre.film_id
            JOIN membre ON historique_membre.membre_id = membre.id
            JOIN detail ON membre.detail_id = detail.id
            WHERE detail.nom = :nom;
        ");
        $query->bindParam(':nom', $clientNom);
        $query->execute();
        $data = $query->fetchAll(PDO::FETCH_ASSOC);
        // var_dump($data);
        return $data;
    }
}
