<div class="span9">
	<div class="content">
<?php
	$pelamar = new Pelamar();

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
					<h3>Input Pelamar Baru</h3> 
				</div>
				<?php
					if(isset($_POST['submit'])){
						$id_pelamar = $_POST['id_pelamar'];
						$nama_pelamar = $_POST['nama_pelamar'];
						$no_telp = $_POST['no_telp'];
						$alamat = $_POST['alamat'];
						$pendidikan = $_POST['pendidikan'];
						$email = $_POST['email'];

						$qry = $pelamar->InsertData($id_pelamar, $nama_pelamar, $no_telp, $alamat, $pendidikan, $email);

						if($qry){
							echo "<script language='javascript'>alert('Data berhasil disimpan'); document.location='?menu=pelamar&aksi=tambah'</script>";
						}else{
							echo "<script language='javascript'>alert('Gagal'); document.location='?menu=pelamar'</script>";
						}
					}
				?>
				<div class="module-body">
					<form class="form-horizontal row-fluid" action="" method="post">
						<div class="control-group">
							<label class="control-label" for="basicinput">ID.</label>
							<div class="controls">
								<input type="text" id="basicinput" name="id_pelamar" placeholder="ID Pelamar" class="span8">
							</div>
						</div>

						<div class="control-group">
							<label class="control-label" for="basicinput">Nama Lengkap</label>
							<div class="controls">
								<input type="text" id="basicinput" name="nama_pelamar" placeholder="Nama Pelamar" class="span8">
							</div>
						</div>

						<div class="control-group">
							<label class="control-label" for="basicinput">No. HP</label>
							<div class="controls">
								<input type="text" id="basicinput" name="no_telp" placeholder="No. HP" class="span8">
							</div>
						</div>

						<div class="control-group">
							<label class="control-label" for="basicinput">Alamat</label>
							<div class="controls">
								<input type="text" id="basicinput" name="alamat" placeholder="Alamat" class="span8">
							</div>
						</div>

						<div class="control-group">
							<label class="control-label" for="basicinput">Pendidikan</label>
							<div class="controls">
								<input type="text" id="basicinput" name="pendidikan" placeholder="Pendidikan" class="span8">
							</div>
						</div>

						<div class="control-group">
							<label class="control-label" for="basicinput">Email</label>
							<div class="controls">
								<input type="text" id="basicinput" name="email" placeholder="Email" class="span8">
							</div>
						</div>

						<div class="control-group">
							<div class="controls">
								<button type="submit" name="submit" class="btn">Simpan</button> <a class='btn' href='?menu=pelamar'>Selesai</a> 
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
					<h3>Edit Pelamar Baru</h3> 
				</div>
				<div class="module-body">
			<?php

			if(isset($_POST['submit'])){
					$id_pelamar = $_POST['id_pelamar'];
					$nama_pelamar = $_POST['nama_pelamar'];
					$no_telp = $_POST['no_telp'];
					$alamat = $_POST['alamat'];
					$pendidikan = $_POST['pendidikan'];
					$email = $_POST['email'];

					$qry = $pelamar->EditData($nama_pelamar, $no_telp, $alamat, $pendidikan, $email, $id_pelamar);

				if($qry){
					echo "<script language='javascript'>alert('Data berhasil diedit'); document.location='?menu=pelamar'</script>";
				}else{
					echo "<script language='javascript'>alert('Gagal'); document.location='?menu=pelamar'</script>";
				}
			}

			if(isset($_GET['id_pelamar'])){
				$id_pelamar = $_GET['id_pelamar'];
				$get = $pelamar->GetData("where id_pelamar = '$id_pelamar'");
				$data = $get->fetch();

				?>
					<form class="form-horizontal row-fluid" action="" method="post">
						<div class="control-group">
							<label class="control-label" for="basicinput">Nama Lengkap</label>
							<div class="controls">
								<!-- <input type="hidden" name="id_pelamar" <?php echo "value='$id_pelamar'"; ?>> perlu ditambahkan pada fungsi edit sebagai penanda bahwa data tersebut dengan id sekian -->
								<input type="hidden" name="id_pelamar" <?php echo "value='$id_pelamar'"; ?>>
								<input type="text" id="basicinput" name="nama_pelamar" placeholder="Nama Pelamar" class="span8" <?php echo "value='$data[nama_pelamar]'"; ?>>
							</div>
						</div>

						<div class="control-group">
							<label class="control-label" for="basicinput">No. HP</label>
							<div class="controls">
								<input type="text" id="basicinput" name="no_telp" placeholder="No. HP" class="span8" <?php echo "value='$data[no_telp]'"; ?>>
							</div>
						</div>

						<div class="control-group">
							<label class="control-label" for="basicinput">Alamat</label>
							<div class="controls">
								<input type="text" id="basicinput" name="alamat" placeholder="Alamat" class="span8" <?php echo "value='$data[alamat]'"; ?>>
							</div>
						</div>

						<div class="control-group">
							<label class="control-label" for="basicinput">Pendidikan</label>
							<div class="controls">
								<input type="text" id="basicinput" name="pendidikan" placeholder="Pendidikan" class="span8" <?php echo "value='$data[pendidikan]'"; ?>>
							</div>
						</div>

						<div class="control-group">
							<label class="control-label" for="basicinput">Email</label>
							<div class="controls">
								<input type="text" id="basicinput" name="email" placeholder="Email" class="span8" <?php echo "value='$data[email]'"; ?>>
							</div>
						</div>

						<div class="control-group">
							<div class="controls">
								<button type="submit" name="submit" class="btn">Simpan</button> <a class='btn' href='?menu=pelamar'>Selesai</a> 
							</div>
						</div>
					</form>
				<?php

			}else{
				print "Pilih pelamar terlebih dahulu";
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

			if(isset($_GET['id_pelamar'])){
				$id_pelamar = $_GET['id_pelamar'];
				$qry = $pelamar->HapusData($id_pelamar);

				if($qry){
					echo "<script language='javascript'>alert('Data berhasil dihapus'); document.location='?menu=pelamar'</script>";
				}else{
					echo "<script language='javascript'>alert('Gagal'); document.location='?menu=pelamar'</script>";
				}
			}else{
				print "Pilih pelamar terlebih dahulu";
			}
		}

	}else if(isset($_GET['detail'])){
		$id_pelamar = $_GET['detail'];
		$qr_nama = $pelamar->GetData("where id_pelamar = '$id_pelamar'");
		$nama = $qr_nama->fetch();
			?>
		<div class="module">
		<div class="module-head">
			<h3>Detail Pelamar -- <?php echo $nama['nama_pelamar']; ?></h3> 
		</div>
		<div class="module-body table">
			<table cellpadding="0" cellspacing="0" border="0" class="table table-condensed" 
			width="100%">
				<thead>
				</thead>
				<tbody>
				<?php
					$qr = $pelamar->GetData("where id_pelamar = '$id_pelamar'");		
					while($data = $qr->fetch()){
						echo "<tr>
							<td width = 20%>Nama Lengkap </td> <td width = 1%>:</td> <td width = 2079%>$data[nama_pelamar]</td>
							</tr>";
						echo "<tr>
							<td width = 20%>No HP </td> <td width = 1%>:</td> <td width = 2079%>$data[no_telp]</td>
							</tr>";
						echo "<tr>
							<td width = 20%>Alamat </td> <td width = 1%>:</td> <td width = 2079%>$data[alamat]</td>
							</tr>";
						echo "<tr>
							<td width = 20%>Pendidikan </td> <td width = 1%>:</td> <td width = 2079%>$data[pendidikan]</td>
							</tr>";
						echo "<tr>
							<td width = 20%>Email </td> <td width = 1%>:</td> <td width = 2079%>$data[email]</td>
							</tr>";
					}
				?>
				</tbody>
			</table>
		</div>
		</div>
		<?php
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
			<h3>Data Pelamar <a class="btn btn-primary" href="?menu=pelamar&aksi=tambah">Tambah</a> </h3>
		</div>
		<div class="module-body table">
			<table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display" 
			width="100%">
				<thead>
					<tr>
						<th>No.</th>
						<th>ID.</th>
						<th>Nama Lengkap</th>
						<th></th>
						<th></th>
					</tr>
				</thead>
				<tbody>
				<?php
					$no = 1;
					$getData = $pelamar->GetData("");

					while($data = $getData->fetch()){

						echo "<tr>
							<td width = 5%>$no</td>
							<td width = 5%>$data[id_pelamar]</td>
							<td width = 50%>$data[nama_pelamar]</td>";

						echo "<td width = 15%>
							<a class='btn btn-small btn-warning' href='?menu=pelamar&aksi=edit&id_pelamar=$data[id_pelamar]'>Edit</a>
							<a class='btn btn-small btn-danger' href='?menu=pelamar&aksi=hapus&id_pelamar=$data[id_pelamar]'>Hapus</a>
							</td>";

						echo "<td width=10%>
						<a class='btn btn-small btn-inverse' href='?menu=pelamar&detail=$data[id_pelamar]'>Detail</a></td>";

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