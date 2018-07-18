<!DOCTYPE html>
<html lang="en">
<head>
	<!-- start: Meta -->
	<meta charset="utf-8">
	<title>Bootstrap Metro Dashboard by Dennis Ji for ARM demo</title>
	<meta name="description" content="Bootstrap Metro Dashboard">
	<meta name="author" content="Dennis Ji">
	<meta name="keyword" content="Metro, Metro UI, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
	<!-- start: Mobile Specific -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- end: Mobile Specific -->
</head>
<script>
function add_brg() {
	alert('xxxxx');
	var a = $("#nobar").val();
	var b = $("#nama_barang").val();
	var c = $("#jenis").val();
	var d = $("#jml_barang").val();
	var e = $("#satuan").val();
	$.ajax({
		type: "POST",
		url: "<?php echo base_url(); ?>barang/insert",
		data : $('#brg').serialize(),
		//data : {a:a, b:b, c:c, d:d, e:e},
		success : function(data) {
			alert('Data berhasil disimpan');
			window.location.reload();
		},
		error : function(err) {
			alert('Ada yang salah');
		}
	});
}
</script>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
<!-- Header Menu  -->
<header class="main-header">
	<?php echo $this->load->view('header_menu'); ?>
</header>
<!-- Sidebar Menu -->
<aside class="main-sidebar">
	<?php echo $this->load->view('sidemenu'); ?>
</aside>

	<div class="content-wrapper">
	<section class="content-header">
      <h1>
        Data Supplier
      </h1>
	
    </section>
	
	<div class="modal fade" id="modal-default">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Data Supplier</h4>
              </div>
              <div class="modal-body">
                <form role="form" id="brg">
              <div class="box-body">
                <div class="form-group">
                  <label for="nama_supplier">Nama Supplier</label>
                  <input type="text" class="form-control" id="nama_supplier" name="nama_supplier">
                </div>
                <div class="form-group">
                  <label for="alamat">Alamat Supplier</label>
                  <textarea class="form-control" rows="4" cols="40" id="alamat" name="alamat"></textarea>
                </div>
				<div class="form-group">
                  <label for="no_telp">Nomor Telpon </label>
                  <input type="text" class="form-control" id="no_telp" name="no_telp">
                </div>
				<div class="form-group">
                  <label for="kontak">Kontak Person</label>
                  <input type="text" class="form-control" id="kontak" name="kontak">
                </div>
              </div>
            
            </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="button" OnClick="add_brg()" class="btn btn-primary">Save</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
		
		
		
		<!-- Modal Edit -->
		<div class="modal fade" id="modal-edit">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Data Supplier</h4>
              </div>
              <div class="modal-body">
			  <?php 
			$no = 1;
			foreach($supplier->result() as $row) {
				$nama 	= $row->nama_supplier;
				$alamat	= $row->alamat_supplier;
				$notelp	= $row->no_telp;
				$kontak	= $row->kontak_person;
			}
				?>
                <form role="form">
              <div class="box-body">
                <div class="form-group">
                  <label for="nama_supplier">Nama Supplier</label>
                  <input type="text" class="form-control" id="nama_supplier" name="nama_supplier" value="<?php echo $nama; ?>">
                </div>
                <div class="form-group">
                  <label for="alamat">Alamat Supplier</label>
                  <textarea class="form-control" rows="4" cols="40" id="alamat" name="alamat"><?php echo $alamat; ?></textarea>
                </div>
				<div class="form-group">
                  <label for="no_telp">Nomor Telpon</label>
                  <input type="text" class="form-control" id="no_telp" name="no_telp" value="<?php echo $notelp; ?>">
                </div>
				<div class="form-group">
                  <label for="kontak">Kontak Person</label>
                  <input type="text" class="form-control" id="kontak" name="kontak" value="<?php echo $kontak; ?>">
                </div>
              </div>
			
            </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="button" OnClick="add_brg()" class="btn btn-primary">Update</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
		
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box">
            <div class="box-header with-border">
              <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default">
        Add Record
    </button>
            </div>
          </div>
		  </div>
	</div>
	
      <div class="row">
        <div class="col-xs-12">
			<div class="box">
            
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
				<th>No.</th>
                <th>Nama Supplier</th>
                <th>Alamat Supplier</th>
                <th>Nomor Telepon</th>
                <th>Kontak Person</th>
				<th>Aksi</th>
                </tr>
                </thead>
                <tbody>
				<?php 
				$no = 1;
				foreach($supplier->result() as $row) {
				?>
				<tr>
                  <td><?php echo $no++; ?></td>
                  <td><?php echo $row->nama_supplier; ?></td>
                  <td><?php echo $row->alamat_supplier; ?></td>
                  <td><?php echo $row->no_telp; ?></td>
				  <td><?php echo $row->kontak_person; ?></td>
				  <td>
				<button type="button" onclick="edit()" class="btn btn-info" data-toggle="modal" data-target="#modal-edit">Edit</button>
				<a onclick="if(confirm('Apakah anda yakin ingin menghapus data ini ??')){ location.href='hapus.php?id=<?php echo $row->idsupplier; ?>' }" class="btn btn-danger">Hapus</a>
			</td>
                </tr>
				<?php } ?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
		</div>
		</div>
	</section>
	</div>
	<script>
function edit() {
	alert('xxxxx');
}
</script>
		  
	<?php echo $this->load->view('footer'); ?>
	
<!-- ./wrapper -->
</div>
</body>
</html>