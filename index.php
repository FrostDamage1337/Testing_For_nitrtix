<?php
include 'head.php';
$conn = pg_connect("host=localhost port=5432 dbname=test user=postgres password=13371488");
$blogs = pg_query($conn, "SELECT * FROM blogs");
echo '<div class="news containers">';
while ($news = pg_fetch_object($blogs))
{
  echo '<form action="news.php" method="post">';
  echo '<button class="news container" style="background-image: linear-gradient(rgba(255,255,255,0.1), rgba(0,0,0,0.6)), url(' . "'" . 'admin/' . $news->image . "'" . ')">';
    echo '<div class="title text">' . $news->title . '</div>';
    echo '<div class="preview text">' . $news->preview . '</div>';
    echo '<div class="date text">' . $news->date . '</div>';
    echo '<input type="hidden" name="id" value="' . $news->id . '">';
  echo '</button></form>';
}
?>
