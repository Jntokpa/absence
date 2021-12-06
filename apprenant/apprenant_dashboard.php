<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2 text-primary">Accueil</h1>
    <label class="text-primary mr-5"> <?php if (isset($message)) {
                                            echo $message;
                                        }  ?> </label>
    <div class="btn-toolbar mb-2 mb-md-0">
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
        <!--button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
            <span data-feather="calendar"></span>
            This week
        </button-->
    </div>
</div>
ici tu afficheras ton truc de google map
<canvas class="my-4 w-100" id="myChart" width="900" height="100"></canvas>

<h5 class="text-primary">Relevé des presences</h5>

<div class="table-responsive">
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
                $select_user_seance->execute(array($_SESSION['id']));
                $i = 1;
                while ($info = $select_user_seance->fetch()) {
                    echo "<td>$i</td>";
                    echo "<td>$info[date_seance]</td>";
                    echo "<td>$info[arrivee]</td>";
                    echo "<td>$info[depart]</td>";
                    echo "</tr>";
                    $i++;
                }
                ?>
        </tbody>
    </table>
</div>