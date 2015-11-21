<div class="col-md-12 col-sm-12 col-xs-12 main post-inherit">
    <div class="x_panel post-inherit">
        <h3 class="">
            Daftar Absensi
            <span class="pull-right"> 
                <a class="btn btn-default" type="button" href="<?php echo site_url('member/present/index/all') ?>">
                    Semua <span class="badge"><?php echo $semua ?></span>
                </a> | 
                <a class="btn btn-primary" type="button" href="<?php echo site_url('member/present/index/hadir') ?>">
                    Hadir <span class="badge"><?php echo $hadir ?></span>
                </a> | 
                <a class="btn btn-success" type="button" href="<?php echo site_url('member/present/index/sakit') ?>">
                    Sakit <span class="badge"><?php echo $sakit ?></span>
                </a>
                | <a class="btn btn-warning" type="button" href="<?php echo site_url('member/present/index/izin') ?>">
                    Izin <span class="badge"><?php echo $izin ?></span>
                </a>
                | 
                <a class="btn btn-danger" type="button" href="<?php echo site_url('member/present/index/alfa') ?>">
                    Alfa <span class="badge"><?php echo $alfa ?></span>
                </a>

            </span>
        </h3><br>

        <div class="table-responsive">
            <table class="table table-striped">
                <thead class="gradient">
                    <tr>
                        <th>Tanggal</th>
                        <th>Datang</th>
                        <th>Pulang</th>
                        <th>Kehadiran</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($present as $row): ?>
                        <tr>
                            <td><?php echo pretty_date($row['present_date'], 'l, d m Y', FALSE) ?></td>
                            <td><?php echo $row['present_entry_time'] ?></td>
                            <td><?php echo $row['present_out_time'] ?></td>
                            <td><?php echo $row['present_desc'] ?></td>
                            <td><?php echo ($row['present_is_late'] == 1) ? 'Telat' : '-' ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <div >
            <?php echo $this->pagination->create_links(); ?>
        </div>
    </div>
</div>