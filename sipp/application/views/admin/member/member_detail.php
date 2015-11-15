<div class="col-md-12 col-sm-12 col-xs-12 main post-inherit">
    <div class="x_panel post-inherit">
        <div class="col-md-12 main">
            <h3>
                Detail Peserta
                <span class=" pull-right">
                    <a href="<?php echo site_url('admin/member') ?>" class="btn btn-info btn-sm"><span class="fa fa-arrow-left"></span>&nbsp; Kembali</a> 
                    <a href="<?php echo site_url('admin/member/edit/' . $member['member_id']) ?>" class="btn btn-success btn-sm"><span class="fa fa-edit"></span>&nbsp; Edit</a> 
                </span>
            </h3><br>
        </div>
        <div class="col-md-2">
            <?php if (!empty($member['member_image'])) { ?>
                <img src="<?php echo upload_url('member_photo/'.$member['member_image']) ?>" class="img-responsive ava-detail">
            <?php } else { ?>
                <img src="<?php echo base_url('media/image/missing-image.png') ?>" class="img-responsive ava-detail">
            <?php } ?>
        </div>
        <div class="col-md-8">
            <table class="table table-striped">
                <tbody>
                    <tr>
                        <td>Nip</td>
                        <td>:</td>
                        <td><?php echo $member['member_nip'] ?></td>
                    </tr>
                    <tr>
                        <td>Nama Singkat</td>
                        <td>:</td>
                        <td><?php echo $member['username'] ?></td>
                    </tr>
                    <tr>
                        <td>Nama Lengkap</td>
                        <td>:</td>
                        <td><?php echo $member['member_full_name'] ?></td>
                    </tr>
                    <tr>
                        <td>Jenis Kelamin</td>
                        <td>:</td>
                        <td><?php echo ($member['member_sex'] == 'MALE') ? 'Laki-laki' : 'Perempuan' ?></td>
                    </tr>
                    <tr>
                        <td>Tempat/Tanggal Lahir</td>
                        <td>:</td>
                        <td><?php echo $member['member_birth_place'] . ', ' . pretty_date($member['member_birth_date'], 'd m Y', FALSE) ?></td>
                    </tr>
                    <tr>
                        <td>Asal Sekolah</td>
                        <td>:</td>
                        <td><?php echo $member['member_school'] ?></td>
                    </tr>
                    <tr>
                        <td>Guru Pembimbing</td>
                        <td>:</td>
                        <td><?php echo $member['member_mentor'] ?></td>
                    </tr>
                    <tr>
                        <td>No. Telepon</td>
                        <td>:</td>
                        <td><?php echo $member['member_phone'] ?></td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>:</td>
                        <td><?php echo ($member['member_address'] == NULL) ? '-' : $member['member_address'] ?></td>
                    </tr>
                    <tr>
                        <td>Bagian</td>
                        <td>:</td>
                        <td><?php echo $member['member_division'] ?></td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td>:</td>
                        <td><?php echo ($member['member_division'] == 0) ? 'Non-Aktif' : 'Aktif' ?></td>
                    </tr>
                    <tr>
                        <td>Tanggal Daftar</td>
                        <td>:</td>
                        <td><?php echo pretty_date($member['member_input_date'], 'l, d m Y', FALSE) ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
