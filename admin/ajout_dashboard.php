<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2 text-primary">Ajout Apprenant</h1>
    <label class="text-primary"> <?php if (isset($message)) {
                                        echo $message;
                                    }  ?> </label>
    <!--div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <form action="" method="POST">
                <button type="submit" class="btn btn-sm btn-outline-primary" name="arrivee">Arrivée</button>
            </form>
        </div>
        <div class="btn-group me-2">
            <form action="" method="POST">
                <button type="submit" class="btn btn-sm btn-outline-warning" name="depart">Depart</button>
            </form>
        </div>
    </div-->
</div>

<form class="row g-3" action="" method="POST">
    <div class="col-md-6">
        <label for="nom" class="form-label">NOM *</label>
        <input type="text" class="form-control" id="nom" name="nom">
    </div>
    <div class="col-md-6">
        <label for="prenom" class="form-label">PRENOMS *</label>
        <input type="text" class="form-control" id="prenom" name="prenom">
    </div>
    <div class=" col-md-6">
        <label for="sexe" class="form-label">SEXE</label>
        <select id="sexe" class="form-select" name="sexe">
            <option value="">Choisir</option>
            <option value="M">M</option>
            <option value="F">F</option>
        </select>
    </div>
    <div class="col-md-6">
        <label for="contact" class="form-label">CONTACT</label>
        <input type="text" class="form-control" id="contact" name="contact">
    </div>
    <div class=" col-md-6">
        <label for="mail" class="form-label">EMAIL *</label>
        <input type="email" class="form-control" id="mail" name="mail">
    </div>
    <div class=" col-md-6">
        <label for="pass" class="form-label">PASSWORD</label>
        <input type="password" class="form-control" id="pass" name="pass">
    </div>
    <div class=" col-12">
        <button type="submit" class="btn btn-warning" name="ajouter">Ajouter</button>
    </div>
</form>

<h6 class="text-primary mt-5">Liste des apprenants</h6>

<div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nom</th>
                <th scope="col">Prenoms</th>
                <th scope="col">Sexe</th>
                <th scope="col">Contact</th>
                <th scope="col">Email</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <?php
                $select_apprenants->execute();
                $i = 1;
                while ($info = $select_apprenants->fetch()) {
                    echo "<td>$i</td>";
                    echo "<td>$info[nom]</td>";
                    echo "<td>$info[prenoms]</td>";
                    echo "<td>$info[sexe]</td>";
                    echo "<td>$info[contact]</td>";
                    echo "<td>$info[mail]</td>";
                    echo "<td>
                                    <a class=\"btn btn-danger\" href=\"?del=$info[id]\">Supprimer</a>
                                    <a class=\"btn btn-warning\" href=\"modifier.php?modif=$info[id]\">Modifier</a>
                                    <a class=\"btn btn-primary\" href=\"assidute_apprenant.php?consult=$info[id]\">Consulter</a> ";
                    echo "</tr>";
                    $i++;
                }
                ?>
        </tbody>
    </table>
</div>
</div>