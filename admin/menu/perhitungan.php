<div class="span9">
	<div class="content">
<?php
	$pelamar = new Pelamar();
	$kriteria = new Kriteria();
	$penilaian = new Penilaian();
	

	/*----------------------------------
	------------------------------------
	------------------------------------
	------------------------------------
	Ketika admin melakukan input data
	------------------------------------
	------------------------------------
	------------------------------------
	----------------------------------*/
?>
		<h3>Hasil Perhitungan</h3>
		Berikut ini adalah hasil perhitungan dengan metode Weighted Product untuk Seleksi Karyawan pada Tuupai Startup
		<div class="module">
		<div class="module-head">
			<h3>Data-data Pelamar</h3>
		</div>
		<div class="module-body table">
			<table cellpadding="0" cellspacing="0" border="0" class="table" width="100%">
				<thead>
					<tr>
						<th>ID. Alternatif</th>
						<th>Alternatif</th>
					</tr>
				</thead>
				<tbody>
				<?php
					$getData = $pelamar->GetData("");

					while($data = $getData->fetch()){
						echo "<tr>
							<td width = 7%>$data[id_pelamar]</td>
							<td width = 30%>$data[nama_pelamar]</td>";

					}
				?>
				</tbody>
			</table>
		</div>
		<div class="module-head">
			<h3>Kriteria</h3>
		</div>
		<div class="module-body table">
			<table cellpadding="0" cellspacing="0" border="0" class="table" width="100%">
				<thead>
					<tr>
						<th>ID. Kriteria</th>
						<th>Kriteria</th>
						<th>Bobot</th>
					</tr>
				</thead>
				<tbody>
				<?php
					$getData = $kriteria->GetData("");

					while($data = $getData->fetch()){
						echo "<tr>
							<td width = 10%>$data[id_kriteria]</td>
							<td width = 30%>$data[nama_kriteria]</td>
							<td width = 30%>$data[bobot]</td>";

					}
				?>
				</tbody>
			</table>
		</div>
		<div class="module-head">
			<h3>Perhitungan</h3>
		</div>
		<div class="module-body table">
			<table cellpadding="0" cellspacing="0" border="0" class="table" width="100%">
				<thead>
					<tr>
						<th>ID. Alternatif</th>
						<th>C1</th>
						<th>C2</th>
						<th>C3</th>
						<th>C4</th>
						<th>C5</th>
						<th>C6</th>
					</tr>
				</thead>
				<tbody>
				<?php
					$getData = $penilaian->GetData("");

					while($data = $getData->fetch()){
						echo "<tr>
							<td width = 10%>$data[id_pelamar]</td>
							<td width = 10%>$data[C1]</td>
							<td width = 10%>$data[C2]</td>
							<td width = 10%>$data[C3]</td>
							<td width = 10%>$data[C4]</td>
							<td width = 10%>$data[C5]</td>
							<td width = 10%>$data[C6]</td>";

					}
				?>
				</tbody>
			</table>
		</div>
		<div class="module-head">
			<h3>Menghitung Nilai Vektor S</h3>
		Nilai vektor preferensi S dihitung sebagai berikut:
		</div>
		<div class="module-body table">
			<?php
				$S=array();
				$X=array();
				$C=array();
				$W=array();
				
				foreach($X as $i=>$x){
				  //--- inisialisasi nilai S untuk pelamar ke-i
				  $S[$i]=1;
				  //--- lakukan iterasi untuk tiap-tiap data hasil evaluasi X
				  foreach($x as $j=>$value){
				    //--- kalikan dengan pangkat negatif dari nilai untuk kriteria ke j
				      $S[$i]*=pow($value,$W[$j]);
				  }
				}
			?>
		</div>
	</div>
</div>