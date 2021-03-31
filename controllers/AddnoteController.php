<?php
// Etape 2 : Récupération/Validation des données + Appel opérations
// Controller
class AddnoteController {
    public static function index() {
        $getidcour = $_GET['id'];
        $error = NULL;

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $noncour = filter_input(INPUT_POST, "idcourse");
            $mark1 = filter_input(INPUT_POST, "mark1");
            $mark2 = filter_input(INPUT_POST, "mark2");
            $mark3 = filter_input(INPUT_POST, "mark3");
            $mark4 = filter_input(INPUT_POST, "mark4");
            $comm = filter_input(INPUT_POST, "comments");

            if ($noncour && $mark1 && $mark2 && $mark3 && $mark4 && $comm) {
                $noncour = htmlspecialchars($noncour);
                $mark1 = htmlspecialchars($mark1);
                $mark2 = htmlspecialchars($mark2);
                $mark3 = htmlspecialchars($mark3);
                $mark4 = htmlspecialchars($mark4);
                $comm = htmlspecialchars($comm);

                insert_com($noncour, $mark1, $mark2, $mark3, $mark4, $comm);
            } else {
                $error = "Il manque des informations";
            }
        }
        $title = "Ajouter un comentaire";
        $getcour = getcour($getidcour);
        $coms = get_com($getidcour);
        $idcours = get_IDcourse();
        require_once("views/addnote.php");
    }
}
