<?php if($mod != 'berita'){?>
	<div class="widget" style='height:100%; margin-bottom:0px;'>
		<div class="widget-body">
<?php } ?>
<form method='post' id='form_<?=$mod?>' action="<?=base_url()?>adminpanel/simpan_na/<?=$mod?>/"  class="form-horizontal" enctype="multipart/form-data">
<input type='hidden' id='sts' name='sts' value='<?=$sts?>'>
<input type='hidden' id='id' name='id' value='<?=($sts=='edit' ? $data->id : '' )?>'>
<? if($mod=='profil_kota'){?>
		
		<div class="control-group">
			<label class="control-label">Konten Profil Kota Makassar</label>
			<div class="controls">
				<textarea name="konten" id="konten" class="span12" rows="20"><?=$data->konten;?></textarea>
				
			</div>
		</div>
<? }if($mod=='profil_dinas'){?>
		
		<div class="control-group">
			<label class="control-label">Konten Profil Kedinasaan</label>
			<div class="controls">
				<textarea name="konten" id="konten" class="span12" rows="20"><?=$data->konten;?></textarea>
				
			</div>
		</div>
<? }if($mod=='user'){?>
		
		<div class="control-group">
			<label class="control-label">User Name</label>
			<div class="controls">
				<input type="text" name="user_id" id="user_id" style="width:50px;"  value="<?=($sts=='edit' ? $data->user_id : '' )?>">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">Password</label>
			<div class="controls">
				<input type="password" name="password" id="password" style="width:50px;"  value="<?=($sts=='edit' ? $data->password : '' )?>">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">Nama Lengkap</label>
			<div class="controls">
				<input type="text" name="nama_lengkap" id="nama_lengkap" style="width:50px;" value="<?=($sts=='edit' ? $data->nama_lengkap : '' )?>">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">Email</label>
			<div class="controls">
				<input type="text" name="email" id="email" style="width:50px;" value="<?=($sts=='edit' ? $data->email : '' )?>">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">Alamat</label>
			<div class="controls">
				<textarea name="alamat" id="alamat" class="span12" rows="20"><?=$data->alamat;?></textarea>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">Telp</label>
			<div class="controls">
				<input type="text" name="telp" id="telp" style="width:50px;"  value="<?=($sts=='edit' ? $data->telp : '' )?>">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">No. HP</label>
			<div class="controls">
				<input type="text" name="hp" id="hp" style="width:50px;" value="<?=($sts=='edit' ? $data->hp : '' )?>">
			</div>
		</div>
	
<? } if($mod=='penduduk'){?>
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
	
<? } if($mod=='luas_wil'){?>
		<div class="control-group">
			<label class="control-label">Tahun</label>
			<div class="controls">
				<input type="text" name="tahun" id="tahun" style="width:50px;" maxlength="4" value="<?=($sts=='edit' ? $data->tahun : '' )?>">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">Kecamatan</label>
			<div class="controls">
				<select id="cl_kecamatan_kode" name="cl_kecamatan_kode">
					<option value="">--Pilih--</option>
					<?Php foreach($kecamatan as $v){?>
						<option value="<?=$v['kode']?>" <? if($sts=='edit'){if($data->cl_kecamatan_kode == $v['kode']){echo 'selected';}}?>><?=$v['nama_kecamatan']?></option>
					<? }?>
				</select>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">Luas Wilayah</label>
			<div class="controls">
				<input type="text" name="luas_wilayah" id="luas_wilayah" style="width:100px;" value="<?=($sts=='edit' ? $data->luas_wilayah : '' )?>">&nbsp;(km2)
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">Jml. Pencari Kerja</label>
			<div class="controls">
				<input type="text" name="persentase" id="persentase" style="width:80px;" value="<?=($sts=='edit' ? $data->persentase : '' )?>">&nbsp;(%)
			</div>
		</div>
	
<? } if($mod=='jml_kel'){?>
		<div class="control-group">
			<label class="control-label">Tahun</label>
			<div class="controls">
				<input type="text" name="tahun" id="tahun" style="width:50px;" maxlength="4" value="<?=($sts=='edit' ? $data->tahun : '' )?>">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">Kecamatan</label>
			<div class="controls">
				<select id="cl_kecamatan_kode" name="cl_kecamatan_kode">
					<option value="">--Pilih--</option>
					<?Php foreach($kecamatan as $v){?>
						<option value="<?=$v['kode']?>" <? if($sts=='edit'){if($data->cl_kecamatan_kode == $v['kode']){echo 'selected';}}?>><?=$v['nama_kecamatan']?></option>
					<? }?>
				</select>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">Jml. Kelurahan</label>
			<div class="controls">
				<input type="text" name="jml_kelurahan" id="jml_kelurahan" style="width:100px;" value="<?=($sts=='edit' ? $data->jml_kelurahan : '' )?>">&nbsp;
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">Jml. RT</label>
			<div class="controls">
				<input type="text" name="jml_rt" id="jml_rt" style="width:100px;" value="<?=($sts=='edit' ? $data->jml_rt : '' )?>">&nbsp;
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">Jml. RW</label>
			<div class="controls">
				<input type="text" name="jml_rw" id="jml_rw" style="width:100px;" value="<?=($sts=='edit' ? $data->jml_rw : '' )?>">&nbsp;
			</div>
		</div>
		

<? } if($mod=='rata_ekonomi'){?>
		<div class="control-group">
			<label class="control-label">Tahun</label>
			<div class="controls">
				<input type="text" name="tahun" id="tahun" style="width:50px;" maxlength="4" value="<?=($sts=='edit' ? $data->tahun : '' )?>">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">KabKota</label>
			<div class="controls">
				<select id="cl_kab_kota_kode" name="cl_kab_kota_kode">
					<option value="">--Pilih--</option>
					<?Php foreach($kabkota as $v){?>
						<option value="<?=$v['KODE_KAB_KOTA']?>" <? if($sts=='edit'){if($data->cl_kab_kota_kode == $v['KODE_KAB_KOTA']){echo 'selected';}}?>><?=$v['NAMA_KAB_KOTA']?></option>
					<? }?>
				</select>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">Rata-Rata</label>
			<div class="controls">
				<input type="text" name="rata" id="rata" style="width:100px;" value="<?=($sts=='edit' ? $data->rata : '' )?>">&nbsp;
			</div>
		</div>
		
		
<? } if($mod=='makro_ekonomi'){?>
		<div class="control-group">
			<label class="control-label">Tahun</label>
			<div class="controls">
				<input type="text" name="tahun" id="tahun" style="width:50px;" maxlength="4" value="<?=($sts=='edit' ? $data->tahun : '' )?>">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">Lapangan Kerja</label>
			<div class="controls">
				<input type="text" name="lapangan_kerja" id="lapangan_kerja" style="width:150px;" value="<?=($sts=='edit' ? $data->lapangan_kerja : '' )?>">&nbsp;
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">Jumlah</label>
			<div class="controls">
				<input type="text" name="jumlah" id="jumlah" style="width:100px;" value="<?=($sts=='edit' ? $data->jumlah : '' )?>">&nbsp;
			</div>
		</div>

<? } if($mod=='perbankan'){?>
		<div class="control-group">
			<label class="control-label">Tahun</label>
			<div class="controls">
				<input type="text" name="tahun" id="tahun" style="width:50px;" maxlength="4" value="<?=($sts=='edit' ? $data->tahun : '' )?>">
			</div>
		</div>
		
		<div class="control-group">
			<label class="control-label">Jumlah Pinjaman</label>
			<div class="controls">
				<input type="text" name="pinjaman" id="pinjaman" style="width:100px;" value="<?=($sts=='edit' ? $data->pinjaman : '' )?>">&nbsp;
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">Jumlah Pinjaman Investasi</label>
			<div class="controls">
				<input type="text" name="pinjaman_investasi" id="pinjaman_investasi" style="width:100px;" value="<?=($sts=='edit' ? $data->pinjaman_investasi : '' )?>">&nbsp;
			</div>
		</div>
<? } if($mod=='pad'){?>
		<div class="control-group">
			<label class="control-label">Tahun</label>
			<div class="controls">
				<input type="text" name="tahun" id="tahun" style="width:50px;" maxlength="4" value="<?=($sts=='edit' ? $data->tahun : '' )?>">
			</div>
		</div>
		
		<div class="control-group">
			<label class="control-label">Target</label>
			<div class="controls">
				<input type="text" name="target" id="target" style="width:100px;" value="<?=($sts=='edit' ? $data->target : '' )?>">&nbsp;
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">Realisasi</label>
			<div class="controls">
				<input type="text" name="realisasi" id="realisasi" style="width:100px;" value="<?=($sts=='edit' ? $data->realisasi : '' )?>">&nbsp;
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
				<textarea name="isi" id="isi" rows="20" class="span12" > <?=($sts=='edit' ? $data->isi : '' )?> </textarea>
				
			</div>
		</div>

<? } if($mod=='tumbuh_penduduk'){?>
		<div class="control-group">
			<label class="control-label">Tahun</label>
			<div class="controls">
				<input type="text" name="tahun" id="tahun" style="width:50px;" maxlength="4" value="<?=($sts=='edit' ? $data->tahun : '' )?>">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">Pertumbuhan Penduduk</label>
			<div class="controls">
				<input type="text" name="jml_pertumbuhan_penduduk" id="jml_pertumbuhan_penduduk" style="width:100px;" value="<?=($sts=='edit' ? $data->jml_pertumbuhan_penduduk : '' )?>">
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
		
<? }if($mod=='kondisi_jalan'){?>
		<div class="control-group">
			<label class="control-label">Tahun</label>
			<div class="controls">
				<input type="text" name="tahun" id="tahun" style="width:50px;" maxlength="4" value="<?=($sts=='edit' ? $data->tahun : '' )?>">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">Panjang Jalan</label>
			<div class="controls">
				<input type="text" name="panjang_jalan" id="panjang_jalan" style="width:100px;" value="<?=($sts=='edit' ? $data->panjang_jalan : '' )?>">&nbsp;(km)
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">Kondisi Baik</label>
			<div class="controls">
				<input type="text" name="baik" id="baik" style="width:100px;" value="<?=($sts=='edit' ? $data->baik : '' )?>">&nbsp;(km)
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">Kondisi Sedang</label>
			<div class="controls">
				<input type="text" name="sedang" id="sedang" style="width:100px;" value="<?=($sts=='edit' ? $data->sedang : '' )?>">&nbsp;(km)
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">Kondisi Rusak Ringan</label>
			<div class="controls">
				<input type="text" name="ringan" id="ringan" style="width:100px;" value="<?=($sts=='edit' ? $data->ringan : '' )?>">&nbsp;(km)
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">Kondisi Rusak Berat</label>
			<div class="controls">
				<input type="text" name="berat" id="berat" style="width:100px;" value="<?=($sts=='edit' ? $data->berat : '' )?>">&nbsp;(km)
			</div>
		</div>
	

<? } if($mod=='panjang_jalan'){?>
		<div class="control-group">
			<label class="control-label">Tahun</label>
			<div class="controls">
				<input type="text" name="tahun" id="tahun" style="width:50px;" maxlength="4" value="<?=($sts=='edit' ? $data->tahun : '' )?>">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">Arteri</label>
			<div class="controls">
				<input type="text" name="arteri" id="arteri" style="width:100px;" value="<?=($sts=='edit' ? $data->arteri : '' )?>">&nbsp;(km)
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">Kolektor</label>
			<div class="controls">
				<input type="text" name="kolektor" id="kolektor" style="width:100px;" value="<?=($sts=='edit' ? $data->kolektor : '' )?>">&nbsp;(km)
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">Lokal</label>
			<div class="controls">
				<input type="text" name="lokal" id="lokal" style="width:100px;" value="<?=($sts=='edit' ? $data->lokal : '' )?>">&nbsp;(km)
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">Inspeksi Kanal</label>
			<div class="controls">
				<input type="text" name="inspeksi_kanal" id="inspeksi_kanal" style="width:100px;" value="<?=($sts=='edit' ? $data->inspeksi_kanal : '' )?>">&nbsp;(km)
			</div>
		</div>
		
	

<? } if($mod=='kendaraan_uji'){?>
		<div class="control-group">
			<label class="control-label">Tahun</label>
			<div class="controls">
				<input type="text" name="tahun" id="tahun" style="width:50px;" maxlength="4" value="<?=($sts=='edit' ? $data->tahun : '' )?>">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">Kendaraan Penumpang</label>
			<div class="controls">
				<input type="text" name="penumpang" id="penumpang" style="width:100px;" value="<?=($sts=='edit' ? $data->penumpang : '' )?>">&nbsp;
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">Bus</label>
			<div class="controls">
				<input type="text" name="bus" id="bus" style="width:100px;" value="<?=($sts=='edit' ? $data->bus : '' )?>">&nbsp;
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">Truk</label>
			<div class="controls">
				<input type="text" name="truk" id="truk" style="width:100px;" value="<?=($sts=='edit' ? $data->truk : '' )?>">&nbsp;
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">PickUp</label>
			<div class="controls">
				<input type="text" name="pick_up" id="pick_up" style="width:100px;" value="<?=($sts=='edit' ? $data->pick_up : '' )?>">&nbsp;
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">Kendaraan Khusus</label>
			<div class="controls">
				<input type="text" name="khusus" id="khusus" style="width:100px;" value="<?=($sts=='edit' ? $data->khusus : '' )?>">&nbsp;
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">Kendaraan Tempelan</label>
			<div class="controls">
				<input type="text" name="tempelan" id="tempelan" style="width:100px;" value="<?=($sts=='edit' ? $data->tempelan : '' )?>">&nbsp;
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">Kendaraan Tangki</label>
			<div class="controls">
				<input type="text" name="tangki" id="tangki" style="width:100px;" value="<?=($sts=='edit' ? $data->tangki : '' )?>">&nbsp;
			</div>
		</div>
	

<? } if($mod=='kapal_pelayaran'){?>
		<div class="control-group">
			<label class="control-label">Tahun</label>
			<div class="controls">
				<input type="text" name="tahun" id="tahun" style="width:50px;" maxlength="4" value="<?=($sts=='edit' ? $data->tahun : '' )?>">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">Samudra</label>
			<div class="controls">
				<input type="text" name="samudra" id="samudra" style="width:100px;" value="<?=($sts=='edit' ? $data->samudra : '' )?>">&nbsp;
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">Nusantara</label>
			<div class="controls">
				<input type="text" name="nusantara" id="nusantara" style="width:100px;" value="<?=($sts=='edit' ? $data->nusantara : '' )?>">&nbsp;
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">Khusus</label>
			<div class="controls">
				<input type="text" name="khusus" id="khusus" style="width:100px;" value="<?=($sts=='edit' ? $data->khusus : '' )?>">&nbsp;
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">Lokal</label>
			<div class="controls">
				<input type="text" name="lokal" id="lokal" style="width:100px;" value="<?=($sts=='edit' ? $data->lokal : '' )?>">&nbsp;
			</div>
		</div>
		

<? } if($mod=='kapal_tambatan'){?>
		<div class="control-group">
			<label class="control-label">Tahun</label>
			<div class="controls">
				<input type="text" name="tahun" id="tahun" style="width:50px;" maxlength="4" value="<?=($sts=='edit' ? $data->tahun : '' )?>">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">Dermaga Umum</label>
			<div class="controls">
				<input type="text" name="dermaga_umum" id="dermaga_umum" style="width:100px;" value="<?=($sts=='edit' ? $data->dermaga_umum : '' )?>">&nbsp;
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">Dermaga Khusus</label>
			<div class="controls">
				<input type="text" name="dermaga_khusus" id="dermaga_khusus" style="width:100px;" value="<?=($sts=='edit' ? $data->dermaga_khusus : '' )?>">&nbsp;
			</div>
		</div>
		
<? }if($mod=='petikemas_dn'){?>
		<div class="control-group">
			<label class="control-label">Tahun</label>
			<div class="controls">
				<input type="text" name="tahun" id="tahun" style="width:50px;" maxlength="4" value="<?=($sts=='edit' ? $data->tahun : '' )?>">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">Bongkar</label>
			<div class="controls">
				<input type="text" name="bongkar" id="bongkar" style="width:100px;" value="<?=($sts=='edit' ? $data->bongkar : '' )?>">&nbsp;
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">Muat</label>
			<div class="controls">
				<input type="text" name="muat" id="muat" style="width:100px;" value="<?=($sts=='edit' ? $data->muat : '' )?>">&nbsp;
			</div>
		</div>
		
<? } if($mod=='petikemas_ln'){?>
		<div class="control-group">
			<label class="control-label">Tahun</label>
			<div class="controls">
				<input type="text" name="tahun" id="tahun" style="width:50px;" maxlength="4" value="<?=($sts=='edit' ? $data->tahun : '' )?>">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">Export</label>
			<div class="controls">
				<input type="text" name="export" id="export" style="width:100px;" value="<?=($sts=='edit' ? $data->export : '' )?>">&nbsp;
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">Import</label>
			<div class="controls">
				<input type="text" name="import" id="import" style="width:100px;" value="<?=($sts=='edit' ? $data->import : '' )?>">&nbsp;
			</div>
		</div>
		
<? }if($mod=='telp'){?>
		<div class="control-group">
			<label class="control-label">Tahun</label>
			<div class="controls">
				<input type="text" name="tahun" id="tahun" style="width:50px;" maxlength="4" value="<?=($sts=='edit' ? $data->tahun : '' )?>">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">Pelanggan</label>
			<div class="controls">
				<input type="text" name="pelanggan" id="pelanggan" style="width:100px;" value="<?=($sts=='edit' ? $data->pelanggan : '' )?>">&nbsp;
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">Line Services</label>
			<div class="controls">
				<input type="text" name="line_service" id="line_service" style="width:100px;" value="<?=($sts=='edit' ? $data->line_service : '' )?>">&nbsp;
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">Connected Lines</label>
			<div class="controls">
				<input type="text" name="connected_line" id="connected_line" style="width:100px;" value="<?=($sts=='edit' ? $data->connected_line : '' )?>">&nbsp;
			</div>
		</div>
		
<? } ?>
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

<script src="<?php base_url(); ?>assets/js/form_rame.js"></script>