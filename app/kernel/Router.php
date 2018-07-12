<?php

class Router {

    public static function analyse($request){
        $result = array(
            'controller'    => 'Error',
            'action'        => 'error404',
            'params'        => array()
        );

        if($request === '' || $request === '/'){ // Route vers la page d'accueil
            $result['controller']   = 'Index';
            $result['action']       = 'display';
        } else {
            $parts = explode('/', $request); 
        }

        return $result;
    }
    
}