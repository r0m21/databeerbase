<?php

class Router {

    public static function analyse($request){
        $result = array(
            'controller'    => 'Error',
            'action'        => 'error404',
            'params'        => array()
        );

        if($request === '' || $request === '/'){ // Route vers la page d'accueil
            $result['controller']   = 'Page';
            $result['action']       = 'index';
        } else {
            $parts = explode('/', $request);

            if($parts[0] == 'login' && (count($parts) == 1 || $parts[1] == '')){ // Route vers la page de connexion
                $result['controller']       = 'User';
                $result['action']           = 'login';
            } elseif($parts[0] == 'signup' && (count($parts) == 1 || $parts[1] == '')){ // Route vers la page d'inscription
                $result['controller']       = 'User';
                $result['action']           = 'signup';
            } elseif($parts[0] == 'logout' && (count($parts) == 1 || $parts[1] == '')){ // Deconnexion de l'utilisateur
                $result['controller']       = 'User';
                $result['action']           = 'logout';
            } elseif($parts[0] == 'new-game' && (count($parts) == 1 || $parts[1] == '')){ // Nouvelle partie
                $result['controller']       = 'Game';
                $result['action']           = 'new';
            } elseif($parts[0] == 'game' && (count($parts) == 1 || $parts[1] == '')){ // Page Game
                $result['controller']       = 'Game';
                $result['action']           = 'game';
            } elseif($parts[0] == 'help' && (count($parts) == 1 || $parts[1] == '')){ // Page Help
                $result['controller']       = 'Page';
                $result['action']           = 'help';
            }
        }

        return $result;
    }
    
}