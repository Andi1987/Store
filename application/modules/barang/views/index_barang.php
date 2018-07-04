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
        Data Barang
      </h1>
	
    </section>
	
	<div class="modal fade" id="modal-default">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Data Barang</h4>
              </div>
              <div class="modal-body">
                <form role="form" id="brg">
              <div class="box-body">
                <div class="form-group">
                  <label for="nobar">No. Barang</label>
                  <input type="text" class="form-control" id="nobar" name="nobar">
                </div>
                <div class="form-group">
                  <label for="nama_barang">Nama Barang</label>
                  <input type="text" class="form-control" id="nama_barang" name="nama_barang">
                </div>
				<div class="form-group">
                  <label for="nobar">Jenis</label>
                  <select name="jenis" id="jenis" class="form-control">
				  <option value="1">Makanan</option>
				  <option value="2">Minuman</option>
				  </select>
                </div>
				<div class="form-group">
                  <label for="jml_barang">Jumlah </label>
                  <input type="text" class="form-control" id="jml_barang" name="jml_barang">
                </div>
				<div class="form-group">
                  <label for="nobar">Satuan</label>
                  <select name="satuan" id="satuan" class="form-control">
					<?php 
					foreach($satuan->result() as $row) {
					?>
				  <option value="<?php echo $row->id; ?>"><?php echo $row->nama_satuan; ?></option>
					<?php } ?>
				  </select>
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
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Jenis</th>
                <th>Jumlah Barang</th>
                <th>Satuan</th>
				<td>Aksi</td>
                </tr>
                </thead>
                <tbody>
				<?php 
				$no = 1;
				foreach($barang->result() as $row) {
					$a = $row->jenis;
					$b = $row->satuan;
				if($a == '1') {
					$a = 'Makanan';
				}else{
					$a = 'Minuman';
				}
				if($b == '1') {
					$b = 'Dus';
				}else{
					$b = 'Botol';
				}
				?>
				<tr>
                  <td><?php echo $no++; ?></td>
                  <td><?php echo $row->kode_barang; ?></td>
                  <td><?php echo $row->nama_barang; ?></td>
                  <td><?php echo $a; ?></td>
                  <td><?php echo $row->jumlah; ?></td>
				  <td><?php echo $b; ?></td>
				  <td>
				<a href="det_barang.php?id=<?php echo $row->idbarang; ?>" class="btn btn-info">Detail</a>
				<a href="edit.php?id=<?php echo $row->idbarang; ?>" class="btn btn-warning">Edit</a>
				<a onclick="if(confirm('Apakah anda yakin ingin menghapus data ini ??')){ location.href='hapus.php?id=<?php echo $row->idbarang; ?>' }" class="btn btn-danger">Hapus</a>
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
		  
	<?php echo $this->load->view('footer'); ?>
	
<!-- ./wrapper -->
</div>
</body>
</html>