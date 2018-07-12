<?php

class Beers extends Model {


// ******** recupère une liste de 3 bières au hasard  ********

   public function getListRandom($limit) 
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
   public function Load($id) {
        $db = Database::getInstance();
        $sql = "SELECT * FROM  `beer`, `categories`, `style` WHERE cat_BEE = id_CAT and style_BEE=id_STY and id_BEE=:id";
        $stmt = $db->prepare($sql);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->bindValue(':id', intval($id), PDO::FETCH_ASSOC);
        $stmt->execute();
        return $stmt->fetchAll();
}

 // ******** recherche par degrés categories styles nom de bière
 // searchnamebeer searchcatnationalite shearchstyle cherchedeg 
   public function search() {

//   $sBeer=strip_tags($_POST["searchnamebeer"]);
//   $sCat=strip_tags($_POST["searchcatnationalite"]);
//   $sStyle=strip_tags($_POST["shearchstyle"]);
//   $sDeg=strip_tags($_POST["cherchedeg"]);

   
//        $db = Database::getInstance();
//        $sql = "SELECT * FROM  `beer`, `categories`, `style` WHERE cat_BEE =  and style_BEE=id_STY and id_BEE=:id";
//        $stmt = $db->prepare($sql);
//        $stmt->setFetchMode(PDO::FETCH_ASSOC);
//        $stmt->bindValue(':id', intval($id), PDO::FETCH_ASSOC);
//        $stmt->execute();
//        return $stmt->fetchAll();
//}









// ******** function désactivées  peuvent être utilisées comme modèle de code *************;

//public function __construct($i_idMod){};

        //parent::__construct($i_idMod);		



    //public function Load(){
    //    $sql = "select * from beer
    //            where id_BEE = " . $this->getID();
    //    if ($row = $this->db->query($sql)->fetch(PDO::FETCH_ASSOC)){
    //        $this->setFields($row);
    //    } else {
    //        $this->_id = -1;
    //        $this->setFields(array ());
    //    }	
    //}

//    public function Delete(){
//        if(!$this->IsDeletable()){
//            return false;
//        }

//        $sql = "delete from GAMES
//                where ID_GAME = " . $this->getID();
//        $this->db->exec($sql);

//        return true;
//    }

//    public function IsDeletable(){
//        return true;
//    }

//    public static function getRaces(){
//        $db = Database::getInstance();

//        $sql = "select * from RACES";
//        $races = $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);

//        return $races;
//    }

//    public static function getClasses(){
//        $db = Database::getInstance();

//        $sql = "select * from CLASSES";
//        $classes = $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);

//        return $classes;
//    }

//    public static function createGame($a_Values){
//        $db = Database::getInstance();
//        $return = array();
//        $error = 0;

//        if($a_Values['GAM_PSEUDO'] == ''){
//            $return[] = 'Veuillez saisir un nom de personnage';
//            $error++;
//        }
//        if($a_Values['GAM_RACE'] == ''){
//            $return[] = 'Veuillez sélectionner une race';
//            $error++;
//        }
//        if($a_Values['GAM_CLASSE'] == ''){
//            $return[] = 'Veuillez sélectionner une classe';
//            $error++;
//        }

//        if($error == 0){
//            $stmt = $db->prepare('insert into GAMES (
//                                    ID_USER,
//                                    GAM_PSEUDO,
//                                    GAM_RACE,
//                                    GAM_CLASSE) values (
//                                    :ID_USER,
//                                    :GAM_PSEUDO,
//                                    :GAM_RACE,
//                                    :GAM_CLASSE)'
//            );

//            $stmt->bindValue(':ID_USER', $a_Values['ID_USER'], PDO::PARAM_INT);
//            $stmt->bindValue(':GAM_PSEUDO', $a_Values['GAM_PSEUDO'], PDO::PARAM_STR);
//            $stmt->bindValue(':GAM_RACE', $a_Values['GAM_RACE'], PDO::PARAM_INT);
//            $stmt->bindValue(':GAM_CLASSE', $a_Values['GAM_CLASSE'], PDO::PARAM_INT);
//            $stmt->execute();
//            $id = $db->lastInsertID();

//            $_SESSION['Game'] = $id;

//            $return[] = 'Votre personnage a bien été enregistré.';
//        } else {
//            $return['unvalid'] = true;
//        }

//        return $return;
//    }

//    public function getClassName(){
//        $sql = "select * from CLASSES
//                where ID_CLASSE = " .$this->getField('GAM_CLASSE');
//        $classe = $this->db->query($sql)->fetch(PDO::FETCH_ASSOC);

//        return $classe;
//    }

//    public function getRaceName(){
//        $sql = "select * from RACES
//                where ID_RACE = " .$this->getField('GAM_RACE');
//        $classe = $this->db->query($sql)->fetch(PDO::FETCH_ASSOC);

//        return $classe;
//    }
//}