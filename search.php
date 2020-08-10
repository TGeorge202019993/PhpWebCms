<?php include "includes/db.php"?>
<?php include "includes/header.php"?>










  <div class="site-wrap">

    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>
 <?php include "includes/navigation.php" ?> 

    
    <div class="header-top">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-12 col-lg-6 d-flex">
            <a href="index.php" class="site-logo">
						Instructorii.ro            </a>

            <a href="#" class="ml-auto d-inline-block d-lg-none site-menu-toggle js-menu-toggle text-black"><span
                class="icon-menu h3"></span></a>
			</div>
			</div>
          </div>
	  </div>
          <div class="col-12 col-lg-6 ml-auto d-flex">
            <div class="ml-md-auto top-social d-none d-lg-inline-block">
              <a href="#" class="d-inline-block p-3"><span class="icon-facebook"></span></a>
                <a href="#" class="d-inline-block p-3"><span class="icon-twitter"></span></a>
                <a href="#" class="d-inline-block p-3"><span class="icon-instagram"></span></a>
			  </div>
			  </div>
			  
	    
            <form action= "" method="post">
              <div class="d-flex">
               <input name="search" type="text" class="form-control" placeholder="mai incearca...">
                <button name = "submit" type="submit" class="btn btn-secondary" ><span class="icon-search"></span></button>
				   </div>
				  </form><!--form search bar-->
				  
	  
	  
	  
	  
			  <?php 
			  if(isset($_POST['submit'])){
				  $search = $_POST['search'];
				  $query = "SELECT * FROM posts WHERE post_tags LIKE '%$search%' ";
				  $search_query = mysqli_query($connection, $query);
			  
			  
				  
				  if(!$search_query){
					  die("query failed" . mysqli_error($connection));
				  }
				  
				  $count = mysqli_num_rows($search_query);
				  
				  if($count == 0 ){
					  echo "<h1> FARA REZULTAT</h1>";
				  }else {
				         

		while($row = mysqli_fetch_assoc($search_query)){
		$post_title = $row['post_title'];
		$post_author = $row['post_author'];
		$post_date = $row['post_date'];
		$post_image = $row['post_image'];
		$post_content = $row['post_content'];
		$post_tags = $row['post_tags'];
		?>





		<div class="py-0">
		<div class="container">
		<div class="half-post-entry d-block d-lg-flex bg-light">
		<div class="img-bg" style="background-image: url('images/<?php echo $post_image; ?>')"></div>
		<div class="contents">
		<span class="caption"><?php echo $post_title ?> </span>
		<h2><a href="blog-single.html"><?php echo $post_tags ?></a></h2>
		<p class="mb-3"><?php echo $post_content?></p>

		<div class="post-meta">
		<span class="d-block"><a href="#"><?php echo $post_author?></a> in <a href="#">Food</a></span>
		<span class="date-read"><span class="mx-1">&bullet;</span> 3 min read <span class="icon-star2"></span></span>

		</div>
		</div>
		</div>
		</div>
		</div>
		   
					  
	<?php  }
				  
	 } }?>
			  
			  

			  
		
			  
			  
			  
			  
          <div class="col-6 d-block d-lg-none text-right">
            
          </div>
        </div>
      </div>
     
					

      

<?php include "includes/sidebar.php" ?>
    



    
    <div class="site-section subscribe bg-light">
      <div class="container">
        <form action="#" class="row align-items-center">
          <div class="col-md-5 mr-auto">
            <h2>Newsletter Subcribe</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis aspernatur ut at quae omnis pariatur obcaecati possimus nisi ea iste!</p>
          </div>
          <div class="col-md-6 ml-auto">
            <div class="d-flex">
              <input type="email" class="form-control" placeholder="Enter your email">
              <button type="submit" class="btn btn-secondary" ><span class="icon-paper-plane"></span></button>
            </div>
          </div>
        </form>
      </div>
    </div>
		
<?php include "includes/footer.php"?>
    
    