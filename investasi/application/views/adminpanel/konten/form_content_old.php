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
	var uid_textarea = '<?=$uid_textarea?>';
	tinyMCE.init({
        selector : "textarea",
		plugins : "pagebreak,table,code,save,insertdatetime,preview,media,searchreplace,contextmenu,paste,directionality,image",		
		setup: function(editor) {
			editor.on('init', function() {
				tinyMCE.execCommand('mceAddControl', false, 'isi_'+uid_textarea);
			});
		}	
    });	

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

