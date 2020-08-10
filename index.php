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
        <div class="row align-items-center shadow p-4 mb-5 bg-white">
          <div class="col-12 col-lg-6 d-flex">
            <a href="index.php" class="site-logo">
              Instructorii.ro
            </a>

            <a href="#" class="ml-auto d-inline-block d-lg-none site-menu-toggle js-menu-toggle text-black"><span
                class="icon-menu h3"></span></a>

          </div>
          <div class="col-12 col-lg-6 ml-auto d-flex">
            <div class="ml-md-auto top-social d-none d-lg-inline-block">
				
				
            </div>


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
					  echo "<h1> NO resut</h1>";
				  }else {
					  echo "some result";
					  
				  }
			  }
			  
			  
			 
			  ?>
			  <form action= "search.php" method="post">
              <div class="d-flex">
               <input name="search" type="text" class="form-control" placeholder="cauta instructor...">
                <button name = "submit" type="submit" class="btn btn-primary" ><span class="icon-search"></span></button>
				   </div>
				  </form><!--form search bar-->
				  
         
			  <div class="col-6 d-block d-lg-none text-right">
            
          </div>
        </div>
      </div>					

		<?php 
		$query = "SELECT * FROM posts WHERE post_status ='published' ";
		$select_all_posts_query = mysqli_query($connection, $query);
		while($row = mysqli_fetch_assoc($select_all_posts_query)){
		$post_id = $row['post_id'];
		$post_title = $row['post_title'];
		$post_author = $row['post_author'];
		$post_date = $row['post_date'];
		$post_image = $row['post_image'];
		$post_content = substr($row['post_content'],0,100);
		$post_tags = $row['post_tags'];
			$post_status = $row['post_status'];
			
			if($post_status !=='published'){
				echo "<h1>NO POST HERE</h1>";
			}else{
				
				
				



		?>	



    <div class="p-1">
      <div class="container">
        <div class="half-post-entry d-block d-lg-flex bg-light shadow-lg p-3 mb-5 bg-white rounded ">
          <div class="img-bg"
			   
		
			   style="background-image: url('images/<?php echo $post_image; ?>'); width: 250px; border-style: solid; border-width: 10px;  border-color: black;
">
			</div>
		
			
          <div class="contents">
			  <div class="caption">
			  <span><a href="post.php?p_id=<?php echo $post_id;?>"><h2><?php echo $post_title ?></h2></a></span>
					   
            <p class="mb-3"><?php echo $post_content?></p>
            
            <div class="post-meta">
              <span class="d-block"><a href="#"><?php echo $post_author?></a> in <a href=""><?php echo $post_title?></a></span>
              <span class="date-read"><span class="mx-1">&bullet;</span><?php echo $post_date;?> <span class="icon-star2"></span></span>
            	<a href="blog-single.html"><?php echo $post_tags ?></a>
				
          </div>
        </div>
      </div>
    </div>
	</div>
		  </div>
		
		  <?php } } ?>
		
<?php include "includes/sidebar.php" ?>
    

    <div class="site-section subscribe bg-light shadow p-3 mb-5 bg-white">
      <div class="container">
       
<!--		  login enter-->
		  			<h6 style="text-align:center">LOGIN AREA </h6>
		  			
				<form action="includes/login.php" method="post">
				<div class="col-md-6 ml-auto">
					<input name="username" type="text" class="form-control" placeholder="Enter Username">
					</div>
				
		  <div class="col-md-6 ml-auto">
			  <input name="password" type="password" class="form-control" placeholder="Enter Password">
			  <span class="input-group-btn">
				  <button class="btn btn-primary btn-sm btn-block" name="login" type="submit">SUBMIT
				  </button>
			  </span>
		  
		  </div>
					</form>
      </div>
    </div>
		
<?php include "includes/footer.php"?>
    
    