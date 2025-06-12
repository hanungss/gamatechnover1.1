<!DOCTYPE html>
<html>
<head>
    <title>Tambah User Baru</title>
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
      </div>
    </nav>
<div class="container" style="margin-top: 80px">
    <div class="row">
        <div class="col-md-3">
            <div class="list-group">
              <a href="#" class="list-group-item active" style="text-align: center;background-color: black;border-color: black">
                ADMINISTRATOR
              </a>
              </a>
        
        <a href="<?php echo base_url() ?>index.php/dashboard/tambah_user" class="list-group-item"><i class=""></i>Tambah User Baru</a>     
        <a href="<?php echo base_url() ?>index.php/dashboard/user" class="list-group-item"><i class=""></i> Lihat User</a>
        <a href="logout" class="list-group-item"><i class="fa fa-sign-out"></i> Logout</a>
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
                <h3></i>Aplikasi Manajemen Berkas</h3>
              </div>
              <div class="panel-body">
    <?=form_open('dashboard/user', 'class="form-horizontal"')?>
     <div class="form-group">
        <label class="col-sm-2 control-label">Nama User</label>
        <div class="col-sm-4">
            <input type="text" name="nama_user" class="form-control" value="<?=set_value('nama_user')?>" placeholder="Nama anda" minlength="5" maxlength="20" required>
            <small class="text-danger"><?=form_error('nama_user')?></small>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">Username</label>
        <div class="col-sm-4">
            <input type="text" name="username" class="form-control" value="<?=set_value('username')?>" placeholder="Username" minlength="5" maxlength="20" required>
            <small class="text-danger"><?=form_error('username')?></small>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">Foto</label>
        <div class="col-sm-4">
            <input type="file" name="foto" class="form-control" value="<?=set_value('foto')?>" placeholder="Foto Profil Anda" required>
            <small class="text-danger"><?=form_error('foto')?></small>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">Password</label>
        <div class="col-sm-4">
            <input type="password" name="password" class="form-control" value="<?=set_value('password')?>" placeholder="Password" minlength="5" required>
            <small class="text-danger"><?=form_error('password')?></small>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" name="submit" class="btn btn-success">Simpan</button>&nbsp;
            <a class="btn btn-default" href="<?=site_url('dashboard/user')?>">Kembali</a>
        </div>
    </div>
<?=form_close()?>
              </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>