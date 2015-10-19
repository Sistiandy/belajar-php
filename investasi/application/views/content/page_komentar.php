<div class="post-wrapper" style='margin-top:10px;margin-bottom:10px;'>
	<?php 
		if($komentar){
			foreach($komentar as $pos => $it){ 
	?>
				<div class="comment-content">
					<div class="comment-top">
						<div class="datecreate">Tanggal Komentar : <?=$it['createdate']?></div>
						<div class="name-user" style='margin-left:15px;'><b><?=$it['nama_pengirim']?></b></div>
					</div> <hr />
					<div class="comment-middle">
						<table>
							<tr>
								<td class="avatar-ctn">
									<img style='margin-left:15px;' src="<?=base_url()?>assets/img/usergroup.png" class="avatar" width="80"/> <br />
								</td>
								<td class="text-content">
									<div class="topic-title"><?=$it['email_pengirim']?></div>
									<div class="topic-content"><?=$it['isi_komentar']?></div>
								</td>
							</tr>
						</table>
					</div>
					<div class="comment-bottom"></div> 
				</div>
				<hr />

	<?php 
			} 
		}else{
	?>
		<center><i>Tidak Ada Komentar Masuk</i></center>
	<?php
		}
	?>
</div>
