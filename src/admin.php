<?php
$i = 0; // ROBIN ??????
include_once("traitement/variables.php");
include_once('traitement/pdo.php');
include_once('traitement/functions.php');

$info = $header_info[6]; // Voir variables.php
include_once('header.php');

access_denied();
is_not_admin();

$reqUsers = $bdd->query('SELECT * FROM client WHERE role_client != 1');
$reqPizza = $bdd->query('SELECT * FROM pizza WHERE 1');

$resultatUsers = $reqUsers->fetchAll(PDO::FETCH_ASSOC);
$resultatPizza = $reqPizza->fetchAll(PDO::FETCH_ASSOC);

?>
<table class="table">
  <thead class="table__center">
    <tr>
      <th>Tableau client</th>
    </tr>
  </thead>

  <tbody>
    <tr>
      <th class="th">Pseudo</th>
      <th class="th">Email</th>
      <th class="th">Numéro Téléphone</th>
    </tr>
    <?php
    foreach ($resultatUsers as $users) {

    ?>
      <tr>
        <td class="td">
          <?= $users['pseudo_client'] ?>
        </td>
        <td class="td">
          <?= $users['email_client'] ?>
        </td>
        <td class="td">
          <?= $users['tel_client'] ?>
        </td>
        <td class="td">
          <a href="traitement/delete-users.php?id=<?= $users['id_client'] ?>">Supprimer</a>
        </td>
      </tr>
    <?php
    }
    ?>
  </tbody>

</table>
    <form class="update-form" action="traitement/update-admin.php?id=" method="post">
      <table class="table2">
        <thead class="table__center">
          <tr>
            <th>Tableau pizza</th>
          </tr>
        </thead>
        
        <tbody>

          <tr>
            
            <th class="th">Nom pizza</>
            <th class="th">Prix</th>
          </tr>

          <?php
            foreach($resultatPizza as $pizza){
          ?>
          <tr class="table__top">
            
            <input type="hidden" name="id-pizza" value="<?= $pizza['id_pizza']?>">
            
            <td class="td">
              <input id="pizzanom" type="text" value="<?= $pizza['nom_pizza']?>" disabled="true" name="nom-pizza">       
            </td>
            <td class="td">
              <a href="traitement/delete-pizza.php?id=<?= $pizza['id_pizza'] ?>">Supprimer</a>
            </td>
          </section>
        </tr>
      <?php
      }
      ?>
    </tbody>
  </table>


  <button class="button__validate hide" id="validate" name="validate">
    Valider
  </button>
</form>
<script src="assets/scripts/update-admin.js"></script>
</body>

</html>