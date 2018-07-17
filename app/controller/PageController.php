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

        $id = $this->route["params"]["id"];
        $beer = Beers::getBeer($id);
        $deg = Beers::getDeg($beer['id_BEE']);
        $style = Beers::getStyle($beer['id_BEE']);
        $desc = Beers::getDesc($beer['id_BEE']);
        $nationalite = Beers::getNationalite($beer['id_BEE']);

        $template = $this->twig->loadTemplate('/Page/infoBeer.html.twig');
        echo $template->render(array(
            
            'beer' => $beer,
            'deg' => $deg,
            'style' => $style,
            'desc' => $desc,
            'nationalite' => $nationalite,

        ));
    }
}