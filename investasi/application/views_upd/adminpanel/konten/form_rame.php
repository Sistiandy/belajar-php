<?php if($mod != 'berita'){?>
	<div class="widget" style='height:100%; margin-bottom:0px;'>
		<div class="widget-body">
<?php } ?>
<form method='post' id='form_<?=$mod?>' action="<?=base_url()?>adminpanel/simpan_na/<?=$mod?>/"  class="form-horizontal" enctype="multipart/form-data">
<input type='hidden' id='sts' name='sts' value='<?=$sts?>'>
<input type='hidden' id='id' name='id' value='<?=($sts=='edit' ? $data->id : '' )?>'>

<? if($mod=='penduduk'){?>
		<div class="control-group">
			<label class="control-label">Tahun</label>
			<div class="controls">
				<input type="text" name="tahun" id="tahun" style="width:50px;" maxlength="4" value="<?=($sts=='edit' ? $data->tahun : '' )?>">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">Jml. Penduduk</label>
			<div class="controls">
				<input type="text" name="jumlah_penduduk" id="jumlah_penduduk" style="width:100px;" value="<?=($sts=='edit' ? $data->jumlah_penduduk : '' )?>">&nbsp;(orang)
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">Jml. Pencari Kerja</label>
			<div class="controls">
				<input type="text" name="jumlah_pencari_kerja" id="jumlah_pencari_kerja" style="width:100px;" value="<?=($sts=='edit' ? $data->jumlah_pencari_kerja : '' )?>">&nbsp;(orang)
			</div>
		</div>
	

<? } if($mod=='headline'){?>
		<div class="control-group">
			<label class="control-label">Judul</label>
			<div class="controls">
				<input type="text" name="judul" id="judul" style="width:250px;" value="<?=($sts=='edit' ? $data->judul : '' )?>">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">Isi Headline</label>
			<div class="controls">
				<textarea name="isi" id="isi" style="width:300px; height:200px" > <?=($sts=='edit' ? $data->isi : '' )?> </textarea>
				
			</div>
		</div>
		
		
<? }if($mod=='potensi'){?>
		<div class="control-group">
			<label class="control-label">Komoditi</label>
			<div class="controls">
				<select id="cl_komoditi_id" name="cl_komoditi_id">
					<option value="">-- Pilih --</option>
					<? foreach($komoditi as $v){?>
						<option value="<?=$v['id']?>" <? if($sts=='edit'){if($v['id']==$data->cl_komoditi_id){echo 'selected';}}?>><?=$v['komoditi']?></option>
					<? }?>
				</select>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">Tahun</label>
			<div class="controls">
				<input type="text" name="tahun" id="tahun" style="width:50px;" maxlength="4" value="<?=($sts=='edit' ? $data->tahun : '' )?>">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">Jumlah</label>
			<div class="controls">
				<input type="text" name="jumlah" id="jumlah" style="width:100px;" value="<?=($sts=='edit' ? $data->jumlah : '' )?>">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">Satuan</label>
			<div class="controls">
				<input type="text" name="satuan" id="satuan" style="width:100px;"  value="<?=($sts=='edit' ? $data->satuan : '' )?>">
			</div>
		</div>
<? }if($mod=='pdrb'){?>
		
		<div class="control-group">
			<label class="control-label">Tahun</label>
			<div class="controls">
				<input type="text" name="tahun" id="tahun" style="width:50px;" maxlength="4" value="<?=($sts=='edit' ? $data->tahun : '' )?>">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">PMDN</label>
			<div class="controls">
				<input type="text" name="pmdn" id="pmdn" style="width:100px;" value="<?=($sts=='edit' ? $data->pmdn : '' )?>">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">Satuan</label>
			<div class="controls">
				<input type="text" name="satuan_pmdn" id="satuan_pmdn" style="width:100px;"  value="<?=($sts=='edit' ? $data->satuan_pmdn : '' )?>">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">PMA</label>
			<div class="controls">
				<input type="text" name="pma" id="pma" style="width:100px;" value="<?=($sts=='edit' ? $data->pma : '' )?>">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">Satuan</label>
			<div class="controls">
				<input type="text" name="satuan_pma" id="satuan_pma" style="width:100px;"  value="<?=($sts=='edit' ? $data->satuan_pma : '' )?>">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">PDRB</label>
			<div class="controls">
				<input type="text" name="pdrb" id="pdrb" style="width:100px;" value="<?=($sts=='edit' ? $data->pdrb : '' )?>">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">Satuan</label>
			<div class="controls">
				<input type="text" name="satuan_pdrb" id="satuan_pdrb" style="width:100px;"  value="<?=($sts=='edit' ? $data->satuan_pdrb : '' )?>">
			</div>
		</div>
<? }if($mod=='ekonomi'){?>
		<div class="control-group">
			<label class="control-label">Tahun</label>
			<div class="controls">
				<input type="text" name="tahun" id="tahun" style="width:50px;" maxlength="4" value="<?=($sts=='edit' ? $data->tahun : '' )?>">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">PDRB</label>
			<div class="controls">
				<input type="text" name="pdrb" id="pdrb" style="width:100px;" value="<?=($sts=='edit' ? $data->pdrb : '' )?>">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">Satuan</label>
			<div class="controls">
				<input type="text" name="satuan_pdrb" id="satuan_pdrb" style="width:100px;"  value="<?=($sts=='edit' ? $data->satuan_pdrb : '' )?>">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">Pendapatan PerKapita</label>
			<div class="controls">
				<input type="text" name="pendatan_kapita" id="pendatan_kapita" style="width:100px;" value="<?=($sts=='edit' ? $data->pendatan_kapita : '' )?>">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">Satuan</label>
			<div class="controls">
				<input type="text" name="satuan_pendapatan" id="satuan_pendapatan" style="width:100px;"  value="<?=($sts=='edit' ? $data->satuan_pendapatan : '' )?>">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">inflasi</label>
			<div class="controls">
				<input type="text" name="inflasi" id="inflasi" style="width:100px;" value="<?=($sts=='edit' ? $data->inflasi : '' )?>">
			</div>
		</div>
		
<? }if($mod=='berita'){?>
	 <div class="control-group">
			<label class="control-label">Judul</label>
			<div class="controls">
				<input type="text" name="judul_<?=$mod?>" value="<?=($sts=='edit' ? $data->judul_berita : '' )?>" >
			</div>
		</div>
		<? if($mod=='berita'){?>
		<div class="control-group">
			<label class="control-label">Tempat</label>
			<div class="controls">
				<input type="text" name="tempat" value="<?=($sts=='edit' ? $data->tempat : '' )?>" >
			</div>
		</div>
		<? }?>
		<div class="control-group">
			<label class="control-label">Tanggal</label>
			<div class="controls">
				<input type="text" name="tanggal" id="tanggal" style="width:150px;" value="<?=($sts=='edit' ? $data->tgl : '' )?>" >&nbsp;Jam&nbsp;<input type="text" name="jam" id="jam" style="width:100px;" value="<?=($sts=='edit' ? $data->jam : '' )?>" > &nbsp;contoh (00:00:00)
			</div>
		</div>
		<? if($mod=='berita'){?>
		<div class="control-group">
			<label class="control-label">Kutipan</label>
			<div class="controls">
				<input type="text" name="kutipan" value="<?=($sts=='edit' ? $data->kutipan : '' )?>" >
			</div>
		</div>
		<? }?>
		<div class="control-group">
			<label class="control-label">Gambar Pendukung</label>
			<div class="controls">
				<?php if(isset($data->gambar)){?>
					<img src='<?=base_url()?>repository/foto/berita/<?=$data->gambar?>' style='margin-bottom:5px;' width='200px' height='200px'>			
				<?php }else{?>
					<img src='<?=base_url()?>assets/images/no-image.gif' style='margin-bottom:5px;' width='200px' height='200px'>				
				<?php }?>
				<br />
				<input type="file" name='gambar' />
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">Isi</label>
			<div class="controls">
				<textarea id='isi' class="span12" name="isi_<?=$mod?>" rows="10"><?=(isset($data->isi_berita) ? $data->isi_berita : '')?></textarea>
			</div>
		</div>
		
<? }?>
	</form>
<div class="form-actions">
    <button id='simpan' class="btn btn-primary">Simpan</button>&nbsp;
    <button id='batal' class="btn btn-primary" >Batal</button>
</div>				
<?php if($mod != 'berita'){?>
		</div>
	</div>
<?php } ?>



<script type="text/javascript">
	var mod='<?=$mod?>';
</script>
