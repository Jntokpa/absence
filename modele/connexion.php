<?php
//connexion à la bdd
try {
    $bdd = new PDO('mysql:host=localhost;dbname=gestion_absence;charset=utf8', 'root', '');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

//verification de l'existance de l'utilisateur lors de la connexion
$select_use = $bdd->prepare('SELECT * FROM users WHERE mail=? AND pass=?');

//verification de l'existance de la seance
$select_seance = $bdd->prepare('SELECT * FROM seance WHERE date_seance=? AND id_user=?');

//enregistrement de l'arrivee
$ajout_arrivee = $bdd->prepare('INSERT INTO seance (date_seance, arrivee, id_user) VALUES (?, ?, ?)');

//enregistrement du depart
$ajout_depart = $bdd->prepare('UPDATE seance SET depart = ? WHERE date_seance = ? AND id_user = ?');

//releve de presence
$select_user_seance = $bdd->prepare('SELECT * FROM seance WHERE id_user = ? ORDER BY date_seance DESC');

//liste des apprenants
$select_apprenants = $bdd->prepare('SELECT * FROM users WHERE typee= "Apprenant(e)" ORDER BY nom ASC');

//liste des apprenants
$select_formateurs = $bdd->prepare('SELECT * FROM users WHERE typee= "Formateur" ORDER BY nom ASC');

//liste des admins
$select_admins = $bdd->prepare('SELECT * FROM users WHERE typee= "Admin" ORDER BY nom ASC');

//verification de l'existance de l'apprenant lors de son ajout puis ajout
//$select_apprenant = $bdd->prepare('SELECT * FROM users WHERE mail=?');
//$ajout_apprenant = $bdd->prepare('INSERT INTO users (nom,prenoms,sexe,contact,mail,pass,typee) VALUES (?, ?, ?, ?, ?, ?, ?)');

//verification de l'existance de du formateur lors de son ajout puis ajout
//$select_formateur = $bdd->prepare('SELECT * FROM users WHERE mail=?');
//$ajout_formateur = $bdd->prepare('INSERT INTO users (nom,prenoms,sexe,contact,mail,pass,typee) VALUES (?, ?, ?, ?, ?, ?, ?)');

//verification de l'existance de l'apprenant lors de son ajout puis ajout
$select_user = $bdd->prepare('SELECT * FROM users WHERE mail=?');
$ajout_user = $bdd->prepare('INSERT INTO users (nom,prenoms,sexe,contact,mail,pass,typee) VALUES (?, ?, ?, ?, ?, ?, ?)');

//liste seances
$select_seance_du_jour = $bdd->prepare('SELECT * FROM seance INNER JOIN users ON seance.id_user = users.id WHERE date_seance = ?');

//suppression d'un apprenant
$supprimer_user = $bdd->prepare('DELETE FROM users WHERE id = ?');
$del = filter_input(INPUT_GET, "del", FILTER_SANITIZE_NUMBER_INT);
if ($del) {
    $supprimer_user->execute(array($del));
}

//modifier les informations d'un user
$modifier_user = $bdd->prepare('UPDATE users SET nom = ?, prenoms = ?, sexe = ?, contact = ?, mail = ?, typee = ?, pass = ? WHERE id = ?');

//$verif_modif_correcte = $bdd->prepare('SELECT * FROM users WHERE mail=? ');

//selection de l'apprenant dont on veut modifier les caracteristiques
$modif = filter_input(INPUT_GET, "modif", FILTER_SANITIZE_NUMBER_INT);
$select_user_modif = $bdd->prepare('SELECT * FROM users WHERE id=?');
if ($modif) {
    $select_user_modif->execute(array($modif));
    $mod = $select_user_modif->fetch();
    $id = $mod["id"];
    $nom = $mod["nom"];
    $prenom = $mod["prenoms"];
    $sexe = $mod["sexe"];
    $contact = $mod["contact"];
    $mail = $mod["mail"];
    $type = $mod["typee"];
    $pass = $mod["pass"];
}

//selection du formateur dont on veut modifier les caracteristiques
$modif_f = filter_input(INPUT_GET, "modif_f", FILTER_SANITIZE_NUMBER_INT);
$select_user_modif = $bdd->prepare('SELECT * FROM users WHERE id=?');
if ($modif_f) {
    $select_user_modif->execute(array($modif_f));
    $mod = $select_user_modif->fetch();
    $id = $mod["id"];
    $nom = $mod["nom"];
    $prenom = $mod["prenoms"];
    $sexe = $mod["sexe"];
    $contact = $mod["contact"];
    $mail = $mod["mail"];
    $type = $mod["typee"];
    $pass = $mod["pass"];
}

//selection de l'admin dont on veut modifier les caracteristiques
$modif_a = filter_input(INPUT_GET, "modif_a", FILTER_SANITIZE_NUMBER_INT);
$select_user_modif = $bdd->prepare('SELECT * FROM users WHERE id=?');
if ($modif_a) {
    $select_user_modif->execute(array($modif_a));
    $mod = $select_user_modif->fetch();
    $id = $mod["id"];
    $nom = $mod["nom"];
    $prenom = $mod["prenoms"];
    $sexe = $mod["sexe"];
    $contact = $mod["contact"];
    $mail = $mod["mail"];
    $type = $mod["typee"];
    $pass = $mod["pass"];
}

//assidute apprenant
$consult = filter_input(INPUT_GET, "consult", FILTER_SANITIZE_NUMBER_INT);
$select_assidute_apprenant = $bdd->prepare('SELECT * FROM seance INNER JOIN users ON seance.id_user = users.id WHERE users.id = ? ORDER BY date_seance DESC');
$select_app = $bdd->prepare('SELECT * FROM users WHERE id=?');
if ($consult) {
    $select_assidute_apprenant->execute(array($consult));
    $select_app->execute(array($consult));
}

if (isset($_POST['trier'])) {
    if (!empty($_POST['de']) and !empty($_POST['a'])) {
        $debut = htmlspecialchars($_POST['de']);
        $fin = htmlspecialchars($_POST['a']);
        $select_assidute_apprenant = $bdd->prepare('SELECT * FROM seance INNER JOIN users ON seance.id_user = users.id WHERE users.id = ? AND date_seance BETWEEN ? AND ? ORDER BY date_seance DESC');
        $select_assidute_apprenant->execute(array($consult, $debut, $fin));
        $select_app->execute(array($consult));
    }
}










$select_produits = $bdd->prepare('SELECT * FROM produit ORDER BY libelle');
$select_all_user = $bdd->prepare('SELECT * FROM user');

$select_produit = $bdd->prepare('SELECT * FROM produit WHERE reference=?');
$select_lib_produit = $bdd->prepare('SELECT * FROM produit WHERE libelle=?');
$req_select_all_produit = 'SELECT * FROM produit ORDER BY libelle ASC';
$req_select_all_produit_rupture = 'SELECT * FROM produit WHERE quantite_en_stock < quantite_minimale';


//insertion
$ajout_produit = $bdd->prepare('INSERT INTO produit (libelle, quantite_minimale, quantite_en_stock) VALUES (?, ?, ?)');
$creer_compte = $bdd->prepare('INSERT INTO user (login, pass) VALUES (?, ?)');

//modifier les caracteristiques d'un produit
$modifier_produit = $bdd->prepare('UPDATE produit SET libelle = ?, quantite_minimale = ?, quantite_en_stock = ? WHERE reference = ?');

//selection du produit dont on veut modifier les caracteristiques
$modif = filter_input(INPUT_GET, "modif", FILTER_SANITIZE_NUMBER_INT);
if ($modif) {
    $select_produit->execute(array($modif));
    $infoProduit = $select_produit->fetch();
    $reference = $infoProduit["reference"];
    $libelle = $infoProduit["libelle"];
    $quantite_minimale = $infoProduit["quantite_minimale"];
    $quantite_en_stock = $infoProduit["quantite_en_stock"];
}

//Variation stock
$modifier_qtt_produit = $bdd->prepare('UPDATE produit SET quantite_en_stock = ? WHERE reference =?');

//selection du produit dont on veut enregistrer une variation de stock
$var = filter_input(INPUT_GET, "var", FILTER_SANITIZE_NUMBER_INT);
if ($var) {
    $select_produit->execute(array($var));
    $infoProduit = $select_produit->fetch();
    $reference = $infoProduit["reference"];
    $libelle = $infoProduit["libelle"];
    $quantite_minimale = $infoProduit["quantite_minimale"];
    $quantite_en_stock = $infoProduit["quantite_en_stock"];
}

//effacer produit
$supprimer_produit = $bdd->prepare('DELETE FROM produit WHERE reference = ?');
$del = filter_input(INPUT_GET, "del", FILTER_SANITIZE_NUMBER_INT);
if ($del) {
    $supprimer_produit->execute(array($del));
}
