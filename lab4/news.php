<!DOCTYPE HTML>
<html>
<head>
</head> 

<body>

  <?php

  ini_set('display_errors',1);
  error_reporting(E_ALL);

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
  echo "Connected successfully <br>";

  $sql = ("SELECT id, name, email, headline, story, timestamp FROM news");

  if ($result = mysqli_query($link, $sql)) {
    if (mysqli_num_rows($result) > 0) {
      while($row = mysqli_fetch_assoc($result)) {

    ?>
   <font><b><? echo $row["headline"]; ?></b> <i><? echo $row["timestamp"]; ?></i></font>
   <br>
   <font size="-1"><a href="news.php?a=delete&id=<? echo $row["id"]; ?>">delete</a></font>
   <br>
    <?php
      }
    } else {
      ?>
      <font size="-1">No news in the database</font>
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
  echo "Connected successfully <br>";
  $query = "DELETE FROM news WHERE id=$id";

  if (mysqli_query($link, $query)) {
    echo "Record deleted successfully";
  } else {
    echo "Error deleting record: " . mysqli_error($link);
  }

  mysqli_close($link);


  }
}

  ?>

</body>
</html>