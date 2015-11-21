<div class="col-md-12 col-sm-12 col-xs-12 main post-inherit">
    <div class="x_panel post-inherit">
        <h3 class="">
            Daftar Absensi
        </h3><br>

        <div class="table-responsive">
            <table class="table table-striped">
                <thead class="gradient">
                    <tr>
                        <th>Tanggal</th>
                        <th>Nama</th>
                        <th>Datang</th>
                        <th>Pulang</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($present as $row): ?>
                        <tr>
                            <td><?php echo pretty_date($row['present_date'], 'l, d m Y', FALSE) ?></td>
                            <td><?php echo $row['member_full_name'] ?></td>
                            <td><?php echo $row['present_entry_time'] ?></td>
                            <td><?php echo $row['present_out_time'] ?></td>
                            <td><?php echo ($row['present_is_late'] == 1) ? 'Telat' : 'Hadir' ?></td>
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