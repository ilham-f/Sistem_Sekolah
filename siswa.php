<?php

require_once 'db.php';

class siswa extends db {

    function show(){
        $data = $this->db->prepare("SELECT * FROM siswa");

        try {
            $data->execute();
            $result = $data->fetchAll();
        } catch (PDOException $e) {
            print_r($e->getMessage());
        }

        return $result;
    }
    
    function joinPrakarya(){
        $data = $this->db->prepare("SELECT * 
                                    FROM siswa s join prakarya p
                                    ON s.noinduk_siswa = p.noinduk_siswa");

        try {
            $data->execute();
            $result = $data->fetchAll();
        } catch (PDOException $e) {
            print_r($e->getMessage());
        }

        return $result;
    }

    function store($noinduk_siswa, $NIK_walmur, $nama_siswa, $jenis_kelamin, $tgllahir, $tgl_masuk, $tgl_lulus, $alamat, $anakke){

        $data = $this->db->prepare("INSERT INTO siswa (noinduk_siswa, NIK_walmur, nama_siswa, jenis_kelamin, tgllahir, tgl_masuk, tgl_lulus, alamat, anakke) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        
        $data->bindParam(1, $noinduk_siswa);
        $data->bindParam(2, $NIK_walmur);
        $data->bindParam(3, $nama_siswa);
        $data->bindParam(4, $jenis_kelamin);
        $data->bindParam(5, $tgllahir);
        $data->bindParam(6, $tgl_masuk);
        $data->bindParam(7, $tgl_lulus);
        $data->bindParam(8, $alamat);
        $data->bindParam(9, $anakke);
        
        try {
            $result = $data->execute();
        } catch (PDOExeption $e) {
            print_r($e->getMessage());
        }
        
        return $result;
    }

    function upload($gambar){
        $namaFile = $gambar['name'];
        $error = $gambar['error'];
        $tmpName  = $gambar['tmp_name'];

        // cek apakah tidak ada gambar yang diupload
        if( $error == 4 ) {
            echo "<script>
                    alert('Silakan pilih gambar terlebih dahulu!');
                  </script>";
            return false;
        }

        // cek apakah yang diupload adalah gambar
        $ekstensiGambarValid = ['jpg', 'jpeg', 'png', 'webp'];
        $ekstensiGambar = explode('.', $namaFile);
        $ekstensiGambar = strtolower(end($ekstensiGambar));
        if ( !in_array($ekstensiGambar, $ekstensiGambarValid) ) {
            echo "<script>
                    alert('Mohon gunakan format file jpg / jpeg / png / webp!');
                  </script>";
            return false;
        }

        move_uploaded_file($tmpName, 'img/'.$namaFile);

        return $namaFile;
    }
    
    function update($noinduk_siswa, $NIK_walmur, $nama_siswa, $jenis_kelamin, $tgllahir, $tgl_masuk, $tgl_lulus, $alamat, $anakke){
        $data = $this->db->prepare("UPDATE siswa 
                                    SET NIK_walmur = $NIK_walmur, 
                                        nama_siswa = $nama_siswa, 
                                        jenis_kelamin = $jenis_kelamin, 
                                        tgllahir = $tgllahir, 
                                        tgl_masuk = $tgl_masuk,
                                        tgl_lulus = $tgl_lulus,
                                        alamat = $alamat,
                                        anakke = $anakke
                                    WHERE noinduk_siswa = $noinduk_siswa");

            
        try {
            $result = $data->execute();
        } catch (PDOExeption $e) {
            print_r($e->getMessage());
        }
            
        return $result;
    }
    
    function delete($noinduk_siswa){
        $data = $this->db->prepare("DELETE FROM siswa
                                    WHERE noinduk_siswa = $noinduk_siswa");

        try {
            $result = $data->execute();
        } catch (PDOExeption $e) {
            print_r($e->getMessage());
        }
            
        return $result;
    }
    
    function view(){
        
    }
}

?>