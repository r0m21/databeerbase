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
            $result['params']['limit'] = 3;
    
        } else {
            $parts = explode('/', $request); 

            if($parts[0] == 'recherche' && (count($parts) == 1 || $parts[1] == '')){
                $result['controller']   = 'Page';
                $result['action']       = 'searchBeer';
            }
            else if($parts[0] == 'informations' && (count($parts) == 1 || $parts[1] == '')){
                $result['controller']   = 'Page';
                $result['action']       = 'informations';
            }
            else if($parts[0] == 'info-beer' && count($parts) == 2){
                $result['controller']   = 'Page';
                $result['action']       = 'infoBeer';
                $result['params']['id'] = $parts[1];
            }
            else if($parts[0] == 'search-style' && count($parts) == 2){
                $result['controller'] = 'Page';
                $result['action'] = 'ajaxSearch';
                $result['params']['valeur'] = $parts[1];
            }
        }
        
        return $result;
    }
    
}