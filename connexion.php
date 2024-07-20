<?php
session_start();
if (isset($_SESSION["user"])) {
  header("Location: acceuil.php");
  exit;
}

// Define variables and set to empty values
$emailErr = $mdpErr  = "";
$email = $mdp = "";
require_once("models/function.php");

if (isset($_POST["login"])) {
  if (empty($_POST["email"])) {
    $emailErr = "L'email est obligatoire.";
  } else {
    $email = test_input($_POST["email"]);
    // Vérifiez si l'adresse e-mail est bien formée
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Format d'email invalide.";
    }
  }

  if (empty($_POST["mdp"])) {
    $mdpErr = "Le mot de passe est obligatoire.";
  } else {
    $mdp = test_input($_POST["mdp"]);
  }

  // s'il y'a pas d'erreur ->
  if (empty($emailErr) && empty($mdpErr)) {
    require_once("db/db.php");

    $sql = "SELECT * FROM `users` WHERE `email` = :email";
    $requete = $db->prepare($sql);
    $requete->bindValue(":email", $email, PDO::PARAM_STR);
    $requete->execute();
    $user = $requete->fetch();

    // on verifie si on a un utilisateur
    if (!$user) {
      $loginErr = "Login ou/et mot de passe incorrect.";
    } else if (!password_verify($mdp, $user["mdp"])) {
      // on a un utilisateur on verifie son mot de passe
      $loginErr = "Login ou/et mot de passe incorrect.";
      $mdp = ""; // Vider le champ mot de passe
    } else {
      // ici le login et le mot de passe sont correct
      $_SESSION["user"] = [
        "prenom" => $user["prenom"],
        "nom" => $user["nom"],
        "email" => $user["email"],
      ];

      header("Location: acceuil.php");
      exit();
    }
  }
}
?>


<?php
$titre = "Connexion";
require_once("includes/headerLogin.php");
?>


<div class="container mt-4">
  <!-- Afficher le message de succès si présent -->
  <?php if (isset($_SESSION["success_message"])) : ?>
    <div class="alert alert-success alert-dismissible fade show text-center w-75 mx-auto" role="alert">
      <?= $_SESSION["success_message"]; ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php unset($_SESSION["success_message"]); ?>
  <?php endif; ?>

  <!-- Afficher le message d'erreur si présent -->
  <?php if (!empty($loginErr)) : ?>
    <div class="alert alert-danger alert-dismissible fade show text-center w-75 mx-auto " role="alert">
      <?= $loginErr; ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  <?php endif; ?>
</div>
<form id="form" method="post" action="">
  <h1 class="mb-4">Connexion</h1>
  <div class="input-control">
    <label for="email">Adresse email</label>
    <input id="email" name="email" value="<?= htmlspecialchars($email); ?>" type="text" />
    <span class="error"><?= $emailErr; ?></span>


  </div>
  <div class="input-control">
    <label for="password">Mot de passe</label>
    <input id="password" name="mdp" type="password" />
    <span class="error"><?= $mdpErr; ?></span>

  </div>
  <button type="submit" name="login">Se connecter</button>
  <a href="inscription" id="lien">Inscription</a>
</form>

<?php require_once("includes/footerLogin.php"); ?>