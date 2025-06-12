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
	<?=link_tag('assets/css/bootstrap.min.css?')?>
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
						
					</div>									

					
					
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">Status berkas anda</h3>
						</div>
						<div class="panel-body row">

							<div class="col-sm-4">
								<div class="panel panel-default">
									<div class="panel-body green">
										
										<b>Terdapat</b>
										<h1 class="ttl"><?php 
										$sesi =  $this->session->userdata("user_id");
										$condition = " id_berkas='$sesi' ";		
										$this->db->select('COUNT');
										$this->db->like('jenis','Dokumen');
										$this->db->from('berkas');
										$this->db->where($condition);
										echo $this->db->count_all_results();
										?></h1>
										<div class="panel-footer green"><a href="<?php echo base_url() ?>index.php/hal_user/berkas_pdf"></i>Berkas Dokumen</a></div>
									</div>
								</div>
							</div>


							<div class="col-sm-4">
								<div class="panel panel-default">
									<div class="panel-body green">
							
										<b>Terdapat</b>
										<h1 class="ttl"><?php 
										$sesi =  $this->session->userdata("user_id");
										$condition = " id_berkas='$sesi' ";		
										$this->db->select('COUNT');
										$this->db->like('jenis','Gambar');
										$this->db->from('berkas');
										$this->db->where($condition);
										echo $this->db->count_all_results();
										?></h1>
										<div class="panel-footer green"><a href="<?php echo base_url() ?>index.php/hal_user/berkas_gambar"></i>Berkas Gambar</a></div>

									</div>
								</div>
							</div>


							<div class="col-sm-4">
								<div class="panel panel-default">
									<div class="panel-body green">
							
										<b>Terdapat</b>
										<h1 class="ttl"><?php 
										$sesi =  $this->session->userdata("user_id");
										$condition = " id_berkas='$sesi' ";		
										$this->db->select('COUNT');
										$this->db->like('jenis','Video');
										$this->db->from('berkas');
										$this->db->where($condition);
										echo $this->db->count_all_results();
										?></h1>
										<div class="panel-footer green"><a href="<?php echo base_url() ?>index.php/hal_user/berkas_video"></i>Berkas Video</a></div>

									</div>
								</div>
							</div>

							<div class="col-sm-4">
								<div class="panel panel-default">
									<div class="panel-body green">
							
										<b>Terdapat</b>
										<h1 class="ttl"><?php 
										$sesi =  $this->session->userdata("user_id");
										$condition = " id_berkas='$sesi' ";		
										$this->db->select('COUNT');
										$this->db->like('jenis','Lain');
										$this->db->from('berkas');
										$this->db->where($condition);
										echo $this->db->count_all_results();
										?></h1>
										<div class="panel-footer green"><a href="<?php echo base_url() ?>index.php/hal_user/berkas_lain"></i>Berkas Lainnya</a></div>

									</div>
								</div>
							</div>



							<div class="col-sm-4">
								<div class="panel panel-default">
									<div class="panel-body red">
										
										<b>Terdapat</b>
										<h1 class="ttl"><?php 
										$sesi =  $this->session->userdata("user_id");
										$condition1 = " id_berkas='$sesi' ";
										$condition2 = " tanggal <= now()";	
										$this->db->select('COUNT(tanggal)');
										$this->db->from('berkas');
										$this->db->where($condition1);
										$this->db->where($condition2);
										echo $this->db->count_all_results();
										?></h1>
										<div class="panel-footer red"><a href="<?php echo base_url() ?>index.php/hal_user/kadaluarsa"></i>Berkas Akan Kadaluarsa</a></div>

									</div>
								</div>
							</div>

							<div class="col-sm-4">
								<div class="panel panel-default">
									<div class="panel-body yellow">
									
										<b>Terdapat</b>
										<h1 class="ttl"><?php 
										$sesi =  $this->session->userdata("user_id");
										$condition = " id_berkas='$sesi' ";		
										$this->db->select('COUNT(berkas)');
										$this->db->from('berkas');
										$this->db->where($condition);
										echo $this->db->count_all_results();
										?></h1>
										<div class="panel-footer yellow"><a href="<?php echo base_url() ?>index.php/hal_user/cek_berkas"></i>Berkas Total Dimiliki</a></div>
									</div>
								</div>
							</div>
						</div>
					</div>
					


					<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
					<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
				</body>
				</html>