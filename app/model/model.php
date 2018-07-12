<?php

class Beers extends Model {


// ******** recupère une liste de 3 bières au hasard  ********

   public function getRandom($limit) 
   {
        $db = Database::getInstance();
        $sql = "SELECT * FROM  `beer`, `categories`, `style` WHERE cat_BEE = id_CAT and style_BEE=id_STY ORDER by RAND() LIMIT :limit";
        $stmt = $db->prepare($sql);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->bindValue(':limit', intval($limit), PDO::FETCH_ASSOC);
        $stmt->execute();
        return $stmt->fetchAll();
   }

   // ******** recupère 1 bière par son id   ********
   public function getBeer($id) {
        $db = Database::getInstance();
        $sql = "SELECT * FROM  `beer`, `categories`, `style` WHERE cat_BEE = id_CAT and style_BEE=id_STY and id_BEE=:id";
        $stmt = $db->prepare($sql);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->bindValue(':id', intval($id), PDO::FETCH_ASSOC);
        $stmt->execute();
        return $stmt->fetchAll();
}

 // ******** recherche par degrés categories styles nom de bière
 // degBeer => degrés / nom => recherche bière / nationalite => nationalite des bières / styleBeer => style de bière 
   public function search() {

   $sBeer=strip_tags($_POST["nom"]);
   $sCat=strip_tags($_POST["nationalite"]);
   $sStyle=strip_tags($_POST["stylebeer"]);
   $sDeg=strip_tags($_POST["degBeer"]);

   
        $db = Database::getInstance();
        $sql = "SELECT * FROM  `beer`, `categories`, `style` WHERE cat_BEE =  and style_BEE=id_STY and id_BEE=:id";
        $stmt = $db->prepare($sql);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->bindValue(':id', intval($id), PDO::FETCH_ASSOC);
        $stmt->execute();
        return $stmt->fetchAll();
}
}