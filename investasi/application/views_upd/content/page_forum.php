<div id="header_forum">
	<div id="menu">
		<a href="<?=base_url()?>"><div id="home-menu"></div></a>
		<?php if($logged_in == TRUE): ?>
			<a href="<?=base_url()?>forum/posting/new"><div id="write-btn"></div></a>
		<?php else: ?>
			<a href="#" onclick="msglogin();"><div id="write-btn"></div></a>
		<?php endif ?>
	</div>
</div>
<div id="content_forum">
	<?php foreach($forum_mapping as $fr) : ?>
		<table class="forum-table">
			<thead>
				<tr>
					<th colspan="4"><?=$fr['forum_name']?></th>
				</tr>
			</thead>
			<tbody>
				<tr class="column-head">
					<th><b>Forum Name</b></th>
					<th width="120"><b>Latest Post Info</b></th>
					<th width="50"><b>Topics</b></th>
					<th width="50"><b>Replies</b></th>
				</tr>
				<?php foreach($fr['subforum'] as $sub) : ?>
					<tr class="<?=$sub['flag']?>">
						<td class="forum-name">
							<b><a href="<?=base_url()?>forum/<?=$sub['forumid']?>/<?=$sub['permalink']?>"><?=$sub['forum_name']?></a></b> <br />
							<span><?=$sub['forum_info']?></span>
						</td>
						<td><?=cutString($sub['last_comment'], 50)?></td>
						<td><?=$sub['topics']?></td>
						<td><?=$sub['replies']?></td>
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>
	<?php endforeach ?>
</div>