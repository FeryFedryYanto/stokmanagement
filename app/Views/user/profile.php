<div class="container">
  <div class="row offset-2">
    <div class="col-sm-10">
      <h4 class="mt-4 text-center " style="color: rgb(130,130,130);"> User Profile </h4>
	    <img src="<?= BASEURL; ?>/img/fery.jpg" alt="fery.jpg" class="rounded mx-auto d-block shadow rounded-circle mt-3 w-25 h-75">
	    <p class="text-center"> <?= $data['user']->getItem('username')." (".$data['user']->getItem('email').")"; ?>
	    	<br>
	    	<a href="<?= BASEURL; ?>/User/ubahPassword" title="Ubah password">
	    		Ubah password
	    		<i title="Ubah password" class="fa fa-edit"></i>
	    	</a>
		</p>
    </div>
  </div>
</div>
<br><br><br><br><br><br>