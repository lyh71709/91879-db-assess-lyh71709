!DOCTYPE HTML>

<html lang="en">
    
<?php
  
    session_start();
    include("config.php");
    include("functions.php"); // include data sanitising...
    
    // Connect to database...
    
    $dbconnect=mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
    
    if (mysqli_connect_errno())
        
    {
        echo "Connection failed:".mysqli_connect_error();
        exit;
    }
    
?>

<head>
    <meta charset="UTF-8">
    <meta name="description" content="A food review site">
    <meta name="keywords" content="Food, Review">
    <meta name="author" content="Henry Ly">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Food Review Database</title>
    
    <!-- Edit the link below / replace with your chosen google font -->
    <link href="https://fonts.googleapis.com/css?family=Lato%7cUbuntu" rel="stylesheet"> 
    
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- Edit the name of your style sheet - 'foo' is not a valid name!! -->
    <link rel="stylesheet" href="css/foodstyle.css">
    
    
</head>
    
<body>
    
    <div class="wrapper">
    

        
        <div class="box banner">
            
        <!-- logo image linking to home page goes here -->
        <a href="index.php">
            <div class="box logo"  title="Logo - Click here to go to the Home Page">
            <img class="img-circle" src="Images/chef_logo.png" width="150" height="150" />
            
            </div>    <!-- / logo -->
        </a>
            
            <h1>The Craving Opinion</h1>
        </div>    <!-- / banner -->    
        
        <div class="box side">
            <h2>Search  |   <a class="side" href="showall.php">Show All</a></h2>
            
            <hr />
            
            <!-- Start of Item Search -->
        
            <form method="post" action="item_search.php" enctype="multipart/form-data">

                <input class="search" type="text" name="item" size = "40" value="" required placeholder="Item..." />

                <input class="submit" type="submit" name="find_item" value ="&#xf002;" />

            </form>

            <!-- End of Item Search -->
            
            <hr />
            
            <!-- Start of Meal Type Search -->
        
            <form method="post" action="meal_type_search.php" enctype="multipart/form-data">

                <select class="search" name="meal_type" required>
                    <option value="" disabled selected>Meal Type...</option>
                    <?php 
                    // retrieve unique values in meal type column...
                    $meal_type_sql="SELECT DISTINCT `Meal Type`
                    FROM `2020_L1_Assess_HenLy`
                    ORDER BY `2020_L1_Assess_HenLy`.`Meal Type` ASC";
                    $meal_type_query=mysqli_query($dbconnect, $meal_type_sql);
                    $meal_type_rs=mysqli_fetch_assoc($meal_type_query);

                    do {

                        ?>

                    <option value="<?php echo $meal_type_rs['Meal Type']; ?>"><?php echo $meal_type_rs['Meal Type']; ?></option>

                    <?php

                    } // end of meal type option retrieval

                    while($meal_type_rs=mysqli_fetch_assoc($meal_type_query));

                    ?>

                </select>

                <input class="submit" type="submit" name="find_meal_type" value ="&#xf002;" />
        
            </form>
        
            <!-- End of meal type Search -->
            
            <hr />
            
            <!-- Start of location Search -->
        
            <form method="post" action="location_search.php" enctype="multipart/form-data">

                <input class="search" type="text" name="location" size = "40" value="" required placeholder="Location..." />

                <input class="submit" type="submit" name="find_location" value ="&#xf002;" />

            </form>

            <!-- End of location Search -->
            
            <hr />
            
            <!-- Start of ratings form -->
        
            <form method="post" action="rating_search.php" enctype="multipart/form-data">

                <select class="half_width" name="amount">
                    <option value="exactly">Exactly...</option>
                    <option value="more" selected>At least...</option>
                    <option value="less">At most...</option>
                </select>

                <select class="half_width" name="stars">
                    <option value=1>&#9733;</option>
                    <option value=2>&#9733;&#9733;</option>
                    <option value=3 selected>&#9733;&#9733;&#9733;</option>
                    <option value=4>&#9733;&#9733;&#9733;&#9733;</option>
                    <option value=5>&#9733;&#9733;&#9733;&#9733;&#9733;</option>

                </select>

                    <input class="submit" type="submit" name="find_rating" value ="&#xf002;" />

            </form>
        
            <!-- end of ratings form -->
            
            <hr />
            
            <!-- Start of vegetarian Search -->

            <form method="post" action="vegetarian_search.php" enctype="multipart/form-data">

                <select class="search" name="vegetarian" required>
                    <option value="" disabled selected>Vegetarian...</option>
                    <?php 
                    // retrieve unique values in meal type column...
                    $vegetarian_sql="SELECT DISTINCT `Vegetarian`
                    FROM `2020_L1_Assess_HenLy`
                    ORDER BY `2020_L1_Assess_HenLy`.`Vegetarian` ASC";
                    $vegetarian_query=mysqli_query($dbconnect, $vegetarian_sql);
                    $vegetarian_rs=mysqli_fetch_assoc($vegetarian_query);

                    do {

                        ?>

                    <option value="<?php echo $vegetarian_rs['Vegetarian']; ?>"><?php echo $vegetarian_rs['Vegetarian']; ?></option>

                    <?php

                    } // end of meal type option retrieval

                    while($vegetarian_rs=mysqli_fetch_assoc($vegetarian_query));

                    ?>

                </select>

                <input class="submit" type="submit" name="find_vegetarian" value ="&#xf002;" />

            </form>

            <!-- End of vegetarian Search -->
            
            <hr />
            
        </div> <!-- / side bar -->