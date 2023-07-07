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
            $userName = $_SESSION['name'];
            $check=$this->db->query("select * from login_info where email_id ='$email' and password ='$password'")->fetch(PDO::FETCH_OBJ);
            return $check;
            //

//            function email_sending($userName,$email){
//
//            use PHPMailer\PHPMailer\PHPMailer;
//            use PHPMailer\PHPMailer\SMTP;
//            use PHPMailer\PHPMailer\Exception;
//
//
////Load Composer's autoloader
//                require 'vendor/autoload.php';
//
////Create an instance; passing `true` enables exceptions
//                $mail = new PHPMailer(true);
//
//                try {
//                    //Server settings
//                    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
//                    $mail->isSMTP();                                            //Send using SMTP
//                    $mail->Host       = 'sandbox.smtp.mailtrap.io';                     //Set the SMTP server to send through
//                    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
//                    $mail->Username   = '3486251aed3f35';                     //SMTP username
//                    $mail->Password   = '54c416d3ab3214';                               //SMTP password
//                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
//                    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
//
//                    //Recipients
//                    $mail->setFrom('dhanushgdckap@gmail.com', 'dhanush');
//                    $mail->addAddress($email, $userName);     //Add a recipient
//                    $mail->addAddress('ellen@example.com');               //Name is optional
//                    $mail->addReplyTo('info@example.com', 'Information');
//                    $mail->addCC('cc@example.com');
//                    $mail->addBCC('bcc@example.com');
//
//                    //Attachments
////                $mail->addAttachment('/tmp/image.jpg', 'new.jpg');
//
//                    //Add attachments
////    $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
//
//                    //Content
//                    $mail->isHTML(true);                                  //Set email format to HTML
//                    $mail->Subject = 'Here is the subject';
//                    $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
//                    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
//
//                    $mail->send();
//                    echo 'Message has been sent';
//                } catch (Exception $e) {
//                    echo "<pre>";
//                    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
//                    echo "</pre>";
//                }
//
//            }


        }
        catch (PDOException $e){
            die($e->getMessage());
        }

    }





    public function Add_Artist($artist,$image){
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
        $artist_names=$this->db->query("select * from artist" )->fetchAll(PDO::FETCH_OBJ);
        return $artist_names;
    }

    public  function  add_music($music,$music_image){
        try {
            $musicName =$music['musicName'];
            $artistName =$music['artist'];

            $this->db->query("Insert into song (song_name,songs_artist,songs_year) values ('$musicName','$artistName',now())");
            $getting_data_song=$this->db->query("select * from song");
            $getting_data_songs_list=  $getting_data_song->fetch(PDO::FETCH_OBJ);

            $total_music = count($music_image['music']['name']);
            for( $i=0 ; $i < $total_music ; $i++ ) {
                $filePath = "Songs/music/".$music_image['music']['name'][$i];
                $tmpFilePath = $music_image['music']['tmp_name'][$i];
                move_uploaded_file($tmpFilePath, $filePath);
                $this->db->query("Insert into images (image_path,song_id) values ('$filePath','$getting_data_songs_list->id')");
            }
        }
        catch (PDOException $e){
            die($e->getMessage());
        }
    }

    public function email_sending(){

    }
}