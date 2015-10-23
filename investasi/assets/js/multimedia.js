	$('#filenya').html('<center><img src="'+host+'assets/images/loading.gif"><br /> &nbsp;&nbsp;Harap Tunggu</center>')
	$.post(host+'adminpanel/getdisplay/file_multimedia', {'type':typenya}, function(resp){
		$('#filenya').html(resp);
	});
	
	$('#upload').click(function(){
		submitform1('formupload', function(resp){
			if(resp == 1){
				//$.messager.alert("Sukses", "Data Tersimpan",'info');
				$('#filenya').html('<center><img src="'+host+'assets/images/loading.gif"> Harap Tunggu..</center>')
				$.post(host+'adminpanel/getdisplay/file_multimedia', {'type':typenya}, function(resp){
					$('#filenya').html(resp);
				});
			}else if(resp == 2){
				$.messager.alert("Gagal","File Tidak Boleh Kosong",'error');	
			}else if(resp == 3){
				$.messager.alert("Gagal","Format File Tidak Diizinkan!",'error');	
			}else{
				$.messager.alert("Gagal","Data Gagal Disimpan",'error');	
			}
			
			$('#gambar').val('');			
		});
	});

	function deletefoto(id){
		$.messager.confirm('Konfirmasi','Anda Yakin Untuk Menghapus Foto ini?',function(r){	
			if(r){
				$.post(host+'adminpanel/hapus/foto', {'id':id}, function(resp){
					if(resp == 1){
						//$.messager.alert("Sukses", "Foto Berhasil Di Hapus",'info');				
						$('#filenya').html('<center><img src="'+host+'assets/images/loading.gif"><br /> &nbsp;&nbsp;Harap Tunggu</center>')
						$.post(host+'adminpanel/getdisplay/file_multimedia', {'type':typenya}, function(resp){
							$('#filenya').html(resp);
						});
					}else{
						$.messager.alert("Gagal","Foto Gagal Di Hapus", 'error');	
					}
				});
			}
		});
	}