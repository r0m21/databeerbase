<?php
class IndexController extends Controller {

    public function display() {
        


        $template = $this->twig->loadTemplate('/Index/display.html.twig');
        echo $template->render(array(
            
        ));
    }
}