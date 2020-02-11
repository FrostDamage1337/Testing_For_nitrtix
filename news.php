<?php

include 'head.php';
$conn = pg_connect("host=localhost port=5432 dbname=test user=postgres password=13371488");
$res = pg_query($conn, "SELECT * FROM blogs WHERE id = " . $_POST["id"]);
while ($desc = pg_fetch_object($res))
{
?>
<div class="news">
  <img class="title photo" src="<?php echo 'admin/' . $desc->image ?>">
  <div class="desc title"><?php echo $desc->title ?></div>
  <div class="desc body"><?php echo $desc->text ?></div>
  <div class="desc date"><?php echo $desc->date ?></div>
</div>
<?php
}
