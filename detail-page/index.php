<!DOCTYPE html>
<html>

<header>
  <title>Fork in the Road</title>
  <link rel="stylesheet" href="general.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
   </header>
  
    
  <body>
  <?php
  // $msg = "HOWDY";
  // echo '<script type="text/javascript">console.log("'. $msg .'");</script>';

  require_once '../includes/fun.php';
  consoleMsg("PHP to JS .. is Wicked FUN");

  // Include env.php that holds global vars with secret info
  require_once '../env.php';

  // Include the database connection code
  require_once '../includes/database.php';

?>
    <div class="header">
      <div>
        <a href="/week03-start/hwk/hwk02/index.html" >
    <h1>Fork in the Road</h1>
  </a>
    </div>
      </div>
    <br>
    <div class="container">
      <div class="box1">
        <?php
  
          // Establish a new PDO connection
          $pdo = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
          $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      
          // Check if 'id' is set in the URL
          // if (isset($_GET['id'])) {
              $requestedId = 2;
      
              // Prepare a query to fetch all items associated with the specified ID
              $stmt = $pdo->prepare('SELECT * FROM recipes WHERE id = :requestedId');
              $stmt->bindParam(':requestedId', $requestedId, PDO::PARAM_INT);
              $stmt->execute();
      
              // Fetch all rows as an associative array
              $items = $stmt->fetchAll(PDO::FETCH_ASSOC);
      
              // Display the items
              // foreach ($items as $item) {
              //     echo 'Item Name: ' . $item['Title'] . '<br>';
              //     echo 'Item Description: ' . $item['Description'] . '<br>';
              //     // Add more fields as needed
              //     echo '<hr>';
              // }
      
              // If no items are found, display a message
              // if (empty($items)) {
              //     echo 'No items found for the specified ID.';
              // }
          // } else {
          //     echo 'No ID specified in the URL.';
          // }
      // } catch (PDOException $e) {
      //     die('Database connection failed: ' . $e->getMessage());
      // } finally {
          // Close the database connection
      //     $pdo = null;
      // };
    foreach ($items as $item) {
      echo '<img src="../images/ingredients/' . $item['Ingredients IMG'] . '" alt="Image 1">';
    };
        ?>
        <!-- <img src="/images/orange chicken/orangechickening.webp" alt="Image 1"> -->
        
        <di v class="ingredients">
          Ingredients:<br><br>
        </div>
       <ul>
        <?php
        $bigstringingre = $item['All Ingredients'];
        $bigstringingreexplo = explode("*", $bigstringingre);

        foreach ($bigstringingreexplo as $ingreItems) {
          echo '<li>' . $ingreItems . '</li>' ;
        };
        ?>
        <!-- <li>
          4 Boneless, Skinless Chicken Breasts
        </li>
        <li>
          1 Tbsp Ancho Chile Paste
        </li>
        <li>
          2 Tbsps Crème Fraîche
        </li>
        <li>
        3 Tbsps Golden Raisins
      </li>
        <li>
          1 Lime
         </li>
         <li>
          2 Tbsps Butter
         </li>
         <li>
          2 Cloves Garlic
         </li>
         <li>
          3/4 Jasmine Rice
         </li>
         <li>
          4 Carrots
         </li>
         <li>
          1 Bunch Kale
         </li> -->
       </ul>
      
      </div>
      <div class="box2">
        <?php
            foreach ($items as $item) {
              echo '<img src="../images/' . $item['Main IMG'] . '" alt="Image 1">';
            };
        ?>
        <!-- <img src="/images/Ancho-Orange Chicken (1).jpg" alt="Larger Image"> -->
        <?php
               echo '<p1>' . $item['Title'] . '</p1>';
               echo '<p2>' . $item['Subtitle'] . '</p2>';
        ?>
        <!-- <p1>hand</p1> -->
        <!-- <p2>burger</p2> -->
      </div>
    </div> 
     <br><br>
     <?php
           // Get all the recipes from "recipes" table in the "idm232" database
      $query = "SELECT * FROM recipes WHERE id = $requestedId";
      $results = mysqli_query($db_connection, $query);
     
      // echo '<p>' . $stepByStepImgs . '</p>';
      // if ($results->num_rows > 0) {
        consoleMsg("Query successful! number of rows: $results->num_rows");
        while ($oneRecipe = mysqli_fetch_array($results)) {
          $stepByStepImgs = explode("*", $oneRecipe['Step IMGs']);
          $stepByStepText = explode("*", $oneRecipe['All Steps']);
          // echo '<h3>' .$oneRecipe['Title']. ' - '  . $oneRecipe['Cal/Serving']  .  '</h3>'; 
          $id = $oneRecipe['id'];
          for($lp = 0; $lp < count($stepByStepText); $lp++) {
            $firstChar = substr($stepByStepText[$lp], 0, 1);
            if (is_numeric($firstChar)) {
            echo '<figure class="oneRec">';
            echo '<p1>' . $stepByStepText[$lp] . '</p1>';
            echo '<img src="./images/steps/' . $stepByStepImgs[$firstChar-1] . '" alt="Dish Image">';
            echo '<figcaption>' . $stepByStepText[$lp+1] . '</figcaption>';
            echo '</figure>';
          } } }
      // } else {
      //   consoleMsg("QUERY ERROR");
      // } 
      ?>
     <!--
      <div class="instructions">
        <div class="instruction-item">
          <img src="/images/orange chicken/step 1.webp" alt="Step 1">
          <figcaption>Step 1:</figcaption>
          <p>Place an oven rack in the center of the oven, then preheat to 450°F. In a medium pot, combine the <strong>rice, a big pinch of salt,</strong> and <strong>1 1/2 cups of water.</strong> Heat to boiling on high. Once boiling, cover and reduce the heat to low. Cook 12 to 14 minutes, or until the water has been absorbed and the rice is tender. Turn off the heat and fluff with a fork. Cover to keep warm.
          </p>
        </div>
        <div class="instruction-item">
          <img src="/images/orange chicken/step 2.webp" alt="Step 2">
          <figcaption>2 Prepare the ingredients & make the glaze:
          </figcaption>
          <p>While the rice cooks, wash and dry the fresh produce. Peel the <strong>carrots;</strong> quarter lengthwise, then halve crosswise. Peel and roughly chop the <strong>garlic.</strong> Remove and discard the stems of the <strong>kale;</strong> finely chop the leaves. Using a peeler, remove the <strong>lime</strong> rind, avoiding the white pith; mince to get 2 teaspoons of zest (or use a zester). Halve the lime crosswise. Halve the <strong>orange;</strong> squeeze the juice into a bowl, straining out any seeds. Whisk in the <strong>chile paste</strong> and <strong>2 tablespoons of water</strong> until smooth.
            .</p>
        </div>
        <div class="instruction-item">
          <img src="/images/orange chicken/step 3.webp" alt="Step 3">
          <figcaption>Step 3:</figcaption>
          <p>Place the <strong>sliced carrots</strong> on a sheet pan. Drizzle with olive oil and season with salt and pepper; toss to coat. Arrange in an even layer. Roast 15 to 17 minutes, or until tender when pierced with a fork. Remove from the oven.
          </p>
        </div>
        <div class="instruction-item">
          <img src="/images/orange chicken/step 4.webp" alt="Step 4">
          <figcaption>Step 4:</figcaption>
          <p>While the carrots roast, in a large pan (nonstick, if you have one), heat 2 teaspoons of olive oil on medium-high until hot. Add the <strong>chopped garlic</strong> and cook, stirring constantly, 30 seconds to 1 minute, or until fragrant. Add the <strong>chopped kale;</strong> season with salt and pepper. Cook, stirring occasionally, 3 to 4 minutes, or until slightly wilted. Add <strong>1/3 cup of water;</strong> season with salt and pepper. Cook, stirring occasionally, 3 to 4 minutes, or until the kale has wilted and the water has cooked off. Transfer to the pot of <strong>cooked rice.</strong> Stir to combine; season with salt and pepper to taste. Cover to keep warm. Wipe out the pan.
          </p>
        </div>
        <div class="instruction-item">
          <img src="/images/orange chicken/step 5.webp" alt="Step 5">
          <figcaption>5 Cook & glaze the chicken:
          </figcaption>
          <p>While the carrots continue to roast, pat the <strong>chicken</strong> dry with paper towels; season with salt and pepper on both sides. In the same pan, heat 2 teaspoons of olive oil on medium-high until hot. Add the seasoned chicken and cook 4 to 6 minutes on the first side, or until browned. Flip and cook 2 to 3 minutes, or until lightly browned. Add the <strong>glaze</strong> and cook, frequently spooning the glaze over the chicken, 2 to 3 minutes, or until the chicken is coated and cooked through. Turn off the heat; stir the <strong>butter</strong> and <strong>the juice of 1 lime half</strong> into the glaze until the butter has melted. Season with salt and pepper to taste.
          </p>
        </div>
        <div class="instruction-item">
          <img src="/images/orange chicken/step 6.webp" alt="Step 6">
          <figcaption>6 Finish the rice & serve your dish:
          </figcaption>
          <p>To the pot of <strong>cooked rice and kale,</strong> add the <strong>lime zest, crème fraîche, raisins,</strong> and <strong>the juice of the remaining lime half.</strong> Stir to combine; season with salt and pepper to taste. Serve the <strong>glazed chicken</strong> with the finished rice and <strong>roasted carrots.</strong> Top the chicken with the remaining glaze from the pan. Enjoy!
          </p>
        </div>
      </div>
      -->
  </body>
  <div id="content">
  