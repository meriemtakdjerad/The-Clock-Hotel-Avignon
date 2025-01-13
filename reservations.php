<?php
if (isset($_GET['line_num'])){
    $line_num = $_GET['line_num'];
    $file = file("listederesarvations.txt");
    unset($file[$line_num]);
    file_put_contents("listederesarvations.txt", $file);
}

$file = file("listederesarvations.txt");
$numresa = sizeof($file);

$maxparpage = 2;
if (isset($_GET['p'])){
    $p = $_GET['p'];
} else {
    $p = 1;
}
?>

<div class="w3-content">
    <section class="w3-card-4 w3-margin">
        <div class="w3-container ">
            <h2>Réservations en cours</h2>
        </div>
        <div class="w3-container">
            <label for="myInput" class="w3-text-blue-grey">Filtre</label>
            <input type="text" id="myInput" onkeyup="myFilter()" placeholder="Texte du filtre" title="Type in a text">
            <label for="my" class="w3-text-blue-grey">Page</label>
            <?php
                $j = 0;
                for($i=0; $i<$numresa; $i++){
                    if ($i % $maxparpage == 0){
                        $j++;
                        echo "<a href='index.php?page=reservations.php&p=$j' class='w3-button";
                        if ($j == $p){ echo " w3-blue"; }
                        echo "''>$j</a>";
                    }
                } 
            ?>
        </div>

        <table id="myTable" class="w3-table-all w3-centered ">
            <thead>
                <tr class="w3-bleu  ">
                    <th>id</th>
                    <th>Nom</th>
                    <th>Taille de chambre</th>
                    <th>Durée du séjour</th>
                    <th>Modification</th>
                    <th>Suppression</th>
                </tr>
            </thead>
            <?php
        foreach ($file as $line_num => $line) {
            if ($line_num >= ($p-1)*$maxparpage && $line_num < ($p)*$maxparpage){
                list($id,$nom,$taille,$sejour) = explode("|", $line);
                echo "<tr><td>$id</td><td>$nom</td><td>$taille</td><td>$sejour</td><td style='text-align:center'><a href='index.php?page=modifresa.php&line_num=$line_num' class='fa fa-edit' style='text-decoration: none;'/></td><td><a href='index.php?page=reservations.php&line_num=$line_num' class='fa fa-close' style='text-decoration: none;'/></td></tr>";
            }
        }
        ?>
        </table>
    </section>
</div>

<script>
function myFilter() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("myTable");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td");
        match = 0;
        for (j = 1; j < td.length; j++) {
            txtValue = td[j].textContent || td[j].innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                match = 1
            } 
        }
        if (match == 1) {tr[i].style.display = "";} else {tr[i].style.display = "none";}     
    }
}
</script>
