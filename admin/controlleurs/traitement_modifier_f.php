<?php
if (isset($_POST['modifier'])) {
    $id = htmlspecialchars($_POST['id']);
    $nom_nv = htmlspecialchars($_POST['nom']);
    $prenom_nv = htmlspecialchars($_POST['prenom']);
    $sexe_nv = htmlspecialchars($_POST['sexe']);
    $contact_nv = htmlspecialchars($_POST['contact']);
    $mail_nv = htmlspecialchars($_POST['mail']);
    $type_nv = htmlspecialchars($_POST['type']);
    $pass_nv = htmlspecialchars($_POST['pass']);
    $modifier_user->execute(array($nom_nv, $prenom_nv, $sexe_nv, $contact_nv, $mail_nv, $type_nv, $pass_nv,  $id));
    header('Location: ajout_formateur.php');
}
