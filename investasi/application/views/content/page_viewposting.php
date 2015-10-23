<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/style-form.css" media="screen" />

<div class="coloumn" style='width:95%;min-height:700px;'>
	<div class="title-topic"> 
		<?=$isiposting[0]['thread_title']?>
	</div>
	<div class="post-wrapper">
		<div class="comment-content">
			<div class="comment-top">
				<div class="datecreate">Tanggal Posting : <?=$isiposting[0]['createdate']?></div>
				<div class="name-user" style='margin-left:15px;'><b><?=$isiposting[0]['create_by']?></b></div>
			</div> <hr />
			<div class="comment-middle">
				<table>
					<tr>
						<td class="avatar-ctn">
							<img style='margin-left:15px;' src="<?=base_url()?>assets/img/avatar.png" class="avatar" width="80"/> <br />
						</td>
						<td class="text-content">
							<div class="topic-content"><?=$isiposting[0]['thread_content']?></div>
						</td>
					</tr>
				</table>
			</div>
			<div class="comment-bottom"></div> 
		</div>
		<hr />
	</div>
	<div id='komentar' style='margin-top:5px;margin-bottom:5px;'></div>
	<div id='form-kom' style='display:none;'>
		<div id="signup-form">
		   <form method='post' id="formposting" action="<?=base_url()?>saveposting" >	
				<input type="hidden" name="threadid" value="<?=$isiposting[0]['id']?>" />
			   <p>
					<label >Nama</label>
					<input type="text" id='nama_pengirim' name="nama_pengirim" value=''/>
			   </p>
			   <p>
					<label >Email</label>
					<input type="text" name="email_pengirim" id="email_pengirim"  />
			   </p>
			   <p>
					<label >Komentar/Pertanyaan Anda</label>
					<textarea name='isi_komentar' id='isi_komentar' rows='5'></textarea>
			   </p>
		   </form>
		   <button id='submit_komen' class="submitete">Submit Komentar</button>
		</div>
	</div>
	<br />
	<button id='post_komentar' class="submitete" >Post Komentar</button>
	
</div>

<script>
	var posting_id = "<?=$isiposting[0]['id']?>";
	
	$('#komentar').html('<center><img src="'+host+'assets/images/loading.gif"><br /> &nbsp;&nbsp;Memuat Komentar</center>')
	$.post(host+'viewkomentar',{'thid':posting_id}, function(resp){
		$('#komentar').html(resp);
	});
	
	$('#post_komentar').on('click', function(){
		$('#form-kom').css('display','inline');
		$('#nama_pengirim').val('');
		$('#email_pengirim').val('');
		$('#isi_komentar').val('');
	});
	
	$('#submit_komen').live('click', function(){
		submitform1('formposting', function(resp){
			if(resp == 1){
				$('#form-kom').css('display','none');
				$('#nama_pengirim').val('');
				$('#email_pengirim').val('');
				$('#isi_komentar').val('');
				
				$('#komentar').html('<center><img src="'+host+'assets/images/loading.gif"><br /> &nbsp;&nbsp;Memuat Komentar</center>')
				$.post(host+'viewkomentar',{'thid':posting_id}, function(resp){
					$('#komentar').html(resp);
				});
				alert('Terima Kasih, Komentar Anda Akan Diverifikasi Terlebih Dahulu.');
			}else{
				alert('Sistem Gagal');
			}
		});
		return false;
	});
</script>
