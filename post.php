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
              Instructorii.ro
            </a>

            <a href="#" class="ml-auto d-inline-block d-lg-none site-menu-toggle js-menu-toggle text-black"><span
                class="icon-menu h3"></span></a>

          </div>
          <div class="col-12 col-lg-6 ml-auto d-flex">
            <div class="ml-md-auto top-social d-none d-lg-inline-block">
              <a href="#" class="d-inline-block p-3"><span class="icon-facebook"></span></a>
                <a href="#" class="d-inline-block p-3"><span class="icon-twitter"></span></a>
                <a href="#" class="d-inline-block p-3"><span class="icon-instagram"></span></a>
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
               <input name="search" type="text" class="form-control" placeholder="cauta...">
                <button name = "submit" type="submit" class="btn btn-secondary" ><span class="icon-search"></span></button>
				   </div>
				  </form><!--form search bar-->
				  
          
			  <div class="col-6 d-block d-lg-none text-right">
            
          </div>
        </div>
      </div>
		  
		  
		  <?php 
		  if(isset($_GET['p_id'])){
			  
			$the_post_id = $_GET['p_id'];
			  
		  }
		  ?>
  
		<?php 
		$query = "SELECT * FROM posts WHERE post_id  = $the_post_id ";
		$select_all_posts_query = mysqli_query($connection, $query);
		while($row = mysqli_fetch_assoc($select_all_posts_query)){
		$post_id = $row['post_id'];
		$post_title = $row['post_title'];
		$post_author = $row['post_author'];
		$post_date = $row['post_date'];
		$post_image = $row['post_image'];
		$post_content = $row['post_content'];
		$post_tags = $row['post_tags'];
			




		?>	



	



  
		

   
 

    <div class="py-3">
      <div class="container">
        <div class="half-post-entry d-block d-lg-flex bg-light">
          <div class="img-bg" style=" background-image: url('images/<?php echo $post_image ?>');width: 250px"></div>
          <div class="contents">
            <span class="caption">
				<span><a href="post.php?p_id=<?php echo $post_id;?>"><?php echo $post_title ?></a></span>
            
				<p class="mb-3"><?php echo $post_content?></p>
            
            <div class="post-meta">
              <span class="d-block"><a href="#"><?php echo $post_author?></a> in <a href="#"><?php echo $post_tags;?></a></span>
              <span class="date-read"><span class="mx-1">&bullet;</span> 3 min read <span class="icon-star2"></span></span>
				<a href="search.php?p_id=<?php echo $post_tags;?>"></a> 	

          </div>
		</span>	
        </div>
      </div>
    </div>
	</div>
		  <?php } ?>
		
		
		
		<?php
		
		
		if(isset($_POST['create_comment'])){
			$the_post_id =$_GET['p_id'];
			$comment_author = $_POST['comment_author'];
			$comment_email = $_POST['comment_email'];
			$comment_content = $_POST['comment_content'];
			$query = "INSERT INTO comments(comment_post_id, comment_author, comment_email, comment_content, comment_status,comment_date)";
			
			
			$query .= "VALUES($the_post_id,'{$comment_author}','{$comment_email}','{$comment_content}', 'unapproved',now())";
			$create_comment_query = mysqli_query($connection, $query);
			if(!$create_comment_query){
				die('querry fail' . mysqli_error($connection));
			}
			
			

	$query = "UPDATE posts SET post_comment_count = post_comment_count + 1 ";
	$query .="WHERE post_id = $the_post_id ";

	$query_comment_count = mysqli_query($connection, $query);
			
			
		}
		
		
		
		
		
		
		
		
		?>
						<!-- start comment-list -->
                    
                    <div class="comment-form-wrap pt-2">
                      <div class="section-title">
                        <h2 class="mb-5">Leave a comment</h2>
                      </div>
                      <form action="" method="post" class="p-5 bg-light">
                        <div class="form-group">
                          <label for="Author">Name *</label>
                          <input type="text"  class="form-control" name="comment_author" id="name">
                        </div>
                        <div class="form-group">
                          <label for="email">Email *</label>
                          <input type="email" class="form-control" name="comment_email"id="email">
                        </div>
                        <div class="form-group">
                          <label for="website">Website</label>
                          <input type="url" class="form-control" id="website">
                        </div>
      
                        <div class="form-group">
                          <label for="comment">Message</label>
                          <textarea name="comment_content" id="message" cols="30" rows="10" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                          <input type="submit" name="create_comment" value="Post Comment" class="btn btn-primary py-3">
                        </div>
      
                      </form>
                    </div>
		  
<!--		  posted comments-->
<?php 

		  $query = "SELECT * FROM comments WHERE comment_post_id={$the_post_id} ";
		  $query .= "AND comment_status = 'approved' ";
		  $query .= "ORDER BY comment_id DESC ";
		  $select_comment_query = mysqli_query($connection, $query);
		  if(!$select_comment_query){
			  die('QUERY FAILED' . mysqli_error($connection));
		  }
		  while($row = mysqli_fetch_array($select_comment_query)){
			  $comment_date = $row['comment_date'];
			  $comment_content = $row ['comment_content'];
			  $comment_author = $row ['comment_author'];
			  
			  ?>
		  
		   <div class="media">
		  <a class="pull-left" href="#">
		  <img class="media-object" src="http://localhost." alt="">
		  </a>
		  <div class="media-body">
		  <h4 class="media-heading"><?php echo $comment_author; ?></h4>
			  <small><?php echo $comment_date; ?></small>
			  <h6><?php echo  $comment_content; ?></h6>
		  </div>
		  </div>
  
		  
		<?php } ?>  
		  
		    
		  
		  
		  
		


		  
		
		  
		 
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
		  
		  
		  
		  				
    
    