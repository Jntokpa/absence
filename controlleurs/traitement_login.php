<?php
$ip = "196.180.172.198";
if (isset($_POST['connexion'])) {
    if (!empty($_POST['mail']) and !empty($_POST['pass'])) {
        $mail = htmlspecialchars($_POST['mail']);
        $pass = $_POST['pass'];

        $select_use->execute(array($mail, $pass));
        $nbre_user_exist = $select_use->rowCount();
        if ($nbre_user_exist == 0) {
            $message = "Compte inexistant ou erreur sur les parametres de connexion";
        } else {
            $info_user = $select_use->fetch();
            if ($info_user['typee'] == "Formateur") {
                $_SESSION['nom'] = $info_user['nom'];
                $_SESSION['prenoms'] = $info_user['prenoms'];
                $_SESSION['id'] = $info_user['id'];
                $_SESSION['type'] = $info_user['typee'];
                $_SESSION['connect'] = True;
                header('Location: formateur/index.php');
            } else {
                if ($info_user['typee'] == "Admin") {
                    $_SESSION['nom'] = $info_user['nom'];
                    $_SESSION['prenoms'] = $info_user['prenoms'];
                    $_SESSION['id'] = $info_user['id'];
                    $_SESSION['type'] = $info_user['typee'];
                    $_SESSION['connect'] = True;
                    header('Location: admin/index.php');
                } else {
                    if ($ip == "196.180.172.198") {
                        $_SESSION['nom'] = $info_user['nom'];
                        $_SESSION['prenoms'] = $info_user['prenoms'];
                        $_SESSION['id'] = $info_user['id'];
                        $_SESSION['type'] = $info_user['typee'];
                        $_SESSION['connect'] = True;
                        header('Location: apprenant/index.php');
                    } else {
                        $message = "Vous n'êtes pas en salle";
                    }
                }
            }
        }
    } else {
        $message = "Veuillez remplir tous les champs";
    }
}
