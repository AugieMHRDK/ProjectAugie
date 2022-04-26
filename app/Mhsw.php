<?php
class Mhsw {
	private $db;
	 public string $nim;
	 public string $nama;
	 public string $alamat;

	 public function setNim(string $nim) {
	 	return $nim;
	 }	

	 public function setNama(string $nama) {
	 	return $nama;
	 }	

	 public function setAlamat(string $alamat) {
	 	return $alamat;
	 }	


	public function __construct()
	 {
	 try {
	 	$this->db =
	 	new PDO("mysql:host=localhost;dbname=dbakademik", "root", "");
	 } catch (PDOException $e) {
		die ("Error " . $e->getMessage());
	 }
	}

	public function tampil()
	{
		$sql = "SELECT * FROM tb_mhsw";
		$stmt = $this->db->prepare($sql);
		$stmt->execute();

		$data = [];
		while ($rows = $stmt->fetch()) {
		$data[] = $rows;
		}
		return $data;
	}

	public function simpan(string $nim, string $nama, string $alamat, string $kelas)
	{
		try{
			$sql = "INSERT INTO tb_mhsw VALUES(NULL, '".$nim."', '".$nama."', '".$alamat."','".$kelas."')";
			$stmt = $this->db->prepare($sql);
			$stmt->execute();
			echo "$sql berhasil di simpan";
		} catch (Exception $e) {
		 die ("Maaf Error, " . $e->getMessage());

		}
	}

	public function delete(string $nim)
	{
		try{
			$sql = "DELETE FROM tb_mhsw WHERE mhsw_nim='".$nim."'";
			$stmt = $this->db->prepare($sql);
			$stmt->execute();
			echo "$nim berhasil di hapus";
		} catch (Exception $e) {
		 die ("Maaf Error, " . $e->getMessage());

		}
	}	

	public function edit(string $nim, string $nama, string $alamat)
	{
		try{
			$sql = "UPDATE tb_mhsw SET nim='$nim', nama='$nama', alamat='$almt'";
			$stmt = $this->db->prepare($sql);
			$stmt->execute();
			echo "berhasil di edit";
		} catch (Exception $e) {
		 die ("Maaf Error, " . $e->getMessage());

		}
	}	
}