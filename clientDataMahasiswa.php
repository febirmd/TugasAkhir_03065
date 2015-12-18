<?php
	error_reporting(E_ALL);
	ini_set('display_error',1);

	require_once('nusoap/lib/nusoap.php');
	$url = 'http://localhost:81/febi/server.php?wsdl';
	$client = new nusoap_client($url, 'WSDL');

	$result = $client->call('get_mahasiswa');	
	$data = json_decode($result);
	
	$nimHapus =  isset($_GET["nimHapus"]) ? $_GET["nimHapus"] : '' ;
	$hapus = $client->call('hapus_mahasiswa',array('nim'=>$nimHapus));	

	$aksi =  isset($_GET["aksi"]) ? $_GET["aksi"] : '' ;

	if(isset($_GET["aksi"]) && $_GET["aksi"] == "tambah_mahasiswa"){
		$nim = $_POST['nim'];
		$nama = $_POST['nama_mahasiswa'];
		$alamat = $_POST['alamat'];
		$tempat_lahir = $_POST['tempat_lahir'];
 		$tanggal_lahir = $_POST['tanggal_lahir'];
		$fakultas = $_POST['fakultas'];
		$jurusan = $_POST['jurusan'];
		$agama = $_POST['agama'];
		$hasil = $client->call('tambah_mahasiswa', array('nim'=>$nim,'nama'=>$nama,'alamat'=>$alamat,'tempat_lahir'=>$tempat_lahir,
														'tanggal_lahir'=>$tanggal_lahir,'fakultas'=>$fakultas,'jurusan'=>$jurusan,'agama'=>$agama));
		return $hasil;
	}

	if(isset($_GET["aksi"]) && $_GET["aksi"] == "ubahdataMahasiswa"){
		$nimAwal = $_POST['nimAwal'];
		$nim = $_POST['nim'];
		$nama = $_POST['nama_mahasiswa'];
		$alamat = $_POST['alamat'];
		$tempat_lahir = $_POST['tempat_lahir'];
 		$tanggal_lahir = $_POST['tanggal_lahir'];
		$fakultas = $_POST['fakultas'];
		$jurusan = $_POST['jurusan'];
		$agama = $_POST['agama'];
		$hasil = $client->call('ubahdataMahasiswa', array('nimAwal'=>$nimAwal,'nim'=>$nim,'nama'=>$nama,'alamat'=>$alamat,'tempat_lahir'=>$tempat_lahir,
														'tanggal_lahir'=>$tanggal_lahir,'fakultas'=>$fakultas,'jurusan'=>$jurusan,'agama'=>$agama));
		return $hasil;
	}

	$nimDetail = isset($_GET["nimDetail"]) ? $_GET["nimDetail"] : '' ;
	$result = $client->call('ambilDataMhsByNIM',array('nim'=>$nimDetail));
	$detail = json_decode($result);

	$nimUbah = isset($_GET["nimUbah"]) ? $_GET["nimUbah"] : '';
	$result = $client->call('ambilDataMhsByNIM',array('nim'=>$nimUbah));
	$detailUbah = json_decode($result);
	//echo 'Request';
	//echo '<pre>' . htmlspecialchars($client->request, ENT_QUOTES) . '</pre>';
	//echo 'Response';
	//echo '<pre>' . htmlspecialchars($client->response, ENT_QUOTES) . '</pre>';
	//echo 'Debug';
	//echo '<pre>' . htmlspecialchars($client->debug_str, ENT_QUOTES) . '</pre>';
?>