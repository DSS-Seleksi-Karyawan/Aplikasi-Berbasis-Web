<div class="span9">
	<div class="content">
<?php
	$kriteria = new Kriteria();
	

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
		<div class="module">
		<div class="module-head">
			<h3>Data Kriteria</h3>
		</div>
		<div class="module-body table">
			<table cellpadding="0" cellspacing="0" border="0" class="table" width="100%">
				<thead>
					<tr>
						<th>No.</th>
						<th>ID.</th>
						<th>Kriteria</th>
						<th>Bobot</th>
					</tr>
				</thead>
				<tbody>
				<?php
					$no = 1;
					$C = $kriteria->GetData("");

					while($data = $C->fetch()){
						echo "<tr>
							<td width = 7%>$no</td>
							<td width = 7%>$data[id_kriteria]</td>
							<td width = 30%>$data[nama_kriteria]</td>
							<td width = 10%>$data[bobot]</td>";

						$no++;
					}
					//$up = mysql_query("update gtp_file set approve = '1' where approve = '0'");
				?>
				</tbody>
			</table>
		</div>
		</div>
	</div>
</div>