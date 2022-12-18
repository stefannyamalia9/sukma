<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_Keuangan extends CI_Model
{

    // Dashboard Punya
    public function total_bulan($id)
    {
        $bulan = date('n');
        $query = "SELECT SUM(total_untung) as total_bulan FROM penjualan WHERE user_id = $id && month(tanggal_jual) = $bulan";
        return $this->db->query($query)->row_array();
    }

    public function ambil_bulan($bulan)
    {
        $data = array(
            '1' => 'Januari',
            '2' => 'Februari',
            '3' => 'Maret',
            '4' => 'April',
            '5' => 'Mei',
            '6' => 'Juni',
            '7' => 'Juli',
            '8' => 'Agustus',
            '9' => 'September',
            '10' => 'Oktober',
            '11' => 'November',
            '12' => 'Desember',
        );

        return $data[$bulan];
    }

    public function total_jual($id)
    {
        $bulan = date('n');
        $query = "SELECT sum(unit) as total_jual FROM penjualan WHERE user_id = $id && month(tanggal_jual) = $bulan";
        return $this->db->query($query)->row_array();
    }

    public function total_tahun($id)
    {
        $tahun = date('Y');
        $query = "SELECT SUM(total_untung) as total_tahun FROM penjualan WHERE user_id = $id && YEAR(tanggal_jual) = $tahun";
        return $this->db->query($query)->row_array();
    }

    public function get_pembelian($id, $bulan, $tahun)
    {
		$id = ($_SESSION['tipe'] === 'admin') ? "1=1" : "user_id = $id";
        $query = "SELECT SUM(total_beli) as total_beli, SUM(unit) as unit , tanggal_beli, produk_name, b.username FROM pembelian AS a
				JOIN user AS b on b.id_username = a.user_id 
                WHERE $id && MONTH(tanggal_beli) = $bulan && YEAR(tanggal_beli) = $tahun GROUP BY produk_name, DAY(tanggal_beli)";
        return $this->db->query($query)->result_array();
    }

    public function ambil_produk($id)
    {
		if($_SESSION['tipe'] === 'admin'){
			$this->db->select('a.*, b.username');
			$this->db->from('produk as a');
			$this->db->join('user as b', 'b.id_username = a.user_id');
			return $this->db->get()->result_array();
		}else{
			return $this->db->get_where('produk', ['user_id' => $id])->result_array();
		}
        
    }



    public function get_penjualan($id, $bulan, $tahun)
    {
		$id = ($_SESSION['tipe'] === 'admin') ? "1=1" : "user_id = $id";
        $query = "SELECT SUM(total_untung) as total_untung, SUM(unit) as unit, tanggal_jual, produk_name, COUNT(produk_name) as input, b.username from penjualan AS a
				  JOIN user AS b on b.id_username = a.user_id 
				  WHERE $id && MONTH(tanggal_jual) = $bulan && YEAR(tanggal_jual) = $tahun GROUP BY produk_name, DAY(tanggal_jual)";
        return $this->db->query($query)->result_array();
    }


    public function tambah_penjualan($id)
    {
		
        $id_produk = $this->input->post('produk');
        $data['produk'] = $this->db->get_where('produk', ['id_produk' => $id_produk])->row_array();
		$user_id = $data['produk']['user_id'];

        $produk_name = $data['produk']['nama_produk'];
        $harga_jual = $data['produk']['hrg_jual'];
        $harga_beli = $data['produk']['hrg_beli'];
        $laba_bersih = $harga_jual - $harga_beli;
        $unit = $this->input->post('unit');
        $stock = $data['produk']['stock'];

        if ($unit > $stock) {
            return 1;
        }

        $data = [
            'produk_name' => $produk_name,
            'user_id' => $user_id,
            'unit' => $unit,
            'total_untung' => $laba_bersih * $unit,
            'tanggal_jual' => date('Y-m-d')
        ];

        $this->db->insert('penjualan', $data);
    }

    public function penjualan_pdf($id, $bulan, $tahun)
    {
        $query = "SELECT id_penjualan,  SUM(total_untung) as total_untung, SUM(unit) as unit , tanggal_jual, COUNT(produk_name) as input, produk_name FROM penjualan WHERE user_id = $id && MONTH(tanggal_jual) = $bulan && YEAR(tanggal_jual) = $tahun 
        GROUP BY produk_name, DAY(tanggal_jual) ORDER BY id_penjualan DESC";
        return $this->db->query($query)->result_array();
    }

    public function total_penjualan($id, $bulan, $tahun)
    {
        $query = "SELECT sum(total_untung) as total_untung from penjualan where user_id = $id && MONTH(tanggal_jual) = $bulan && YEAR(tanggal_jual) = $tahun";
        return $this->db->query($query)->row_array();
    }

    public function pembelian_pdf($id, $bulan, $tahun)
    {
        $query = "SELECT SUM(total_beli) as total_beli, SUM(unit) as unit , tanggal_beli, produk_name FROM pembelian WHERE user_id = $id && MONTH(tanggal_beli) = $bulan && YEAR(tanggal_beli) = $tahun 
        GROUP BY produk_name, DAY(tanggal_beli) ORDER BY id_pembelian DESC";
        return $this->db->query($query)->result_array();
    }
    public function total_pembelian($id, $bulan, $tahun)
    {
        $query = "SELECT sum(total_beli) as total_beli from pembelian where user_id = $id && MONTH(tanggal_beli) = $bulan && YEAR(tanggal_beli) = $tahun";
        return $this->db->query($query)->row_array();
    }
}
