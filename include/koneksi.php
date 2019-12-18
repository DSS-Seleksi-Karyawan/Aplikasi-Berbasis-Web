<?php
	class DB{

		protected $koneksi;

		function bukaKoneksi(){
			try{
				$this->koneksi = new PDO("mysql:host=localhost;dbname=seleksi_karyawan","root","", array(PDO::ATTR_PERSISTENT=>TRUE));
			}catch(PDOException $e){
				echo $e->getMessage();
			}
			return $this->koneksi;
		}

		function LoginAdmin($username, $password){
			try{
				$sql = $this->bukaKoneksi()->prepare("select * from admin where username = :username and password = :password");
				$sql->bindParam(':username', $username);
				$sql->bindParam(':password', $password);
				$sql->execute();
				return $sql;
			}catch (PDOException $e){
				print $e->getMessage();
			}
		}
	}

	class Pelamar extends DB{
		private $sqlInsert;
		private $sqlEdit;
		private $sqlHapus;

		function __construct(){
			/* ("insert into pelamar values ('',:id_pelamar, :nama_pelamar, :no_telp, :alamat, :pendidikan, :email)");
			tidak perlu pakai '', tapi langsung :id_pelamar */
			try{
				$this->sqlInsert = $this->bukaKoneksi()->prepare("insert into pelamar values (:id_pelamar, :nama_pelamar, :no_telp, :alamat, :pendidikan, :email)");
				$this->sqlHapus = $this->bukaKoneksi()->prepare("delete from pelamar where id_pelamar = :id_pelamar");
				$this->sqlEdit = $this->bukaKoneksi()->prepare("update pelamar set nama_pelamar=:nama_pelamar, no_telp=:no_telp, alamat=:alamat, pendidikan=:pendidikan, email=:email where id_pelamar=:id_pelamar");
			}catch (PDOException $e){
				print $e->getMessage();
			}
		}

		function GetData($qry_custom){
			try{
				$sql = $this->bukaKoneksi()->prepare("select * from pelamar " . $qry_custom);
				$sql->execute();
				return $sql;
			}catch (PDOException $e){
				print $e->getMessage();
			}
		}

		function InsertData($id_pelamar, $nama_pelamar, $no_telp, $alamat, $pendidikan, $email){
			try{
				$this->sqlInsert->bindParam(':id_pelamar', $id_pelamar);
				$this->sqlInsert->bindParam(':nama_pelamar', $nama_pelamar);
				$this->sqlInsert->bindParam(':no_telp', $no_telp);
				$this->sqlInsert->bindParam(':alamat', $alamat);
				$this->sqlInsert->bindParam(':pendidikan', $pendidikan);
				$this->sqlInsert->bindParam(':email', $email);
				$this->sqlInsert->execute();
				return $this->sqlInsert;
			}catch (PDOException $e){
				print $e->getMessage();
			}
		}

		function HapusData($id_pelamar){
			try{
				$this->sqlHapus->bindParam(':id_pelamar', $id_pelamar);
				$this->sqlHapus->execute();
				return $this->sqlHapus;
			}catch (PDOException $e){
				print $e->getMessage();
			}
		}

		function EditData($nama_pelamar, $no_telp, $alamat, $pendidikan, $email, $id_pelamar){
			try{
				$this->sqlEdit->bindParam(':nama_pelamar', $nama_pelamar);
				$this->sqlEdit->bindParam(':no_telp', $no_telp);
				$this->sqlEdit->bindParam(':alamat', $alamat);
				$this->sqlEdit->bindParam(':pendidikan', $pendidikan);
				$this->sqlEdit->bindParam(':email', $email);
				$this->sqlEdit->bindParam(':id_pelamar', $id_pelamar);
				$this->sqlEdit->execute();
				return $this->sqlEdit;
			}catch (PDOException $e){
				print $e->getMessage();
			}
		}
	}

	class Kriteria extends DB{

		function GetData($qry_custom){
			try{
				$sql = $this->bukaKoneksi()->prepare("select * from kriteria " . $qry_custom);
				$sql->execute();
				return $sql;
			}catch (PDOException $e){
				print $e->getMessage();
			}
		}
	}

	class Penilaian extends DB{

		function GetData($qry_custom){
			try{
				$sql = $this->bukaKoneksi()->prepare("select * from penilaian " . $qry_custom);
				$sql->execute();
				return $sql;
			}catch (PDOException $e){
				print $e->getMessage();
			}
		}
	}
?>