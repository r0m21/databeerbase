<?php

class PageController extends Controller{

    public function searchBeer(){

        $search = Beers::searchBeer($_GET);
        $option = Beers::getCategories();
   

        $template = $this->twig->loadTemplate('/Page/searchBeer.html.twig');
        echo $template->render(array(
            
            "search" => $search,
            "option" => $option
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
        $style = Beers::getStyle($id);
        $nationalite = Beers::getNationalite($id);

        $template = $this->twig->loadTemplate('/Page/infoBeer.html.twig');
        echo $template->render(array(
            
            'infobeer' => $beer,
            'style' => $style,
            'nationalite' => $nationalite,

        ));
    }

    public function ajaxSearch(){
        $valeur = $this->route["params"]["valeur"];
        $result = Beers::getAutoStyle($valeur);
        $j_result = json_encode($result);

        echo $j_result;

    }
}