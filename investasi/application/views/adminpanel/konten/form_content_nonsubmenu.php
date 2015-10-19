<?php if($id_kategori == '7'){?>
	<!--link href="<?=base_url()?>assets/css/style.css" rel="stylesheet" />
	<script src="<?=base_url()?>assets/multiple_upload/jquery.form.js"></script>
	<script src="<?=base_url()?>assets/multiple_upload/upload.js"></script-->
<?}?>

<form method='post' id='formkonten_nonsubmenu' action="<?=base_url()?>adminpanel/savedata/konten/" class="form-horizontal" enctype="multipart/form-data">
    <input type='hidden' id='cl_kategori_id' name='cl_kategori_id' value='<?=$id_kategori?>'>
    <div class="control-group">
        <label class="control-label">Isi Konten</label>
        <div class="controls">
            <textarea id='isi_<?=$uid_textarea?>' class="span12" name="isi" rows="10"><?=(isset($datarecord->isi) ? $datarecord->isi : '')?></textarea>
        </div>
    </div>
</form>
<?php if($id_kategori == '7'){?>
	
<?}?>
<div class="form-actions">
   <button id='simpan_nyuk' class="btn btn-primary">Simpan</button>
</div>					

<script>
	var uid_textarea = '<?=$uid_textarea?>';
	tinyMCE.init({
		// General options
		mode : "textareas",
		theme : "advanced",
		plugins : "pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave",

		// Theme options
		theme_advanced_buttons1 : "bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
		theme_advanced_buttons2 : "bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,image,link,forecolor,backcolor",
		theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : true,
		
		//Mad File Manager
		relative_urls : false,
		file_browser_callback : MadFileBrowser
	});
		
	
	$('#simpan_nyuk').click(function(){
		tinyMCE.get("isi_"+uid_textarea).save();
		//tinyMCE.EditorManager.triggerSave();
		submitform1('formkonten_nonsubmenu', function(resp){
			if(resp == 1){
				$.messager.alert("Sukses", "Data Tersimpan",'info');	
				/*$.post(host+'adminpanel/getdisplay/getform/', {'id_subkategori':$('#cl_subkategori_content_id').val()},function(resp){
					$('#maincont').html(resp);
				});*/
			}else{
				//alert(resp);
				$.messager.alert("Gagal","Data Gagal Disimpan",'error');	
			}
		});
	});
	
</script>
