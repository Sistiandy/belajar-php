<div class='span12'>
	<div class="widget">
		<div class="widget-body">
			<form method='post' id='formupload' action="<?=base_url()?>adminpanel/savedata/multimedia/add" class="form-horizontal" enctype="multipart/form-data">
				<input type='hidden' name='type_form' value='<?=$param?>' />
				<div class="control-group">
					<label class="control-label">Foto/Video</label>
					<div class="controls">
						<input id='gambar' type="file" name='gambar' style="border:1px solid #C1C39A;padding-right:5px;" /> &nbsp;&nbsp;Format file .jpg .jpeg .mp4 (Max Filesize 20mb)<br>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">Judul</label>
					<div class="controls">
                                            <input id='title' class="form-control" type="text" name='title' style="border:1px solid #C1C39A;padding-right:5px;" />
					</div>
				</div>
			</form>
			<button id='upload' class="btn btn-primary">Upload</button>
			<hr />
			<div id='filenya'></div>
		</div>
	</div>
</div>		
<script>
	var typenya = "<?=$param?>";
</script>
<script src="<?=base_url()?>assets/js/multimedia.js"></script>