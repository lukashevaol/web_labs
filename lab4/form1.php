<!DOCTYPE HTML>
  <html>  
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


    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
      Name: <input type="text" name="name">
      <span class="error">* <?php echo $nameErr;?></span>
      <br><br>
      E-mail: <input type="text" name="email">
      <span class="error">* <?php echo $emailErr;?></span>
      <br><br>
      Headline: <input type="text" name="headline">
      <span class="error">* <?php echo $headlineErr;?></span>
      <br><br>
      News Story: <textarea name="story" rows="5" cols="40"></textarea>
      <span class="error">* <?php echo $storyErr;?></span>
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