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

  $sql = ("SELECT name, email, headline, story, timestamp FROM news");

  if ($result = mysqli_query($link, $sql)) {
    if (mysqli_num_rows($result) > 0) {
      while($row = mysqli_fetch_assoc($result)) {
        echo "Name: " .$row["name"]. " " . $row["email"] . " Headline: " . $row["headline"]. " Story :" . $row["story"]. " " . $row["timestamp"] . "<br>";
      }
    } else {
      echo "0 results";
    }
  } else {
    echo "Error: " . $sql . mysqli_error($link);
  }
  mysqli_close($link);
  ?>

</body>
</html>