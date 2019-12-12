<div class="span9">
	<div class="content">
<?php
	$kriteria = new Kriteria();

	if(isset($_GET['aksi'])){
		if($_GET['aksi']=="tambah"){
			/*----------------------------------
			------------------------------------
			------------------------------------
			------------------------------------
			Ketika admin ingin menambah data
			------------------------------------
			------------------------------------
			------------------------------------
			----------------------------------*/
			?>
			<div class="module">
				<div class="module-head">
					<h3>Input Kriteria Baru</h3> 
				</div>
				<?php
					if(isset($_POST['submit'])){
						$id_kriteria = $_POST['id_kriteria'];
						$nama_kriteria = $_POST['nama_kriteria'];
						$bobot = $_POST['bobot'];

						$qry = $kriteria->InsertData($id_kriteria, $nama_kriteria, $bobot);

						if($qry){
							echo "<script language='javascript'>alert('Data berhasil disimpan'); document.location='?menu=kriteria&aksi=tambah'</script>";
						}else{
							echo "<script language='javascript'>alert('Gagal'); document.location='?menu=kriteria'</script>";
						}
					}
				?>
				<div class="module-body">
					<form class="form-horizontal row-fluid" action="" method="post">
						<div class="control-group">
							<label class="control-label" for="basicinput">ID.</label>
							<div class="controls">
								<input type="text" id="basicinput" name="id_kriteria" placeholder="ID Kriteria" class="span8">
							</div>
						</div>

						<div class="control-group">
							<label class="control-label" for="basicinput">Kriteria</label>
							<div class="controls">
								<input type="text" id="basicinput" name="nama_kriteria" placeholder="Nama Kriteria" class="span8">
							</div>
						</div>

						<div class="control-group">
							<label class="control-label" for="basicinput">Bobot</label>
							<div class="controls">
								<input type="text" id="basicinput" name="bobot" placeholder="Bobot Kriteria" class="span8">
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
		
		}else if($_GET['aksi']=="edit"){
			/*----------------------------------
			------------------------------------
			------------------------------------
			------------------------------------
			Ketika admin ingin mengedit data
			------------------------------------
			------------------------------------
			------------------------------------
			----------------------------------*/
			?>
			<div class="module">
				<div class="module-head">
					<h3>Edit Kriteria Baru</h3> 
				</div>
				<div class="module-body">
			<?php

			if(isset($_POST['submit'])){
					$id_kriteria = $_POST['id_kriteria'];
					$nama_kriteria = $_POST['nama_kriteria'];
					$bobot = $_POST['bobot'];

					$qry = $kriteria->EditData($nama_kriteria, $bobot, $id_kriteria);

				if($qry){
					echo "<script language='javascript'>alert('Data berhasil diedit'); document.location='?menu=kriteria'</script>";
				}else{
					echo "<script language='javascript'>alert('Gagal'); document.location='?menu=kriteria'</script>";
				}
			}

			if(isset($_GET['id_kriteria'])){
				$id_kriteria = $_GET['id_kriteria'];
				$get = $kriteria->GetData("where id_kriteria = '$id_kriteria'");
				$data = $get->fetch();

				?>
					<form class="form-horizontal row-fluid" action="" method="post">
						<div class="control-group">
							<label class="control-label" for="basicinput">Kriteria</label>
							<div class="controls">
								<input type="hidden" name="id_kriteria" <?php echo "value='$id_kriteria'"; ?>>
								<input type="text" id="basicinput" name="nama_kriteria" placeholder="Nama Kriteria" class="span8" <?php echo "value='$data[nama_kriteria]'"; ?>>
							</div>
						</div>

						<div class="control-group">
							<label class="control-label" for="basicinput">Bobot</label>
							<div class="controls">
								<input type="text" id="basicinput" name="bobot" placeholder="Bobot" class="span8" <?php echo "value='$data[bobot]'"; ?>>
							</div>
						</div>

						<div class="control-group">
							<div class="controls">
								<button type="submit" name="submit" class="btn">Simpan</button> <a class='btn' href='?menu=kriteria'>Selesai</a> 
							</div>
						</div>
					</form>
				<?php

			}else{
				print "Pilih kriteria terlebih dahulu";
			}

			?>
				</div>
			</div>
			<?php

		}else if($_GET['aksi']=="hapus"){
			/*----------------------------------
			------------------------------------
			------------------------------------
			------------------------------------
			Ketika admin ingin menghapus data
			------------------------------------
			------------------------------------
			------------------------------------
			----------------------------------*/

			if(isset($_GET['id_kriteria'])){
				$id_kriteria = $_GET['id_kriteria'];
				$qry = $kriteria->HapusData($id_kriteria);

				if($qry){
					echo "<script language='javascript'>alert('Data berhasil dihapus'); document.location='?menu=kriteria'</script>";
				}else{
					echo "<script language='javascript'>alert('Gagal'); document.location='?menu=kriteria'</script>";
				}
			}else{
				print "Pilih kriteria terlebih dahulu";
			}
		}

	}else{

		/*----------------------------------
		------------------------------------
		------------------------------------
		------------------------------------
		Ketika admin hanya menampilkan data
		------------------------------------
		------------------------------------
		------------------------------------
		----------------------------------*/

		?>
		<div class="module">
		<div class="module-head">
			<h3>Kriteria <a class="btn btn-primary" href="?menu=kriteria&aksi=tambah">Tambah</a> </h3>
		</div>
		<div class="module-body table">
			<table cellpadding="0" cellspacing="0" border="0" class="table" width="100%">
				<thead>
					<tr>
						<th>No.</th>
						<th>ID.</th>
						<th>Kriteria</th>
						<th>Bobot</th>
						<th></th>
						<th></th>
					</tr>
				</thead>
				<tbody>
				<?php
					$no = 1;
					$getData = $kriteria->GetData("");

					while($data = $getData->fetch()){

						echo "<tr>
							<td width = 5%>$no</td>
							<td width = 5%>$data[id_kriteria]</td>
							<td width = 50%>$data[nama_kriteria]</td>";

						echo "<td width = 15%>
							<a class='btn btn-small btn-warning' href='?menu=kriteria&aksi=edit&id_kriteria=$data[id_kriteria]'>Edit</a>
							<a class='btn btn-small btn-danger' href='?menu=kriteria&aksi=hapus&id_kriteria=$data[id_kriteria]'>Hapus</a>
							</td>";

						echo "</tr>";

						$no++;
					}
					//$up = mysql_query("update gtp_peserta set approve = '1' where approve = '0'");
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