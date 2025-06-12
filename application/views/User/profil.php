<!DOCTYPE html>
<html>
<head>
	<title>Sistem Berkas</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="shortcut icon" href="<?=base_url('assets/img/logo.jpg')?>">
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
						<!-- <a href="<?php echo base_url() ?>index.php/hal_user/cek_berkas" class="list-group-item"><i class=""></i> Lihat Berkas</a> -->
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
							<h3></i>Profil Pengguna</h3>
						</div>

						<div class="row print">
							<div class="col-sm-3" id="foto">
								<?php foreach ($profil as $row){ ?>
								<img class="foto" src="<?=base_url('upload/foto/'.$row->foto)?>" alt="Foto">
									<?php } ?>

								
								
							</div>
							<div class="col-sm-7" id="data">
								<table class="table pengguna">
									<tbody>
										<?php foreach ($profil as $row){ ?>
											<tr>
												<td width="150px">Nama User</td>
												<td width="5px">:</td>
												<td><?php echo $row->nama_user; ?></td>
											</tr>
											<tr>
												<td width="150px">username</td>
												<td width="5px">:</td>
												<td><?php echo $row->username; ?></td>
											</tr>
											<tr>
												<td width="150px">Jenis Kelamin</td>
												<td width="5px">:</td>
												<td><?php echo $row->jenis_kel; ?></td>
											</tr>
											<tr>
												<td width="150px">Email</td>
												<td width="5px">:</td>
												<td><?php echo $row->email; ?></td>
											</tr>
											

											<tr>
												<td>								
													<?php echo '<a href="'.base_url().'index.php/hal_user/edit_user/'.$row->id_user.'"" class="btn  btn-success fa fa-edit">Edit</a>'?>
											
													<?php echo '<a href="'.base_url().'index.php/hal_user/delete_user/'.$row->id_user.'"class="btn  btn-warning fa fa-trash-o" " onclick="return confirm(\'Anda yakin akan menghapusnya?\')">Delete</a>'?>
												</td>
												
											</tr>
									</tbody>
										<?php } ?>



										<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
										<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
									</body>
									</html>