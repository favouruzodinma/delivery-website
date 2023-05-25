<?php



define("DB_HOST", "localhost");
define("DB_NAME", "speedydelivery");
define("DB_CHARSET", "utf8");
define("DB_USER", "root");
define("DB_PASSWORD", "");
 
// (B) CONNECT TO DATABASE
try {
  $pdo = new PDO(
    "mysql:host=".DB_HOST.";charset=".DB_CHARSET.";dbname=".DB_NAME,
    DB_USER, DB_PASSWORD, [
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]
  );
} catch (Exception $ex) { exit($ex->getMessage()); }

// (C) SEARCH
$stmt = $pdo->prepare("SELECT * FROM `goods` WHERE `reference_number` LIKE ? OR `sender_flname` LIKE ?");
//$stmt->execute(["%".$_POST["search"]."%", "%".$_POST["search"]."%"]);
$results = $stmt->fetchAll();
if (isset($_POST["ajax"])) { echo json_encode($results); }

?>
    <?php
    // (B) PROCESS SEARCH WHEN FORM SUBMITTED
      if (isset($_POST["search"])) {
      // (B1) SEARCH FOR USERS
       require "track-process.php";

        // (B2) DISPLAY RESULTS
      if (count($results) > 0) { foreach ($results as $r) {
      printf("<div>%s - %s</div>", $r["reference_number"], $r["sender_flname"]);
       }} else { echo "No results found"; }
      }
?>