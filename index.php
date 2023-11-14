<!DOCTYPE html>

<html>

<head>
  <link rel="stylesheet" href="./styles/general.css">
  <title>Fork in the Road</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
</head>

<body>

<?php
  // $msg = "HOWDY";
  // echo '<script type="text/javascript">console.log("'. $msg .'");</script>';

  require_once './includes/fun.php';
  consoleMsg("PHP to JS .. is Wicked FUN");

  // Include env.php that holds global vars with secret info
  require_once './env.php';

  // Include the database connection code
  require_once './includes/database.php';

?>

<header>
<br>
<div class="header">
  <h1>Fork in the Road</h1>
  <h2>Where eating in meets deliciousness</h2>
</div>
<div>
  <form class="example" action="">

  <input type="text" placeholder="(ex:recipies,ingredients....)" class="search">
  <button type="submit" class="submit">Search<i class="fa fa-search"></i></button>
  </form>
</div>
  <ul>
    <button class="filter">Chicken</button>
    <button class="filter">Beef</button>
    <button class="filter">Pork</button>
    <button class="filter">Seafood</button>
    <button class="filter">Pasta</button>
    <button class="filter">Fruits</button>
    <button class="filter">Vegetables</button>
  </ul>
  <br>
   </header>


  <div id="content">
    <?php
      // // echo "Holla";
      // $rNum = rand(1, 15);
      // for ($lp = 0; $lp <= $rNum; $lp++) {
      //   // echo "works";

      //   if ($lp % 2 == 0) {
      //     echo "<figure class='oneRec'>";
      //   } else {
      //     echo "<figure class='oneRecOdd'>";
      //   }

      //   echo "<img src='images/0101_FPP_Chicken-Rice_97338_WEB_SQ.png' alt='FPP Chicken Rice'>";
      //   echo "<figcaption>" . $lp . " Ancho-Orange Chicken</figcaption>";
      //   echo "</figure>";
      // }
    ?>

    <?php
      // Get all the recipes from "recipes" table in the "idm232" database
      $query = "SELECT * FROM recipes";
      $results = mysqli_query($db_connection, $query);
      if ($results->num_rows > 0) {
        consoleMsg("Query successful! number of rows: $results->num_rows");
        while ($oneRecipe = mysqli_fetch_array($results)) {
          // echo '<h3>' .$oneRecipe['Title']. ' - '  . $oneRecipe['Cal/Serving']  .  '</h3>'; 
          $id = $oneRecipe['id'];
          if ($id % 2 == 0) {
            echo '<figure class="oneRec">';
          } else {
            echo '<figure class="oneRecOdd">';
          }
          echo '<img src="./images/' . $oneRecipe['Main IMG'] . '" alt="Dish Image">';
          echo '<figcaption>' . $id . ' ' . $oneRecipe['Title'] . '</figcaption>';
          echo '</figure>';
        }

      } else {
        consoleMsg("QUERY ERROR");
      }
    ?>


  </div>
`
</body>

</html>