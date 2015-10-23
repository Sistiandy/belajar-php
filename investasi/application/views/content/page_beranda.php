<div class="coloumn">
    <!--<div class="text">
            <div class="title">Profil Makassar</div>
            <p align='justify'>Awal Kota dan bandar makassar berada di muara sungai Tallo dengan pelabuhan niaga 
            kecil di wilayah itu pada penghujung abad XV. Sumber-sumber Portugis memberitakan, 
            bahwa bandar Tallo itu awalnya berada dibawah Kerajaan Siang di sekitar Pangkajene, 
            akan tetapi pada pertengahan abad XVI, Tallo bersatu dengan sebuah kerajaan kecil 
            lainnya yang bernama Gowa, dan mulai melepaskan diri dari kerajaan Siang, 
            yang bahkan <a href="<?= base_url() ?>home/content/statis/ttg">baca selengkapnya</a>
            </p>
    </div>
    <div class="text2">
            <div class="title">Profil Kedinasan</div>
            <p align='justify'>Bahwa dalam rangka efisiensi dan efektifitas pelaksanaan tugas-tugas pemerintahan, 
            pembangunan dan pembinaan kemasyarakatan di Kota Makassar dan untuk menjabarkan 
            Peraturan Daerah Nomor 3 Tahun 2009 tentang Pembentukan dan Susunan Organisasi 
            Perangkat Daerah Kota Makassar, maka perlu ditetapkan Uraian Tugas Jabatan 
            Struktural pada Dinas Perindustrian Perdagangan dan Penanaman Modal,
            <a href="<?= base_url() ?>home/content/statis/kedinasan">baca selengkapnya</a>
            </p>
    </div>-->
    <?php
//		
//		foreach($profil as $k=>$v){
//			echo '
//			<div class="'.($v['kategori'] == 'kota' ? 'text' : 'text2').'">
//				<div class="title">'.($v['kategori'] == 'kota' ? 'Profil Kota Makassar' : 'Profil Kedinasan').'</div>
//				<p align="justify">
//					'.substr(strip_tags($v['konten']),0,800).' ...
//				<a href="'.base_url().'home/content/statis/'.($v['kategori'] == 'kota' ? 'ttg' : 'kedinasan').'">baca selengkapnya</a>
//				</p>
//			</div>	
//			';
//			
//		}
    ?>
    <div class="clear"></div>
    <br />
    <!--	<div class="table_container">
                    <div class="title">Peluang Investasi (Dalam Miliar Dollar) </div>
                    <div class="csstable" >
                            <table >
                                    <tr>
                                            <td>
                                                    Tahun 2010
                                            </td>
                                            <td >
                                                    Tahun 2011
                                            </td>
                                            <td>
                                                    Tahun 2012
                                            </td>
                                    </tr>
                                    <tr>
                                            <td >
                                                    Hasil Bumi : 50
                                            </td>
                                            <td>
                                                    Hasil Bumi : 58
                                            </td>
                                            <td>
                                                    Hasil Bumi : 65
                                            </td>
                                    </tr>
                                    <tr>
                                            <td >
                                                    Hasil Tambang : 120
                                            </td>
                                            <td>
                                                    Hasil Tambang : 120
                                            </td>
                                            <td>
                                                    Hasil Tambang : 120
                                            </td>
                                    </tr>
                                    <tr>
                                            <td >
                                                    Pariwisata : 20
                                            </td>
                                            <td>
                                                    Pariwisata : 35
                                            </td>
                                            <td>
                                                    Pariwisata : 42
                                            </td>
                                    </tr>
                                    <tr>
                                            <td >
                                                    Lain Lain : 30
                                            </td>
                                            <td>
                                                    Lain Lain : 40
                                            </td>
                                            <td>
                                                    Lain Lain : 56
                                            </td>
                                    </tr>
                            </table>
                    </div>
                    <br />
                    <br />
            </div>-->
    <div class="">
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
    </div>

</div>
