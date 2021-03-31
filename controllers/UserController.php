<?php
// Etape 2 : Récupération/Validation des données + Appel opérations
// Controller
class UserController {
    public static function index()
    {
        $error = NULL;
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $firstname = filter_input(INPUT_POST, "firstname");
                $lastname = filter_input(INPUT_POST, "lastname");
                $email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL); 
                
            if (!empty($firstname) && !empty($lastname) && !empty($email) ) {
                
                if ($firstname && $lastname && $email) {
                    $firstname = htmlspecialchars($firstname);
                    $lastname = htmlspecialchars($lastname);
                    $email = htmlspecialchars($email);

                    insert_user($firstname, $lastname, $email);
                } elseif ($email === false) {
                    $error = "L'adresse email n'est pas valide";
                } else {
                    $error = "Il manque des informations";
                }
            }
            
        }
        $users = get_users();
        
        // Etape 2b : Appel de la Vue
        // View
        $title = "Page d'accueil";
        require_once('views/user.php');
    }
}
