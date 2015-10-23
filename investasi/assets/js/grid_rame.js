var kolom ={};
var kolomkaku={};
var tabel = "#grid_"+mod;

switch(mod){
	case "penduduk":
		
    	kolom[mod]=[
			{field:'ck', checkbox:true},
            {field:'tahun',title:'Tahun',width:150},
            {field:'jumlah_penduduk',title:'Jml. Penduduk',width:250,align:'right'},
            {field:'jumlah_pencari_kerja',title:'Jml. Pencari Kerja',width:200,align:'right'},
           
            
        ];
        
        judul="Data Kependudukan";
	break;
	case "jml_kel":
		
    	kolom[mod]=[
			{field:'ck', checkbox:true},
            {field:'tahun',title:'Tahun',width:150},
            {field:'nama_kecamatan',title:'Kecamatan',width:250,align:'left'},
            {field:'jml_kelurahan',title:'Jml. Kelurahan',width:200,align:'right'},
            {field:'jml_rt',title:'Jml. RT',width:200,align:'right'},
            {field:'jml_rw',title:'Jml. RW',width:200,align:'right'},
           
            
        ];
        
        judul="Data Jumlah Kelurahan";
	break;
	case "luas_wil":
		
    	kolom[mod]=[
			{field:'ck', checkbox:true},
            {field:'tahun',title:'Tahun',width:150},
            {field:'nama_kecamatan',title:'Kecamatan',width:250,align:'left'},
            {field:'luas_wilayah',title:'Luas Wilayah',width:200,align:'right'},
            {field:'persentase',title:'%',width:80,align:'center'},
           
            
        ];
        
        judul="Data Luas Wilayah";
	break;
	case "tumbuh_penduduk":
		
    	kolom[mod]=[
			{field:'ck', checkbox:true},
            {field:'tahun',title:'Tahun',width:150},
            {field:'jml_pertumbuhan_penduduk',title:'Jumlah Pertumbuhan Penduduk',width:200,align:'right'},
            
        ];
        
        judul="Data Pertumbuhan Penduduk";
	break;
	case "rata_ekonomi":
		
    	kolom[mod]=[
			{field:'ck', checkbox:true},
            {field:'tahun',title:'Tahun',width:150},
            {field:'NAMA_KAB_KOTA',title:'Kabupaten/Kota',width:250,align:'left'},
            {field:'rata',title:'Rata-rata',width:200,align:'right'},
            
        ];
        
        judul="Data Rata-Rata Pertumbuhan Ekonomi";
	break;
	case "makro_ekonomi":
		
    	kolom[mod]=[
			{field:'ck', checkbox:true},
            {field:'tahun',title:'Tahun',width:150},
            {field:'lapangan_kerja',title:'Lapangan Kerja',width:250,align:'left'},
            {field:'jumlah',title:'Jumlah',width:200,align:'right'},
            
        ];
        
        judul="Data Makro Pertumbuhan Ekonomi";
	break;
	case "perbankan":
		
    	kolom[mod]=[
			{field:'ck', checkbox:true},
            {field:'tahun',title:'Tahun',width:150},
            {field:'pinjaman',title:'Lapangan Kerja',width:200,align:'right'},
            {field:'pinjaman_investasi',title:'Jumlah',width:200,align:'right'},
            
        ];
        
        judul="Data Perbankan Kota Makassar";
	break;
	case "pad":
		
    	kolom[mod]=[
			{field:'ck', checkbox:true},
            {field:'tahun',title:'Tahun',width:150},
            {field:'target',title:'Lapangan Kerja',width:200,align:'right'},
            {field:'realisasi',title:'Jumlah',width:200,align:'right'},
            
        ];
        
        judul="Data Pendapatan Asli Daerah Kota Makassar";
	break;
	case "user":
		
    	kolom[mod]=[
			{field:'ck', checkbox:true},
            {field:'user_id',title:'Nama User',width:150},
            {field:'nama_lengkap',title:'Nama Lengkap',width:250,align:'left'},
            {field:'email',title:'Email',width:200,align:'left'},
            {field:'alamat',title:'Alamat',width:200,align:'left'},
            {field:'telp',title:'Telp',width:100,align:'left'},
            {field:'hp',title:'No. HP',width:100,align:'left'},
            
            
        ];
        
        judul="Data User Management";
	break;
	case "headline":
		
    	kolom[mod]=[
			{field:'ck', checkbox:true},
            {field:'judul',title:'Judul',width:150},
            {field:'isi',title:'Isi Headline',width:550,align:'left'},
           
        ];
        
        judul="Data Headline";
	break;
	case "potensi":
		
    	kolom[mod]=[
			{field:'ck', checkbox:true},
            {field:'komoditi',title:'Komoditi',width:450},
            {field:'tahun',title:'Tahun',width:100,align:'center'},
			{field:'jumlah',title:'Jumlah',width:100,align:'right'},
			{field:'satuan',title:'Satuan',width:100,align:'center'},
           
        ];
        
        judul="Data Potensi";
	break;
	case "pdrb":
		
    	kolom[mod]=[
			{field:'ck', checkbox:true},
            
            {field:'tahun',title:'Tahun',width:100,align:'center'},
			{field:'pmdn',title:'PMDN',width:100,align:'right'},
			{field:'satuan_pmdn',title:'Satuan',width:100,align:'center'},
			{field:'pma',title:'PMA',width:100,align:'right'},
			{field:'satuan_pma',title:'Satuan',width:100,align:'center'},
			{field:'pdrb',title:'PDRB',width:100,align:'right'},
			{field:'satuan_pdrb',title:'Satuan',width:100,align:'center'},
           
        ];
        
        judul="Data PDRB";
	break;
	case "ekonomi":
		
    	kolom[mod]=[
			{field:'ck', checkbox:true},
            
            {field:'tahun',title:'Tahun',width:100,align:'center'},
			{field:'pdrb',title:'PDRB',width:100,align:'right'},
			{field:'satuan_pdrb',title:'Satuan',width:100,align:'center'},
			{field:'pendatan_kapita',title:'Pendapatan PerKapita',width:150,align:'right'},
			{field:'satuan_pendapatan',title:'Satuan',width:100,align:'center'},
			{field:'inflasi',title:'Inflasi (%)',width:100,align:'right'},
		
           
        ];
        
        judul="Data Pertumbuhan Ekonomi";
	break;
	case "kondisi_jalan":
		
    	kolom[mod]=[
			{field:'ck', checkbox:true},
            
            {field:'tahun',title:'Tahun',width:100,align:'center'},
			{field:'panjang_jalan',title:'Panjang Jalan',width:150,align:'right'},
			{field:'baik',title:'Kondisi Baik',width:150,align:'right'},
			{field:'sedang',title:'Kondisi Sedang',width:150,align:'right'},
			{field:'ringan',title:'Kondisi Ringan',width:150,align:'right'},
			{field:'berat',title:'Kondisi Rusak Berat',width:150,align:'right'},
		
           
        ];
        
        judul="Data Kondisi Jalan Kota Makassar";
	break;
	case "panjang_jalan":
		
    	kolom[mod]=[
			{field:'ck', checkbox:true},
            
            {field:'tahun',title:'Tahun',width:100,align:'center'},
			{field:'arteri',title:'Arteri',width:150,align:'right'},
			{field:'kolektor',title:'kolektor',width:150,align:'right'},
			{field:'lokal',title:'Lokal',width:150,align:'right'},
			{field:'inspeksi_kanal',title:'Inspeksi Kanal',width:150,align:'right'},
			
        ];
        
        judul="Data Panjang Jalan Kota Makassar";
	break;
	case "kendaraan_uji":
		
    	kolom[mod]=[
			{field:'ck', checkbox:true},
            
            {field:'tahun',title:'Tahun',width:100,align:'center'},
			{field:'penumpang',title:'Kendaraan Penumpang',width:150,align:'right'},
			{field:'bus',title:'Bus',width:150,align:'right'},
			{field:'truk',title:'Truk',width:150,align:'right'},
			{field:'tangki',title:'Kendaraan Tangki',width:150,align:'right'},
			{field:'pick_up',title:'Pickup',width:150,align:'right'},
			{field:'khusus',title:'Kendaraan Khusus',width:150,align:'right'},
			{field:'tempelan',title:'Kendaraan Tempelan',width:150,align:'right'},
			
        ];
        
        judul="Data Kendaraan Yang Diuji Kota Makassar";
	break;
	case "kapal_pelayaran":
		
    	kolom[mod]=[
			{field:'ck', checkbox:true},
            
            {field:'tahun',title:'Tahun',width:100,align:'center'},
			{field:'samudra',title:'Samudra',width:150,align:'right'},
			{field:'nusantara',title:'Nusantara',width:150,align:'right'},
			{field:'khusus',title:'Khusus',width:150,align:'right'},
			{field:'lokal',title:'Lokal',width:150,align:'right'},
			
        ];
        
        judul="Data Kunjungan Kapal Menurut Pelayaran ";
	break;
	case "kapal_tambatan":
		
    	kolom[mod]=[
			{field:'ck', checkbox:true},
            
            {field:'tahun',title:'Tahun',width:100,align:'center'},
			{field:'dermaga_umum',title:'Dermaga Umum',width:150,align:'right'},
			{field:'dermaga_khusus',title:'Dermaga Khusus',width:150,align:'right'},
			
			
        ];
        
        judul="Data Kunjungan Kapal Menurut Jenis Tambatan ";
	break;
	case "petikemas_dn":
		
    	kolom[mod]=[
			{field:'ck', checkbox:true},
            
            {field:'tahun',title:'Tahun',width:100,align:'center'},
			{field:'bongkar',title:'Bongkar',width:150,align:'right'},
			{field:'muat',title:'Muat',width:150,align:'right'},
			
			
        ];
        
        judul="Data Arus Petikemas Perdagangan Dalam Negeri";
	break;
	case "petikemas_ln":
		
    	kolom[mod]=[
			{field:'ck', checkbox:true},
            
            {field:'tahun',title:'Tahun',width:100,align:'center'},
			{field:'export',title:'Export',width:150,align:'right'},
			{field:'import',title:'Import',width:150,align:'right'},
			
			
        ];
        
        judul="Data Arus Petikemas Perdagangan Luar Negeri";
	break;
	case "telp":
		
    	kolom[mod]=[
			{field:'ck', checkbox:true},
            
            {field:'tahun',title:'Tahun',width:100,align:'center'},
			{field:'pelanggan',title:'Pelanggan',width:150,align:'right'},
			{field:'line_service',title:'Line Services',width:150,align:'right'},
			{field:'connected_line',title:'Connected Line',width:150,align:'right'},
		
        ];
        
        judul="Data Sambungan Telpon Kandatel";
	break;
}

