<?php

class Game extends Model {

    public function __construct($i_idMod){
        parent::__construct($i_idMod);		
    }

	public function Load(){
		$sql = "select * from GAMES
                where ID_GAME = " . $this->getID();
	    if ($row = $this->db->query($sql)->fetch(PDO::FETCH_ASSOC)){
            $this->setFields($row);
        } else {
            $this->_id = -1;
            $this->setFields(array ());
        }	
	}

	public function Delete(){
        if(!$this->IsDeletable()){
            return false;
        }

        $sql = "delete from GAMES
                where ID_GAME = " . $this->getID();
        $this->db->exec($sql);

        return true;
    }

    public function IsDeletable(){
        return true;
    }

    public static function getRaces(){
        $db = Database::getInstance();

        $sql = "select * from RACES";
        $races = $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);

        return $races;
    }

    public static function getClasses(){
        $db = Database::getInstance();

        $sql = "select * from CLASSES";
        $classes = $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);

        return $classes;
    }

    public static function createGame($a_Values){
        $db = Database::getInstance();
        $return = array();
        $error = 0;

        if($a_Values['GAM_PSEUDO'] == ''){
            $return[] = 'Veuillez saisir un nom de personnage';
            $error++;
        }
        if($a_Values['GAM_RACE'] == ''){
            $return[] = 'Veuillez sélectionner une race';
            $error++;
        }
        if($a_Values['GAM_CLASSE'] == ''){
            $return[] = 'Veuillez sélectionner une classe';
            $error++;
        }

        if($error == 0){
            $stmt = $db->prepare('insert into GAMES (
                                    ID_USER,
                                    GAM_PSEUDO,
                                    GAM_RACE,
                                    GAM_CLASSE) values (
                                    :ID_USER,
                                    :GAM_PSEUDO,
                                    :GAM_RACE,
                                    :GAM_CLASSE)'
            );

            $stmt->bindValue(':ID_USER', $a_Values['ID_USER'], PDO::PARAM_INT);
            $stmt->bindValue(':GAM_PSEUDO', $a_Values['GAM_PSEUDO'], PDO::PARAM_STR);
            $stmt->bindValue(':GAM_RACE', $a_Values['GAM_RACE'], PDO::PARAM_INT);
            $stmt->bindValue(':GAM_CLASSE', $a_Values['GAM_CLASSE'], PDO::PARAM_INT);
            $stmt->execute();
            $id = $db->lastInsertID();

            $_SESSION['Game'] = $id;

            $return[] = 'Votre personnage a bien été enregistré.';
        } else {
            $return['unvalid'] = true;
        }

        return $return;
    }

    public function getClassName(){
        $sql = "select * from CLASSES
                where ID_CLASSE = " .$this->getField('GAM_CLASSE');
        $classe = $this->db->query($sql)->fetch(PDO::FETCH_ASSOC);

        return $classe;
    }

    public function getRaceName(){
        $sql = "select * from RACES
                where ID_RACE = " .$this->getField('GAM_RACE');
        $classe = $this->db->query($sql)->fetch(PDO::FETCH_ASSOC);

        return $classe;
    }
}