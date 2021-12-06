<?php
$message = "Les champs avec * sont obligatoires";
if (isset($_POST['ajouter'])) {
    if (!empty($_POST['nom']) and !empty($_POST['prenom']) and !empty($_POST['mail'])) {
        $nom = htmlspecialchars($_POST['nom']);
        $prenom = htmlspecialchars($_POST['prenom']);
        $sexe = htmlspecialchars($_POST['sexe']);
        $contact = htmlspecialchars($_POST['contact']);
        $mail = htmlspecialchars($_POST['mail']);
        $pass = htmlspecialchars($_POST['pass']);
        $type = "Admin";

        $select_user->execute(array($mail));
        $nbre_admin_exist = $select_user->rowCount();
        if ($nbre_admin_exist != 0) {
            $message = "Compte existant!! Cet email est deja attribué";
        } else {
            $ajout_user->execute(array($nom, $prenom, $sexe, $contact, $mail, $pass, $type));
            $message = "Admin ajouté avec succes";
        }
    } else {
        $message = "Veuillez remplir les champs obligatoires *";
    }
}
