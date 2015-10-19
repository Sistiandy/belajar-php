<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta content="Portal Investasi Kota Makasar" name="description" />
	<meta content="investasi makassar,portal makassar,portal investasi makassar,investasi di makassar" name="keywords" />
	
	<title>:: Portal Investasi Kota Makasar Hexa ::</title>
	
	<link rel="stylesheet" href="<?=base_url()?>assets/css/slider.css">
	<link rel="stylesheet" href="<?=base_url()?>assets/css/style.css">
	<link rel="stylesheet" href="<?=base_url()?>assets/css/csstable.css">
	<link href="<?=base_url()?>assets/video/skin/pink.flag/jplayer.pink.flag.css" rel="stylesheet" type="text/css" />
	<!--link rel="stylesheet" href="//vjs.zencdn.net/4.3.0/video-js.css"-->
	<link href="<?=base_url()?>assets/css/amazon_scroller.css" rel="stylesheet" type="text/css"></link>
	<link href="<?=base_url()?>assets/css/font.css" rel="stylesheet" type="text/css"></link>
	<link href="<?=base_url()?>assets/css/global.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/ddsmoothmenu/ddsmoothmenu.css" />
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/ddsmoothmenu/ddsmoothmenu-v.css" />
	<link href="<?=base_url()?>assets/css/forum_style.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/jqmsgbox/Styles/msgBoxLight.css" >
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/jquery.jqplot.min.css" >
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/fancybox2/jquery.fancybox-1.3.4.css" media="screen" />

	<script type="text/javascript" src="<?=base_url()?>assets/js/jquery-1.7.2.min.js"></script>
	<script type="text/javascript" src="<?=base_url()?>assets/easyui/jquery.easyui.min.js"></script>
	<script type="text/javascript" src="<?=base_url()?>assets/highchart/exporting.js"></script>
	<script type="text/javascript" src="<?=base_url()?>assets/highchart/highcharts.js"></script>
	<script type="text/javascript" src="<?=base_url()?>assets/highchart/themes/gray.js"></script>
	<script type="text/javascript" src="<?=base_url()?>assets/fancybox2/jquery.mousewheel-3.0.4.pack.js"></script>
	<script type="text/javascript" src="<?=base_url()?>assets/fancybox2/jquery.fancybox-1.3.4.pack.js"></script>

	<!--script type="text/javascript" src="<?=base_url()?>assets/jqplot/jquery.jqplot.min.js"></script>
	<script type="text/javascript" src="<?=base_url()?>assets/jqplot/jqplot.barRenderer.min.js"></script>
	<script type="text/javascript" src="<?=base_url()?>assets/jqplot/jqplot.canvasAxisLabelRenderer.min.js"></script>
	<script type="text/javascript" src="<?=base_url()?>assets/jqplot/jqplot.canvasAxisTickRenderer.js"></script>
	<script type="text/javascript" src="<?=base_url()?>assets/jqplot/jqplot.canvasTextRenderer.js"></script>
	<script type="text/javascript" src="<?=base_url()?>assets/jqplot/jqplot.categoryAxisRenderer.min.js"></script>
	<script type="text/javascript" src="<?=base_url()?>assets/jqplot/jqplot.enhancedLegendRenderer.js"></script>
	<script type="text/javascript" src="<?=base_url()?>assets/jqplot/jqplot.highlighter.min.js"></script>
	<script type="text/javascript" src="<?=base_url()?>assets/jqplot/jqplot.pieRenderer.min.js"></script>
	<script type="text/javascript" src="<?=base_url()?>assets/jqplot/jqplot.pointLabels.min.js"></script-->

	<script type="text/javascript" src="<?=base_url()?>assets/js/fungsi.js"></script>
	<script type="text/javascript" src="<?=base_url()?>assets/js/superslide.2.1.js"></script>
	<script type="text/javascript" src="<?=base_url()?>assets/js/amazon_scroller.js"></script>
	<script type="text/javascript" src="<?=base_url()?>assets/ddsmoothmenu/ddsmoothmenu.js"></script>
	<script type="text/javascript" src="<?=base_url()?>assets/tinymce/tinymce.min.js"></script>
	<script type="text/javascript" src="<?=base_url()?>assets/video/jquery.jplayer.min.js"></script>
	<!--script type="text/javascript" src="//vjs.zencdn.net/4.3.0/video.js"></script-->
	<script>
		var host = "<?=base_url()?>";
		$(function() {
					$("#amazon_scroller2").amazon_scroller({
						scroller_title_show: 'disable',
						scroller_time_interval: '2000',
						scroller_window_background_color: "none",
						scroller_window_padding: '0',
						scroller_border_size: '0',
						scroller_border_color: '#CCC',
						scroller_images_width: '122',
						scroller_images_height: '100',
						scroller_title_size: '12',
						scroller_title_color: 'black',
						scroller_show_count: '4',
						directory: host+'assets/images/'
					});
				});
	</script>
	<script type="text/javascript">
		$(document).ready(function()
		{
				ddsmoothmenu.init({
					mainmenuid: "smoothmenu1", //menu DIV id
					orientation: 'h', //Horizontal or vertical menu: Set to "h" or "v"
					classname: 'ddsmoothmenu', //class added to menu's outer DIV
					//customtheme: ["#1c5a80", "#18374a"],
					contentsource: "markup" //"markup" or ["container_id", "path_to_menu_file"]
				})

			//slides the element with class "menu_body" when paragraph with class "menu_head" is clicked 
			$("#firstpane p.menu_head").click(function()
			{
				$(this).css({backgroundImage:"url("+host+"assets/images/down.png) no-repeat"}).next("div.menu_body").slideToggle(300).siblings("div.menu_body").slideUp("slow");
				$(this).siblings().css({backgroundImage:"url("+host+"assets/images/left.png) no-repeat"});
			});
			//slides the element with class "menu_body" when mouse is over the paragraph
			$("#secondpane p.menu_head").mouseover(function()
			{
				 $(this).css({backgroundImage:"url("+host+"assets/images/down.png) no-repeat"}).next("div.menu_body").slideDown(500).siblings("div.menu_body").slideUp("slow");
				 $(this).siblings().css({backgroundImage:"url("+host+"assets/images/left.png) no-repeat"});
			});
		});
	</script>
	<script type="text/javascript" src="<?=base_url()?>assets/jqmsgbox/Scripts/jquery.msgBox.js"></script>
	<script type="text/javascript" src="<?=base_url()?>assets/js/forum_custom.js"></script>

	<style>
		#smoothmenu1 ul li a .downarrowclass { background: url(<?=base_url()?>assets/ddsmoothmenu/down.gif) no-repeat;width:11px;height:8px;}
	</style>
