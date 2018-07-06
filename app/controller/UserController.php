<?php

class UserController extends Controller {

    /**
     * Fonction d'affichage et de traitement du login
     */
    public function login(){
        $message = ''; $type = '';
        unset($_SESSION['globalMessage']);

        if(isset($_POST['submitLogin']) && $_POST['submitLogin'] == 'Connexion'){
            $login = $_POST['login']; $password = $_POST['password'];
            $is_log = User::login($login, $password);

            if(!isset($is_log['unvalid'])){
                $_SESSION['globalMessage'] = $is_log[0];
                header('Location:/my-rpg');
            } else {
                unset($is_log['unvalid']);
                $message = $is_log;
                $type = 'error';
            }
        }        

        $template = $this->twig->loadTemplate('/User/login.html.twig');
        echo $template->render(array(
                'message'   => $message,
                'type'      => $type
            )
        );
    }

    /**
     * Fonction d'affichage et de traitement d'inscription
     */
    public function signup(){
        $message = ''; $type = '';

        if(isset($_POST['submitSignup']) && $_POST['submitSignup'] == 'Inscription'){
            $signup = User::signup($_POST);

            if(!isset($signup['unvalid'])){
                $_SESSION['globalMessage'] = $signup[0];
                header('Location:/my-rpg/login');
            } else {
                unset($signup['unvalid']);
                $message = $signup;
                $type = 'error';
            }
        }

        $template = $this->twig->loadTemplate('/User/signup.html.twig');
        echo $template->render(array(
                'message'   => $message,
                'type'      => $type
            )
        );
    }

    public function logout(){
        $_SESSION = array();
        header('Location:/my-rpg');
    }
}