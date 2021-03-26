<?php

include('pdo.php');

if(isset($_POST['forminscription'])){
  $pseudo = htmlspecialchars($_POST['pseudo']);
  $civilite = htmlspecialchars($_POST['civilite']);
  $password = password_hash($_POST['password'],PASSWORD_DEFAULT);
  $passwordConfirm = htmlspecialchars($_POST['password-confirm']);
  var_dump($passwordConfirm);
  $email = htmlspecialchars($_POST['email']);
  $pays = htmlspecialchars($_POST['pays']);
  $postcode = htmlspecialchars($_POST['postcode']);
  $ville = htmlspecialchars($_POST['ville']);
  $rue = htmlspecialchars($_POST['rue']);
  $telephone = htmlspecialchars($_POST['telephone']);


  if(!empty($_POST['pseudo']) AND !empty($_POST['civilite']) AND !empty($_POST['password']) AND !empty($_POST['password-confirm']) AND !empty($_POST['email']) AND !empty($_POST['pays'])AND !empty($_POST['postcode']) AND !empty($_POST['ville']) AND !empty($_POST['rue']) AND !empty($_POST['telephone'])){
    $pseudoLenght = strlen($pseudo);
    $reqPseudo = $bdd -> prepare("SELECT * FROM client WHERE pseudo_client  = ?");
    $reqPseudo->execute(array($pseudo));
    $pseudoExist = $reqPseudo->rowCount();
    if($pseudoExist == 0){
      if($pseudoLenght < 18){
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
          $reqemail = $bdd->prepare("SELECT * FROM client WHERE email_client = ?");
          $reqemail->execute(array($email));
          $mailexist = $reqemail->rowCount();
          if($mailexist == 0){
            if(preg_match('^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*[*.!@$%&(){}[]:;<>,.?/~_+-=|\]).10,20}$^', $password) !== 1){
              if(password_verify($passwordConfirm, $password)){
                if(filter_var(intval($telephone), FILTER_VALIDATE_INT)){
                  $telephoneLenght = strlen($telephone);
                  if($telephoneLenght == 10){
                    if(filter_var(intval($postcode), FILTER_VALIDATE_INT)){
                      $reqinsert = $bdd->prepare('INSERT INTO client(pseudo_client,email_client,mdp_client,genre_client,pays_client,ville_client,postcode_client,rue_client,tel_client,role_client) VALUES (?,?,?,?,?,?,?,?,?,0)');
                      $reqinsert->execute(array($pseudo,$email,$password,$civilite,$pays,$ville,$postcode,$rue,$telephone));
                      echo "bien insere";
                    }
                  }
                }
              }
            }
          }
        }
      }
    }
  }
  
}else{
  echo'pas bon'; // A MODIFIER
}



