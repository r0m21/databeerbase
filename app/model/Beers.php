<?php

class Beers extends Model {

// ******** recupère une liste de 3 bières au hasard  ********

   public static function getRandom() 
   {
        $db = Database::getInstance();
        
        $sql = "SELECT * FROM  beer, categories, style 
                WHERE cat_BEE = id_CAT 
                AND style_BEE = id_STY
                ORDER by RAND() LIMIT 3";

        $stmt = $db->prepare($sql);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();
        return $stmt->fetchAll();
   }

   // ******** recupère 1 bière par son id   ********
   public function getBeer($id) {
        $db = Database::getInstance();
        $sql = "SELECT * FROM  `beer`, `categories`, `style` 
                WHERE cat_BEE = id_CAT 
                AND style_BEE=id_STY 
                AND id_BEE=:id";

        $stmt = $db->prepare($sql);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->bindValue(':id', intval($id), PDO::FETCH_ASSOC);
        $stmt->execute();
        return $stmt->fetchAll();
}

 // ******** recherche par degrés categories styles nom de bière
// degBeermin => degrés / degBeerMax => degrés / nom => recherche bière / nationalite => nationalite des bières / styleBeer => style de bière
   public function search() {

   $sBeer="%".strip_tags($_POST["nom"])."%";
   $sCat=strip_tags($_POST["nationalite"]);
   $sStyle="%".strip_tags($_POST["styleBeer"])."%";
   $sDegMin=strip_tags($_POST["degBeerMin"]);
   $sDegMax=strip_tags($_POST["degBeerMax"]);

   
        $db = Database::getInstance();
        $sql = "SELECT * FROM  `beer`, `categories`, `style` 
                WHERE cat_BEE = id_CAT 
                AND style_BEE = id_STY 
                AND name_BEE like :nom 
                AND cat_BEE = :nationalite 
                AND name_STY like :styleBeer 
                AND deg_BEE >= :degBeermin 
                AND deg_BEE <= :degBeermax ORDER BY name_BEE ";

        $stmt = $db->prepare($sql);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->bindValue(':nom', $sBeer, PDO::FETCH_ASSOC);
        $stmt->bindValue(':nationalite', intval($sCat), PDO::FETCH_ASSOC);
        $stmt->bindValue(':styleBeer', $sStyle, PDO::FETCH_ASSOC);
        $stmt->bindValue(':degBeerMin', floatval($sDegMin), PDO::FETCH_ASSOC);
        $stmt->bindValue(':degBeerMax', floatval($sDegMax), PDO::FETCH_ASSOC);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}