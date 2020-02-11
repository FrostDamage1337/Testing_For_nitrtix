<?php
include 'head.php';
if ($_POST["login"] == "admin" && $_POST["password"] == "password")
{
  include 'menu.php';
} else { ?>
  You are not authorized. Try to authorize first.
<?php
}
include 'scripts.php';
?>
