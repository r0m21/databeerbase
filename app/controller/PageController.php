<?php

class PageController extends Controller{

    public function searchBeer(){
        $template = $this->twig->loadTemplate('/Page/searchBeer.html.twig');
        echo $template->render(array(
            
        ));


    }

    public function informations(){
        $template = $this->twig->loadTemplate('/Page/infos.html.twig');
        echo $template->render(array(
            
        ));
    }

    public function infoBeer(){
        $template = $this->twig->loadTemplate('/Page/infoBeer.html.twig');
        echo $template->render(array(
            
        ));
    }
}