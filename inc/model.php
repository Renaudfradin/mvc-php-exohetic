<?php
// Etape 2a : Structure BDD, appel BDD, ...
// Model
function getPDO() {
    return new PDO("mysql:host=localhost;dbname=projetnote", "root", "", [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
}




function get_course(){
    $stmt = getPDO()->prepare("SELECT * FROM subjects");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
} 

function insert_course($name,$at,$room,$prof_fistname,$prof_lastname) {
    $stmt = getPDO()->prepare("
    INSERT INTO subjects (id, name, at, room, prof_fistname, prof_lastname) 
    VALUES (NULL, :name, :at, :room, :prof_fistname, :prof_lastname)
    ");
    $stmt->execute([
        "name" => $name,
        "at" => $at,
        "room" => $room,
        "prof_fistname" => $prof_fistname,
        "prof_lastname" => $prof_lastname
    ]);
}




function get_users() {
    $stmt = getPDO()->prepare("SELECT * FROM users");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function insert_user($firstname, $lastname, $email) {
    $stmt = getPDO()->prepare("
    INSERT INTO users (id, firstname, lastname, email) 
    VALUES (NULL, :fn, :ln, :e)
    ");
    $stmt->execute([
        "fn" => $firstname,
        "ln" => $lastname,
        "e" => $email
    ]);
}


function get_IDcourse(){
    $stmt = getPDO()->prepare("SELECT `id`,`name` FROM subjects");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
} 

function get_com($getidcour) {
    $stmt = getPDO()->prepare("SELECT * FROM subject_marks where subject_id = $getidcour");
    //$stmt = getPDO()->prepare("SELECT * FROM subjects INNER JOIN subject_marks ON subjects.name = subject_marks.subject_id INNER JOIN subjects ON subject_marks.subject_id = subjects.name");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function insert_com($noncour, $mark1, $mark2, $mark3, $mark4, $comm) {
    $stmt = getPDO()->prepare("
    INSERT INTO subject_marks (id, subject_id, mark1, mark2, mark3, mark4, comments) 
    VALUES (NULL, :noncour, :mark1, :mark2, :mark3, :mark4, :comm);
    ");
    $stmt->execute([
        "noncour" =>$noncour,
        "mark1" =>$mark1,
        "mark2" =>$mark2,
        "mark3" =>$mark3,
        "mark4" =>$mark4,
        "comm" =>$comm
    ]);
}

function getcour($getidcour){
    $stmt = getPDO()->prepare("SELECT * FROM subjects WHERE id = $getidcour");
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}