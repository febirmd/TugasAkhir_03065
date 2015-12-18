<?php
	require_once 'adodb/adodb.inc.php';
	class Mahasiswa{
		function __construct()
		{
			$this->db = NewADOConnection('mysqli');
			$this->db->Connect('localhost','root','','febi');
		}

		function get_mahasiswa() 
		{
			$penduduk  = $this->db->Execute("SELECT * FROM mahasiswa");
			return json_encode($penduduk->GetAssoc());
		}

		function hapus_mahasiswa($nim){
			$penduduk  = $this->db->Execute("delete from mahasiswa where nim='$nim'");
			return json_encode($penduduk->GetAssoc());
		}

		function tambah_mahasiswa($nim,$nama,$alamat,$tempat_lahir,$tanggal_lahir,$fakultas,$jurusan,$agama){
			$sql = "insert into mahasiswa(nim,nama_mahasiswa,alamat, tempat_lahir, tanggal_lahir, fakultas, jurusan, agama) values('$nim', '$nama', '$alamat', '$tempat_lahir', '$tanggal_lahir', '$fakultas', '$jurusan', '$agama')";
			
			$insert = $this->db->Execute($sql);
			if($insert==true){
				$sukses = true;
				return $sukses;
			}else{
				$sukses = false;
				return $sukses;
			}
		}

		function ambilDataMhsByNIM($nim){
			$penduduk  = $this->db->Execute("SELECT * FROM mahasiswa WHERE nim='$nim'");
			return json_encode($penduduk->GetAssoc());
		}

		function ubahdataMahasiswa($nimAwal,$nim,$nama,$alamat,$tempat_lahir,$tanggal_lahir,$fakultas,$jurusan,$agama){
			$sql = "update mahasiswa set nim='$nim',nama_mahasiswa='$nama',alamat='$alamat',tempat_lahir='$tempat_lahir',tanggal_lahir='$tanggal_lahir',fakultas='$fakultas',jurusan='$jurusan',agama='$agama' where nim='$nimAwal'";
			
			$insert = $this->db->Execute($sql);
			if($insert==true){
				$sukses = true;
				return $sukses;
			}else{
				$sukses = false;
				return $sukses;
			}
		}

	}
?>