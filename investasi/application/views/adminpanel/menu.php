<!-- BEGIN SIDEBAR -->
		<div id="sidebar" class="nav-collapse collapse">
			<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
			<div class="sidebar-toggler hidden-phone"></div>
			<!-- BEGIN SIDEBAR TOGGLER BUTTON -->

			<!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
			<div class="navbar-inverse">
				<form class="navbar-search visible-phone">
					<input type="text" class="search-query" placeholder="Search" />
				</form>
			</div>
			<!-- END RESPONSIVE QUICK SEARCH FORM -->
			<!-- BEGIN SIDEBAR MENU -->
			<ul class="sidebar-menu">
				<li>
					<a href='<?=base_url()?>adminpanel' class="">
						<span class="icon-box"><i class="icon-dashboard"></i></span> Beranda
					</a>
				</li>
				<li class="has-sub">
					<a href="javascript:;" class="">
					<span class="icon-box"><i class="icon-cogs"></i></span> Konten
					<span class="arrow"></span>
					</a>
					<ul class="sub">
					<?php
						$sql = $this->db->query('SELECT * FROM cl_kategori_content')->result_array();
						foreach($sql as $k => $v){	
					?>
							<li><a class="" href="#" onClick="loadUrl(this,'adminpanel/getdisplay/konten/<?=$v['id']?>/<?=$v['flag_submenu']?>','Manajemen Konten <?=$v['kategori_profil']?>');"><?=$v['kategori_profil']?></a></li>
					<?php
						}
					?>	
                    </ul>
				</li>
				<li class="has-sub">
					<a href="javascript:;" class="">
					<span class="icon-box"><i class="icon-tasks"></i></span> Profil 
					<span class="arrow"></span>
					</a>
					<ul class="sub">
						<li>
							<a class="" href="#" onClick="loadUrl(this,'adminpanel/get_formna/profil_kota','Manajemen Konten Profil Kota Makassar')">Profil Makassar </a>
						</li>
						<li>
						<a class="" href="#" onClick="loadUrl(this,'adminpanel/get_formna/profil_dinas','Manajemen Konten Profil Kedinasan')">Profil Kedinasan </a>
						</li>
						<li><a class="" href="#" onClick="loadUrl(this,'adminpanel/getdisplay/rame/headline','Manajemen Konten Data Headline')">Data Headline</a></li>
						<!--li>
							<a class="" href="#" onClick="loadUrl(this,'adminpanel/getdisplay/get_formna/artikel','Manajemen Konten BeritaBerita')">Artikel </a>
						</li-->
					</ul>
				</li>
				<li class="has-sub">
					<a href="javascript:;" class="">
					<span class="icon-box"><i class="icon-tasks"></i></span> Berita
					<span class="arrow"></span>
					</a>
					<ul class="sub">
						<li>
							<a class="" href="#" onClick="loadUrl(this,'adminpanel/getdisplay/get_formna/berita','Manajemen Konten Berita Hexa')">Berita </a>
						</li>
						<!--li>
							<a class="" href="#" onClick="loadUrl(this,'adminpanel/getdisplay/get_formna/artikel','Manajemen Konten BeritaBerita')">Artikel </a>
						</li-->
					</ul>
				</li>
				<li class="has-sub">
					<a href="javascript:;" class="">
						<span class="icon-box"><i class="icon-file-alt"></i></span>Transactional
						<span class="arrow"></span>
					</a>
					<ul class="sub">
                        <li><a class="" href="#" onClick="loadUrl(this,'adminpanel/getdisplay/rame/penduduk','Manajemen Konten Data Kependudukan')">Data Kependudukan</a></li>
                        <li><a class="" href="#" onClick="loadUrl(this,'adminpanel/getdisplay/rame/jml_kel','Manajemen Konten Data Jumlah Kelurahan')">Data Jumlah Kelurahan</a></li>
                        <li><a class="" href="#" onClick="loadUrl(this,'adminpanel/getdisplay/rame/luas_wil','Manajemen Konten Data Luas Wilayah')">Data Luas Wilayah Kecamatan</a></li>
                        <li><a class="" href="#" onClick="loadUrl(this,'adminpanel/getdisplay/rame/tumbuh_penduduk','Manajemen Konten Data Pertumbuhan Penduduk')">Data Pertumbuhan Penduduk</a></li>
                        <li><a class="" href="#" onClick="loadUrl(this,'adminpanel/getdisplay/rame/perbankan','Manajemen Konten Data Perbankan')">Data Perbankan</a></li>
                        <li><a class="" href="#" onClick="loadUrl(this,'adminpanel/getdisplay/rame/pad','Manajemen Konten Data Pendapatan Asli Daerah')">Data Pendapatan Asli Daerah</a></li>
						<li><a class="" href="#" onClick="loadUrl(this,'adminpanel/getdisplay/rame/potensi','Manajemen Konten Data Potensi')">Data Potensi</a></li>
						<li><a class="" href="#" onClick="loadUrl(this,'adminpanel/getdisplay/rame/pdrb','Manajemen Konten Data PDRB')">Data PDRB</a></li>
						<li><a class="" href="#" onClick="loadUrl(this,'adminpanel/getdisplay/rame/ekonomi','Manajemen Konten Data Pertumbuhan Ekonomi')">Data Pertumbuhan Ekonomi</a></li>
						<li><a class="" href="#" onClick="loadUrl(this,'adminpanel/getdisplay/rame/makro_ekonomi','Manajemen Konten Data Makro Pertumbuhan Ekonomi')">Data Makro Pertumbuhan Ekonomi</a></li>
						<li><a class="" href="#" onClick="loadUrl(this,'adminpanel/getdisplay/rame/rata_ekonomi','Manajemen Konten Data Rata-Rata Pertumbuhan Ekonomi')">Data Rata-rata Pertumbuhan Ekonomi</a></li>
						
					</ul>	
				</li>
				
				<li class="has-sub">
					<a href="javascript:;" class="">
						<span class="icon-box"><i class="icon-file-alt"></i></span>Sarana Prasarana
						<span class="arrow"></span>
					</a>
					<ul class="sub">
				
						<li><a class="" href="#" onClick="loadUrl(this,'adminpanel/getdisplay/rame/kondisi_jalan','Manajemen Konten Data Kondisi Jalan')">Data Kondisi Jalan</a></li>
						<li><a class="" href="#" onClick="loadUrl(this,'adminpanel/getdisplay/rame/panjang_jalan','Manajemen Konten Data Panjang Jalan')">Data Panjang Jalan</a></li>
						<li><a class="" href="#" onClick="loadUrl(this,'adminpanel/getdisplay/rame/kendaraan_uji','Manajemen Konten Data Kendaraan Yang Diuji')">Data Kendaraan Yang Diuji</a></li>
						<li><a class="" href="#" onClick="loadUrl(this,'adminpanel/getdisplay/rame/kapal_pelayaran','Manajemen Konten Data Kunjungan Kapal')">Data Kunjungan Kapal(Pelayaran)</a></li>
						<li><a class="" href="#" onClick="loadUrl(this,'adminpanel/getdisplay/rame/kapal_tambatan','Manajemen Konten Data Kunjungan Kapal')">Data Kunjungan Kapal(Tambatan)</a></li>
						<li><a class="" href="#" onClick="loadUrl(this,'adminpanel/getdisplay/rame/petikemas_dn','Manajemen Konten Data Petikemas Dalam Negeri')">Data Petikemas(Dalam Negeri)</a></li>
						<li><a class="" href="#" onClick="loadUrl(this,'adminpanel/getdisplay/rame/petikemas_ln','Manajemen Konten Data Petikemas Luar Negeri')">Data Petikemas(Luar Negeri)</a></li>
						<li><a class="" href="#" onClick="loadUrl(this,'adminpanel/getdisplay/rame/telp','Manajemen Konten Data Sambungan Telpon Kandatel')">Data Sambungan Telpon Kandatel</a></li>
					</ul>	
				</li>	
				<li class="has-sub">
					<a href="javascript:;" class="">
						<span class="icon-box"><i class="icon-file-alt"></i></span>Multimedia
						<span class="arrow"></span>
					</a>
					<ul class="sub">
						<li><a class="" href="#" onClick="loadUrl(this,'adminpanel/getdisplay/multimedia/kadin','Manajemen Foto Kepala Dinas')">Foto Kepala Dinas</a></li>
						<li><a class="" href="#" onClick="loadUrl(this,'adminpanel/getdisplay/multimedia/foto','Manajemen Gallery Foto')">Gallery Foto</a></li>
						<li><a class="" href="#" onClick="loadUrl(this,'adminpanel/getdisplay/multimedia/video','Manajemen Video Beranda')">Video Beranda</a></li>
					</ul>	
				</li>	
						
				<li class="has-sub">
					<a href="javascript:;" class="">
						<span class="icon-box"><i class="icon-file-alt"></i></span> Admin
						<span class="arrow"></span>
					</a>
					<ul class="sub">
						<!--li><a class="" href="#" onClick="loadUrl(this,'adminpanel/getdisplay/rame/user','User Manajemen')">User Management</a></li-->
                        <li><a class="" href="#" onClick="loadUrl(this,'adminpanel/getdisplay/forum/forum_thread','Manajemen Thread Forum')">List Thread</a></li>
                        <li><a class="" href="#" onClick="loadUrl(this,'adminpanel/getdisplay/forum/forum_komentar','Manajemen Komentar Forum')">List Komentar Masuk</a></li>
					</ul>	
				</li>
				
				
				<li>
					<a href="<?=base_url()?>logoutapp" class="">
						<span class="icon-box" ><i class="icon-user"></i></span> Logout
					</a>
				</li>				
			</ul>
			<!-- END SIDEBAR MENU -->
		</div>
		<!-- END SIDEBAR -->