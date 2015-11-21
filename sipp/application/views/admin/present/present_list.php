<?php $this->load->view('admin/datepicker'); ?>
<div class="col-md-12 col-sm-12 col-xs-12 main post-inherit">
    <div class="x_panel post-inherit">
        <h3 class="">
            Daftar Absensi
            <span class="pull-right">
                <a class="btn btn-sm btn-default" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample" ><span class="glyphicon glyphicon-align-justify"></span></a>
                <a class="btn btn-sm btn-success" href="<?php echo site_url('admin/present/export') ?>" ><span class="glyphicon glyphicon-print"></span></a>
            </span>
        </h3>
        <div class="collapse" id="collapseExample">
            <?php echo form_open(current_url()) ?>
            <div class="row">
                <div class="col-md-4">
                    <input type="text" name="nip" placeholder="Nip" class="form-control">
                </div>
                <div class="col-md-3">
                    <input type="text" name="date_start" placeholder="Tanggal Mulai" value="" class="form-control datepicker">
                </div>
                <div class="col-md-3">
                    <input type="text" name="date_end" placeholder="Tanggal Akhir" value="" class="form-control datepicker">
                </div>
                <div class="col-md-2">
                    <input type="submit" class="btn btn-success" value="Filter">
                </div>
            </div>
            <?php echo form_close() ?>
        </div>
        <?php echo validation_errors() ?>
        <br>

        <div class="table-responsive">
            <table class="table table-striped">
                <thead class="gradient">
                    <tr>
                        <th>Tanggal</th>
                        <th>Nama</th>
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
                            <td><?php echo $row['member_full_name'] ?></td>
                            <td><?php echo ($row['present_entry_time'] == NULL) ? '-' : $row['present_entry_time'] ?></td>
                            <td><?php echo ($row['present_out_time'] == NULL) ? '-' : $row['present_out_time'] ?></td>
                            <td><?php echo $row['present_desc'] ?></td>
                            <td><?php echo ($row['present_is_late'] == 1) ? 'Telat' : '-' ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>