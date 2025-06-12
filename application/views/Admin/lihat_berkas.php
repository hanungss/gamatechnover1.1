<!DOCTYPE html>
<html>
<head>
	<title>Lihat Berkas</title>
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
			   <a href="<?php echo base_url() ?>index.php/dashboard/tambah_user" class="list-group-item"><i class=""></i>Tambah User Baru</a>
						
						<a href="<?php echo base_url() ?>index.php/dashboard/user" class="list-group-item"><i class=""></i> Lihat User</a>
						<a href="<?php echo base_url() ?>index.php/dashboard" class="list-group-item"><i class="fa fa-fa home"></i> Home</a>
			</div>
		</div>
		<div class="col-md-9">
			<div class="panel panel-default">
			  <div class="panel-heading">
			    <h3 class="panel-title"><i class="fa fa-dashboard"></i> Halo!</h3>
			  </div>
			  <div class="panel-body">
			    Selamat Datang <b><?php echo $this->session->userdata("user_nama") ?></b> di halaman Administrator System di halaman Administrator System , Halaman ini bisa anda gunakan jika berkas tidak sesuai dengan peraturan perundang-undangan Republik Indonesia. Anda Bisa menghapusnya atau merubah deskripsi agar pemilik file mengetahui kesalahannya
			  </div>
			</div>
		</div>
		<div class="col-md-9">
			<div class="panel panel-default">
			  <div class="panel-heading">
			    <h3></i>Daftar Berkas Pada Sistem</h3>
			  </div>
			  <div>

			  	

			  	<div class="table-responsive">
    <table id="get_data_berkas" class="display table table-bordered table-hover table-responsive">
        <div id=”container”>
<tr>
<th>No</th>
<th>Nama Berkas</th>
<th>Keterangan</th>
<th>Tanggal</th>
<th>Jenis</th>
<th>Berkas</th>
<th>Aksi</th>
</tr>
<?php foreach ($data_status as $row){ ?>
<tr>
<td></td>
<td><?php echo $row->nama_berkas; ?></td>
<td><?php echo $row->keterangan; ?></td>
<td><?php echo $row->tanggal; ?></td>
<td><?php echo $row->jenis; ?></td>
<td><?php if (!empty($status_berkas['berkas'])) ?>
            <img class="foto" src="site_url('./upload')" alt="Berkas">
        </td>
<td>

		<?php echo '<a href="'.base_url().'index.php/dashboard/delete_berkas/'.$row->id_row.'"class="btn  btn-warning fa fa-trash-o" " onclick="return confirm(\'Anda yakin akan menghapusnya?\')">Delete</a>'?></td>
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