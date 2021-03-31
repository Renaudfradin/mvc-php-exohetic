<?php
// Etape 2 : Récupération/Validation des données + Appel opérations
// Controller
class AddprofController {
    public static function index() {
        $error = NULL;
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $name = filter_input(INPUT_POST, "name");
            $at = filter_input(INPUT_POST, "at");
            $room = filter_input(INPUT_POST, "room");
            $prof_fistname = filter_input(INPUT_POST, "prof_fistname");
            $prof_lastname = filter_input(INPUT_POST, "prof_lastname");


            if ($name && $at && $room && $prof_fistname && $prof_lastname) {
                $name = htmlspecialchars($name);
                $at = htmlspecialchars($at);
                $room = htmlspecialchars($room);
                $prof_fistname = htmlspecialchars($prof_fistname);
                $prof_lastname = htmlspecialchars($prof_lastname);

                insert_course($name,$at,$room,$prof_fistname,$prof_lastname);
            } else {
                $error = "Il manque des informations";
            }
        }
        $cours = get_course();
        
        // Etape 2b : Appel de la Vue
        // View
        $title = "Ajouter un cour";
        require_once('views/addprof.php');
    }
}
