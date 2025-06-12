<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="shortcut icon" href="<?=base_url('assets/img/logo.jpg')?>">
  <meta name="viewport" content="width=device-width, minimum-scale=1, initial-scale=1">
  <title>Daftar User Baru</title>
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
      </div>
    </nav>
    <div class="container" style="margin-top: 80px">
      <div class="row">
        <div class="col-md-3">
          <div class="list-group">


          </div>
        </div>
      </div><</nav>
      <div class="col-md-9">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3><i class="fa fa-dashboard"></i> Halo!</h3>
          </div>
          <div class="panel-body">
            Selamat Datang di halaman Pendaftaran
          </div>
        </div>
      </div>
      <div class="col-md-9">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3></i>Daftarkan diri anda untuk menggunakan sistem ini</h3>
          </div>
          <div class="panel-body">
            Selamat Datang <b><?php echo $this->session->userdata("user_nama") ?></b> di halaman upload berkas
            <h3>Ayo Daftar!</h3>
            <?php echo $this->session->userdata('message'); ?>

            <?php echo form_open_multipart('dashboard/submit_registrasi', 'class="form-horizontal"')?>
                <!-- <div class="form-group">
                  <label class="col-sm-2 control-label">ID</label>
                  <div class="col-sm-4">
                    ID akan terisi otomatis
                  </div>
                </div> -->
                <div class="form-group">
                  <label class="col-sm-2 control-label">Nama User</label>
                  <div class="col-sm-4">
                    <input type="text" name="nama_user" class="form-control" value="<?=set_value('nama_user')?>" placeholder="nama anda" minlength="5" maxlength="20" required>
                    <small class="text-danger"><?=form_error('nama_user')?></small>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Username</label>
                  <div class="col-sm-4">
                    <input type="text" name="username" class="form-control" value="<?=set_value('username')?>" placeholder="username anda" minlength="5" required>
                    <small class="text-danger"><?=form_error('username')?></small>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Password</label>
                  <div class="col-sm-4">
                    <input type="password" name="password" class="form-control" value="<?=set_value(md5('password'))?>" required>
                    <small class="text-danger"><?=form_error('password')?></small>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Jenis Kelamin</label>
                  <div class="col-sm-4">
                    <select class="form-control" name="jenis_kel">
                      <option value="Laki-laki">Laki-laki</option>
                      <option value="Perempuan">Perempuan</option>
                    </select>
                    <small class="text-danger"><?=form_error('jenis_kel')?></small>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Email</label>
                  <div class="col-sm-4">
                    <input type="text" name="email" class="form-control" value="<?=set_value('email')?>" placeholder="email anda" minlength="5" maxlength="255" required>
                    <small class="text-danger"><?=form_error('email')?></small>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Foto Profil</label>
                  <div class="col-sm-4">
                  <label>Foto profil anda</label> <span class="label label-success">Ukuran maksimal 2 MB. Format file: jpeg, jpg, dan png.</span>
                  <?php echo form_error('nama_user','username','password'); ?>
                  <div id="image-preview">
                    <label for="image-upload" id="image-label">Choose File</label>
                    <input type="file" name="foto" id="image-upload" required/>
                  </div>
                </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" name="submit" class="btn btn-success">Simpan</button>&nbsp;
                    <a class="btn btn-default" href="<?=site_url('login')?>">Kembali</a>
                  </div>
                </div>
              </div>
              <?php echo form_close();?>
            </div>
          </center> 
        </div>
      </div>
    </div>
  </div>

  <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>