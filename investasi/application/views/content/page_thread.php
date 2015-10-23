<div class="coloumn" style='width:95%;min-height:700px;'>
	<table class="forum-table">
		<thead>
			<tr> 
				<th colspan="4"><?=$forumname[0]['forum_name']?></th> 
			</tr>
		</thead>
		<tbody>
			<tr class="column-head">
				<th><b>Judul Topik</b></th>
				<th width="50"><b>Komentar</b></th>
			</tr>
			<?php $no = 1; ?>
			<?php foreach($datathread as $tp => $s) : ?>
				<?php if(($no % 2) != 0) : ?>
					<tr class="ganjil">
				<?php else: ?>
					<tr class="genap">
				<?php endif ?>
					<td class="forum-name">
						<b><a href="<?=base_url()?>showposting/<?=$s['id']?>/<?=str_replace(' ', '-', strtolower($s['thread_title']))?>.html"><?=$s['thread_title']?></a></b> <br/>
						<span>Author : <b><?=$s['create_by']?> </b></span>
					</td>
					<td><?=$s['replyon']?></td>
				</tr>
				<?php $no++; ?>
			<?php endforeach ?>
		</tbody>
	</table>
</div>