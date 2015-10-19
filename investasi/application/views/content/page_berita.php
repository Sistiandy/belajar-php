<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/style-form.css" media="screen" />
<style>
    .tgl_na{font-style:italic; font-size:12px; color:#999999; font-weight:bold;}
</style>
<div class="text_field">
    <h1><?= $isi->judul_berita ?></h1>
    <span class="tgl_na"><?= $isi->tempat ?>,&nbsp;<?= $isi->tanggal ?></span>
    <br />
    <img src="<?= base_url() ?>repository/foto/berita/<?= $isi->gambar ?>" class="thumb" width="250"><?= $isi->isi_berita ?>
    <br>

    <div class="coloumn" style='width:92%;'>
        <div class="post-wrapper">
            <?php
            if (count($comment) > 0) {
                foreach ($comment as $row):
                    ?>
                    <div class="comment-content">
                        <div class="comment-top">
                            <div class="datecreate">Tanggal Komentar : <? echo $row['comment_date'] ?></div>
                            <div class="name-user" style='margin-left:15px;'><b><? echo $row['comment_name'] ?> - <? echo $row['comment_email'] ?></b></div>
                        </div> <hr />
                        <div class="comment-middle">
                            <table>
                                <tr>
                                    <td class="avatar-ctn">
                                        <img style='margin-left:15px;' src="<?= base_url() ?>assets/img/avatar.png" class="avatar" width="80"/> <br />
                                    </td>
                                    <td class="text-content">
                                        <div class="topic-title"><? echo $row['comment_name'] ?></div>
                                        <div class="topic-content"><? echo $row['comment_description'] ?></div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="comment-bottom"></div> 
                    </div>
                    <hr />
                <?php endforeach;
            }else { ?>
                <center><i>Tidak ada komentar</i></center>
<?php }; ?>
        </div>
        <!--<div id='komentar' style='margin-top:5px;margin-bottom:5px;'></div>-->
        <div id='form-kom' style='display:none;'>
            <div id="signup-form">
                <form name="formComment" method='post' id="formposting" action="<?= base_url() ?>news/comment" >	
                    <input type="hidden" name="berita_id" value="<?= $isi->id ?>" />
                    <p>
                        <label >Nama</label>
                        <input type="text" id='nama_pengirim' name="comment_name" value=''/>
                    </p>
                    <p>
                        <label >Email</label>
                        <input type="text" name="comment_email" id="email_pengirim"  />
                    </p>
                    <p>
                        <label >Komentar/Pertanyaan Anda</label>
                        <textarea name='comment_description' id='isi_komentar' rows='5'></textarea>
                    </p>
                </form>
                <button id='submit_komen' class="submitete">Submit Komentar</button>
            </div>
        </div>
        <br />
        <button id='post_komentar' class="submitete" >Post Komentar</button>

    </div>

    <script>
        var posting_id = "<?= $isi->id ?>";

        $('#komentar').html('<center><img src="' + host + 'assets/images/loading.gif"><br /> &nbsp;&nbsp;Memuat Komentar</center>')
        $.post(host + 'viewkomentar', {'thid': posting_id}, function(resp) {
            $('#komentar').html(resp);
        });

        $('#post_komentar').on('click', function() {
            $('#form-kom').css('display', 'inline');
            $('#nama_pengirim').val('');
            $('#email_pengirim').val('');
            $('#isi_komentar').val('');
        });

        $('#submit_komen').live('click', function() {
            submitform1('formposting', function(resp) {
                if (resp == 1) {
                    $('#form-kom').css('display', 'none');
                    $('#nama_pengirim').val('');
                    $('#email_pengirim').val('');
                    $('#isi_komentar').val('');

                    $('#komentar').html('<center><img src="' + host + 'assets/images/loading.gif"><br /> &nbsp;&nbsp;Memuat Komentar</center>')
                    $.post(host + 'viewkomentar', {'thid': posting_id}, function(resp) {
                        $('#komentar').html(resp);
                    });
                    alert('Terima Kasih, Komentar Anda Akan Diverifikasi Terlebih Dahulu.');
                } else {
                    alert('Sistem Gagal');
                }
            });
            return false;
        });
    </script>
</div>