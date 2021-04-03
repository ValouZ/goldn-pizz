<?php
function display_message_url($result)
{
?>
  <section class="error">
    <?php
    echo $result;
    ?>
  </section>
<?php
}

function error_message($error)
{
  $result='';
  switch ($error) {
    case 0:
      $result = "Le code postal n'est pas bon";
      break;
    case 1:
      $result = "Mauvais numéro de téléphone";
      break;
    case 2:
      $result = "Les mots de passes ne concordent pas";
      break;
    case 3:
      $result = "Le mot de passe ne suit pas nos indications";
      break;
    case 4:
      $result = "L'email existe déjà dans notre base de données";
      break;
    case 5:
      $result = "L'email n'est pas valide";
      break;
    case 6:
      $result = "Le pseudo doit faire entre 3 et 18 caractères";
      break;
    case 7:
      $result = "Ce pseudo n'est pas disponible";
      break;
    case 8:
      $result = "Certains champs sont vides";
      break;
    case 9:
      $result = "N'essaye pas de t'inscrire comme ça voyons";
      break;
  }

  return $result;
}
