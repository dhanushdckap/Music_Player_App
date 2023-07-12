<?php

class router
{
    public $router = [];
    public $controller;

    public function __construct()
    {
        $this->controller = new Controller();
    }


    public function get($uri, $action)
    {
        $this->router[] = [
            'uri' => $uri,
            'action' => $action,
            'method' => 'GET',
        ];
        return $this;
    }
    public function post($uri, $action)
    {
        $this->router[] = [
            'uri' => $uri,
            'action' => $action,
            'method' => 'POST',
        ];
        return $this;
    }



    public function routing()
    {
        foreach ($this->router as $router) {
            if ($router['uri']==$_SERVER['REQUEST_URI']){
                if ($router['action']) {
                    switch ($router['action']) {
                        case'login':
                            $this->controller->login_Page($_POST);
                            break;
                        case'logout':
                            $this->controller->log_out();
                            break;
                        case'add_music':
                            $this->controller->add_music($_POST,$_FILES);
                            break;
                        case'artist_list':
                            $this->controller->artist_list();
                            break;
                        case'music_list':
                            $this->controller->music_list();
                            break;

                        case'add_artist':
                            $this->controller->add_artist($_POST,$_FILES);
                            break;
                        default:
                            $this->controller->home();
                    }

                } else {
                    $this->controller->home();
                }

            }

        }

    }
}

