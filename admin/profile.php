
<?php include "includes/admin_navibar.php";?>

	
	<?php

if(isset($_SESSION['username'])){
	
	$username = $_SESSION['username'];
	
	$query = "SELECT * FROM users WHERE username = '{$username}' ";
	
	$select_user_profile_query = mysqli_query ($connection, $query);
	
	while($row = mysqli_fetch_array($select_user_profile_query)){
		
	$user_id = $row ['user_id'];
	$username = $row['username'];
	$user_password = $row['user_password'];
	$user_firstname = $row['user_firstname'];
	$user_lastname = $row['user_lastname'];
	$user_email = $row['user_email'];
	$user_image = $row['user_image'];
	$user_role = $row['user_role'];	
		
		
	}
	
}


?>


<?php 

if(isset($_POST['edit_user'])){
	
	

	$user_firstname = $_POST['user_firstname'];
	$user_lastname = $_POST['user_lastname'];
	$user_role = $_POST['user_role'];
	
//	$post_image = $_FILES['image']['name'];
//	$post_image_temp = $_FILES['image']['tmp_name'];
	
	$username = $_POST['username'];
	$user_email = $_POST['user_email'];
	$user_password = $_POST['user_password'];

//	$post_date = date('d-m-y');
//	$post_comment_count = 4;

//	
//		move_uploaded_file($post_image_temp, "../images/$post_image");
	
	
	$query = "UPDATE users SET ";
	$query .="user_firstname ='{$user_firstname}', ";
	$query .="user_lastname = '{$user_lastname}', ";
	$query .="user_role = '{$user_role}',";
	$query .="username = '{$username}', ";
	$query .="user_email = '{$user_email}', ";
	$query .="user_password = '{$user_password}' ";
	$query .="WHERE username = '{$username}' ";
	
	
	$edit_user_query = mysqli_query($connection, $query);
	confirmQuery($edit_user_query);
	if($edit_user_query){
		echo " User-ul cu numele: $username , a fost editat cu succes ! ";
		
	}

}





?>
						
				<form action="" method="post" enctype="multipart/form-data">

	<div class="col-sm-3 my-1">
		<label for="title" >Firstname</label>
		   <input type="text" value="<?php echo $user_firstname?>" class="form-control" name="user_firstname">
	</div>
	<div class="col-sm-3 my-1">
	<label for="title">Lastname </label>
		<input type="text" value="<?php echo $user_lastname?>" class="form-control" name="user_lastname">
	</div>
	
	<div class="col-sm-3 my-1">
	<label for="post_tags">Username</label>
		<input type="text" value="<?php echo $username?>" class="form-control" name="username">
	</div>
	<div class="col-sm-3 my-1">
		<label for="post_content">Password </label>
		<input type="password" value="<?php echo $user_password?>" class="form-control" name="user_password">
	</div>
	
	<div class="col-sm-3 my-1">
		<label for="post_content">Email </label>
		<input type="email" value="<?php echo $user_email?>" class="form-control" name="user_email">
	</div>
<div class="col-sm-3 my-1">
	<select name="user_role" id="">
		<option value="subscriber"><?php echo $user_role?></option>
		
		<?php 
		if($user_role == 'admin'){
			
			echo "<option value='subscriber'>Subscriber</option>";
				
				}else {
			
			echo "<option value='admin'>Admin</option>";
			
		}
		?>
		
		
	
	</select>
</div>
	

	
	

	
	<div class="col-sm-3 my-1">
	<label for="post_image">Post Image</label>
		<input type="file" name="image">
	</div>
	
	

	<div class="col-sm-3 my-1">
	<input class="btn btn-primary" type="submit" name="edit_user" value="Update Profile">
	</div>
</form>
		
						
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2020</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
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
    </body></html>
