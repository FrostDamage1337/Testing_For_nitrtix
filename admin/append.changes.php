<?php
$conn = pg_connect("host=localhost port=5432 dbname=test user=postgres password=13371488");
if ($_POST["login"] == "admin" && $_POST["password"] == "password")
{
if ($_POST["id"] != null)
{
  if ($_POST["delete"] == "true")
  {
    pg_query($conn, "DELETE FROM blogs WHERE id = " . $_POST["id"]);
    echo 'Deleted Succesfully';
  } else {
    if ($_POST["image"] != null)
    {
      $image = $_POST["image"];
      $imagename = $_FILES['image']['name'];
      $imagetype = $_FILES['image']['type'];
      $imageerror = $_FILES['image']['error'];
      $imagetemp = $_FILES['image']['tmp_name'];
      $imagePath = "images/";

      if(is_uploaded_file($imagetemp)) {
          if(move_uploaded_file($imagetemp, $imagePath . $imagename)) {
              echo "Sussecfully uploaded your image.";
              pg_query($conn, "UPDATE blogs SET title='" . pg_escape_string($_POST["title"]) . "', preview='" . pg_escape_string($_POST["preview"]) . "', text='" . pg_escape_string($_POST["description"]) . "', image='" . $imagePath.$imagename . "', date='" . date('d.m.Y') . "' WHERE id = " . $_POST["id"]);
              echo "Everything's done";
          }
          else {
              echo "Failed to move your image.";
          }
      }
      else {
          echo "Failed to upload your image.";
      }
    } else {
      pg_query($conn, "UPDATE blogs SET title='" . pg_escape_string($_POST["title"]) . "', preview='" . pg_escape_string($_POST["preview"]) . "', text='" . pg_escape_string($_POST["description"]) . "', date='" . date('d.m.Y') . "' WHERE id = " . $_POST["id"]);
      echo "Everything's done";
    }
  }
} else {
  $image = $_POST["image"];
  $imagename = $_FILES['image']['name'];
  $imagetype = $_FILES['image']['type'];
  $imageerror = $_FILES['image']['error'];
  $imagetemp = $_FILES['image']['tmp_name'];
  $imagePath = "images/";

  if (is_uploaded_file($imagetemp)) {
    if (move_uploaded_file($imagetemp, $imagePath . $imagename)) {
      echo "Sussecfully uploaded your image.";
      pg_query($conn, "INSERT INTO blogs(date, title, text, preview, image) VALUES ('" . date('d.m.Y') . "', '" . pg_escape_string($_POST["title"]) . "', '" . pg_escape_string($_POST["description"]) . "', '" . pg_escape_string($_POST["preview"]) . "', '" . $imagePath.$imagename . "')");
      echo "Everything's done";
    } else {
      echo "Failed to move your image.";
    }
  } else {
    echo "Failed to upload your image.";
  }
}
sleep(2);
?>
<form name="back" action="news.php" method="post">
<input type="hidden" name="login" value="<?php echo $_POST['login'] ?>">
<input type="hidden" name="password" value="<?php echo $_POST['password'] ?>">
</form>
<script type="text/javascript">
document.back.submit();
</script>
<?php
}
?>
