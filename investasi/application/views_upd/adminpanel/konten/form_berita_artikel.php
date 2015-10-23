<div id="data_na">
	<div class="widget">
		<!--<div class="widget-title">
			<h4><i class="icon-reorder"></i></h4>
			   <span class="tools"></span>
		</div>-->
		<div class="widget-body">
			<div id='konten_nyang_laen'>
				<table id="data_<?=$mod?>"></table>
			</div>
		</div>
	</div>
</div>
 
<!--<div id="form_na" style="display:none;">
 
</div>-->
	

<script>
//	$(document).ready(function(){
//	});
	/*
	tinymce.init({
		selector: "textarea",
		plugins : "pagebreak,table,save,insertdatetime,preview,media,searchreplace,contextmenu,paste,directionality,image",		
		setup: function(editor) {
			editor.on('init', function() {
				tinyMCE.execCommand('mceAddControl', false, 'isi');
			});
		}		
	});
	*/
	var mod='<?=$mod?>';
	var tabel;
	
		$('#tanggal').datepicker({format:'yyyy-mm-dd'})
		tinyMCE.init({
            selector : "textarea",
			plugins : "pagebreak,table,code,save,insertdatetime,preview,media,searchreplace,contextmenu,paste,directionality,image",		
 
        });	


	var kolom ={};
	var kolomkaku={};
	
	switch(mod){
		case "berita":
			kolomkaku[mod] = [
				{field:'ck', checkbox:true},
				{field:'gambar',title:'Gambar',width:150,align:'center'
					,formatter:function(value,rowData,rowindex){
							if(value!='') return '<img src="'+host+'repository/foto/berita/'+value+'" id="gambar_1" height="100" width="100" >';
							else return 'Tidak Ada Gambar';
						}
				},
				{field:'judul_berita',title:'Judul',width:300,align:'left'}
			]
			kolom[mod] = [
				
				
				{field:'tempat',title:'Tempat',width:100,align:'left'},		   
				{field:'tanggal',title:'Tanggal',hidden:false,width:100,align:'center'},
				{field:'kutipan',title:'Kutipan',width:200,align:'left'},
				{field:'isi_berita',title:'Isi',width:400,align:'left'},
				
				
			];
		break;
		case "artikel":
				kolom[mod] = [
				{field:'gambar',title:'Gambar',width:150,align:'center'
					,formatter:function(value,rowData,rowindex){
							if(value!='') return '<img src="'+host+'repository/foto/artikel/'+value+'" id="gambar_1" height="100" width="100" >';
							else return 'Tidak Ada Gambar';
						}
				},
				{field:'judul_artikel',title:'Judul',width:250,align:'left'},	
				{field:'tanggal',title:'Tanggal',hidden:false,width:100,align:'center'},
				{field:'isi_artikel',title:'Isi',width:450,align:'left'},
				
				
			];
		break;
	}
	
	tabel=$('#data_<?=$mod?>').datagrid({
				title:'LIST DATA <?=strtoupper($mod)?>',
				//iconCls:'icon-ok',
				width:frmWidth-300,
				height:frmHeight-200,
				nowrap: false,
				autoRowHeight: false,
				striped: true,
				collapsible:false,
				singleSelect:true,
				url: host+'adminpanel/get_data/'+mod+'/',
				pagination:"true",
				queryParams:{
					//id:id_toko
				},
			
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
				}
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
	var row = $('#data_<?=$mod?>').datagrid('getSelected');
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
					//$('#data_na').css('display','none');
					//$('#form_na').css('display','inline');
					$('#konten_nyang_laen').html('');
					$.post(host+'adminpanel/get_formna/<?=$mod?>',{sts:'edit',id:row.id},function(r){
						$('#konten_nyang_laen').html(r)
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
						
						function MadFileBrowser(field_name, url, type, win) {
						  tinyMCE.activeEditor.windowManager.open({
							  file : "<?=base_url()?>assets/filemanager/mfm.php?field=" + field_name + "&url=" + url + "",
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
				}
			
				
			}
			else{$.messager.alert("Data","Pilih Salah Satu Data",'error');} 
		}
		else{
			//$('#data_na').css('display','none');
			//$('#form_na').css('display','inline');
			$('#konten_nyang_laen').html('');
			$.post(host+'adminpanel/get_formna/<?=$mod?>',{sts:'add'},function(r){
				$('#konten_nyang_laen').html(r)
				
				/*tinyMCE.init({
							selector : "textarea",
							plugins : "pagebreak,table,code,save,insertdatetime,preview,media,searchreplace,contextmenu,paste,directionality,image",		
				 
				});
				*/
				
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
				
				function MadFileBrowser(field_name, url, type, win) {
				  tinyMCE.activeEditor.windowManager.open({
					  file : "<?=base_url()?>assets/filemanager/mfm.php?field=" + field_name + "&url=" + url + "",
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
		}
}	
	
</script>

