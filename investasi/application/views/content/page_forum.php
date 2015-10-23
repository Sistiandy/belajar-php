<div class="coloumn" style='width:95%;min-height:400px;'>
<div id="content_forum">
	<?php foreach($kategori_forum as $fr => $v) : ?>
		<table class="forum-table">
			<thead>
				<tr>
					<th colspan="4"><?=$v['forum_name']?></th>
				</tr>
			</thead>
			<tbody>
				<tr class="column-head">
					<th><b>Forum Name</b></th>
				</tr>
				<?php
					$sql = $this->db->get_where('tbl_forum_map', array('parent'=>$v['forumid'], 'status'=>1))->result_array();
						$num = 1;
						foreach($sql as $k => $r){
							$mods = $num % 2;
							if ($mods == 0) {
								$flag = "genap";
							} else {
								$flag = "ganjil";
							}
							
				?>
							<tr class="<?=$flag?>">
								<td class="forum-name">
									<b><a href="<?=base_url()?>thread/<?=$r['forumid']?>/<?=str_replace(' ', '-', strtolower($r['forum_name']))?>.html"><?=$r['forum_name']?></a><br />
									<span><?=$r['forum_info']?></span>
								</td>
							</tr>
				<?php 	$num++; } ?>
			</tbody>
		</table>
	<?php endforeach ?>
</div>
</div>