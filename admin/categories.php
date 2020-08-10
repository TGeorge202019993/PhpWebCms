<?php include "includes/admin_navibar.php";?>




					

			<div class="col-xm-6">


			<?php  editCategory(); ?> 

			<form action="" method= "post">
			<div class="form-group">
			<label for="cat-title">LISTA CU CATEGORI</label>
			<input type="text" class = "form-control" name="cat_title">
			</div>	



			<div class="form-group">
			<input class = "btn btn-primary" type="submit" name="submit" value="Adauga o categorie noua">
			</div>	

			<div class="col-sm-6">
			<table class="table table-bordered table-hover">
			<thead>
			<tr>
			<th>id</th>
			<th>Nume Categorie</th>
			<th>Action</th>
			</tr>
			</thead>
			<tbody>
			<?php //find all categories query, in functions//
			findAllCategorys();	
			?>					

			<?php //delete categories, in fuctions//

			deleteCategory();

			?>


			</tbody>
			</table>
			</div>
			</form>
			</div>		


			<?php // EDIT CATEGORY 

			if(isset($_GET['edit'])){

			$cat_id = $_GET['edit'];
			include"includes/update_categories.php";

			}
			?>


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

			<script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
			<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
			<script src="js/scripts.js"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
			<script src="assets/demo/chart-area-demo.js"></script>
			<script src="assets/demo/chart-bar-demo.js"></script>
			<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
			<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
			<script src="assets/demo/datatables-demo.js"></script>

