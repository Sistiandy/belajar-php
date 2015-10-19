<style>
.tgl_na{font-style:italic; font-size:12px; color:#999999; font-weight:bold;}
</style>
<div class="text_field">
<h1><?=$isi->judul_berita?></h1>
<span class="tgl_na"><?=$isi->tempat?>,&nbsp;<?=$isi->tanggal?></span>
<br />
<img src="<?=base_url()?>repository/foto/berita/<?=$isi->gambar?>" class="thumb" width="250"><?=$isi->isi_berita?>
</div>