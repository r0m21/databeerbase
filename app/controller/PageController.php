<?php

class PageController extends Controller {

    public function index(){
        unset($_SESSION['globalMessage']);
        $has_game = false;

        if(isset($_SESSION['User']) && $_SESSION['User'] != ''){
            $o_User = new User($_SESSION['User']);
            
            if(!$o_User->hasGame()){
                header('Location:/my-rpg/new-game');
            } else {
                $has_game = true;
            }
        }

        $template = $this->twig->loadTemplate('/Page/index.html.twig');
        echo $template->render(array(
            'has_game'  => $has_game
        ));
    }

    public function help(){
        $template = $this->twig->loadTemplate('/Page/help.html.twig');
        echo $template->render(array());
    }
}