$(tabel).datagrid({
    title:judul,
    height:frmHeight-200,
    width:frmWidth-300,
	iconCls: 'table',
	rownumbers:true,
   // fit:true,
    striped:true,
    pagination:true,
    sortable:true,
    url:host+"adminpanel/get_data/"+mod,
   // fit:true,		
	nowrap: false,
    singleSelect:true,
    frozenColumns:[
			 kolomkaku[mod]         
		],		
    columns:[
            kolom[mod]
        ],
	
	toolbar:[
				{
					text:'Tambah',
					iconCls:'add',
					handler:function(){
						cek_grid('add');
					},
					disabled:(mod=='headline' ? true : false)
				},'-',
				{
					text:'Edit',
					iconCls:'edit',
					handler:function(){
						cek_grid('edit');
					}
				},'-',
				{
					text:'Hapus',
					iconCls:'remove',
					handler:function(){
						cek_grid('delete');
					}
				}
				
			],	
});


function cek_grid(tbl){
	var w,h,t;
	var row = $(tabel).datagrid('getSelected');
	switch(mod){
		case "penduduk":
			w=frmWidth-800;
			h=frmHeight-280;
			t="Form Data Kependudukan";
		break;
		case "headline":
			w=frmWidth-600;
			h=frmHeight-150;
			t="Form Data Headline";
		break;
		case "potensi":
			
			t="Form Data Potensi";
		break;
		case "pdrb":
			w=frmWidth-800;
			h=frmHeight-150;
			t="Form Data PDRB";
		break;
		case "headline":
			w=frmWidth-700;
			h=frmHeight-150;
			t="Form Data PDRB";
		break;
		case "ekonomi":
			w=frmWidth-800;
			h=frmHeight-150;
			t="Form Data Pertumbuhan Ekonomi";
		break;
	}
	
	
		if(tbl!='add'){
			if(row){
				if(tbl=='delete'){
					$.messager.confirm('Confirm','Yakin Data Ini Akan Dihapus ?',function(r){  
						if (r==true){  
							$.post(host+'adminpanel/hapus/'+mod,{id:row.id,},function(resp){
								if(resp==1){$.messager.alert("Data","Data Sudah Terhapus",'info');$(tabel).datagrid('reload');}		   
							});	
						}  
					}); 
				}
				
				else{
					$.post(host+'adminpanel/get_formna/'+mod,{sts:'edit',id:(mod=='user' ? row.user_id : row.id)},function(r){
						window_na(r,t,w,h);
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
					});
					
				}
			
				
			}
			else{$.messager.alert("Data","Pilih Salah Satu Data",'error');} 
		}
		else{
			$.post(host+'adminpanel/get_formna/'+mod,{sts:'add'},function(r){
				window_na(r,t,w,h);
			});
			
		}
}	