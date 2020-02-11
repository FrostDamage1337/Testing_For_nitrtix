<?php
include 'head.php';
if ($_POST["login"] == "admin" && $_POST["password"] == "password")
{
  include 'menu.php'; ?>
  <div class="right menu">
  <form action="edit_news.php" method="POST">
    <input type="hidden" name="login" value="<?php echo $_POST["login"] ?>">
    <input type="hidden" name="password" value="<?php echo $_POST["password"] ?>">
    <div class="top news menu">
      <button class="add news">Add news</button>
      <button class="add news">Button 2</button>
      <button class="add news">Button 3</button>
      <button class="add news">Button 4</button>
    </div>
  </form>
  <div class="news items">
  <?php
  $conn = pg_connect("host=localhost port=5432 dbname=test user=postgres password=13371488");
  $blogs = pg_query($conn, "SELECT * FROM blogs");
  while ($blog = pg_fetch_object($blogs))
  {
    echo '<form action="edit_news.php" method="POST" class="news item" style="background-image: linear-gradient(rgba(255,255,255,0.1), rgba(0,0,0,0.6)), url(' . "'" . $blog->image . "')" . '">';;
    echo '<div class="news title">' . $blog->title . '</div>';
    echo '<input type="hidden" name="id" value="' . $blog->id . '">';
    echo '<input type="hidden" name="login" value="' . $_POST["login"] . '">';
    echo '<input type="hidden" name="password" value="' . $_POST["password"] . '">';
    echo '<div class="news preview">' . $blog->preview . '</div>';
    echo '<button class="edit news button">Edit news</button>';
    echo '</form>';
  }
  echo '</div>';
  echo '</div>';
} else { ?>
  You are not authorized. Try to authorize first.
<?php
}
include 'scripts.php';
