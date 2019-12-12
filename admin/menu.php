<?php
	if(isset($_GET['menu'])){
		$menu = $_GET['menu'];

		if($menu == "pelamar"){
			include "menu/pelamar.php";
		}

		if($menu == "kriteria"){
			include "menu/kriteria.php";
		}

	}else{
		include "menu/home.php";
	}
?>