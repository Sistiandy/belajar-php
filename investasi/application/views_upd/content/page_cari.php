<h1>Hasil Pencarian Keyword <i><?=$keyword?></i></h1>
<br/>
<div>
	<div class="title">Pencarian Konten Portal</div> <br/>
<?php
	if($hasil_konten){
		foreach($hasil_konten as $kh => $vi){
			$sql_get_kategori = $this->db->query("SELECT A.* FROM cl_subkategori_content A WHERE A.id = '".$vi['cl_subkategori_content_id']."'")->row();
			if($sql_get_kategori->flag_chart) $flag = 'Y';
			else $flag = 'N';
?>
				<div style='background-color:#E5C7C7;border:1px solid #0B0909;margin-bottom:5px;padding:20px;'>
					<div style='background-color:#fff;padding:5px;'><font style='font-size:18px'>Halaman Konten : <?=$sql_get_kategori->sub_kategori?></font></div>
					<?=substr($vi['isi'],0,100)?> &nbsp; &nbsp;
					<br />
					<a href="<?=base_url()?>konten/<?=$sql_get_kategori->id?>/<?=$flag?>">Selengkapnya</a>
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
<br />
<br />
<br />
<br />
<div>
	<div class="title">Pencarian Berita</div> <br/>
<?php
	if($hasil_berita){
		foreach($hasil_berita as $ka => $v){

?>
				<div style='background-color:#E5C7C7;border:1px solid #0B0909;margin-bottom:5px;padding:20px;'>
					<div style='background-color:#fff;padding:5px;'><font style='font-size:18px'><?=$v['judul_berita']?></font></div>
					<div style='padding-top:10px;'><?=substr($v['isi_berita'],0,200)?></div>
					<a href="">Selengkapnya</a>
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
<br />
<br />
<br />
