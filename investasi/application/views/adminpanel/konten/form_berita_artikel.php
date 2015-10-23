<div id="data_na">
	<div class="widget">
		<!--<div class="widget-title">
			<h4><i class="icon-reorder"></i></h4>
			   <span class="tools"></span>
		</div>-->
		<div class="widget-body">
				<!--<table id="data_<?php // $mod?>"></table>-->
                            <table class='table table-striped'>
                                <thead>
                                    <tr>
                                        <th>Judul</th>
                                        <th>Tempat</th>
                                        <th>Tanggal</th>
                                        <th>Penulis</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($news as $row): ?>
                                    <tr>
                                        <td><?php echo $row['judul_berita'] ?></td>
                                        <td><?php echo $row['tempat'] ?></td>
                                        <td><?php echo $row['tanggal'] ?></td>
                                        <td><?php echo $row['create_by'] ?></td>
                                        <td>
                                            <a href="#" onClick="loadUrl(this,'adminpanel/getdisplay/news_detail/<?php echo $row['id']; ?>','Berita Detail')"><span class="icon-eye-open"></span></a> 
                                            <a onclick="return confirm('Do you really want to delete this news?');" href="<?php echo site_url('adminpanel/delete_news/'.$row['id']); ?>"><span class="icon-trash"></span></a>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>

		</div>
	</div>
</div>
 
<!--<div id="form_na" style="display:none;">
 
</div>-->
	