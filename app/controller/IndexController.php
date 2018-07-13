<?php
class IndexController extends Controller {

    public function display() {
        
        $limit = $this->route['params']['limit'];
        $randomBeer = Beers::getRandom($limit);
        print_r($randomBeer);
        $template = $this->twig->loadTemplate('/Index/index.html.twig');
        echo $template->render(array(

            'randomBeer' => $randomBeer       
        ));
    }
}