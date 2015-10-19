<script>
    $(document).ready(function() {
        $("a[rel=galer_boy]").fancybox({
            'transitionIn': 'none',
            'transitionOut': 'none',
            'titlePosition': 'over',
//		'titleFormat'		: function(title, currentArray, currentIndex, currentOpts) {
//			return '<span id="fancybox-title-over">Image ' + (currentIndex + 1) + ' / ' + currentArray.length + (title.length ? ' &nbsp; ' + title : '') + '</span>';
//		}
        });
    });
</script>

<div class="coloumn">
    <div class="title">Gallery Foto</div>
    <?php
    if ($foto_gallery) {
        foreach ($foto_gallery as $k => $v) {
            ?>
            <div style='float:left;width:255px;height:200px;margin-bottom:32px;margin-right:5px;margin-left: 5px'>
                <a rel='galer_boy' href='<?= base_url() ?>repository/foto/gallery/<?= $v['filename'] ?>' title="<?= $v['title'] ?> - <?= $v['tanggal_upload'] ?>"><img src='<?= base_url() ?>repository/foto/gallery/<?= $v['filename'] ?>'  style='width:260px;height:195px;margin-bottom:2px;margin-right:5px;'></a>
                <center><?= $v['title'] ?></center>
            </div>
            <?php
        }
    }
    ?>
</div>
