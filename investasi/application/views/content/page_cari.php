<div class="coloumn" style='width:95%;min-height:700px;'>

<h1>Hasil Pencarian Keyword <i><?=$keyword?></i></h1>
<br/>
<div>
	<div class="title">Pencarian Konten Portal - <?=count($hasil_konten)?> Hasil</div> <br/>
<?php
	if($hasil_konten){
		foreach($hasil_konten as $kh => $vi){
			$sql_get_kategori = $this->db->query("SELECT A.*,B.flag_submenu FROM cl_subkategori_content A LEFT JOIN cl_kategori_content B ON A.cl_kategori_content_id = B.id WHERE A.id = '".$vi['cl_subkategori_content_id']."'")->result_array();
			//echo $this->db->last_query();;
			if(count($sql_get_kategori)>0){
			
				if($sql_get_kategori[0]['flag_chart']) $flag = 'Y';
				else $flag = 'N';
				$bersihinkarakter = preg_replace('/[^ \w]+/', 'a', $sql_get_kategori[0]['sub_kategori']);
				$seo_link = strtolower(str_replace(' ', '-', $bersihinkarakter));
			?>
				<div style='background-color:#F6F0DC;border:1px solid #DDD;border-radius: 5px;box-shadow: 0px 0px 5px #DDD;margin-bottom:10px;padding:20px;'>
				
					<div style='background-color:#fff;padding:5px;'><font style='font-size:18px'>Halaman Konten : <?=$sql_get_kategori[0]['sub_kategori']?></font></div>
					<p align='justify'>
					<?=substr(strip_tags($vi['isi'],'<h1>'),0,500)?> &nbsp; &nbsp;
					</p>
					<br />
					
					<a href="<?=base_url()?>konten/<?=$sql_get_kategori[0]['id']?>-<?=$flag?>-<?=$sql_get_kategori[0]['flag_submenu']?>/<?=$seo_link?>.html">Selengkapnya</a>
					
					
				</div>
<?php
		}
	}
	}else{
?>
		.::Tidak Ada Hasil::.
<?php
	}
?>
</div>
<br />
<br />
<br />
<div>
	<div class="title">Pencarian Berita - <?=count($hasil_berita)?> Hasil</div> <br/>
<?php
	if($hasil_berita){
		foreach($hasil_berita as $ka => $v){
			$bersihinkaraktersss = preg_replace('/[^ \w]+/', 'a', $v['judul_berita']);
			$linknya_berita = strtolower(str_replace(' ', '-', $bersihinkaraktersss));
?>
				<div style='background-color:#F6F0DC;border:1px solid #DDD;border-radius: 5px;box-shadow: 0px 0px 5px #DDD;margin-bottom:10px;padding:20px;'>
					<div style='background-color:#fff;padding:5px;'><font style='font-size:18px'><?=$v['judul_berita']?></font></div>
					<div style='padding-top:10px;'><?=substr(strip_tags($v['isi_berita'],'<h1>'),0,400)?></div>
					<a href="<?=base_url()?>berita/<?=$v['id']?>/<?=$linknya_berita?>.html">Selengkapnya</a>
				</div>
<?php
		}
	}else{
?>
		.::Tidak Ada Hasil::.
<?php
	}
?>
</div>
</div>