<?php
$file = file("listederesarvations.txt");
$numresa = sizeof($file);

if (!empty($_POST["id"]) and  !empty($_POST["nom"]) and !empty($_POST["taille"]) and !empty($_POST["sejour"])){
  
  $reserv = $_POST['id'] . "|"  . $_POST['nom']. "|" . $_POST['taille'] . "|" . $_POST['sejour'] . "\n";
 
  $file[$_POST['line_num']] = $reserv;
 
  file_put_contents("listederesarvations.txt", $file);
  echo "<div class='w3-content'>";
  echo "  <section class='w3-card-4 w3-display-container w3-margin'>";
  echo "    <div class='w3-container  w3-light-blue'>";
  echo "      <h2>La réservation a été ajoutée ou modifiée</h2>";
  echo "      <p><a href='index.php?page=resarvations.php'>Retour au site</a></p>";
  echo "    </div>";
  echo "  </section>";
  echo "</div>";
} else {
  // Modification
  if (isset($_GET['line_num'])){
    $line_num = $_GET['line_num'];
    list($id,$nom,$taille,$sejour) = explode("|", $file[$line_num]);
  
  } else {
   
    if ($numresa) {
      list($id) = explode("|", $file[$numresa-1], -3); 
      $id = $id + 1;
      $line_num = $numresa;
    } else {
      $id = 1;
      $line_num = 0;
    }
  }
  
?>
<div class="w3-content">
  <section class="w3-card-4 w3-display-container w3-margin">
    <div class="w3-container w3-light-blue">
      
      <h2><?php if (isset($_GET['line_num'])) { echo "Modifier";} else {echo "Ajouter";} ?> une réservation</h2>
    </div>
    <p>
    <form method="POST" class="w3-container" id="form_reservations" action="<?php echo ($_SERVER['PHP_SELF']) ?>?page=reservations.php">
    <form action="votre_page_de_traitement.php" method="post" class="w3-container">
  <div class="w3-container">
    <label for="id" class="w3-text-pink">ID :</label>
    <input type="text" id="id" class="w3-input" value="<?php echo $id; ?>" readonly>
    <input type="hidden" name="line_num" id="line_num" value="<?php echo $line_num; ?>">
  </div>

  <div class="w3-container">
    <label for="nom" class="w3-text-pink">Nom :</label>
    <input type="text" name="nom" id="nom" class="w3-input" value="<?php echo isset($nom) ? $nom : ''; ?>">
  </div>

  <div class="w3-container">
    <label for="taille" class="w3-text-pink">Taille de la chambre :</label>
    <select name="taille" id="taille" class="w3-select">
      <option value="" disabled selected >Sélectionnez la taille de la chambre</option>
      <option value="1">1 personne</option>
      <option value="2">2 personnes</option>
      <option value="3">3 personnes</option>
      <option value="4">4 personnes</option>
    </select>
  </div>

  <div class="w3-container">
    <label for="sejour" class="w3-text-pink">Durée du séjour :</label>
    <select name="sejour" id="sejour" class="w3-select">
      <?php for ($i = 1; $i <= 15; $i++): ?>
        <option value="<?php echo $i; ?>" <?php echo (isset($sejour) && $sejour == $i) ? 'selected' : ''; ?>>
          <?php echo $i; ?> jour<?php echo ($i > 1) ? 's' : ''; ?>
        </option>
      <?php endfor; ?>
    </select>
  </div>

  <div class="w3-container">
    <button type="submit" class="w3-btn w3-text-pink">VALIDER</button>
  </div>
</form>


<script>
  function reset_errors() {
    element = document.getElementById("id");
    element.classList.remove("w3-deep-orange");
    element = document.getElementById("nom");
    element.classList.remove("w3-deep-orange");
   
    element.classList.remove("w3-deep-orange");    
  }

  function verif_all() {
    id = document.getElementById("id").value;
   
    nom = document.getElementById("nom").value;
    reset_errors();
    if(id == ""){
      element = document.getElementById("id");
      element.classList.add("w3-deep-orange");
    }else if(nom == ""){
      element = document.getElementById("nom");
      element.classList.add("w3-deep-orange");
    }else{
      document.getElementById("form_reservations").submit();
    }
  }
</script>
<?php
}
?>
