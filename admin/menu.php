<?php
echo '<div class="menu container">';
echo '<div class="menu list">';
echo '<div class="menu items">';
echo '<form action="news.php" method="POST">';
echo '<input type="hidden" value="' . $_POST["login"] . '" name="login">';
echo '<input type="hidden" value="' . $_POST["password"] . '" name="password">';
echo '<button class="menu item">News</button>';
echo '</form>';
echo '</div>';
echo '</div>';
echo '<div class="open menu button"><i class="fas fa-bars"></i></div>';
echo '</div>';
?>
