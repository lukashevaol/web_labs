<!DOCTYPE HTML>
  <html>
  	<head>
			<style>
				.error {color: #FF0000;}
			</style>
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

    <p><span class="error">* required field</span></p>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
      Name: <input type="text" name="name" value="<?php echo $name;?>">
      <span class="error">* <?php echo $nameErr;?></span>
      <br><br>
      E-mail: <input type="text" name="email" value="<?php echo $email;?>">
      <span class="error">* <?php echo $emailErr;?></span>
      <br><br>
      Headline: <input type="text" name="headline" value="<?php echo $headline;?>">
      <span class="error">* <?php echo $headlineErr;?></span>
      <br><br>
      News Story: <textarea name="story" rows="5" cols="40" value="<?php echo $story;?>"></textarea>
      <span class="error">* <?php echo $storyErr;?></span>
      <br><br>
      <input type="submit" name="submit" value="Submit">  
    </form>



    <?php
			if( isset( $_POST['submit'] ) )
      {
    		echo $name;
      	echo "<br>";
      	echo $email;
      	echo "<br>";
      	echo $headline;
      	echo "<br>";
      	echo $story;
    	}
    ?>

  </body>
</html>