<!DOCTYPE HTML>
<html>


<head>
  <meta charset="utf-8">
  <title>News Portal</title>
  <link rel="stylesheet" href="style.css">
</head>

<div class="header">
    <a href="news.php">News Portal</a>
    <div class="menu">
      <a href="form1.php">Add news</a>
      <a href="news.php?rights=admin">Admin</a>
    </div>
</div>
 

<body>

  <?php

  ini_set('display_errors',1);
  error_reporting(E_ALL);
  $rights = "";

  $user = 'root';
  $password = 'root';
  $db = 'news_db';
  $host = 'localhost';
  $port = 3306;

  $link = mysqli_init();
  $conn = mysqli_real_connect(
    $link, 
    $host, 
    $user, 
    $password, 
    $db,
    $port
  );

  if (!$link) {
    die("Connection failed: " . mysqli_connect_error());
  } 

  $sql = ("SELECT id, name, email, headline, story, timestamp FROM news");

  if ($result = mysqli_query($link, $sql)) {
    if (mysqli_num_rows($result) > 0) {
      while($row = mysqli_fetch_assoc($result)) {

    ?>

    <div class="news_block">
      <div class="news_headline"> 
        <? echo $row["headline"]; ?>
      </div>

         <i><? echo $row["email"], " ", $row["timestamp"]; ?></i>
      <p><? echo $row["story"]; ?></p>

      <? if (isset($_GET["rights"])) {?>
      <div class="delete">
        <a href="news.php?a=delete&id=<? echo $row["id"]; ?>">delete</a>
      </div>
    <? } ?>

    </div>

    <?php
      }
    } else {
    ?>

    <p>No news in the database</p>
    
    <?php
    }
    } else {
      echo "Error: " . $sql . mysqli_error($link);
    }
    mysqli_close($link);

if (isset($_GET["a"])) {
  if ($_GET["a"] == "delete"){
  $id = $_GET["id"];

  $user = 'root';
  $password = 'root';
  $db = 'news_db';
  $host = 'localhost';
  $port = 3306;

  $link = mysqli_init();
  $conn = mysqli_real_connect(
    $link, 
    $host, 
    $user, 
    $password, 
    $db,
    $port
  );

  if (!$link) {
    die("Connection failed: " . mysqli_connect_error());
  }
  $query = "DELETE FROM news WHERE id=$id";

  if (mysqli_query($link, $query)) {
    header("Refresh: 0; url=news.php?rights=admin");
    echo "Record deleted successfully";
  } else {
    header("Refresh: 0; url=news.php?rights=admin");
    echo "Error deleting record: " . mysqli_error($link);
  }

  mysqli_close($link);
  }
}

  ?>

</body>
</html>