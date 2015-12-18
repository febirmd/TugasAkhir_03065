<?php
  error_reporting(E_ALL); 
  ini_set('display_error',1);

  require_once 'nusoap/lib/nusoap.php';
  require_once 'adodb/adodb.inc.php';
  require_once 'mahasiswa.php';
  $server = new nusoap_server();
  $server->configureWSDL('Service mahasiswa','urn:mahasiswa');
  $server->wsdl->schemaTargetNamespace = 'urn:mahasiswa';

  $server->register('get_mahasiswa',
    array(
      ),
      array(
        'return' => 'xsd:string'
      ),
      'urn:mahasiswa',
      'urn:mahasiswa#get_mahasiswa',
      'rpc',
      'encoded',
      'mengambil semua data mahasiswa'
  );

  $server->register('hapus_mahasiswa',
    array(
      'nim' => 'xsd:string'),
      array(
        'return' => 'xsd:string'
      ),
      'urn:mahasiswa',
      'urn:mahasiswa#hapus_mahasiswa',
      'rpc',
      'encoded',
      'menghapus data mahasiswa'
  );
   $server->register('tambah_mahasiswa',
    array(
        'nim' => 'xsd:string',
        'nama' => 'xsd:string',
        'alamat' => 'xsd:string',
        'tempat_lahir' => 'xsd:string',
        'tanggal_lahir' => 'xsd:string',
        'fakultas' => 'xsd:string',
        'jurusan' => 'xsd:string',
        'agama' => 'xsd:string'
      ),
      array(
        'return' => 'xsd:string'
      ),
      'urn:mahasiswa',
      'urn:mahasiswa#tambah_mahasiswa',
      'rpc',
      'encoded',
      'menambah data mahasiswa'
  );

  $server->register('ambilDataMhsByNIM',
    array(
        'nim' => 'xsd:string'
      ),
      array(
        'return' => 'xsd:string'
      ),
      'urn:mahasiswa',
      'urn:mahasiswa#ambilDataMhsByNIM',
      'rpc',
      'encoded',
      'mengambil data mahasiswa berdasarkan nim'
  );

  $server->register('ubahdataMahasiswa',
    array(
        'nimAwal' => 'xsd:string',
        'nim' => 'xsd:string',
        'nama' => 'xsd:string',
        'alamat' => 'xsd:string',
        'tempat_lahir' => 'xsd:string',
        'tanggal_lahir' => 'xsd:string',
        'fakultas' => 'xsd:string',
        'jurusan' => 'xsd:string',
        'agama' => 'xsd:string'
      ),
      array(
        'return' => 'xsd:string'
      ),
      'urn:mahasiswa',
      'urn:mahasiswa#ubahdataMahasiswa',
      'rpc',
      'encoded',
      'ubah data mahasiswa'
  );


  function get_mahasiswa() {
    $mahasiswa = new Mahasiswa();
    return $mahasiswa->get_mahasiswa();
  }

  function hapus_mahasiswa($nim){
    $mahasiswa = new Mahasiswa();
    return $mahasiswa->hapus_mahasiswa($nim);
  }
  function tambah_mahasiswa($nim,$nama,$alamat,$tempat_lahir,$tanggal_lahir,$fakultas,$jurusan,$agama) {
    $mahasiswa = new Mahasiswa();
    return $mahasiswa->tambah_mahasiswa($nim,$nama,$alamat,$tempat_lahir,$tanggal_lahir,$fakultas,$jurusan,$agama);
  }

  function ambilDataMhsByNIM($nim){
    $mahasiswa = new Mahasiswa();
    return $mahasiswa->ambilDataMhsByNIM($nim);
  }

  function ubahdataMahasiswa($nimAwal,$nim,$nama,$alamat,$tempat_lahir,$tanggal_lahir,$fakultas,$jurusan,$agama){
    $mahasiswa = new Mahasiswa();
    return $mahasiswa->ubahdataMahasiswa($nimAwal,$nim,$nama,$alamat,$tempat_lahir,$tanggal_lahir,$fakultas,$jurusan,$agama);
  }


  $HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : ''; $server->service($HTTP_RAW_POST_DATA);
?>