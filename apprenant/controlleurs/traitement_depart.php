<?php
if (isset($_POST['depart'])) {
    date_default_timezone_set('Africa/Abidjan');
    $jour   = date('Y-m-d');
    $h_depart = date('H:i:s');
    $user_id = $_SESSION['id'];
    $select_seance->execute(array($jour, $user_id));
    $nbre_seance = $select_seance->rowCount();
    if ($nbre_seance != 0) {
        $info_seance = $select_seance->fetch();
        if ($info_seance['depart']) {
            $message = "Vous avez deja enregistré votre depart !!";
        } else {
            $ajout_depart->execute(array($h_depart, $jour, $user_id));
            $message = "Rentrez bien!!";
        }
    } else {
        $message = "Vous n'avez pas emmargé ce matin. Veuillez le faire avant !!";
    }
}
