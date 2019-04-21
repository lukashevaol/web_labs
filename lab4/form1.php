<!DOCTYPE HTML>
  <html>
  	<head>
  		<meta charset="utf-8">
  		<title>Add News</title>
  		<link rel="stylesheet" href="style.css">
		</head> 

    <body>

    <?php
      $nameErr = $emailErr = $headlineErr = $storyErr = "";
      $name = $email = $headline = $story = "";
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
          if (empty($_POST["name"])) {
            $nameErr = "Name is required";
          } else {
            $name = test_input($_POST["name"]);
          }

          if (empty($_POST["email"])) {
            $emailErr = "Email is required";
          } else {
            $email = test_input($_POST["email"]);
          }

          if (empty($_POST["headline"])) {
            $headlineErr = "Headline is required";
          } else {
            $headline = test_input($_POST["headline"]);
          }

          if (empty($_POST["story"])) {
            $storyErr = "Story is required";
          } else {
            $story = test_input($_POST["story"]);
          }          
      }

      function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }

    ?>
    <div class="header">Add news</div>
    <form method="post" class="add_form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
      <p>Name: </p>
      <input type="text" name="name">
      <span class="error">* <?php echo $nameErr;?></span>
      <p>E-mail: </p>
      <input type="text" name="email">
      <span class="error">* <?php echo $emailErr;?></span>
      <p>Headline: </p>
      <input type="text" name="headline">
      <span class="error">* <?php echo $headlineErr;?></span>
      <p>News Story:</p> 
      <textarea name="story" rows="5" cols="40"></textarea>
      <span class="error">* <?php echo $storyErr;?></span>
      <p><input type="submit" name="submit" value="Submit" style="width: 100px;"</p>  
    </form>



    <?php

    ini_set('display_errors',1);
		error_reporting(E_ALL);

			if( isset( $_POST['submit'] ) and $name != "" and $email != "" and $headline != "" and $story != "")
      {
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
				$sql = ("INSERT INTO news (name, email, headline, story, news_date) VALUES ('$name', '$email', '$headline', '$story', NOW())");

				if (mysqli_query($link, $sql)) {
    			echo "New record created successfully. In 5 secs you will be redirected to the main page";
    			header("Refresh: 5; url=news.php");
				} else {
    			echo "Error: " . mysqli_error($link);
				}

				mysqli_close($link);
    	}
    ?>

  </body>
</html>