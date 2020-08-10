<?php include "includes/admin_navibar.php";?>

<?php include "includes/admin_header.php";?>
		
		
	<div class="list-group">
    <a href="#" class="list-group-item list-group-item-action active">
        <i class="fa fa-home"></i> DASHBOARD ACTIVITY
    </a>
		<?php 
		$query = "SELECT * FROM posts ";
		$select_all_post = mysqli_query($connection, $query);
		$post_counts = mysqli_num_rows($select_all_post);
		
		
		$query = "SELECT * FROM comments ";
		$select_all_comments = mysqli_query($connection, $query);
		$comments_counts = mysqli_num_rows($select_all_comments);
		
		
		
		$query = "SELECT * FROM users ";
		$select_all_users = mysqli_query($connection, $query);
		$users_counts = mysqli_num_rows($select_all_users);
		
		
		
		$query = "SELECT * FROM categories ";
		$select_all_categories = mysqli_query($connection, $query);
		$categories_counts = mysqli_num_rows($select_all_categories);
		
		
		
		
		
		?>
		
		
    <a href="posts.php" class="list-group-item list-group-item-action">
        <i class="fa fa-file"></i> Posts  <span class="badge badge-pill badge-primary pull-right"><?php echo "<div class='huge'>{$post_counts}</div>" ?></span>
    </a>
    <a href="comments.php" class="list-group-item list-group-item-action">
        <i class="fa fa-comments"></i>Comments  <span class="badge badge-pill badge-primary pull-right"> <?php echo "<div class='huge'>{$comments_counts} </div>" ?></span>
    </a>
    <a href="users.php" class="list-group-item list-group-item-action">
        <i class="fa fa-users"></i> Users <span class="badge badge-pill badge-primary pull-right"><?php echo "<div class='huge'>{$users_counts} </div>" ?></span>
    </a>
		  <a href="categories.php" class="list-group-item list-group-item-action">
        <i class="fa fa-tasks"></i> Categories <span class="badge badge-pill badge-primary pull-right"><?php echo "<div class='huge'>{$categories_counts} </div>" ?></span>
    </a>
</div>


<div class="row">


 <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Date', 'Count'],
			
			<?php 
	
			$element_text = ['Active Posts/ Anunturi', 'Comments', 'Users', 'Categories'];
		$element_count = [$post_counts, $comments_counts, $users_counts, $categories_counts];
		
		for($i =0;$i < 4; $i++){
			
			echo "['{$element_text[$i]}'" . "," . "{$element_count[$i]}],";
			}
			
			?>
        
        ]);

        var options = {
          chart: {
            title: '',
            subtitle: '',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>

<div id="columnchart_material" style="width: 1080px; height: 500px;"></div>






</div>


        <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>
  
  <?php include "includes/footer.php";?>