<div class='span12'>
	<div class="widget">
		<!--<div class="widget-title">
		</div>-->
		<div class="widget-body">
		<?php if($flag_submenu == 'Y'){?>
			<div class="form-horizontal">
				<div class="control-group">
					<label class="control-label">Sub Kategori Konten</label>
					<div class="controls">
						<select id='subkategori' class="input-large m-wrap">
							<?=$combo_subkategori?>
						</select>
					</div>
				</div>
			</div>
			<hr />
		<?php } ?>
			<div id='maincont'>
				<center><img src="<?=base_url()?>assets/images/logo_login.png" style="margin-top:50px;margin-bottom:50px;"  /></center>
			</div>	
		</div>			
	</div>
</div>

<script>
	var flag_submenu = "<?=$flag_submenu?>";
	$('#subkategori').on('change', function(){
		$('#maincont').html('');
		$.post(host+'adminpanel/getdisplay/getform/', {'id_subkategori':$(this).val(), 'flag_submenu':flag_submenu},function(resp){
			$('#maincont').html(resp);
		});
	});
	
	if(flag_submenu == 'N'){
		var id_kategori = "<?=(isset($id_kategori) ? $id_kategori : '')?>";
		$.post(host+'adminpanel/getdisplay/getform/', {'id_kategori':id_kategori, 'flag_submenu':flag_submenu},function(resp){
			$('#maincont').html(resp);
		});
	}
</script>
	
		

			
