<?php
if (isset($_POST['arrivee'])) {
    date_default_timezone_set('Africa/Abidjan');
    $jour   = date('Y-m-d');
    $h_arrivee = date('H:i:s');
    $user_id = $_SESSION['id'];
    $select_seance->execute(array($jour, $user_id));
    $nbre_seance = $select_seance->rowCount();
    if ($nbre_seance != 0) {
        $message = "Vous vous êtes deja enregistré ce matin !!";
    } else {
        $ajout_arrivee->execute(array($jour, $h_arrivee, $user_id));
        $message = "Bienvenu(e) !!";
    }
}
