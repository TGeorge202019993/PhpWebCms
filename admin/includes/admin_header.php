
<?php ob_start(); ?>



    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>





<?php 




if(isset($_SESSION['user_role'])){
	
		if($_SESSION['user_role'] !== 'admin'){
		header("Location: ../index.php") ; 
		

}

}




?>

