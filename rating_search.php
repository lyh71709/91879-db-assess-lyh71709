<?php
    include "topbit.php";

// if find button pushed...
if(isset($_POST['find_rating']))
{
    
// Retrieves rating and sanitises it.
$amount=test_input(mysqli_real_escape_string($dbconnect,$_POST['amount']));
$stars=test_input(mysqli_real_escape_string($dbconnect,$_POST['stars']));

if($amount == "exactly")

{
    $find_sql="SELECT *
FROM `2020_L1_Assess_HenLy`
WHERE `Rating` =$stars";
}

elseif ($amount=="less")

{
    $find_sql="SELECT *
FROM `2020_L1_Assess_HenLy`
WHERE `Rating` <=$stars";
}

else {
    $find_sql="SELECT *
FROM `2020_L1_Assess_HenLy`
WHERE `Rating` >=$stars";
}

$find_query=mysqli_query($dbconnect, $find_sql);
$find_rs=mysqli_fetch_assoc($find_query);
$count=mysqli_num_rows($find_query);

?>


        
        <div class="box main">
            <h2>Rating search</h2>
            
            <?php 
            
            // check is there are any results
            
            if ($count<1)
                
            {
                
            ?>
            
            <div class="error">
                Sorry! There are no results that match your search.
                Please use the search box in the sidebar to try again.
                
            </div>
            
            <?php
            
            } // end count 'if'
            
            // if there are not results, output an error
            else {
                
                do {
                    
                ?>
            
                <!-- Results go here -->
                <div class="results">
                    
                    <!-- image -->
                    <div>
                        <img class="food_photo" src="<?php echo $find_rs['Image']; ?>" />
                    </div>
                
                    <p>Item: <span class="sub_heading"><?php echo $find_rs['Item']; ?></span></p>

                    <p>Meal Type: <span class="sub_heading"><?php echo $find_rs['Meal Type']; ?></span></p>

                    <p>Location: <span class="sub_heading"><?php echo $find_rs['Location']; ?></span></p>

                    <p>Rating:
                        <span class="sub_heading">

                        <!-- Font Awesome Icon Library -->
                        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

                        <?php

                        // I only did 2-5 star rating because there was no books with under 2 stars

                        if ( $find_rs['Rating'] ==5) 
                            {
                        ?>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                        <?php    }   

                        else if ( $find_rs['Rating'] ==4) 
                            {
                        ?>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                        <?php    }  

                       else if ( $find_rs['Rating'] ==3) 
                            {
                        ?>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                        <?php    }

                        else if ( $find_rs['Rating'] ==2) 
                            {
                        ?>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                        <?php    }   ?>

                        </span>
                    </p>

                    <p>Vegetarian: <span class="sub_heading"><?php echo $find_rs['Vegetarian']; ?></span></p>

                    <br />

                    <p><span class="sub_heading">Review / Response</span></p>

                    <p>
                        <?php echo $find_rs['Review']; ?>  
                    </p>
                
                </div> <!-- / end results -->
            
            <br />
            
            <?php
                    
                } // end of 'do'
                
                while($find_rs=mysqli_fetch_assoc($find_query));
                
            } // end else
            
            // if there are results display them
            
            } // end isset
            
            ?>
            
        </div>    <!-- / main -->

<?php
    include "bottombit.php";
?>
