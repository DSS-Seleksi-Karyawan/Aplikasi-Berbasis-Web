<div class="span9">
	<div class="content">
<?php
	$kriteria = new Kriteria();
	

	/*----------------------------------
	------------------------------------
	------------------------------------
	------------------------------------
	Ketika user melakuakn input data
	------------------------------------
	------------------------------------
	------------------------------------
	----------------------------------*/

	if(isset($_GET['aksi'])){
		if($_GET['aksi'] == "tambah"){
?>
			<div class="module">
				<div class="module-head">
					<h3>Tambah Kriteria</h3>
				</div>
				<?php
					if(isset($_POST['submit'])){
						$id_kriteria = $_POST['id_kriteria'];
						$nama_kriteria = $_POST['nama_kriteria'];
						$bobot = $_POST['bobot'];

						$qry = $kriteria->InsertData($id_kriteria, $nama_kriteria, $bobot);

	  					if($qry){
	  						echo "<script language='javascript'>alert('Kriteria berhasil disimpan');document.location='?menu=kriteria&aksi=tambah'</script>";
	  					}else{
	  						echo "<script language='javascript'>alert('Gagal');document.location='?menu=kriteria'</script>";
	  					}
					}
				?>

				<div class="module-body">
					<form class="form-horizontal row-fluid" action="" method="post" enctype="multipart/form-data">

						<div class="control-group">
							<label class="control-label" for="basicinput">ID.</label>
							<div class="controls">
								<input type="text" id="basicinput" name="id_kriteria" placeholder="Input ID Kriteria" class="span8">
							</div>
						</div>

						<div class="control-group">
							<label class="control-label" for="basicinput">Kriteria</label>
							<div class="controls">
								<input type="text" id="basicinput" name="nama_kriteria" placeholder="Input Kriteria" class="span8">
							</div>
						</div>

						<div class="control-group">
							<label class="control-label" for="basicinput">Bobot</label>
							<div class="controls">
								<input type="text" id="basicinput" name="bobot" placeholder="Input Bobot Kriteria" class="span8">
							</div>
						</div>

						<div class="control-group">
							<div class="controls">
								<button type="submit" name="submit" class="btn">Simpan</button> <a class='btn' href='?menu=kriteria'>Selesai</a> 
							</div>
						</div>
					</form>
				</div>
			</div>

			<?php

		}elseif ($_GET['aksi'] == "edit"){

			/*----------------------------------
			------------------------------------
			------------------------------------
			------------------------------------
			Ketika user melakukan edit data
			------------------------------------
			------------------------------------
			------------------------------------
			----------------------------------*/

			if(isset($_GET['id_kriteria'])){
				$id_kriteria = $_GET['id_kriteria'];
				$get = $kriteria->GetData("where id_kriteria='$id_kriteria'");
				$row = $get->fetch();
				?>
			
			<div class="module">
				<div class="module-head">
					<h3>Edit Data Kriteria</h3>
				</div>

				<?php
					if(isset($_POST['submit'])){
						//$id_file = $_POST['id_file'];
						$nama_kriteria = $_POST['nama_kriteria'];
						$bobot = $_POST['bobot'];
						$qry = $kriteria->EditData($nama_kriteria, $bobot, $id_kriteria);

	  					if($qry){
	  						echo "<script language='javascript'>alert('Kriteria berhasil diedit');document.location='?menu=kriteria'</script>";
	  					}else{
	  						echo "<script language='javascript'>alert('Gagal');document.location='?menu=kriteria'</script>";
	  					}
					}
				?>

				<div class="module-body">
					<form class="form-horizontal row-fluid" action="" method="post" enctype="multipart/form-data">

						<div class="control-group">
							<label class="control-label" for="basicinput">Kriteria</label>
							<div class="controls">
								<input type="hidden" name="id_kriteria" <?php echo $row['id_kriteria']; ?>>
								<input type="text" id="basicinput" name="nama_kriteria" placeholder="Input kriteria" class="span8" <?php echo "value='$row[nama_kriteria]'"; ?>>
							</div>
						</div>

						<div class="control-group">
							<label class="control-label" for="basicinput">Bobot</label>
							<div class="controls">
								<input type="text" id="basicinput" name="bobot" placeholder="Input bobot kriteria" class="span8" <?php echo "value='$row[bobot]'"; ?>>
							</div>
						</div>

						<div class="control-group">
							<div class="controls">
								<button type="submit" name="submit" class="btn">Simpan</button>
							</div>
						</div>
					</form>
				</div>
			</div>
			<?php
			}

			/*----------------------------------
			------------------------------------
			------------------------------------
			------------------------------------
			Ketika user melakukan hapus data
			------------------------------------
			------------------------------------
			------------------------------------
			----------------------------------*/

		}else if($_GET['aksi']=="hapus"){
					$id_kriteria = $_GET['id_kriteria'];

					$qry = $kriteria->HapusData($id_kriteria);

	  				if($qry){
	  					echo "<script language='javascript'>alert('Kriteria berhasil dihapus');document.location='?menu=kriteria'</script>";
	  				}else{
	  						echo "<script language='javascript'>alert('Gagal');document.location='?menu=kriteria'</script>";
	  				}
				}
	}else{

		/*----------------------------------
		------------------------------------
		------------------------------------
		------------------------------------
		Ketika user hanya menampilkan data
		------------------------------------
		------------------------------------
		------------------------------------
		----------------------------------*/

		?>
		<div class="module">
		<div class="module-head">
			<h3>Data Kriteria <a class="btn btn-primary" href="?menu=kriteria&aksi=tambah">Tambah</a> </h3>
		</div>
		<div class="module-body table">
			<table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	display" 
			width="100%">
				<thead>
					<tr>
						<th>No.</th>
						<th>ID.</th>
						<th>Kriteria</th>
						<th>Bobot</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
				<?php
					$no = 1;
					$getData = $kriteria->GetData("");

					while($data = $getData->fetch()){
						echo "<tr>
							<td width = 7%>$no</td>
							<td width = 7%>$data[id_kriteria]</td>
							<td width = 30%>$data[nama_kriteria]</td>
							<td width = 10%>$data[bobot]</td>";

							echo "<td width = 15%>
								<a class='btn btn-small btn-warning' href='?menu=kriteria&aksi=edit&id_kriteria=$data[id_kriteria]'>Edit</a>
								<a class='btn btn-small btn-danger' href='?menu=kriteria&aksi=hapus&id_kriteria=$data[id_kriteria]'>Hapus</a>
							</tr>";
						$no++;
					}
					//$up = mysql_query("update gtp_file set approve = '1' where approve = '0'");
				?>
				</tbody>
			</table>
		</div>
		</div>
	<?php
	}
?>
	</div>
</div>