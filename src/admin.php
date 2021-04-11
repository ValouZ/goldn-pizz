<?php 
$title = "Admin";
$menu = "1";
include('traitement/pdo.php');
include('header.php');

$reqUsers = $bdd ->query('SELECT * FROM client WHERE role_client != 1');
$reqPizza = $bdd ->query('SELECT * FROM pizza WHERE 1');

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
        <th class="th">Civilité</th>
        <th class="th">Pays</th>
        <th class="th">Ville</th>
        <th class="th">Code Postal</th>
        <th class="th">Adresse</th>
        <th class="th">Numéro Téléphone</th>
      </tr>
      <?php
  foreach($resultatUsers as $users){

  ?>
        <tr>
          <td class="td">
            <?= $users['pseudo_client']?>
          </td>
          <td class="td">
            <?= $users['email_client']?>
          </td>
          <td class="td">
          <?= $users['genre_client']?>
          </td>
          <td class="td">
          <?= $users['pays_client']?>
          </td>
          <td class="td">
          <?= $users['ville_client']?>
          </td>
          <td class="td">
          <?= $users['postcode_client']?>
          </td>
          <td class="td">
          <?= $users['rue_client']?>
          </td>
          <td class="td">
          <?= $users['tel_client']?>
          </td>
          <td class="td">
            <a href="traitement/delete-users.php?id=<?= $users['id_client']?>">Supprimer</a>
          </td>
        </tr>
        <?php
  }
  ?>
      </tbody>
      
    </table>
    <table class="table2">
      <thead class="table__center">
        <tr>
          <th>Tableau pizza</th>
        </tr>
      </thead>
      
      <tbody>

        <tr>
          <th class="th">Nom pizza</th>
        </tr>

      <?php
  foreach($resultatPizza as $pizza){

  ?>
        <tr class="table__top">
          <td class="td">
            <?= $pizza['nom_pizza']?>          
          </td>
          <td class="td">
            <a href="traitement/delete-pizza.php?id=<?= $pizza['id_pizza']?>">Supprimer</a>
          </td>

        </tr>
        <?php
  }
  ?>
      </tbody>
      
    </table>
  

  </body>

</html>


