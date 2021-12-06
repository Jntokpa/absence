<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <?php
    $info = $select_app->fetch(); ?>
    <h1 class="h2 text-primary">Assidute de
        <?= $info['prenoms'] . " " . $info['nom']; ?>
    </h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <a href="index.php" class="btn btn-sm btn-outline-primary me-2">Accueil</a>
            <a href="ajout_formateur.php" class="btn btn-sm btn-outline-primary me-2">Formateur</a>
            <a href="ajout_apprenant.php" class="btn btn-sm btn-outline-primary">Apprenant</a>
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

<div class="table-responsive">
    <div class="mb-2">
        <strong>Trier</strong>
        <form action="" method="POST" class="row">
            <div class="col-md-2">
                <input type="text" name="de" class="form-control" placeholder="De:">
            </div>
            <div class="col-md-2">
                <input type="text" name="a" class="form-control" placeholder="à:">
            </div>
            <div class="col-md-1">
                <button type="submit" name="trier" class="btn btn-warning">OK</button>
            </div>
        </form>
    </div>

    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Date</th>
                <th scope="col">Heure Arrivée</th>
                <th scope="col">Heure Depart</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <?php
                $i = 1;
                while ($infos = $select_assidute_apprenant->fetch()) {
                    echo "<td></td>";
                    echo "<td>$infos[date_seance]</td>";
                    echo "<td>$infos[arrivee]</td>";
                    echo "<td>$infos[depart]</td>";
                    echo "<tr>";
                    $i++;
                }

                ?>

        </tbody>
    </table>
</div>