</head>
<body>
	<div id='bapaknyaheader'>
	<div id="container_header">
		<div id="header">
			<div style="float:left">
				<img src="<?=base_url()?>assets/images/logo_admin.png" />
			</div>
			<!--<div style="float:right;color:#666;text-align:right;padding-top:15px;">
				LOGIN PORTAL
				<form action="" method="get">
					<input type="text" name="username" value=" username" style="height:17px;width:160px;font-size:12px;border:1px solid #ccc;color:#999;"><br>
					<input type="text" name="password" value=" password" style="height:17px;width:160px;font-size:12px;border:1px solid #ccc;color:#999	;margin:3px 0;"><br>
					<span style="font-size:11px"><a href="">Lupa Password</a></span>&nbsp;<input type="submit" value="Login" class="btn">
				</form>
			</div>-->
			<div class="clear"></div>		
		</div>
	</div>
	</div>
	<div id="container_menu">
		<div id="menu">
			<div style="float:left;padding-top:5px;">
				<!--<a href="<?=base_url()?>home/content/beranda">Beranda</a><img src="<?=base_url()?>assets/images/line_menu.png" class="space" />
				<a href="<?=base_url()?>home/content/profil-dinas">Profil Dinas</a><img src="<?=base_url()?>assets/images/line_menu.png" class="space" />
				<a href="page.html">Potensi</a><img src="<?=base_url()?>assets/images/line_menu.png" class="space" />
				<a href="page.html">Infrastruktur</a><img src="<?=base_url()?>assets/images/line_menu.png" class="space" />
				<a href="page.html">Perizinan</a><img src="<?=base_url()?>assets/images/line_menu.png" class="space" />
				<a href="page.html">Dowload</a><img src="<?=base_url()?>assets/images/line_menu.png" class="space" />
				<a href="page.html">Kontak</a><img src="<?=base_url()?>assets/images/line_menu.png" class="space" />
				<a href="page.html">Forum</a>
				
						<li><a href="#">Profil Dinas</a>
						  <ul>
							  <li><a href="#">Budaya & Pariwisata</a></li>
							  <li><a href="#">Pendidikan</a></li>
							  <li><a href="#">Jumlah Penduduk</a></li>
							  <li><a href="#">Tenaga Kerja</a></li>
							  <li><a href="#">Peraturan & Perundangan</a></li>
						  </ul>
						</li>
						<li><a href="#">Potensi</a>
						  <ul>
							  <li><a href="#">Potensi Pariwisata</a></li>
							  <li><a href="#">Potensi Peternakan</a></li>
							  <li><a href="#">Potensi Perdagangan</a></li>
							  <li><a href="#">Potensi Industri</a></li>
						  </ul>
						</li>
						<li><a href="#">Infrastruktur</a>
						  <ul>
							  <li><a href="#">Pendidikan</a></li>
							  <li><a href="#">Kesehatan</a></li>
							  <li><a href="#">Perumahan</a></li>
							  <li><a href="#">Jalan</a></li>
							  <li><a href="#">Terminal</a></li>
						  </ul>
						</li>
						<li><a href="#">Perizinan</a></li>					
						<li><a href="#">Download</a></li>					
				
				-->
				
				<div id="smoothmenu1" class="ddsmoothmenu">
					<ul>
						<li><a href="<?=base_url()?>">Beranda</a></li>
						<?=$menu_dinamis?>
						<li><a href="<?=base_url()?>forum">Forum</a></li>					
					</ul>
				</div>
			</div>
			<div style="float:right;padding-top:9px;">
				<form action="<?=base_url()?>cari" method="post">
					<input type="text" name="key" value="" style="height:19px;width:110px;font-size:12px;border:1px solid #ccc;color:#999;background-color:#87D37C;color:#deafaf;border:1px solid #26A65B">
					<input type="submit" value="Search" class="btn">
				</form>
			</div>
		</div>
	</div>
	<?php if($type != 'forum' && $type != 'thread' && $type != 'viewposting' && $type != 'cari_konten') { ?>
		<div id="container_slider">
			<div class="slider">
			  <div class="bd">
				<ul>
				  <li><a href=""><img src="<?=base_url()?>assets/images/slide1.jpg" /></a></li>  
				  <li><a href=""><img src="<?=base_url()?>assets/images/slide2.jpg" /></a></li>
				  <li><a href=""><img src="<?=base_url()?>assets/images/slide3.jpg" /></a></li>
				  <li><a href=""><img src="<?=base_url()?>assets/images/slide4.jpg" /></a></li>
				</ul>
			  </div>
			  <div class="pnBtn prev"> <span class="blackBg"></span> <a class="arrow" href="javascript:void(0)"></a> </div>
			  <div class="pnBtn next"> <span class="blackBg"></span> <a class="arrow" href="javascript:void(0)"></a> </div>
			</div>
		 </div>
		<div id="container_headline">
			<div id="headline">
				<?php foreach($headline as $v){?>
				<a href="<?=base_url()?>headline/<?=$v['id']?>">
					<div class="<?=$v['style']?>">
						<h1 class="float_title"><?=$v['judul']?></h1>
							<?=substr(strip_tags($v['isi']),0,100)?>
					</div>
				</a>
				<?php } ?>
				<!--a href="">
					<div class="floating1">
						<h1 class="float_title">PELUANG INVESTASI</h1> 
						Peluang Investasi di Kota Makassar sangatlah tinggi, didukung oleh infrastruktur yang memadai dan potensi alam dan kekayaan negri yang melimpah
					</div>
				</a>
				<a href="">
					 <div class="floating3">
						 <h1 class="float_title">INFORMASI PERIJINAN</h1>
						 Adalah sangat mudah untuk memperoleh ijin agar dapat melakukan investasi di Makassar, cepat prosesnya, mudah birokrasinya, serta menguntungkan
					 </div>
				</a-->
				<div class="clear"></div>
			</div>
		</div> 
	<?php } ?>
	<div id="wrapper">
		<div class='bgrepeat'></div>
		<?php if ($type == 'forum' && $type == 'thread' && $type != 'viewposting' && $type != 'cari_konten') { ?>
			<div id="header_forum">
				<div id="menu">
					<a href="<?=base_url()?>forum"><div id="home-menu"></div></a>
					<?php if($logged_in == TRUE): ?>
						<a href="<?=base_url()?>forum/posting/new"><div id="write-btn"></div></a>
					<?php else: ?>
						<a href="#" onclick="msglogin();"><div id="write-btn"></div></a>
					<?php endif ?>
				</div>
			</div>
		<?php } ?>
		<?php require_once 'content/page_'.$content.'.php'; ?>
		<?php if($type != 'forum' && $type != 'thread' && $type != 'viewposting' && $type != 'cari_konten') { ?>
			<div class="widget">
				<div class="title">Kepala Dinas</div>
					<div><center><img src="<?=base_url()?>repository/foto/kadin/kadin.jpg" height="200px" style="border: 1px solid #DDD;border-radius: 5px;box-shadow: 0px 0px 5px #DDD;" /></div>
				<br /><br />
				<div class="title">Sub Menu</div>
				<div class="menu_list" id="secondpane"> <!--Code for menu starts here-->
					<?=$menu_samping?>
					<!--<p class="menu_head">Profil Dinas</p>
					<div class="menu_body">
						<a href="#">Profil Dinas</a>
						<a href="#">Visi dan Misi</a>
						<a href="#">Struktur Organisasi</a>
					</div>
					<p class="menu_head">Sumber Daya Alam</p>
					<div class="menu_body">
						<a href="#">Sumber Daya Alam Makassar</a>
					</div>
					<p class="menu_head">Peluang Investasi</p>
					<div class="menu_body">
						<a href="#">Mengapa Investasi Di Makasar</a>
						<a href="#">Prosedur Investasi</a>
						<a href="#">Jenis Investasi</a>	
					</div>
					<p class="menu_head">Informasi Perijinan</p>
					<div class="menu_body">
						<a href="#">Informasi Perijinan</a>
						<a href="#">Prosedur Pendirian Usaha</a>
						<a href="#">Prosedur Pendirian Bangunan</a>	
				   </div>-->
				</div><br /><br />
				<div class="title">Berita Terbaru Hexa</div>
					<ul id="ticker_02" class="ticker">
						<?php 
							foreach($berita as $v){
								//$linknya = str_replace(" ", "-", strtolower($v['judul_berita']));
								//$linknya = preg_replace('/[^ \w]+/', 'a', $linknya);
								$bersihinkarakter = preg_replace('/[^ \w]+/', 'a', $v['judul_berita']);
								$linknya = strtolower(str_replace(' ', '-', $bersihinkarakter));
						?>
						<li>
							<a href="<?=base_url()?>berita/<?=$v['id']?>/<?=$linknya?>.html"><img src="<?=base_url()?>repository/foto/berita/<?=$v['gambar']?>" class="thumb" width="31" height="31"><?=$v['judul_berita']?></a>
						</li>
						<?php } ?>
						<!--li>
							<a href="#"><img src="<?=base_url()?>assets/images/thumb_berita2.jpg" class="thumb">KPPU Gelar Diskusi Persaingan Usaha Dalam Jasa</a>
						</li>
						<li>
							<a href="#"><img src="<?=base_url()?>assets/images/thumb_berita3.jpg" class="thumb">Kalla Group, Carrefour, Pelindo IV & PKPU Makassar Traktir</a>
						</li>
						<li>
							<a href="#"><img src="<?=base_url()?>assets/images/thumb_berita4.jpg" class="thumb">Festival Sop Saudara di Kabupaten Pangkajene Kepulauan.</a>
						</li>
						<li>
							<a href="#"><img src="<?=base_url()?>assets/images/thumb_berita1.jpg" class="thumb">Untuk meringankan beban masyarakat  Disperindag Jualan Sembako Murah</a>
						</li-->
					</ul><div style="margin-top:5px;"><a href="#">Berita lainnya</a></div><br /><br />
				<div class="title">Link Web Terkait</div>
					<ul id="ticker_02" class="ticker" style="height:214px;">
						<li>
							<a href="http://www.bkpm.go.id" target="_blank"><img src="<?=base_url()?>repository/foto/link/bkpm.jpg" class="thumb" width="31" height="31">BKPM</a>
						</li>
						<li>
							<a href="http://www.bps.go.id" target="_blank"><img src="<?=base_url()?>repository/foto/link/bps.jpg" class="thumb" width="31" height="31">Badan Pusat Statistik</a>
						</li>
						<li>
							<a href="http://bahasa.makassarkota.go.id/" target="_blank"><img src="<?=base_url()?>repository/foto/link/makasar.jpg" class="thumb" width="31" height="31">Portal Kota Makasar</a>
						</li>
						<li>
							<a href="http://www.sulsel.go.id/" target="_blank"><img src="<?=base_url()?>repository/foto/link/sulsel.jpg" class="thumb" width="31" height="31">Portal Sulawesi Selatan</a>
						</li>
					</ul>
			</div>
	
		<?php } ?>
		<div class="clear"></div>
	</div>
	<div id="container_footer">
		<div id="footer">
			<a href="<?=base_url()?>">Home</a><img src="<?=base_url()?>assets/images/line_menu.png" class="space" />
			<a href="<?=base_url()?>home/content/statis/ttg">Profil Kota Makassar</a><img src="<?=base_url()?>assets/images/line_menu.png" class="space" />
			<a href="<?=base_url()?>home/content/statis/kedinasan">Profil Kedinasan</a><img src="<?=base_url()?>assets/images/line_menu.png" class="space" />
		
			<a href="<?=base_url()?>konten/7-N-N/pad.html">Download</a><img src="<?=base_url()?>assets/images/line_menu.png" class="space" />
			<a href="<?=base_url()?>home/content/kontak">Kontak</a><img src="<?=base_url()?>assets/images/line_menu.png" class="space" />
			<a href="<?=base_url()?>forum">Forum</a>
			<br />
			<br />
			<br />
			Copyright 2013 Portal Investasi Kota Makassar
		</div>
	</div>

	<script type="text/javascript">
		jQuery(".slider .bd li").first().before( jQuery(".slider .bd li").last() );
		jQuery(".slider").hover(function(){
			jQuery(this).find(".arrow").stop(true,true).fadeIn(300) 
			},function(){ 
				jQuery(this).find(".arrow").fadeOut(300) });				
			jQuery(".slider").slide(
				{ titCell:".hd ul", mainCell:".bd ul", effect:"leftLoop",autoPlay:true, vis:3,autoPage:true, trigger:"click"}
		);
		function tick(){
			$('#ticker_01 li:first').slideUp( function () { $(this).appendTo($('#ticker_01')).slideDown(); });
		}
		setInterval(function(){ tick () }, 5000);


		function tick2(){
			$('#ticker_02 li:first').slideUp( function () { $(this).appendTo($('#ticker_02')).slideDown(); });
		}
		setInterval(function(){ tick2 () }, 3000);


		function tick3(){
			$('#ticker_03 li:first').animate({'opacity':0}, 200, function () { $(this).appendTo($('#ticker_03')).css('opacity', 1); });
		}
		setInterval(function(){ tick3 () }, 4000);	

		function tick4(){
			$('#ticker_04 li:first').slideUp( function () { $(this).appendTo($('#ticker_04')).slideDown(); });
		}


		/**
		 * APABILA MAU PAKE DATA TWITTER 

		 $.ajax ({
			 url: 'http://search.twitter.com/inzan_a',
			 data: 'q=%23javascript',
			 dataType: 'jsonp',
			 timeout: 10000,
			 success: function(data){
				if (!data.results){
					return false;
				}

				for( var i in data.results){
					var result = data.results[i];
					var $res = $("<li />");
					$res.append('<img src="' + result.profile_image_url + '" />');
					$res.append(result.text);

					console.log(data.results[i]);
					$res.appendTo($('#ticker_04'));
				}
				setInterval(function(){ tick4 () }, 4000);	

				$('#example_4').show();

			 }
		});
		 */
	</script>
</body>
</html>
