<?php 
    include "topbit.php";

$showall_sql="SELECT *
FROM `2020_L1_Assess_HenLy`
ORDER BY `2020_L1_Assess_HenLy`.`ID` ASC";
$showall_query=mysqli_query($dbconnect, $showall_sql);
$showall_rs=mysqli_fetch_assoc($showall_query);
$count=mysqli_num_rows($showall_query);

?>


        
        <div class="box main">
            <h2>All Items</h2>
            
            <?php
            
            //check if there are any results
            
            if($count<1)
                
            {
                ?>
            
                <div class="error">
                    Sorry! There are no results that match your search. Please use the search box in the sidebar to try again.
                    
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
                        <div class="food_photo">
                            <img src="<?php echo $showall_rs['Image']; ?>" />
                        </div>
                
                        <p>Item: <span class="sub_heading"><?php echo $showall_rs['Item']; ?></span></p>

                        <p>Meal Type: <span class="sub_heading"><?php echo $showall_rs['Meal Type']; ?></span></p>

                        <p>Location: <span class="sub_heading"><?php echo $showall_rs['Location']; ?></span></p>

                        <p>Rating:
                            <span class="sub_heading">

                            <!-- Font Awesome Icon Library -->
                            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

                            <?php

                            // I only did 3-5 star rating because there was no books with under 3 stars

                            if ( $showall_rs['Rating'] ==5) 
                                {
                            ?>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                            <?php    }   

                            else if ( $showall_rs['Rating'] ==4) 
                                {
                            ?>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>
                            <?php    }  

                           else if ( $showall_rs['Rating'] ==3) 
                                {
                            ?>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                            <?php    }
                                
                            else if ( $showall_rs['Rating'] ==2) 
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
                        
                        <p>Vegetarian: <span class="sub_heading"><?php echo $showall_rs['Vegetarian']; ?></span></p>

                        <br />

                        <p><span class="sub_heading">Review / Response</span></p>

                        <p>
                            <?php echo $showall_rs['Review']; ?>  
                        </p>
                        



                    </div> <!-- / end results -->

                <br />
            
                <?php
                     
                } // end of 'do'
                
                while($showall_rs=mysqli_fetch_assoc($showall_query));
                
            } // end else
            
                // if there are results, display them
            ?>
            
            </div>
            
            
        </div>    <!-- / main -->
        
<?php 
    include "bottombit.php";
?>
