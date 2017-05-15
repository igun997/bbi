<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax extends CI_Controller {
	public function index()
	{
		  redirect(base_url(),"refresh");
	}
    public function getData()
    {
        if($this->input->is_ajax_request())
        {
           $nama = $this->input->post("nama");    
           $umur = $this->input->post("umur");    
           $jk = $this->input->post("jk"); 
        $jenis = ($jk == 1)?"Laki-Laki":"Perempuan";
           $aktifitas = $this->input->post("aktifitas"); 
            if($aktifitas == 10)
            {
                $jenis_aktifitas = "Ringan";
            }elseif($aktifitas == 20)
            {
                $jenis_aktifitas = "Sedang";
            }elseif($aktifitas == 30){
                $jenis_aktifitas = "Berat";
            }else{
                $jenis_aktifitas = null;
            }
            if($jk == 1)
            {
                $basal = 0.30;
            }else{
                $basal = 0.25;
            }
           $tb = $this->input->post("tb");    
           $bb = $this->input->post("bb");    
           $beratIdeal = ($tb-100)-(0.10*($tb-100));
           $jBasal = $beratIdeal*$basal;
           $jKS = $basal*$jBasal;
           if($umur > 40)
           {
               $jKU =  $umur-0.05  ;
           }else{
               $jKU =  $umur*0.05 ;
           }
            $totalKkal = $jBasal+$jKS-$jKU; 
           $html = "<p>Hasil Perhitungan</p>
                        <p>Nama   : ".$nama."</p>
                        <p>Umur   : ".$umur."</p><p>Jenis Kelamin   : ".$jenis."</p>
                        <p>Aktifitas Fisik : ".$jenis_aktifitas."</p>
                        <p>Berat Badan   : ".$bb."</p>
                        <p>Tinggi Badan   : ".$tb."</p>
                        <p>Berat Badan Ideal   : ".$beratIdeal."</p>
                        <p><b>Kebutuhan Kalori</b>   : </p>
                        <p>Kalori Basal BBI x KB   : ".$jBasal." Kkal/kg</p>
                        <p>Kalori Aktivitas Sehari Hari   : ".$jKS." Kkal</p>
                        <p>Koreksi Umur   : ".$jKU."</p>
                        <p>Jumlah Kalori Sehari - Hari   : ".$totalKkal." Kkal</p>
                        <p><b>Komposisi Makan Sehari :</b>   : </p>
                        <p>Pagi   : ".(0.20*$totalKkal)." Kalori</p>
                        <p>Siang   : ".(0.30*$totalKkal)." Kalori</p>
                        <p>Sore   : ".(0.25*$totalKkal)." Kalori</p>
                        <p>Snack Pagi   :".(0.10*$totalKkal)." Kalori </p>
                        <p>Snack Sore   : ".(0.15*$totalKkal)." Kalori</p>";
            echo $html;
        }else{
            show_404();
        }
    }
}
