switch(mod){
	case "penduduk":
		$('#tahun').numberbox({  
			min:0
		});
		$('#jumlah_penduduk').numberbox({  
			min:0,
			groupSeparator:',' 
		});
		$('#jumlah_pencari_kerja').numberbox({  
			min:0,
			groupSeparator:',' 
		}); 
	break;
	case "tumbuh_penduduk":
		$('#tahun').numberbox({  
			min:0
		});
		$('#jml_pertumbuhan_penduduk').numberbox({  
			min:0,
			groupSeparator:',' 
		});
		
	break;
	case "rata_penduduk":
		$('#tahun').numberbox({  
			min:0
		});
		$('#rata').numberbox({  
			min:0,
			groupSeparator:',' 
		});
		
	break;
	case "pad":
		$('#tahun').numberbox({  
			min:0
		});
		$('#target').numberbox({  
			min:0,
			precision:2,
			groupSeparator:',' 
		});
		$('#realisasi').numberbox({  
			min:0,
			precision:2,
			groupSeparator:',' 
		});
		
	break;
	case "perbankan":
		$('#tahun').numberbox({  
			min:0
		});
		$('#pinjaman').numberbox({  
			min:0,
			groupSeparator:',' 
		});
		$('#pinjaman_investasi').numberbox({  
			min:0,
			groupSeparator:',' 
		});
		
	break;
	case "jml_kel":
		$('#tahun').numberbox({  
			min:0
		});
		$('#jml_kelurahan').numberbox({  
			min:0,
			groupSeparator:',' 
		});
		$('#jml_rt').numberbox({  
			min:0,
			groupSeparator:',' 
		}); 
		$('#jml_rw').numberbox({  
			min:0,
			groupSeparator:',' 
		}); 
	break;
	case "luas_wil":
		$('#tahun').numberbox({  
			min:0
		});
		$('#luas_wilayah').numberbox({  
			min:0,
			groupSeparator:',' 
		});
		$('#persentase').numberbox({  
			min:0,
			groupSeparator:',' 
		}); 
	break;
	case "kondisi_jalan":
		$('#tahun').numberbox({  
			min:0
		});
		$('#panjang_jalan').numberbox({  
			min:0,
			groupSeparator:',' 
		});
		$('#baik').numberbox({  
			min:0,
			groupSeparator:',' 
		}); 
		$('#sedang').numberbox({  
			min:0,
			groupSeparator:',' 
		}); 
		$('#ringan').numberbox({  
			min:0,
			groupSeparator:',' 
		}); 
		$('#berat').numberbox({  
			min:0,
			groupSeparator:',' 
		}); 
	break;
	case "panjang_jalan":
		$('#tahun').numberbox({  
			min:0
		});
		$('#arteri').numberbox({  
			min:0,
			groupSeparator:',' 
		});
		$('#kolektor').numberbox({  
			min:0,
			groupSeparator:',' 
		}); 
		$('#lokal').numberbox({  
			min:0,
			groupSeparator:',' 
		}); 
		$('#inspeksi_kanal').numberbox({  
			min:0,
			groupSeparator:',' 
		}); 
		
	break;
	case "kendaraan_uji":
		$('#tahun').numberbox({  
			min:0
		});
		$('#penumpang').numberbox({  
			min:0,
			groupSeparator:',' 
		});
		$('#bus').numberbox({  
			min:0,
			groupSeparator:',' 
		}); 
		$('#truk').numberbox({  
			min:0,
			groupSeparator:',' 
		}); 
		$('#pick_up').numberbox({  
			min:0,
			groupSeparator:',' 
		}); 
		$('#khusus').numberbox({  
			min:0,
			groupSeparator:',' 
		});
		$('#tempelan').numberbox({  
			min:0,
			groupSeparator:',' 
		});
		
	break;
	case "kapal_pelayaran":
		$('#tahun').numberbox({  
			min:0
		});
		$('#samudra').numberbox({  
			min:0,
			groupSeparator:',' 
		});
		$('#nusantara').numberbox({  
			min:0,
			groupSeparator:',' 
		}); 
		$('#khusus').numberbox({  
			min:0,
			groupSeparator:',' 
		}); 
		$('#lokal').numberbox({  
			min:0,
			groupSeparator:',' 
		}); 
		
		
	break;
	case "kapal_tambatan":
		$('#tahun').numberbox({  
			min:0
		});
		$('#dermaga_umum').numberbox({  
			min:0,
			groupSeparator:',' 
		});
		$('#dermaga_khusus').numberbox({  
			min:0,
			groupSeparator:',' 
		}); 

	break;
	case "petikemas_dn":
		$('#tahun').numberbox({  
			min:0
		});
		$('#bongkar').numberbox({  
			min:0,
			groupSeparator:',' 
		});
		$('#muat').numberbox({  
			min:0,
			groupSeparator:',' 
		}); 

	break;
	case "petikemas_ln":
		$('#tahun').numberbox({  
			min:0
		});
		$('#export').numberbox({  
			min:0,
			groupSeparator:',' 
		});
		$('#import').numberbox({  
			min:0,
			groupSeparator:',' 
		}); 

	break;
	case "telp":
		$('#tahun').numberbox({  
			min:0
		});
		$('#pelanggan').numberbox({  
			min:0,
			groupSeparator:',' 
		});
		$('#line_service').numberbox({  
			min:0,
			groupSeparator:',' 
		}); 
		$('#connected_line').numberbox({  
			min:0,
			groupSeparator:',' 
		}); 

	break;
	case "headline":
		
	break;
	case "potensi":
		$('#tahun').numberbox({  
			min:0
		});
		$('#jumlah').numberbox({  
			min:0,
			groupSeparator:',' 
		});
	break;
	case "pdrb":
		$('#tahun').numberbox({  
			min:0
		});
		$('#pmdn').numberbox({  
			min:0,
			groupSeparator:',' 
		});
		$('#pma').numberbox({  
			min:0,
			groupSeparator:',' 
		});
		$('#pdrb').numberbox({  
			min:0,
			groupSeparator:',' 
		});
	break;
	case "ekonomi":
		$('#tahun').numberbox({  
			min:0
		});
		$('#pendatan_kapita').numberbox({  
			min:0,
			groupSeparator:',' 
		});
		
		$('#pdrb').numberbox({  
			min:0,
			groupSeparator:',' 
		});
		$('#inflasi').numberbox({  
			min:0,
			groupSeparator:',' 
		});
	break;
	case "berita":
		var today = new Date();
		var dd = today.getDate();
		var mm = today.getMonth()+1; //January is 0!
		
		var yyyy = today.getFullYear();
		
		//$('#tool_vr').css('width',frmWidth-20)
		if(dd<10){dd='0'+dd} 
		if(mm<10){mm='0'+mm}
		today = yyyy+'-'+mm+'-'+dd;
		val_date = today;
		console.log(today);
               
		$('#tanggal').datebox({ 
			required: true,
			formatter: formatDate }
		);
		$('#tanggal').datebox('setValue',today);
	break;
	case "profil_kota":
	case "profil_dinas":
		tinyMCE.init({
						// General options
						mode : "textareas",
						theme : "advanced",
						plugins : "pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave",

						// Theme options
						theme_advanced_buttons1 : "bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
						theme_advanced_buttons2 : "bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,image,forecolor,backcolor",
						theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup",
						theme_advanced_toolbar_location : "top",
						theme_advanced_toolbar_align : "left",
						theme_advanced_statusbar_location : "bottom",
						theme_advanced_resizing : true,
						
						//Mad File Manager
						relative_urls : false,
						file_browser_callback : MadFileBrowser
					});
					
	break;
}

$('#simpan').die();
$('#simpan').live('click',function(){
	load_na('show');
	if(mod=='headline' || mod=='berita' ){
		tinyMCE.get("isi").save();
	}
	if(mod=='profil_kota' || mod=='profil_dinas' ){
		tinyMCE.get("konten").save();
	}
	submitform1('form_'+mod,function(r){
		if(r==1){
			$.messager.alert("Sukses","Data Tersimpan",'info');	
			load_na('hide');
			$(tabel).datagrid('reload');
			if(mod!='berita'){
				window_na_close();
			}else{
				$('#data_na').css('display','inline');$('#form_na').css('display','none');
			}
		}
		else{
			console.log(r);
			$.messager.alert("Sukses","Data Gagal Disimpan",'error');	
			load_na('hide');
		}
	});
});

$('#batal').die();
$('#batal').live('click',function(){
	if(mod!='berita'){
		window_na_close();
	}else{
		//$('#data_na').css('display','inline');$('#form_na').css('display','none');
		loadUrl(this,'adminpanel/getdisplay/get_formna/berita','Manajemen Konten BeritaBerita');
	}
});
