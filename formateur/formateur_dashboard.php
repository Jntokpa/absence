<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2 text-primary">Accueil</h1>
    <label class="text-primary mr-5"> <?php if (isset($message)) {
                                            echo $message;
                                        }  ?> </label>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <a href="ajout_apprenant.php" class="btn btn-sm btn-outline-primary">Ajouter un Apprenant</a>
        </div>
        <!--div class="btn-group me-2">
            <form action="" method="POST">
                <button type="submit" class="btn btn-sm btn-outline-warning" name="depart">Depart</button>
            </form>
        </div-->
        <!--button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
            <span data-feather="calendar"></span>
            This week
        </button-->
    </div>
</div>
en haut ici tu afficheras ton truc de google map si tu veux
<canvas class="my-4 w-100" id="myChart" width="900" height="100"></canvas>

<h5 class="text-primary">Liste des seances</h5>

<div class="table-responsive">
    <div>
        <?php
        if (isset($_POST['voir_seance'])) {
            $jour = htmlspecialchars($_POST['date_seance']);
        } else {
            $jour = date('Y-m-d');
        }

        ?>
        <form action="" method="POST">
            <div class="col-md-3">
                <input type="text" name="date_seance" class="form-control" placeholder="aaaa-mm-jj">
                <button type="submit" name="voir_seance" class="btn btn-primary mt-1">voir presence</button>
            </div>
        </form>
    </div>
    <p class="text-dark mt-3 mb-1"><strong>Seance du : <?= $jour; ?></strong> </p>
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nom</th>
                <th scope="col">Prenoms</th>
                <th scope="col">Heure Arrivée</th>
                <th scope="col">Heure Depart</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <?php
                $select_seance_du_jour->execute(array($jour));
                $i = 1;
                while ($info = $select_seance_du_jour->fetch()) {
                    echo "<td>$i</td>";
                    echo "<td>$info[nom]</td>";
                    echo "<td>$info[prenoms]</td>";
                    echo "<td>$info[arrivee]</td>";
                    echo "<td>$info[depart]</td>";
                    echo "<td>
                    <a class=\"btn btn-warning\" href=\"assidute_apprenant.php?consult=$info[id]\">Consulter sa regularité</a> ";
                    echo "<tr>";
                    $i++;
                }

                ?>
            <tr>
        </tbody>
    </table>
</div>