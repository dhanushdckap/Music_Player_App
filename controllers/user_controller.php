<?php
require("model/user_model.php");

class Controller {
    private $Model;

    public function __construct() {


        $this->Model = new Model();
    }


    public function home(){
        $album = $this->Model->showMusic();
        require "view/home.view.php";
    }


    public  function  artist_list(){
        $artist=$this->Model->showArtist();
        require "view/home.view.php";
    }


    public  function  music_list(){
        $album=$this->Model->showMusic();
        require "view/home.view.php";
    }


    public function login_Page($data){
        if ($data){
            $checkadmin= $this->Model->checkadmin($data);
            $check =$this->Model->login($data);
            if ($checkadmin){
                $_SESSION['admin']=$checkadmin->username;
                $this->home();

            }
            elseif ($check){
                $_SESSION['user']=$check->username;
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


    public function log_out(){
        session_destroy();
        header("location:/");

    }

    public function add_music($data,$musicImage){
        if ($data and $musicImage){
            var_dump($data);
            $this->Model->addMusic($data,$musicImage);
            $this->home();

        }
        else{
            $artistname =$this->Model->showArtist();
            require "view/insert_song.view.php";
        }
    }


    public function add_artist($artist,$image)
    {
        if ($artist and $image) {
            $this->Model->addArtist($artist, $image);
            $this->home();
        } else {
            require "view/insert_artists.view.php";
        }
    }


}