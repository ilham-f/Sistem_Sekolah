<?php

require_once 'db.php';

class pembayaran extends db {

    function show(){
        $data = $this->db->prepare("SELECT * FROM pembayaran");

        try {
            $data->execute();
            $result = $data->fetchAll();
        } catch (PDOException $e) {
            print_r($e->getMessage());
        }

        return $result;
    }
    
    function joinSiswaJenisBayar(){
        $data = $this->db->prepare("SELECT * 
                                    FROM siswa s
                                    JOIN pembayaran p ON s.noinduk_siswa = p.noinduk_siswa
                                    JOIN jenis_pembayaran j ON p.id_jenis = j.id_jenis");

        try {
            $data->execute();
            $result = $data->fetchAll();
        } catch (PDOException $e) {
            print_r($e->getMessage());
        }

        return $result;
    }
    // no_bayar,tgl_bayar,jumlah_bayar, noinduk_siswa, id_jenis
    function store($no_bayar, $tgl_bayar, $jumlah_bayar, $noinduk_siswa, $id_jenis){

        $data = $this->db->prepare("INSERT INTO pembayaran (no_bayar,tgl_bayar,jumlah_bayar, noinduk_siswa, id_jenis) VALUES (?, ?, ?, ?, ?)");
        
        $data->bindParam(1, $no_bayar);
        $data->bindParam(2, $tgl_bayar);
        $data->bindParam(3, $jumlah_bayar);
        $data->bindParam(4, $noinduk_siswa);
        $data->bindParam(5, $id_jenis);
        
        try {
            $result = $data->execute();
        } catch (PDOExeption $e) {
            print_r($e->getMessage());
        }
        
        return $result;
    }
    
    // no_bayar,tgl_bayar,jumlah_bayar, noinduk_siswa, id_jenis
    function update($no_bayar, $tgl_bayar, $jumlah_bayar, $noinduk_siswa, $id_jenis){
        $data = $this->db->prepare("UPDATE pembayaran 
                                    SET tgl_bayar = '$tgl_bayar', 
                                        jumlah_bayar = $jumlah_bayar, 
                                        noinduk_siswa = '$noinduk_siswa', 
                                        id_jenis = $id_jenis
                                    WHERE noinduk_siswa = '$noinduk_siswa'");

            
        try {
            $result = $data->execute();
        } catch (PDOExeption $e) {
            print_r($e->getMessage());
        }
            
        return $result;
    }
    
    function delete($noinduk_siswa){
        $data = $this->db->prepare("DELETE FROM pembayaran
                                    WHERE noinduk_siswa = '$noinduk_siswa'");

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