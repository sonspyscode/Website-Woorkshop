<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<title><?= APP_NAME ?> - <?= $judul ?></title>
	<link href="<?= base_url('sb-admin-2/') ?>/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
	<link href="<?= base_url('sb-admin-2/') ?>/css/sb-admin-2.min.css" rel="stylesheet">
	<link href="<?= base_url('sb-admin-2/') ?>/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>

<body id="page-top">
	<div id="wrapper">
	<?php partial('navbar', $aktif) ?>
	<!-- Content Wrapper -->
	<div id="content-wrapper" class="d-flex flex-column">
		<div id="content">
		<?php partial('topbar') ?>
			<div class="container-fluid">
				<div class="row">
					<div class="col-sm-12">
						<div class="clearfix">
							<div class="float-left">
								<h1 class="h3 mb-4 text-gray-800"><?= $judul ?></h1>
							</div>
							<!-- <div class="float-right">
								<a href="" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Tambah Data</a>
							</div> -->
						</div>
						<hr>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-6">
						
					</div>
				</div>
				<div class="row">
					<div class="col-sm-4">
						<div class="card shadow">
							<div class="card-header">
								<h6 class="m-0 font-weight-bold text-primary">Tambah Data</h6>
							</div>
							<div class="card-body">
								<form method="POST" action="<?= base_url('service/tambah') ?>" enctype="multipart/form-data">
								  	<div class="form-group">
										<label for="cabang">Nama Cabang</label>
										<select name="id_cabang" id="cabang" class="form-control">
											<?php while($cabang = $data_cabang->fetch_object()) : ?>
												<option value="<?= $cabang->id ?>"><?= $cabang->cabang ?></option>
											<?php endwhile; ?>
										</select>
								  	</div>
								  	<div class="form-group">
								  		<label for="nama">Jenis Service</label>
								  		<input type="text" name="nama" id="nama" required="required" placeholder="ketik" autocomplete="off" class="form-control">
								  	</div>
								  	<div class="row">
									  	<div class="form-group col-6">
									  		<label for="alamat">Alamat</label>
									  		<input type="text" name="alamat" id="alamat" required="required" placeholder="ketik" autocomplete="off" class="form-control">
									  	</div>
									  	<div class="form-group col-6">
									  		<label for="jumlah_tkns">Jumlah Teknisi</label>
									  		<input type="number" name="jumlah_tkns" id="jumlah_tkns" required="required" placeholder="ketik" autocomplete="off" class="form-control">
									  	</div>
								  	</div>
									<div class="row">
									  	<div class="form-group col-6">
									  		<label for="jeniskndrn">Jenis kendaraan</label>
									  		<input type="text" name="jeniskndrn" id="jeniskndrn" required="required" placeholder="ketik" autocomplete="off" class="form-control">
									  	</div>
									  	<div class="form-group col-6">
									  		<label for="Biaya">Biaya</label>
									  		<input type="number" name="biaya" id="niaya" required="required" placeholder="ketik" autocomplete="off" class="form-control">
									  	</div>
								  	</div>
								  	<div class="form-group">
								  		<label for="gambar">Gambar</label>
								  		<input type="file" name="gambar" id="gambar" required="required" placeholder="ketik" autocomplete="off" class="form-control-file">
								  	</div>
								  	<div class="form-group">
										<button type="submit" class="btn btn-sm btn-success" name="tambah"><i class="fa fa-plus"></i> Tambah</button>
										<button type="reset" class="btn btn-sm btn-danger"><i class="fa fa-times"></i> Batal</button>
								  	</div>
								</form>
							</div>
						</div>
					</div>

					<div class="col-sm-8">
						<div class="card shadow">
							<div class="card-header">
								<h6 class="m-0 font-weight-bold text-primary">Daftar Jenis Service</h6>
							</div>
							<div class="card-body">
								<?php if(checkSession('success')): ?>
									<div class="alert alert-success alert-dismissible fade show" role="alert">
							  			<?= getSession('success', true) ?>
							  			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							    			<span aria-hidden="true">&times;</span>
							  			</button>
									</div>
								<?php elseif(checkSession('error')): ?>
									<div class="alert alert-danger alert-dismissible fade show" role="alert">
							  			<?= getSession('error', true) ?>
							  			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							    			<span aria-hidden="true">&times;</span>
							  			</button>
									</div>
								<?php endif ?>

								<table class="table table-bordered" id="dataTable" cellspacing="0">
	                  				<thead>
	                    				<tr>
	                    					<th>No</th>
	                    					<th>Service</th>
	                    					<th>Cabang</th>
	                    					<th>Teknisi</th>
	                    					<th>Aksi</th>
	                    				</tr>
	                 				</thead>
	                  				<tfoot>
	                    				<tr>
	                    					<th>No</th>
	                    					<th>Service</th>
	                    					<th>Cabang</th>
	                    					<th>Teknisi</th>
	                    					<th>Aksi</th>
	                    				</tr>
	                  				</tfoot>
	                 				<tbody>
										<?php while($service = $data_service->fetch_object()) : ?>
											<tr>
												
												<td><?= $no++ ?></td>
												<td><?= $service->nama ?></td>
												<td><?= $service->cabang ?></td>
												<td><?= $service->jumlah_tkns ?></td>
												<td>
													<a href="<?= base_url('service/ubah/' . $service->id) ?>" class="btn btn-sm btn-info"><i class="fa fa-pen"></i> Ubah</a>
													<a href="<?= base_url('service/detail/' . $service->id) ?>" class="btn btn-sm btn-warning"><i class="fa fa-eye"></i> Detail</a>
	                 								<a href="<?= base_url('service/hapus/' . $service->id) ?>" class="btn btn-sm btn-danger" onclick="return confirm('apakah anda yakin?')"><i class="fa fa-trash"></i> Hapus</a>
												</td>
											</tr>
										<?php endwhile; ?>
	                 				</tbody>
              					</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<?php partial('footer') ?>
	</div>
	</div>

	<a class="scroll-to-top rounded" href="#page-top">
		<i class="fas fa-angle-up"></i>
	</a>

	<script src="<?= base_url('sb-admin-2/') ?>/vendor/jquery/jquery.min.js"></script>
	<script src="<?= base_url('sb-admin-2/') ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="<?= base_url('sb-admin-2/') ?>/vendor/jquery-easing/jquery.easing.min.js"></script>
	<script src="<?= base_url('sb-admin-2/') ?>/js/sb-admin-2.min.js"></script>

	<script src="<?= base_url('sb-admin-2/') ?>/vendor/datatables/jquery.dataTables.min.js"></script>
  	<script src="<?= base_url('sb-admin-2/') ?>/vendor/datatables/dataTables.bootstrap4.min.js"></script>
	<script src="<?= base_url('sb-admin-2/') ?>/js/demo/datatables-demo.js"></script>
</body>

</html>
