	 

<div class="site-navbar py-2 js-sticky-header site-navbar-target d-none pl-0 d-lg-block" role="banner">

      <div class="container">
        <div class="d-flex align-items-center">
          
          <div class="mr-auto">
            <nav class="site-navigation position-relative text-right" role="navigation">
              <ul class="site-menu main-menu js-clone-nav mr-auto d-none pl-0 d-lg-block">
				  
                <li class="active">
					
					
					
					<?php 
					$query = "SELECT * FROM categories ";
					$select_all_categories_query = mysqli_query($connection, $query);
					while($row = mysqli_fetch_assoc($select_all_categories_query)){
						$cat_title = $row['cat_title'];
						echo "<a href=''>  {$cat_title}  </a>";
						
					}
					?>
					
					
              </ul> 
				
            </nav>

          </div>
         
        </div>
      </div>

    </div>
     <div data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
    </div>