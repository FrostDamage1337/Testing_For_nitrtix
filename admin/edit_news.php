<?php
include 'head.php';
if ($_POST["login"] == "admin" && $_POST["password"] == "password")
{
  $conn = pg_connect("host=localhost port=5432 dbname=test user=postgres password=13371488");
  $news_desc = pg_query($conn, "SELECT * FROM blogs WHERE id = " . $_POST["id"]);
  include 'menu.php';
  while ($desc = pg_fetch_object($news_desc))
  {
    $title = $desc->title;
    $preview = $desc->preview;
    $text = $desc->text;
  }
?>
  <div class="right menu">
    <form enctype="multipart/form-data" class="edit" action="append.changes.php" method="post">
    <div class="edit text notification"><?php if ($_POST["id"] != null) echo 'Edit news'; else echo 'Add news'; ?></div>
    <div class="title text notification">Title text:</div>
    <textarea class="title" name="title"><?php echo $title ?></textarea>
    <div class="preview text notification">Preview text:</div>
    <textarea class="preview" name="preview"><?php echo $preview ?></textarea>
    <div class="description text notification">Description text:</div>
    <textarea class="description" name="description"><?php echo $text ?></textarea>
    <div class="image notification">Choose new image (optionally)</div>
    <input class="file" type="file" name="image" accept="image/png, image/jpeg">
    <input type="hidden" name="id" value="<?php echo $_POST["id"] ?>">
    <input type="hidden" name="login" value="<?php echo $_POST["login"] ?>">
    <input type="hidden" name="password" value="<?php echo $_POST["password"] ?>">
    <div class="edit buttons">
      <button type="submit" class="change edit news"><?php if ($_POST["id"] != null) echo 'Edit news'; else echo 'Add news'; ?></button>
<?php if ($_POST["id"] != null) echo '<input type="hidden" id="delete" name="delete"><button type="submit" class="delete edit news">Delete news</button>'; ?>
    </form>
  </div>
<?php 
} else { ?>
  You are not authorzied. Try to authorize first.
<?php
}
include 'scripts.php'; ?>
<script type="text/javascript">
$('.change.edit.news').on("click", () => {
  $('#delete').val('false');
});
$('.delete.edit.news').on("click", () => {
  $('#delete').val('true');
});
</script>
