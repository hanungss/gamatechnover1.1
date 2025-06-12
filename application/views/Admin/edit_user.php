<!DOCTYPE html>
<html>
<head>
	<title>Profil Pengguna</title>
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
				<a href="<?php echo base_url() ?>index.php/dashboard/upload" type="submit" class="btn btn-success"><i class="fa fa-upload"></i> Upload</a>
        	</div>

        	<div class="navbar-form navbar-right">
				<a href="<?php echo base_url() ?>index.php/dashboard/data_status" type="submit" class="btn btn-success"><i class="fa fa-folder"></i> Daftar Berkas</a>
        	</div>

      </div>
    </nav>
<div class="container" style="margin-top: 80px">
	<div class="row">
		<div class="col-md-3">
			<div class="list-group">
			  <a href="#" class="list-group-item active" style="text-align: center;background-color: black;border-color: black">
			    ADMINISTRATOR
			  </a>
			   <a href="<?php echo base_url() ?>index.php/dashboard/tambah_user" class="list-group-item"><i class=""></i>Tambah User Baru</a>
						
						<a href="<?php echo base_url() ?>index.php/dashboard/user" class="list-group-item"><i class=""></i> Lihat User</a>
						<a href="dashboard/logout" class="list-group-item"><i class="fa fa-sign-out"></i> Logout</a>
			</div>
		</div>
		<div class="col-md-9">
			<div class="panel panel-default">
			  <div class="panel-heading">
			    <h3 class="panel-title"><i class="fa fa-dashboard"></i>Halo!</h3>
			  </div>
			  <div class="panel-body">
			    Selamat Datang <b><?php echo $this->session->userdata("user_nama") ?></b> di halaman Administrator System
			  </div>
			</div>
		</div>
		<div class="col-md-9">
			<div class="panel panel-default">
			  <div class="panel-heading">
			    <h3></i>Profil Pengguna</h3>
			  </div>
			  <div class="panel-body">
			     	<div class="table-responsive">
    <table id="user" class="display table table-bordered table-hover table-responsive">
        <div id=”container”>
    <?php 
        $att = array('id' => 'biodata-form');
        echo form_open('dashboard/simpan_edit_user', $att);
        echo form_hidden('id_user',$edit->id_user);
    ?>
        <table id="user" class="display table table-bordered table-hover table-responsive">
        <div id=”container”> 

        
            <tr>
                <td>Nama Lengkap</td>
                <td><input type="text" name="nama_user" value="<?php echo $edit->nama_user; ?>"/></td>
            </tr>
            <tr>
                <td>Username</td>
                <td><input type="text" name="username" value="<?php echo $edit->username; ?>"/></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="password" value="<?php echo $edit->password; ?>"/></td>
            </tr>
                <td></td>
                <td><input type="submit" value="Simpan"/></td>
            </tr>
        </table>


    </table>
			  </div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>