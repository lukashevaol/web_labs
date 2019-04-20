<!DOCTYPE HTML>
<html>  
<body>

<?php
$name = $email = $gender = $comment = $website = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = test_input($_POST["name"]);
  $email = test_input($_POST["email"]);
  $headline = test_input($_POST["headline"]);
  $story = test_input($_POST["story"]);
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>


<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Name: <input type="text" name="name">
  <br><br>
  E-mail: <input type="text" name="email">
  <br><br>
  Headline: <input type="text" name="headline">
  <br><br>
  News Story: <textarea name="story" rows="5" cols="40"></textarea>
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>

<?php
echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $headline;
echo "<br>";
echo $story;
?>


</body>
</html>