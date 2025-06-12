<!DOCTYPE html>
<html>
<head>
	<title>Sistem Berkas</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="shortcut icon" href="<?=site_url('assets/img/logo.png')?>">
	<meta name="viewport" content="width=device-width, minimum-scale=1, initial-scale=1">
	<title><?=$title?></title>
	<?=link_tag('assets/css/bootstrap.css?ver=3.3.7')?>
	<?=link_tag('assets/css/style.css?ver=1.0.0')?>
	<?=link_tag('assets/css/dataTables.bootstrap.min.css?ver=1.10.15')?>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<nav class="navbar navbar-inverse navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">Sistem Berkas Gamatechno</a>
			</div>
			<div id="navbar" class="navbar-collapse collapse">
				<div class="navbar-form navbar-right">
					<a href="<?php echo base_url() ?>index.php/dashboard/logout" type="submit" class="btn btn-success"><i class="fa fa-sign-out"></i> Logout</a>
				</div>

				<div class="navbar-form navbar-right">
					<a href="<?php echo base_url() ?>index.php/hal_user/upload" type="submit" class="btn btn-success"><i class="fa fa-upload"></i> Upload</a>
				</div>

			</div>
		</nav>
		<div class="container" style="margin-top: 80px">
			<div class="row">
				<div class="col-md-3">
					<div class="list-group">
						<a href="#" class="list-group-item active" style="text-align: center;background-color: black;border-color: black">
							USER
						</a>
						<!--  <a href="<?php echo base_url() ?>index.php/dashboard/edit_user" class="list-group-item"><i class=""></i>Edit User</a> -->
						<a href="<?php echo base_url() ?>index.php/hal_user/" class="list-group-item"><i class=""></i>Home</a>
						<a href="<?php echo base_url() ?>index.php/hal_user/profil" class="list-group-item"><i class=""></i>Profil Saya</a>
						<!-- <a href="<?php echo base_url() ?>index.php/dashboard/delete_user" class="list-group-item"><i class=""></i> Delete User</a> -->
						<a href="<?php echo base_url() ?>index.php/hal_user/cek_berkas" class="list-group-item"><i class=""></i> Lihat Berkas</a>
						<!-- <a href="https://script.google.com/macros/s/AKfycbwY8M4XkXADMOawMRn6KXRKisvVr9N8xsQH9XzORVyWbBxNlB0/exec" class="list-group-item"><i class=""></i>Upload Google Drive</a> -->
						<!--  <a href="dashboard/logout" class="list-group-item"><i class="fa fa-sign-out"></i> Logout</a> -->
					</div>
				</div>
				<div class="col-md-9">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title"><i class="fa fa-dashboard"></i>Halo!</h3>
						</div>
						<div class="panel-body">
							Selamat Datang <b><?php echo $this->session->userdata("user_nama") ?></b> di Sistem berkas gamatechno  
						</div>
					</div>
				</div>
				<div class="col-md-9">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3></i>Aplikasi Manajemen Berkas</h3>
						</div>
						<div class="panel-body">
							Selamat datang di sistem manajemen berkas , anda dapat mengelola berkas dengan mudah disini
						</div>



						<div class="table-responsive">
							<table id="kadaluarsa" class="display table table-bordered table-hover table-responsive">
								<div id=”container”>
									<tr>
										
										<th>Nama Berkas</th>
										<th>Keterangan</th>
										<th>Tanggal Kadaluarsa</th>							
										<th>Berkas</th>
										<th>Aksi</th>
									</tr>
									<?php 
									if(!empty($kadaluarsa))
									foreach ($kadaluarsa as $row){ ?>
									<tr>
										
										<td><?php echo $row->nama_berkas; ?></td>
										<td><?php echo $row->keterangan; ?></td>
										<td><?php echo $row->tanggal; ?></td>


										<td><?php echo '<a href="'.base_url().'index.php/hal_user/download/'.$row->berkas.'"" class="btn  btn-success fa fa-download">Unduh</a>'?></td>
									</td>
									<td>
										<?php echo '<a href="'.base_url().'index.php/hal_user/edit_berkas/'.$row->id_row.'"" class="btn  btn-success fa fa-edit">Edit</a>'?>


										<?php echo '<a href="'.base_url().'index.php/hal_user/delete_berkas/'.$row->id_row.'"class="btn  btn-warning fa fa-trash-o" " onclick="return confirm(\'Anda yakin akan menghapusnya?\')">Delete</a>'?></td>
									</tr>

									<?php } ?>

								</table>
							</div>

						</table>
						<script>
							function confirmDialog() {
								return confirm("Apakah Anda yakin akan mereset password user ini?")
							}
						</script>
					</div>

				</div>
			</div>
		</div>

		<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
		<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</body>
	</html>