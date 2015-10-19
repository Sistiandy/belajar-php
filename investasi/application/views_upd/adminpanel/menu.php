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
                        <li><a class="" href="#" onClick="loadUrl(this,'adminpanel/getdisplay/konten/<?=$v['id']?>','Manajemen Konten <?=$v['kategori_profil']?>');"><?=$v['kategori_profil']?></a></li>
                        <!--<li><a class="" href="#" onClick="loadUrl(this,'adminpanel/getdisplay/potensi','Manajemen Konten Potensi','');">Potensi</a></li>
						<li><a class="" href="#" onClick="loadUrl(this,'adminpanel/getdisplay/infrastruktur','Manajemen Konten Infrastruktur','');">Infrastruktur</a></li>
						<li><a class="" href="#" onClick="loadUrl(this,'adminpanel/getdisplay/perizinan','Manajemen Konten Perizinan','');">Perizinan</a></li>-->
					<?php
						}
					?>	
                    </ul>
				</li>
				<li class="has-sub">
					<a href="javascript:;" class="">
					<span class="icon-box"><i class="icon-tasks"></i></span> Berita 
					<span class="arrow"></span>
					</a>
					<ul class="sub">
						<li>
							<a class="" href="#" onClick="loadUrl(this,'adminpanel/getdisplay/get_formna/berita','Manajemen Konten BeritaBerita')">Berita </a>
						</li>
						<!--li>
							<a class="" href="#" onClick="loadUrl(this,'adminpanel/getdisplay/get_formna/artikel','Manajemen Konten BeritaBerita')">Artikel </a>
						</li-->
					</ul>
				
				<li class="has-sub">
					<a href="javascript:;" class="">
						<span class="icon-box"><i class="icon-file-alt"></i></span>Transactional
						<span class="arrow"></span>
					</a>
					<ul class="sub">
                        <li><a class="" href="#" onClick="loadUrl(this,'adminpanel/getdisplay/rame/penduduk','Manajemen Konten Data Kependudukan')">Data Kependudukan</a></li>
                        
						<li><a class="" href="#" onClick="loadUrl(this,'adminpanel/getdisplay/rame/headline','Manajemen Konten Data Headline')">Data Headline</a></li>
						<li><a class="" href="#" onClick="loadUrl(this,'adminpanel/getdisplay/rame/potensi','Manajemen Konten Data Potensi')">Data Potensi</a></li>
						<li><a class="" href="#" onClick="loadUrl(this,'adminpanel/getdisplay/rame/pdrb','Manajemen Konten Data PDRB')">Data PDRB</a></li>
						<li><a class="" href="#" onClick="loadUrl(this,'adminpanel/getdisplay/rame/ekonomi','Manajemen Konten Data Pertumbuhan Ekonomi')">Data Pertumbuhan Ekonomi</a></li>
					</ul>	
				</li>
				<li class="has-sub">
					<a href="javascript:;" class="">
						<span class="icon-box"><i class="icon-file-alt"></i></span> Admin Forum
						<span class="arrow"></span>
					</a>
					<ul class="sub">
                        <li><a class="" href="#" onClick="">List Thread</a></li>
                        <li><a class="" href="#" onClick="">User Forum</a></li>
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