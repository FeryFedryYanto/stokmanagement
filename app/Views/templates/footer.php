<!-- FOOTER -->
<footer id="main-footer">
<div class="container text-center">
  <div class="row py-5">
    <div class="col-12">
      <small class="">
	      <?php 
	       	$tanggal = new DateTime('now');
	       	echo "Copyright © ".$tanggal->format("Y")." By FERY FEDRY YANTO";
	      ?>
      </small>
    </div>
  </div>
</div>
</footer>

<script src="<?= BASEURL; ?>/js/jquery-v3.4.1.js"></script>
<script src="<?= BASEURL; ?>/sweetalert2/dist/sweetalert2.all.js"></script>
<script src="<?= BASEURL; ?>/js/popper.js"></script>
<script src="<?= BASEURL; ?>/js/bootstrap.js"></script>
	
</body>
</html>