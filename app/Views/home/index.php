<form method="POST">
  <div class="container">
    <div class="row offset-10">
      <div class="col-sm-2">
		<!-- Form pencarian -->
        <div class="search">
          <input class="inputSearch" type="text" placeholder="Search..." name="search">
          <button class="buttonSearch" type="submit" value="Cari"> <i class="fa fa-search"></i></button>
        </div>
      </div>
    </div>
  </div>
</form>

<div class="container mt-0 ">
	<div class="row offset-2">
		<div class="col-sm-10 col-lg-10">
			<?php Flasher::flash(); ?>
			 <!-- Tabel barang -->
			<?php if (!empty($data['tabelBarang'])) : ?>
				<table class="table table-striped">
		        <thead class="headTable text-justify">
		          <tr>
		            <th>ID</th>
		            <th>Nama Barang</th>
		            <th>Jumlah</th>
		            <th>Harga (Rp.)</th>
		            <th>Tanggal Update</th>
		            <th>Action</th>
		          </tr>
		        </thead>
		        <br><br><br>
		        <tbody class="bodyTable text-muted text-break text-justify">
		        	<?php foreach($data['tabelBarang'] as $barang) : ?>
		        		<tr>
		        			<th> <?= $barang->id_barang ?> </th>
		        			<td> <?= $barang->nama_barang ?> </td>
		        			<td> <?= $barang->jumlah_barang ?> </td>
		        			<td> <?= number_format($barang->harga_barang, 0, ',','.'); ?> </td>
		        			<?php $tanggal = New DateTime($barang->tanggal_update); ?>
		        			<td> <?= $tanggal->format("d-m-Y H:i"); ?> </td>
		        			<td>
		        				<a class="mr-1 " href="<?= BASEURL; ?>/home/editBarang/<?= $barang->id_barang ?>"> <i title="Edit" class="fa fa-edit"></i> </a> |
		        				<a class="text-danger" href="<?= BASEURL; ?>/home/hapusBarang/<?= $barang->id_barang ?>" onclick="return confirm('Delete barang?');"> <i title="Hapus" class="fa fa-trash-alt " style="font-size:15px; color: rgb(160,160,160); " ></i> </a>
		        			</td>
		        		</tr>
		        	<?php endforeach; ?>
		        </tbody>
		        </table>
		    <?php endif; ?>
		</div>
	</div>
</div>