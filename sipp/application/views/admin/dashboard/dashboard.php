<?php $this->load->view('admin/datepicker'); ?>
<div class="col-md-12 col-sm-12 col-xs-12 main post-inherit">
    <div class="x_panel post-inherit">
        <h3 class="">
            Daftar Absensi
            <a  data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample" ><span class="glyphicon glyphicon-plus-sign"></span></a>
        </h3>
        <div class="collapse" id="collapseExample">
            <?php echo form_open(current_url()) ?>
            <div class="row">
                <div class="col-md-4">
                    <input type="text" name="member_nip" placeholder="Nip" class="form-control">
                </div>
                <div class="col-md-4">
                    <input type="text" name="present_date" placeholder="Tanggal" value="<?php echo date('Y-m-d') ?>" class="form-control datepicker">
                </div>
                <div class="col-md-2">
                    <select name="present_desc" class="form-control">
                        <option value="Sakit">Sakit</option>
                        <option value="Izin">Izin</option>
                        <option value="Alfa">Alfa</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <input type="submit" class="btn btn-success">
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