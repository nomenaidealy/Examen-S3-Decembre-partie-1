<?php

namespace app\models;

use Flight;

class BeneficeModel {

    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

public function filtrer($jour = null, $mois = null, $annee = null) {
    $sql = "SELECT * FROM v_date_livraison WHERE 1=1";

   
    if (!empty($jour)) {
        $sql .= " AND jour = :jour";
    }
    if (!empty($mois)) {
        $sql .= " AND mois = :mois";
    }
    if (!empty($annee)) {
        $sql .= " AND annee = :annee";
    }

    $stmt = $this->db->prepare($sql);

    
    if (!empty($jour)) {
        $stmt->bindValue(':jour', (int)$jour, \PDO::PARAM_INT);
    }
    if (!empty($mois)) {
        $stmt->bindValue(':mois', (int)$mois, \PDO::PARAM_INT);
    }
    if (!empty($annee)) {
        $stmt->bindValue(':annee', (int)$annee, \PDO::PARAM_INT);
    }

    $stmt->execute();
    $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);

    
    if (empty($result) && $jour === null && $mois === null && $annee === null) {
        $stmt = $this->db->query("SELECT * FROM v_date_livraison");
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    return $result;
}




    public function sommeBenefice($jour = null, $mois = null, $annee = null) {
        $livraison = $this->filtrer($jour, $mois , $annee);
        
        if(!empty($livraison)) {
            $beneficeTotal = 0 ;
        $coutRevient = 0 ;
        $reste = 0 ;
            foreach($livraison as $l){
                $beneficeTotal += $l['chiffre_affaire'] ;
                $coutRevient += $l['cout_revient'] ;
            }
            $reste = $beneficeTotal - $coutRevient ;
            return $reste;
        }
        return 0 ;
    }

}



