<?php if($mod == 'forum'){ ?>
		<form method='post' id='form_thread' action="<?=base_url()?>adminpanel/savedata/forum/" class="form-horizontal" enctype="multipart/form-data">
			<input type='hidden' name='editstatus' value='<?=$editstatus?>'>
			<input type='hidden' name='id' value='<?=($editstatus == 'add' ? '' : $datarecord->id)?>'>
			<div class="control-group">
				<label class="control-label">Judul Thread</label>
				<div class="controls">
					<input type="text" class="span6 " name='thread_title' value='<?=($editstatus == 'add' ? '' : $datarecord->thread_title)?>' />
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">Kategori Thread</label>
				<div class="controls">
					<select id='kategori' class="input-large m-wrap">
						<?=$combo_categori?>
					</select>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">SubKategori Thread</label>
				<div class="controls">
					<select id='forumid' name='forumid' class="input-large m-wrap">
					</select>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">Isi Thread</label>
				<div class="controls">
				<textarea id='isi_thread_<?=$uid_textarea?>' class="span12" name="thread_content" rows="10"><?=($editstatus == 'add' ? '' : $datarecord->thread_content)?></textarea>
				</div>
			</div>
			<div class="control-group">
			   <label class="control-label">Status Thread</label>
			   <div class="controls">
					<input type='radio' name='status' <?php if($editstatus == 'edit'){if($datarecord->status == 1) echo "checked"; } ?> value='1'> Tayangkan &nbsp;&nbsp;
					<input type='radio' name='status' <?php if($editstatus == 'edit'){if($datarecord->status == 0) echo "checked"; } ?> value='0'> Jangan Tayangkan &nbsp;&nbsp;
			   </div>
			</div>
		</form>
		<div class="form-actions">
		   <button id='simpan_nya' class="btn btn-primary">Simpan</button>
		   <button id='batal' class="btn btn-primary" onClick="loadUrl(this,'adminpanel/getdisplay/forum/forum_thread','Manajemen Thread Forum')">Batal</button>
		</div>	
<?php } ?>

<script>
	var modul_form_forum = "<?=$mod?>";
	if(modul_form_forum == 'forum'){
		var uid_textarea = '<?=$uid_textarea?>';
		var editstatus = '<?=$editstatus?>';
	}
	
if(modul_form_forum == 'forum'){
	if(editstatus == 'edit'){
		value_subforum = "<?=($editstatus == 'edit' ? $datarecord->forumid : '')?>";
		value_parent_ = $('#kategori').val();
		fillCombo(host+'adminpanel/combobox/subforum/echo/'+value_subforum, 'forumid', value_parent_);
	}
	
	$('#kategori').on('change',function(){
		value_parent = $(this).val();
		$('#forumid').empty();
		fillCombo(host+'adminpanel/combobox/subforum/echo', 'forumid', value_parent);
	});
	
	$('#simpan_nya').click(function(){
		tinyMCE.get("isi_thread_"+uid_textarea).save();
		//tinyMCE.EditorManager.triggerSave();
		submitform1('form_thread', function(resp){
			if(resp == 1){
				//alert('Data Tersimpan');
				loadUrl(this,'adminpanel/getdisplay/forum/forum_thread','Manajemen Thread Forum');
				$.messager.alert("Sukses", "Data Tersimpan",'info');
			}else{
				//alert(resp);
				$.messager.alert("Gagal","Data Gagal Disimpan",'error');	
			}
		});
	});
	
}
</script>
