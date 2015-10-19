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
            <div class="text_field">
                <h1><?php echo $row['judul_berita'] ?></h1>
                    <span class="tgl_na"><?php echo $row['tempat'] ?>,&nbsp;<?php echo $row['tanggal'] ?></span>
                    <br />
                    <img src="<?= base_url() ?>repository/foto/berita/<?php echo $row['gambar'] ?>" class="thumb" width="250"><?php echo strip_tags(character_limiter($row['isi_berita'], 300)) ?><br>
                    <a href="<?= base_url() ?>berita/<?php echo $row['id'] ?>/<?php echo $linknya ?>.html">Readmore.. </a>
                    </div>
<?php endforeach; ?>
                </div>
                <div class="gallery">
                    <div class="title">Galeri Foto </div>
                    <?php
                    $sqlfoto = $this->db->query("
						SELECT * 
						FROM tbl_multimedia
						WHERE kategori_file = '1'
						ORDER BY RAND()
						LIMIT 6
				")->result_array();
                    if ($sqlfoto) {
                        ?>
                        <div id="amazon_scroller2" class="amazon_scroller">
                            <div class="amazon_scroller_mask">
                                <ul>
                                    <?php
                                    foreach ($sqlfoto as $k => $v) {
                                        ?>				
                                        <li><a href="#" title=""><img src="<?= base_url() ?>repository/foto/gallery/<?= $v['filename'] ?>" alt=""/></a></li>
                                        <?php
                                    }
                                    ?>
                                </ul>
                            </div>
                            <?php
                        }
                        ?>	
                        <div style="clear: both"></div>
                    </div>
<?php if ($sqlfoto) { ?><a href="<?= base_url() ?>gallery">Foto lainnya</a> <?php } ?>
                </div><br /><br />
                <div class="gallery">
                    <div class="title">Video</div>
                    <!--<object width="532" height="344">
                            <param name="movie" value="http://www.youtube.com/v/Kj6ZhGm_cGg&hl=en&fs=1">
                            </param>
                            <param name="allowFullScreen" value="true">
                            </param>
                            <embed src="http://www.youtube.com/v/Kj6ZhGm_cGg&hl=en&fs=1" type="application/x-shockwave-flash" allowfullscreen="true" width="532" height="344">
                            </embed>
                    </object>>
                    <video width="532" height="344" controls="controls" poster="cover.jpg" class="video-js vjs-default-skin" preload="auto" data-setup="{}"> 
                            <source src="<?= base_url() ?>repository/video/video_beranda.mp4" type="video/mp4"> 
                            I'm sorry; your browser doesn't support HTML5 video in WebM with VP8 or MP4 with H.264.
                    </video-->
                    <div id="jp_container_1" class="jp-video jp-video-360p" style="width:541px">
                        <div class="jp-type-single">
                            <div id="jquery_jplayer_1" class="jp-jplayer"></div>
                            <div class="jp-gui">
                                <div class="jp-video-play">
                                    <a href="javascript:;" class="jp-video-play-icon" tabindex="1">play</a>
                                </div>
                                <div class="jp-interface">
                                    <div class="jp-progress">
                                        <div class="jp-seek-bar">
                                            <div class="jp-play-bar"></div>
                                        </div>
                                    </div>
                                    <div class="jp-current-time"></div>
                                    <div class="jp-duration"></div>
                                    <div class="jp-title">
                                        <ul>
                                            <li>Big Buck Bunny Trailer</li>
                                        </ul>
                                    </div>
                                    <div class="jp-controls-holder">
                                        <ul class="jp-controls">
                                            <li><a href="javascript:;" class="jp-play" tabindex="1">play</a></li>
                                            <li><a href="javascript:;" class="jp-pause" tabindex="1">pause</a></li>
                                            <li><a href="javascript:;" class="jp-stop" tabindex="1">stop</a></li>
                                            <li><a href="javascript:;" class="jp-mute" tabindex="1" title="mute">mute</a></li>
                                            <li><a href="javascript:;" class="jp-unmute" tabindex="1" title="unmute">unmute</a></li>
                                            <li><a href="javascript:;" class="jp-volume-max" tabindex="1" title="max volume">max volume</a></li>
                                        </ul>
                                        <div class="jp-volume-bar">
                                            <div class="jp-volume-bar-value"></div>
                                        </div>

                                        <ul class="jp-toggles">
                                            <li><a href="javascript:;" class="jp-full-screen" tabindex="1" title="full screen">full screen</a></li>
                                            <li><a href="javascript:;" class="jp-restore-screen" tabindex="1" title="restore screen">restore screen</a></li>
                                            <li><a href="javascript:;" class="jp-repeat" tabindex="1" title="repeat">repeat</a></li>
                                            <li><a href="javascript:;" class="jp-repeat-off" tabindex="1" title="repeat off">repeat off</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="jp-no-solution">
                                <span>Update Required</span>
                                To play the media you will need to either update your browser to a recent version or update your <a href="http://get.adobe.com/flashplayer/" target="_blank">Flash plugin</a>.
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        <script type="text/javascript">
        //<![CDATA[
            $(document).ready(function() {

                $("#jquery_jplayer_1").jPlayer({
                    ready: function() {
                        $(this).jPlayer("setMedia", {
                            m4v: "repository/video/video_beranda.mp4",
                            poster: "assets/images/bgrepeat.png"
                        });
                    },
                    swfPath: "js",
                    supplied: "webmv, ogv, m4v",
                    size: {
                        width: "541px",
                        height: "360px",
                        cssClass: "jp-video-360p"
                    },
                    smoothPlayBar: true,
                    keyEnabled: true
                });

            });
        //]]>
        </script>

