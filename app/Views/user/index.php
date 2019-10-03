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
			<?php if (!empty($data['user'])) : ?>
			<table class="table table-striped">
	        <thead class="headTable text-justify">
	          <tr>
	            <th> Username </th>
	            <th> Gmail </th>
	          </tr>
	        </thead>
	        <br><br><br>
	        <tbody class="bodyTable text-muted text-break text-justify">
	        	<?php foreach($data['user'] as $user) : ?>
	        		<tr>
	        			<td> <?= $user->username ?> </td>
	        			<td> <?= $user->email ?> </td>
	        		</tr>
	        	<?php endforeach; ?>
	        </tbody>
	        </table>
	        <?php endif; ?>
		</div>
	</div>
</div>