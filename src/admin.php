<?php 
$title = "Admin";
$menu = "1";
include('traitement/pdo.php');
include('header.php');

$req = $bdd ->query('SELECT * FROM client WHERE 1');
$resultatUsers = $req->fetchAll(PDO::FETCH_ASSOC);

?>
  <?php
  foreach($resultatUsers as $users){

  ?>
    <table class="tableau">
      <thead>
        <tr>
          <th>Tableau client</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>
            <?= $users['pseudo_client']?>
          </td>
          <td>
            poneyyy
          </td>
          <td>
          
          </td>
        </tr>

      </tbody>
    </table>
    <?php
  }
  ?>

  </body>

</html>


