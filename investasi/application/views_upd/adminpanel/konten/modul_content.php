<div class='span12'>
	<div class="widget">
		<!--<div class="widget-title">
		</div>-->
		<div class="widget-body">
			<div class="form-horizontal">
				<div class="control-group">
					<label class="control-label">SubKategori Konten</label>
					<div class="controls">
						<select id='subkategori' class="input-large m-wrap">
							<?=$combo_subkategori?>
						</select>
					</div>
				</div>
			</div>
			<hr />
			<div id='maincont'>
				<center><img src="<?=base_url()?>assets/images/logo_login.png" style="margin-top:50px;margin-bottom:50px;"  /></center>
			</div>	
		</div>			
	</div>
</div>

<script>
	$('#subkategori').on('change', function(){
		$('#maincont').html('');
		$.post(host+'adminpanel/getdisplay/getform/', {'id_subkategori':$(this).val()},function(resp){
			$('#maincont').html(resp);
		});
	});
</script>
	
		

			
