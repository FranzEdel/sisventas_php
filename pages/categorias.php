<!-- ============== | head | =================-->
<?php  
session_start();
if(isset($_SESSION["user"])){
include "layouts/head.php";     ?>
<!--==========================================-->

<!-- =========== | contenido | ===============-->
<div class="app-content content container-fluid">
	<div class="content-wrapper">
		<div class="content-header row">
			<div class="content-header-left col-md-6 col-xs-12 mb-1">
				<h2 class="content-header-title">Categorias</h2>
			</div>
			<div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
				<div class="breadcrumb-wrapper col-xs-12">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="welcome.php">Dashboard</a></li>
						<li class="breadcrumb-item"><a >Productos</a></li>
						<li class="breadcrumb-item active"><a href="#">Categorias</a></li>
					</ol>
				</div>
			</div>
		</div>
		<div class="content-body">
			<section id="basic-form-layouts">
				<div class="row match-height">
					<div class="col-md-12">
						<div class="card">
							<div class="card-header">
								<h4 class="card-title" id="basic-layout-form">
									<button class="btn btn-sm btn-success" data-toggle="modal" data-target="#create_categoria">
									Nueva categoria</button>
								</h4>
								<a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
								<div class="heading-elements">
									<ul class="list-inline mb-0">
										<li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
										<li><a data-action="expand"><i class="icon-expand2"></i></a></li>
									</ul>
								</div>
							</div>
							<div class="card-body collapse in">
								<div class="card-block">
									<div class="table-responsive">
										<table id="table_categoria" class="table table-bordered table-sm">
											<thead>
												<tr>
													<th width="5%">OP</th>
													<th width="5%">ID</th>
													<th width="30%">NOMBRE DE CATEGORIA</th>
													<th width="50%">DESCRIPCION</th>
													<th width="10%">ESTADO</th>
												</tr>
											</thead>
											<tbody>
											</tbody>
											<tfoot>
												<tr>
													<th>OP</th>
													<th>ID</th>
													<th>NOMBRE DE CATEGORIA</th>
													<th>DESCRIPCION</th>
													<th>ESTADO</th>
												</tr>
											</tfoot>
										</table>
                    				</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>
	</div>
</div>
<!--==========================================-->

<!--================| MODAL |=================-->
<?php include "modals/create/Mcategoria.php"; ?>
<!--==========================================-->

<!-- ========= | scripts robust | ============-->
<?php  include "layouts/main_scripts.php"; ?>
<!--==========================================-->

<!--===========  | Custom scripts |  =========-->

<script src="../app-assets/plugins/DataTables/datatables.min.js"></script>
<script src="../app-assets/plugins/DataTables/DataTables-1.10.18/js/dataTables.bootstrap4.min.js"></script>
<script src="../app-assets/plugins/toastr/toastr.min.js"></script>
<script src="../assets/js/Categoria.js"></script>	
<!--==========================================-->

<!-- ============= | footer | ================-->
<?php  include "layouts/footer.php";
}
else{
    header("location:../");
}
?>
<!--==========================================-->