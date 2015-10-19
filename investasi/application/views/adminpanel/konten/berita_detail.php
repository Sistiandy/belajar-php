<div id="data_na">
    <div class="widget">

        <div class="widget-body">
            <div class='col-md-4'>
                <img src="<?php echo base_url() ?>repository/foto/berita/<?php echo $news['gambar'] ?>" class="img-responsive">
            </div>
            <div class='col-md-8'>

                <table class='table table-striped'>
                    <tbody>
                        <tr>
                            <td>Judul</td>
                            <td>:</td>
                            <td><?php echo $news['judul_berita'] ?></td>
                        </tr>
                        <tr>
                            <td>Tempat</td>
                            <td>:</td>
                            <td><?php echo $news['tempat'] ?></td>
                        </tr>
                        <tr>
                            <td>Tanggal</td>
                            <td>:</td>
                            <td><?php echo $news['tanggal'] ?></td>
                        </tr>
                        <tr>
                            <td>Kutipan</td>
                            <td>:</td>
                            <td><?php echo $news['kutipan'] ?></td>
                        </tr>
                        <tr>
                            <td>Isi Berita</td>
                            <td>:</td>
                            <td><?php echo $news['isi_berita'] ?></td>
                        </tr>
                    </tbody>
                </table>

            </div><br>
            <div class="col-md-12">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Komentar</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($comment as $row): ?>
                            <tr>
                                <td><?php echo $row['comment_name'] ?></td>
                                <td><?php echo $row['comment_email'] ?></td>
                                <td><?php echo $row['comment_description'] ?></td>
                                <td>
                                    <?php if($row['comment_is_publish']==0){ ?>
                                    <a onclick="return confirm('Do you really want to publish this comment?');" href="<?php echo site_url('adminpanel/publish_news/'.$row['comment_id']); ?>"><span class="icon-eye-open"></span></a>
                                    <?php } ?>
                                </td>
                            </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>