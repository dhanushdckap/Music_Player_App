<?php

class database
{
    public $db;
    public function __construct(){
        try {
            $this->db= new PDO
            ("mysql:host=localhost;dbname=music_player_data",
                "root",
                "welcome");
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
}

class model extends database{


    public function login_info($data){
        try {
            $email=$data['email'];
            $password=$data['password'];
            $check=$this->db->query("select * from login_info where email_id ='$email' and password ='$password'")->fetch(PDO::FETCH_OBJ);
            return $check;
        }
        catch (PDOException $e){
            die($e->getMessage());
        }

    }





    public function Add_Artist($image,$artist){
        try {
            $artist_name =$artist['artistName'];

            $this->db->query("Insert into artist (artist_name) values ('$artist_name')");
            $get_data=$this->db->query("select * from artist");
            $fetching_data=  $get_data->fetch(PDO::FETCH_OBJ);

            $total_artists = count($image['artist']['name']);
            for( $i=0 ; $i < $total_artists ; $i++ ) {
                $filePath = "Songs/artists/".$image['artist']['name'][$i];
                $tmpFilePath = $image['artist']['tmp_name'][$i];
                move_uploaded_file($tmpFilePath, $filePath);
                $this->db->query("Insert into images (image_path,artist_id,created_at) values ('$filePath','$fetching_data->id',now())");

            }
        }
        catch (PDOException $e){
            die($e->getMessage());
        }
    }

    function showArtist(){
        $artistnames=$this->db->query("select * from artist" )->fetchAll(PDO::FETCH_OBJ);
        return $artistnames;
    }

    public  function  add_music($music,$music_image){
        try {
            $musicName =$music['musicName'];
            $artistName =$music['artist'];

            $this->db->query("Insert into song (song_name,songs_artist,created_at) values ('$musicName','$artistName',now())");
            $getting_data_song=$this->db->query("select * from song order by id desc limit 1");
            $getting_data_songs_list=  $getting_data_song->fetch(PDO::FETCH_OBJ);

            $total_music = count($music_image['music']['name']);
            for( $i=0 ; $i < $total_music ; $i++ ) {
                $filePath = "Songs/music/".$music_image['music']['name'][$i];
                $tmpFilePath = $music_image['music']['tmp_name'][$i];
                move_uploaded_file($tmpFilePath, $filePath);
                $this->db->query("Insert into images (image_path,album_id) values ('$filePath','$getting_data_songs_list->id')");
            }
        }
        catch (PDOException $e){
            die($e->getMessage());
        }
    }
}