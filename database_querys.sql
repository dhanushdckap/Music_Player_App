drop DATABASE music_player_data;

CREATE DATABASE music_player_data;

use music_player_data;


CREATE TABLE login_info(
id int not null AUTO_INCREMENT,
username varchar(255) not null,
    email_id varchar(255)  not null,
    password varchar (255)  not null,
    is_premium int  not null,
    is_admin int  not null,
    created_at timestamp,
    updated_at timestamp,
    PRIMARY KEY(id)
);

INSERT INTO login_info (username,email_id,password,is_premium,is_admin,created_at,updated_at)
VALUES("dhanush","dhanushgdckap@gmail.com","dhanush3003",1,1,now(),now());

INSERT INTO login_info (username,email_id,password,is_premium,is_admin,created_at,updated_at)
VALUES("admin","admin123@gmail.com","admin@123",0,0,now(),now());

INSERT INTO login_info (username,email_id,password,is_premium,is_admin,created_at,updated_at)
VALUES("sunil","sunil@gmail.com","sunil@123",0,0,now(),now());



CREATE TABLE artist (
    id int not null auto_increment,
    artist_name varchar(255)  not null,
    PRIMARY KEY (id)

);
create table song(
    id int not null auto_increment,
    song_name varchar(255)  not null,
    songs_artist Int,
    songs_year varchar(4),
    primary key(id),
    FOREIGN KEY (songs_artist) REFERENCES artist(id)
);

CREATE TABLE images (
id int not null AUTO_INCREMENT,
image_path varchar(255),
    artist_id int,
    song_id int,
    PRIMARY key (id),
    FOREIGN key (artist_id) REFERENCES artist(id),
        FOREIGN key (song_id) REFERENCES song(id)

);