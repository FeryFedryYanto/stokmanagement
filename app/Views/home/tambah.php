<div class="container">
	<div class="row offset-2">
		<div class="col-sm-10">
			<h4 class="mt-5 " style="color: rgb(130,130,130);"> Tambah barang </h4>
			<hr style="color: rgb(200,200,200);">
			
		<!-- Form untuk proses update -->
	      <form method="post" action="<?= BASEURL; ?>/home/tambahBarangProssess">

	        <div class="form-group">
	          <label for="nama_barang">Nama Barang</label>
	          <input type="text" class="form-control" name="nama_barang"
	          value="<?= $data['barang']->getItem('nama_barang'); ?>">
	        </div>

	        <div class="form-group">
	          <label for="jumlah_barang">Jumlah</label>
	          <input type="number" class="form-control" name="jumlah_barang"
	          value="<?= $data['barang']->getItem('jumlah_barang'); ?>">
	        </div>

	        <div class="form-group">
	          <label for="harga_barang">Harga</label>
	          <input type="number" class="form-control" name="harga_barang"
	          value="<?= $data['barang']->getItem('harga_barang'); ?>">
	        </div>

	        <input type="submit" class="btn btn-primary" value="Tambah">
	        <a href="<?= BASEURL; ?>" class="btn btn-secondary">Cancel</a>

	      </form>
		</div>
	</div>
</div>