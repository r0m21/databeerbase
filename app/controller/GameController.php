<?php

class GameController extends Controller {

    /*
     * Création d'une nouvelle partie.
     */
    public function new(){
	$message = ''; $type = '';
        $races = Game::getRaces();
        $classes = Game::getClasses();

        if(isset($_POST['creaPersonnage']) && $_POST['creaPersonnage'] == 'create'){
            $new_game = Game::createGame($_POST);

            if(!isset($new_game['unvalid'])){
                $_SESSION['globalMessage'] = $signup[0];
                header('Location:/my-rpg/game');
            } else {
                unset($new_game['unvalid']);
                $message = $new_game;
                $type = 'error';
            }
        }
        
        if(isset($_SESSION['User']) && $_SESSION['User'] != ''){
            $o_User = new User($_SESSION['User']);
            
            if($o_User->hasGame()){
                header('Location:/my-rpg/game');
            }
        } else {
            header('Location:/my-rpg');
        }

        $template = $this->twig->loadTemplate('/Game/new-game.html.twig');
        echo $template->render(array(
            'message'   => $message,
            'type'      => $type,
            'races'     => $races,
            'classes'   => $classes
        ));
    }

    public function game(){
        if(isset($_SESSION['User']) && $_SESSION['User'] != ''){
            $o_User = new User($_SESSION['User']);
            
            if(!$o_User->hasGame()){
                header('Location:/my-rpg');
            }
        } else {
            header('Location:/my-rpg');
        }

        $o_Game = new Game($_SESSION['Game']);
        $a_Game = $o_Game->getFields();

        $classeName = $o_Game->getClassName();
        $raceName = $o_Game->getRaceName();

        $infosPlayer = $a_Game;
        $infosPlayer['race']    = $raceName['RAC_LIBELLE'];
        $infosPlayer['classe']  = $classeName['CLA_LIBELLE'];

        $template = $this->twig->loadTemplate('/Game/game.html.twig');
        echo $template->render(array(
            'infosPlayer'  => $infosPlayer
        ));
    }
}
