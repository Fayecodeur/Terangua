<?php
session_start();
if (isset($_SESSION["user"])) {
  header("Location: acceuil.php");
  exit;
}
// Define variables and set to empty values
$prenomErr = $nomErr = $emailErr = $mdpErr = $mdpConfirmeErr = "";
$prenom = $nom = $email = $mdp = $mdpConfirme = "";
require_once("models/function.php");


if (isset($_POST["register"])) {
  if (empty($_POST["prenom"])) {
    $prenomErr = "Le prénom est obligatoire.";
  } else {
    $prenom = test_input($_POST["prenom"]);
    // Vérifiez si le prénom ne contient que des lettres et des espaces
    if (!preg_match("/^[a-zA-Z-' ]*$/", $prenom)) {
      $prenomErr = "Le prénom n'est pas valide.";
    }
  }

  if (empty($_POST["nom"])) {
    $nomErr = "Le nom est obligatoire.";
  } else {
    $nom = test_input($_POST["nom"]);
    // Vérifiez si le nom ne contient que des lettres et des espaces
    if (!preg_match("/^[a-zA-Z-' ]*$/", $nom)) {
      $nomErr = "Le nom n'est pas valide.";
    }
  }

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
    // Vérifiez la sécurité du mot de passe (au moins 8 caractères, une majuscule, une minuscule et un chiffre)
    if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*])[A-Za-z\d!@#$%^&*]{8,}$/", $mdp)) {
      $mdpErr = "Le mot de passe doit contenir au moins 8 caractères, une majuscule, une minuscule et un chiffre.";
    }
  }

  if (empty($_POST["mdpConfirme"])) {
    $mdpConfirmeErr = "La confirmation du mot de passe est obligatoire.";
  } else {
    $mdpConfirme = test_input($_POST["mdpConfirme"]);
    // Vérifiez si les mots de passe correspondent
    if ($mdp !== $mdpConfirme) {
      $mdpConfirmeErr = "Les mots de passe ne correspondent pas.";
    }
  }

  if (empty($prenomErr) && empty($nomErr) && empty($emailErr) && empty($mdpErr) && empty($mdpConfirmeErr)) {
    require_once("db/db.php");
    $hashed_password = password_hash($mdp, PASSWORD_ARGON2ID);
    $sql = "INSERT INTO users (prenom, nom, email, mdp) VALUES (:prenom, :nom, :email, :mdp)";
    $requete = $db->prepare($sql);
    $requete->bindValue(":prenom", $prenom, PDO::PARAM_STR);
    $requete->bindValue(":nom", $nom, PDO::PARAM_STR);
    $requete->bindValue(":email", $email, PDO::PARAM_STR);
    $requete->bindValue(":mdp", $hashed_password, PDO::PARAM_STR);

    $requete->execute();


    // Stocke le message de succès dans une session
    $_SESSION['success_message'] = "Inscription réussie. Vous pouvez maintenant vous connecter.";

    // Redirection vers la page de login
    header("Location: connexion.php");
    exit();
  }
}

?>

<?php
$titre = "Inscription";
require_once("includes/headerRegister.php");
?>

<div class="container">
  <form id="form" method="post" action="">
    <h1>Inscription</h1>
    <div class="input-control">
      <label for="prenom">Prénom</label>
      <input type="text" id="prenom" name="prenom" value="<?= htmlspecialchars($prenom); ?>" />
      <span class="error"><?= $prenomErr; ?></span>

    </div>
    <div class="input-control">
      <label for="nom">Nom</label>
      <input type="text" id="nom" name="nom" value="<?= htmlspecialchars($nom); ?>" />
      <span class="error"><?= $nomErr; ?></span>
    </div>
    <div class="input-control">
      <label for="email">Adresse email</label>
      <input type="email" class="form-control" name="email" id="email" value="<?= htmlspecialchars($email); ?>">
      <span class="error"><?= $emailErr; ?></span>
    </div>
    <div class="input-control">
      <label for="password">Mot de passe</label>
      <input type="password" id="password" name="mdp" value="<?= htmlspecialchars($mdp); ?>" />
      <span class="error"><?= $mdpErr; ?></span>

    </div>
    <div class="input-control">
      <label for="password2">Confimez votre mot de passe</label>
      <input type="password" id="password2" name="mdpConfirme" value="<?= htmlspecialchars($mdpConfirme); ?>" />
      <span class="error"><?= $mdpConfirmeErr; ?></span>

    </div>
    <button type="submit" name="register">S'inscrire</button>
    <a href="connexion" id="lien">Connexion</a>

  </form>
</div>
<?php require_once("includes/footerRegister.php"); ?>