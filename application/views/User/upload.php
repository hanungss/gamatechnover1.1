<!DOCTYPE html>
<html>
<head>
  <title>Upload File</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="shortcut icon" href="<?=base_url('assets/img/logo.jpg')?>">
  <meta name="viewport" content="width=device-width, minimum-scale=1, initial-scale=1">
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
        <a class="navbar-brand" href="<?php echo base_url() ?>index.php/dashboard/lihat_user">Sistem Berkas Gamatechno</a>
      </div>
      <div id="navbar" class="navbar-collapse collapse">
        <div class="navbar-form navbar-right">
          <a href="<?php echo base_url() ?>index.php/hal_user" type="submit" class="btn btn-success"><i class="fa fa-home"></i> Home</a>
        </div>
      </div>
    </nav>
    <div class="container" style="margin-top: 80px">
      <div class="row">
        <div class="col-md-3">
          <div class="list-group">
          </div>
        </div>
        <div class="col-md-9">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title"><i class="fa fa-dashboard"></i>Halo!</h3>
            </div>
            <center>
              <div class="panel-body">
                Selamat Datang <b><?php echo $this->session->userdata("user_nama") ?></b> di halaman upload berkas
                <h3>Upload berkas anda disini</h3>
                <?php echo $this->session->userdata('message'); ?>

                <?php echo form_open_multipart('dashboard/unggah', 'class="form-horizontal"')?>
                <!-- <div class="form-group">
                  <label class="col-sm-2 control-label">ID</label>
                  <div class="col-sm-4">
                    ID akan terisi otomatis
                  </div>
                </div> -->
                <div class="form-group">
                  <label class="col-sm-2 control-label">Nama Berkas</label>
                  <div class="col-sm-4">
                    <input type="text" name="nama_berkas" class="form-control" value="<?=set_value('nama_berkas')?>" placeholder="nama berkas anda" minlength="5" maxlength="20" required>
                    <small class="text-danger"><?=form_error('nama_berkas')?></small>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Keterangan</label>
                  <div class="col-sm-4">
                    <input type="text" name="keterangan" class="form-control" value="<?=set_value('keterangan')?>" placeholder="tuliskan deskripsi berkas anda" minlength="5" required>
                    <small class="text-danger"><?=form_error('keterangan')?></small>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Tanggal Expired</label>
                  <div class="col-sm-4">
                    <input type="date" name="tanggal" class="form-control" value="<?=set_value('tanggal')?>" required>
                    <small class="text-danger"><?=form_error('tanggal')?></small>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Jenis Berkas</label>
                  <div class="col-sm-4">
                    <select class="form-control" name="jenis">
                      <option value="Dokumen">File Dokumen</option>
                      <option value="Gambar">File Gambar</option>
                      <option value="Video">File Video</option>
                      <option value="Lain">File jenis lainnya</option>
                    </select>
                    <small class="text-danger"><?=form_error('jenis')?></small>
                  </div>
                </div>
                <div class="form-group">
                 <label class="col-sm-2 control-label">Foto Profil Anda</label>
                 <div class="col-sm-4">
                  <label>Berkas anda</label> <span class="label label-success">Ukuran maksimal 2 MB. Format file: mpeg, mp4, avi, pdf , doc, docx, jpeg, jpg, dan png.</span>
                  <?php echo form_error('nama_berkas','keterangan','tanggal'); ?>
                  <div id="image-preview">
                    <label for="image-upload" id="image-label">Choose File</label>
                    <input type="file" name="berkas" id="image-upload" required/>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" name="submit" class="btn btn-success">Simpan</button>&nbsp;
                    <a class="btn btn-default" href="<?=site_url('hal_user')?>">Kembali</a>
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