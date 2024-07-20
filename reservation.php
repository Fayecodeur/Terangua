<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("Location: connexion.php");
    exit;
}
$titre = "Nos chefs";

require_once("includes/navbar.php");
?>



<?php
require_once("includes/footer.php");
?>