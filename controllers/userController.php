<?php
require ("model/userModel.php");

class Controller {
    private $model;

    public function __construct() {


        $this->model = new model();
    }


    public function home(){
        require "view/home.view.php";
    }


    public function login_page($data){
        if ($data){
            $checked= $this->model->login_info($data);
            if ($checked){
                $_SESSION['name']=$checked->username;
                $this->home();
            }
            else{
                $session['error']='user is not existed';
                require "view/login.view.php";
            }
        }
        else{
            require "view/login.view.php";
        }
    }


    public function logout_user(){
        session_destroy();
        $this->home();

    }


    public function add_music($data,$musicImage){
        if ($data and $musicImage){
            var_dump($data);
            var_dump($musicImage);
            $this->model->add_music($data,$musicImage);
        }
        else{
            $artistname =$this->model->showArtist();

            require "view/add_song.view.php";
        }
    }


    public function Add_Artist($image,$artist){
        dieAndDump($artist);
        if ($image and $artist ){
            $this->model->Add_Artist($image,$artist);
            $this->home();

        }
        else{
            require "view/Add_artists.view.php";
        }
    }

}