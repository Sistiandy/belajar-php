var kolom ={};
var kolomkaku={};
//var tabel = "#grid_"+modul;
var queryparems = "";

switch(modul){
	case 'forum':
    	kolom[modul]=[
            {field:'thread_title',title:'Judul Thread',width:250},
            {field:'replyon',title:'Jumlah Balasan',width:120,align:'right'},
            {field:'status',title:'Status Thread',width:120,align:'right'},
        ];
        judul="List Thread Forum";
		pagesizeBoy = '50';
		toolbarnyacoy = [{
					text:'Tambah',
					iconCls:'add',
					handler:function(){
						tanggungjawabprojek('add');
					},
				},'-',
				{
					text:'Edit',
					iconCls:'edit',
					handler:function(){
						tanggungjawabprojek('edit');
					}
				},'-',
				{
					text:'Hapus',
					iconCls:'remove',
					handler:function(){
						tanggungjawabprojek('delete');
					}
				}
			];
	break;
	case 'forum_komentar':
    	kolom[modul]=[
            {field:'thread_title',title:'Judul Thread',width:250,halign:'center'},
            {field:'nama_pengirim',title:'Nama Pengirim',width:120,align:'right',halign:'center'},
            {field:'email_pengirim',title:'Email',width:120,align:'right',halign:'center'},
            {field:'isi_komentar',title:'Komentar',width:350,align:'right',halign:'center'},
            {field:'createdate',title:'Tanggal Posting',width:120,align:'right',halign:'center'},
        ];
        judul="List Thread Forum";
		pagesizeBoy = '50';
		toolbarnyacoy = [
				{
					text:'Ijinkan',
					iconCls:'ok',
					handler:function(){
						row_s = $('#grid_'+modul).datagrid('getSelected');
						if(row_s){
							$.post(host+'adminpanel/savedata/approval_forum/approve',{'id':row_s.id, 'threadid':row_s.threadid},function(r){
								if(r==1){
									$.messager.alert("Sukses", "Komentar Diijinkan",'info');
								}else{
									$.messager.alert("Data","Gagal!!Sistem Error",'error');		
								}
								$('#grid_'+modul).datagrid('reload');
							});
						}else{
							$.messager.alert("Data","Pilih Salah Satu Data",'error');		
						}
					},
				},'-',{
					text:'Hapus',
					iconCls:'no',
					handler:function(){
						row_s = $('#grid_'+modul).datagrid('getSelected');
						if(row_s){
							$.messager.confirm('Konfirmasi','Anda Yakin Menghapus Komentar Ini?',function(r){
								if (r){						
									$.post(host+'adminpanel/savedata/approval_forum/delete',{'id':row_s.id},function(r){
										if(r==1){
											$.messager.alert("Sukses", "Komentar Dihapus",'info');
										}else{
											$.messager.alert("Data","Gagal!!Sistem Error",'error');		
										}
										$('#grid_'+modul).datagrid('reload');
									});
								}
							});
						}else{
							$.messager.alert("Data","Pilih Salah Satu Data",'error');		
						}
					}
				}
			];
		
	break;
}

$('#grid_'+modul).datagrid({
    title:judul,
    height:frmHeight-200,
    width:frmWidth-300,
	iconCls: 'table',
	rownumbers:true,
    striped:true,
    pagination:true,
    sortable:true,
    url:host+"adminpanel/get_data/"+modul,
	nowrap: false,
    singleSelect:true,
	pageSize: pagesizeBoy,
    columns:[
            kolom[modul]
        ],
	toolbar:toolbarnyacoy,	
});

function tanggungjawabprojek(param){
	var w,h,t;
	var row_forum = $('#grid_'+modul).datagrid('getSelected');
	switch(modul){
		case "forum":
			w_forum = frmWidth-800;
			h_forum = frmHeight-280;
			t_forum = "Form Data Kependudukan";
		break;
	}
	
	
	if(param == 'add'){
		$.post(host+'adminpanel/getdisplay/form_forum/'+modul,{'editstatus':'add'},function(r){
			$('#kontel_nya').html(r);
			
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
				file_browser_callback : MadFileBrowser_forum
			});	
			
				function MadFileBrowser_forum(field_name, url, type, win) {
				  tinyMCE.activeEditor.windowManager.open({
					  file : host+"assets/filemanager/mfm.php?field=" + field_name + "&url=" + url + "",
					  title : 'File Manager',
					  width : 640,
					  height : 450,
					  resizable : "no",
					  inline : "yes",
					  close_previous : "no"
				  }, {
					  window : win,
					  input : field_name
				  });
				  return false;
				}
			
		});
	}else if(param == 'edit'){
		if(row_forum){
			$.post(host+'adminpanel/getdisplay/form_forum/'+modul,{'editstatus':'edit', 'id':row_forum.id},function(r){
				$('#kontel_nya').html(r);
				
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
					file_browser_callback : MadFileBrowser_forum
				});	
				
					function MadFileBrowser_forum(field_name, url, type, win) {
					  tinyMCE.activeEditor.windowManager.open({
						  file : host+"assets/filemanager/mfm.php?field=" + field_name + "&url=" + url + "",
						  title : 'File Manager',
						  width : 640,
						  height : 450,
						  resizable : "no",
						  inline : "yes",
						  close_previous : "no"
					  }, {
						  window : win,
						  input : field_name
					  });
					  return false;
					}
				
			});
		}else{
			$.messager.alert("Data","Pilih Salah Satu Data",'error');		
		}
	}else if(param == 'delete'){
		$.messager.confirm('Confirm','Are you sure you want to delete record?',function(r){
			if(r){
				if(row_forum){
					$.post(host+'adminpanel/hapus/'+modul,{'id':row_forum.id},function(r){
						if(r == 1){
							$('#grid_'+modul).datagrid('reload');
							$.messager.alert("Sukses", "Data Terhapus",'info');
						}else{
							$.messager.alert("Gagal","Data Gagal Dihapus",'error');	
						}
					});
				}else{
					$.messager.alert("Data","Pilih Salah Satu Data",'error');
				}
			}
		});
	}
}
