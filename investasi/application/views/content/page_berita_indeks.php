<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/style-form.css" media="screen" />
<style>
    .tgl_na{font-style:italic; font-size:12px; color:#999999; font-weight:bold;}
</style>
<div class="coloumn">
    <h1>DAFTAR BERITA</h1>
    <?php
    foreach ($isi as $row):
        $bersihinkarakter = preg_replace('/[^ \w]+/', 'a', $row['judul_berita']);
        $linknya = strtolower(str_replace(' ', '-', $bersihinkarakter));
        ?>
        <style>
            .tgl_na{font-style:italic; font-size:12px; color:#999999; font-weight:bold;}
        </style>
        <div class="news_field">
            <h1><?php echo $row['judul_berita'] ?></h1>
            <span class="tgl_na"><?php echo $row['tempat'] ?>,&nbsp;<?php echo $row['tanggal'] ?></span>
            <br />
            <img src="<?= base_url() ?>repository/foto/berita/<?php echo $row['gambar'] ?>" class="thumb" width="250"><?php echo strip_tags(character_limiter($row['isi_berita'], 250)) ?><br>
            <a href="<?= base_url() ?>berita/<?php echo $row['id'] ?>/<?php echo $linknya ?>.html">Readmore </a>
        </div>
    <?php endforeach; ?>
    <br>
    <div class="pagination">
        <?php echo $this->pagination->create_links() ?>
    </div>
</div>