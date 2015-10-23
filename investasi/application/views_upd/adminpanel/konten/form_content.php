<form method='post' id='formkonten' action="<?=base_url()?>adminpanel/savedata/konten/" class="form-horizontal" enctype="multipart/form-data">
    <input type='hidden' id='cl_subkategori_content_id' name='cl_subkategori_content_id' value='<?=$idsubkategori?>'>
	<div class="control-group">
        <label class="control-label">Gambar Pendukung</label>
        <div class="controls">
            <?php if(isset($datarecord->gambar)){?>
				<img src='<?=base_url()?>repository/foto/konten/<?=$datarecord->gambar?>' style='margin-bottom:5px;' width='200px' height='200px'>			
			<?php }else{?>
				<img src='<?=base_url()?>assets/images/no-image.gif' style='margin-bottom:5px;' width='200px' height='200px'>				
			<?php }?>
			<br />
			<input type="file" name='gambar' />
        </div>
    </div>
    <div class="control-group">
        <label class="control-label">Isi Konten</label>
        <div class="controls">
            <textarea id='isi_<?=$uid_textarea?>' class="span12" name="isi" rows="10"><?=(isset($datarecord->isi) ? $datarecord->isi : '')?></textarea>
        </div>
    </div>
</form>
	<div class="form-actions">
       <button id='simpan_na' class="btn btn-primary">Simpan</button>
       <button id='batal' class="btn btn-primary">Batal</button>
    </div>					


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
	/*
	var uid_textarea = '<?=$uid_textarea?>';
	tinyMCE.init({
		relative_urls : false,
        selector : "textarea",
		plugins : "pagebreak,table,code,save,insertdatetime,preview,media,searchreplace,contextmenu,paste,directionality,image,filemanager",		
		setup: function(editor) {
			editor.on('init', function() {
				tinyMCE.execCommand('mceAddControl', false, 'isi_'+uid_textarea);
			});
		}	
    });	
	*/
	
	var uid_textarea = '<?=$uid_textarea?>';
	
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
	
	/*
	tinyMCE.init({
		// General options
		selector : "textarea",
		plugins : "pagebreak,table,code,save,insertdatetime,preview,media,searchreplace,contextmenu,paste,directionality,image",

		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : true,

		//Mad File Manager
		
		relative_urls : false,
		file_browser_callback : MadFileBrowser
	});
	*/
	
	
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

	$('#simpan_na').click(function(){
		tinyMCE.get("isi_"+uid_textarea).save();
		//tinyMCE.EditorManager.triggerSave();
		submitform1('formkonten', function(resp){
			if(resp == 1){
				//alert('Data Tersimpan');
				$.messager.alert("Sukses", "Data Tersimpan",'info');	
				$.post(host+'adminpanel/getdisplay/getform/', {'id_subkategori':$('#cl_subkategori_content_id').val()},function(resp){
					$('#maincont').html(resp);
				});
			}else{
				//alert(resp);
				$.messager.alert("Gagal","Data Gagal Disimpan",'error');	
			}
		});
	});
</script>

