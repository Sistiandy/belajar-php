SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';


-- -----------------------------------------------------
-- Table `cl_charttable`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `cl_charttable` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `cl_subkategori_content_id` INT(11) NULL DEFAULT NULL ,
  `nama_table` VARCHAR(100) NULL DEFAULT NULL ,
  `tipe_chart` VARCHAR(100) NULL DEFAULT NULL ,
  `multi_chart` VARCHAR(1) NULL DEFAULT NULL ,
  `nama_xaxis` VARCHAR(200) NULL DEFAULT NULL ,
  `nama_yaxis` VARCHAR(200) NULL DEFAULT NULL ,
  `code_number` VARCHAR(10) NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
AUTO_INCREMENT = 17
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_swedish_ci;


-- -----------------------------------------------------
-- Table `cl_kab_kota`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `cl_kab_kota` (
  `KODE_PROPINSI` VARCHAR(5) NOT NULL ,
  `KODE_KAB_KOTA` VARCHAR(5) NOT NULL ,
  `NAMA_KAB_KOTA` VARCHAR(80) NULL DEFAULT NULL ,
  `ID_NO` DECIMAL(65,30) NULL DEFAULT NULL ,
  PRIMARY KEY (`KODE_PROPINSI`, `KODE_KAB_KOTA`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_swedish_ci;


-- -----------------------------------------------------
-- Table `cl_kategori_content`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `cl_kategori_content` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `kategori_profil` VARCHAR(100) NULL DEFAULT NULL ,
  `description` VARCHAR(200) NULL DEFAULT NULL ,
  `flag_menu` VARCHAR(5) NULL DEFAULT NULL ,
  `identifier` VARCHAR(100) NULL DEFAULT NULL ,
  `flag_submenu` VARCHAR(5) NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
AUTO_INCREMENT = 10
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_swedish_ci;


-- -----------------------------------------------------
-- Table `cl_kecamatan`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `cl_kecamatan` (
  `kode` VARCHAR(5) NOT NULL DEFAULT '' ,
  `nama_kecamatan` VARCHAR(200) NULL DEFAULT NULL ,
  `deskripsi` VARCHAR(200) NULL DEFAULT NULL ,
  PRIMARY KEY (`kode`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_swedish_ci;


-- -----------------------------------------------------
-- Table `cl_komoditi`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `cl_komoditi` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `cl_sektor_potensi_id` INT(11) NULL DEFAULT NULL ,
  `komoditi` VARCHAR(100) NULL DEFAULT NULL ,
  `deskripsi` VARCHAR(200) NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
AUTO_INCREMENT = 8
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_swedish_ci;


-- -----------------------------------------------------
-- Table `cl_sektor_potensi`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `cl_sektor_potensi` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `cl_subkategori_content_id` INT(11) NULL DEFAULT NULL ,
  `deskripsi` VARCHAR(200) NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
AUTO_INCREMENT = 4
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_swedish_ci;


-- -----------------------------------------------------
-- Table `cl_subkategori_content`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `cl_subkategori_content` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `cl_kategori_content_id` INT(11) NULL DEFAULT NULL ,
  `sub_kategori` VARCHAR(200) NULL DEFAULT NULL ,
  `flag_sub` VARCHAR(1) NULL DEFAULT NULL ,
  `description` VARCHAR(200) NULL DEFAULT NULL ,
  `flag_chart` VARCHAR(2) NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `FK_cl_subkategori_content` (`cl_kategori_content_id` ASC) )
ENGINE = InnoDB
AUTO_INCREMENT = 44
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_swedish_ci;


-- -----------------------------------------------------
-- Table `cl_subkategori_content_old`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `cl_subkategori_content_old` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `cl_kategori_content_id` INT(11) NULL DEFAULT NULL ,
  `sub_kategori` VARCHAR(200) NULL DEFAULT NULL ,
  `flag_sub` VARCHAR(1) NULL DEFAULT NULL ,
  `description` VARCHAR(200) NULL DEFAULT NULL ,
  `flag_chart` VARCHAR(2) NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
AUTO_INCREMENT = 31
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_swedish_ci;


-- -----------------------------------------------------
-- Table `cl_user_group`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `cl_user_group` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `nama_group` VARCHAR(50) NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_swedish_ci;


-- -----------------------------------------------------
-- Table `tbl_addtionalgambar_artikel`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `tbl_addtionalgambar_artikel` (
  `id` BIGINT(20) NOT NULL AUTO_INCREMENT ,
  `tbl_artikel_id` BIGINT(20) NULL DEFAULT NULL ,
  `gambar_additional` VARCHAR(100) NULL DEFAULT NULL ,
  `create_date` DATE NULL DEFAULT NULL ,
  `create_by` VARCHAR(100) NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_swedish_ci;


-- -----------------------------------------------------
-- Table `tbl_artikel`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `tbl_artikel` (
  `id` BIGINT(20) NOT NULL AUTO_INCREMENT ,
  `judul_artikel` VARCHAR(200) NULL DEFAULT NULL ,
  `tanggal` DATETIME NULL DEFAULT NULL ,
  `isi_artikel` TEXT NULL DEFAULT NULL ,
  `gambar_utama` VARCHAR(100) NULL DEFAULT NULL ,
  `create_date` DATE NULL DEFAULT NULL ,
  `create_by` VARCHAR(100) NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_swedish_ci;


-- -----------------------------------------------------
-- Table `tbl_arus_petikemas`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `tbl_arus_petikemas` (
  `id` BIGINT(20) NOT NULL AUTO_INCREMENT ,
  `tahun` INT(11) NULL DEFAULT NULL ,
  `bongkar` DOUBLE NULL DEFAULT NULL ,
  `muat` DOUBLE NULL DEFAULT NULL ,
  `export` DOUBLE NULL DEFAULT NULL ,
  `import` DOUBLE NULL DEFAULT NULL ,
  `flag` VARCHAR(1) NULL DEFAULT NULL ,
  `create_date` DATETIME NULL DEFAULT NULL ,
  `create_by` VARCHAR(100) NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
AUTO_INCREMENT = 17
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_swedish_ci;


-- -----------------------------------------------------
-- Table `tbl_berita`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `tbl_berita` (
  `id` BIGINT(20) NOT NULL AUTO_INCREMENT ,
  `judul_berita` VARCHAR(200) NULL DEFAULT NULL ,
  `tempat` VARCHAR(200) NULL DEFAULT NULL ,
  `tanggal` DATETIME NULL DEFAULT NULL ,
  `kutipan` VARCHAR(200) NULL DEFAULT NULL ,
  `isi_berita` TEXT NULL DEFAULT NULL ,
  `gambar` VARCHAR(100) NULL DEFAULT NULL ,
  `create_date` DATE NULL DEFAULT NULL ,
  `create_by` VARCHAR(100) NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
AUTO_INCREMENT = 12
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_swedish_ci;


-- -----------------------------------------------------
-- Table `tbl_content`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `tbl_content` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `cl_subkategori_content_id` INT(11) NULL DEFAULT NULL ,
  `cl_kategori_id` INT(11) NULL DEFAULT NULL ,
  `isi` TEXT NULL DEFAULT NULL ,
  `gambar` VARCHAR(100) NULL DEFAULT NULL ,
  `create_date` DATE NULL DEFAULT NULL ,
  `create_by` VARCHAR(100) NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
AUTO_INCREMENT = 45
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_swedish_ci;


-- -----------------------------------------------------
-- Table `tbl_content_old`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `tbl_content_old` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `cl_subkategori_content_id` INT(11) NULL DEFAULT NULL ,
  `isi` TEXT NULL DEFAULT NULL ,
  `gambar` VARCHAR(100) NULL DEFAULT NULL ,
  `create_date` DATE NULL DEFAULT NULL ,
  `create_by` VARCHAR(100) NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
AUTO_INCREMENT = 20
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_swedish_ci;


-- -----------------------------------------------------
-- Table `tbl_forum_komentar`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `tbl_forum_komentar` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `nama_pengirim` VARCHAR(255) NULL DEFAULT NULL ,
  `email_pengirim` VARCHAR(255) NULL DEFAULT NULL ,
  `isi_komentar` TEXT NULL DEFAULT NULL ,
  `threadid` INT(11) NULL DEFAULT NULL ,
  `createdate` DATETIME NULL DEFAULT NULL ,
  `approval` VARCHAR(1) NULL DEFAULT NULL ,
  `approval_date` DATETIME NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
AUTO_INCREMENT = 11
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_swedish_ci;


-- -----------------------------------------------------
-- Table `tbl_forum_map`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `tbl_forum_map` (
  `forumid` INT(11) NOT NULL AUTO_INCREMENT ,
  `forum_name` VARCHAR(255) NULL DEFAULT NULL ,
  `parent` VARCHAR(11) NULL DEFAULT NULL ,
  `datecreate` DATETIME NULL DEFAULT NULL ,
  `createdby` VARCHAR(11) NULL DEFAULT NULL ,
  `forum_info` TEXT NULL DEFAULT NULL ,
  `status` TINYINT(1) NULL DEFAULT NULL COMMENT '1=aktif, 0=non aktif' ,
  `level` TINYINT(1) NULL DEFAULT NULL COMMENT '0=main forum, 1=sub forum' ,
  `permalink` VARCHAR(300) NULL DEFAULT NULL ,
  PRIMARY KEY (`forumid`) )
ENGINE = InnoDB
AUTO_INCREMENT = 12
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `tbl_forum_thread`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `tbl_forum_thread` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `forumid` VARCHAR(11) NULL DEFAULT NULL ,
  `thread_title` VARCHAR(255) NULL DEFAULT NULL ,
  `thread_content` TEXT NULL DEFAULT NULL ,
  `status` TINYINT(1) NULL DEFAULT NULL COMMENT '1=aktif, 0=non aktif' ,
  `createdate` DATETIME NULL DEFAULT NULL ,
  `editdate` DATETIME NULL DEFAULT NULL ,
  `create_by` VARCHAR(200) NULL DEFAULT NULL ,
  `permalink` VARCHAR(300) NULL DEFAULT NULL ,
  `replyon` INT(11) NULL DEFAULT '0' ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
AUTO_INCREMENT = 8
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `tbl_forum_user`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `tbl_forum_user` (
  `userid` INT(11) NOT NULL AUTO_INCREMENT ,
  `username` VARCHAR(32) NULL DEFAULT NULL ,
  `password` VARCHAR(255) NULL DEFAULT NULL ,
  `fullname` VARCHAR(255) NULL DEFAULT NULL ,
  `avatar` VARCHAR(255) NULL DEFAULT NULL ,
  `status` TINYINT(1) NULL DEFAULT NULL COMMENT '1=aktif,0=non aktif' ,
  `joindate` DATETIME NULL DEFAULT NULL ,
  PRIMARY KEY (`userid`) )
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `tbl_headline`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `tbl_headline` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `judul` VARCHAR(200) NULL DEFAULT NULL ,
  `isi` TEXT NULL DEFAULT NULL ,
  `create_date` DATE NULL DEFAULT NULL ,
  `create_by` VARCHAR(100) NULL DEFAULT NULL ,
  `gambar` VARCHAR(200) NULL DEFAULT NULL ,
  `style` VARCHAR(100) NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
AUTO_INCREMENT = 4
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_swedish_ci;


-- -----------------------------------------------------
-- Table `tbl_jml_kelurahan`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `tbl_jml_kelurahan` (
  `id` BIGINT(20) NOT NULL AUTO_INCREMENT ,
  `tahun` INT(11) NULL DEFAULT NULL ,
  `cl_kecamatan_kode` VARCHAR(5) NULL DEFAULT NULL ,
  `jml_kelurahan` INT(11) NULL DEFAULT NULL ,
  `jml_rt` INT(11) NULL DEFAULT NULL ,
  `jml_rw` INT(11) NULL DEFAULT NULL ,
  `create_date` DATETIME NULL DEFAULT NULL ,
  `create_by` VARCHAR(100) NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
AUTO_INCREMENT = 17
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_swedish_ci;


-- -----------------------------------------------------
-- Table `tbl_kendaraan_uji_dephub`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `tbl_kendaraan_uji_dephub` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `tahun` INT(11) NULL DEFAULT NULL ,
  `penumpang` DOUBLE NULL DEFAULT NULL ,
  `bus` DOUBLE NULL DEFAULT NULL ,
  `truk` DOUBLE NULL DEFAULT NULL ,
  `pick_up` DOUBLE NULL DEFAULT NULL ,
  `khusus` DOUBLE NULL DEFAULT NULL ,
  `tangki` DOUBLE NULL DEFAULT NULL ,
  `tempelan` DOUBLE NULL DEFAULT NULL ,
  `create_by` VARCHAR(100) NULL DEFAULT NULL ,
  `create_date` DATETIME NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
AUTO_INCREMENT = 8
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_swedish_ci;


-- -----------------------------------------------------
-- Table `tbl_kependudukan`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `tbl_kependudukan` (
  `id` INT(10) NOT NULL AUTO_INCREMENT ,
  `tahun` INT(5) NULL DEFAULT NULL ,
  `jumlah_penduduk` DOUBLE NULL DEFAULT NULL ,
  `jumlah_pencari_kerja` FLOAT(11) NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
AUTO_INCREMENT = 8
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_swedish_ci;


-- -----------------------------------------------------
-- Table `tbl_komoditi_value`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `tbl_komoditi_value` (
  `id` BIGINT(20) NOT NULL AUTO_INCREMENT ,
  `cl_komoditi_id` INT(11) NULL DEFAULT NULL ,
  `tahun` INT(11) NULL DEFAULT NULL ,
  `jumlah` FLOAT(11) NULL DEFAULT NULL ,
  `satuan` VARCHAR(5) NULL DEFAULT NULL ,
  `create_date` DATE NULL DEFAULT NULL ,
  `create_by` VARCHAR(100) NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
AUTO_INCREMENT = 38
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_swedish_ci;


-- -----------------------------------------------------
-- Table `tbl_kondisi_jalan`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `tbl_kondisi_jalan` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `tahun` INT(11) NULL DEFAULT NULL ,
  `panjang_jalan` DOUBLE NULL DEFAULT NULL ,
  `baik` DOUBLE NULL DEFAULT NULL ,
  `sedang` DOUBLE NULL DEFAULT NULL ,
  `ringan` DOUBLE NULL DEFAULT NULL ,
  `berat` DOUBLE NULL DEFAULT NULL ,
  `create_by` VARCHAR(100) NULL DEFAULT NULL ,
  `create_date` DATETIME NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
AUTO_INCREMENT = 8
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_swedish_ci;


-- -----------------------------------------------------
-- Table `tbl_kunjungan_kapal`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `tbl_kunjungan_kapal` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `tahun` INT(11) NULL DEFAULT NULL ,
  `samudra` DOUBLE NULL DEFAULT NULL ,
  `nusantara` DOUBLE NULL DEFAULT NULL ,
  `khusus` DOUBLE NULL DEFAULT NULL ,
  `lokal` DOUBLE NULL DEFAULT NULL ,
  `create_by` VARCHAR(100) NULL DEFAULT NULL ,
  `create_date` DATETIME NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
AUTO_INCREMENT = 8
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_swedish_ci;


-- -----------------------------------------------------
-- Table `tbl_kunjungan_kapal_tambatan`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `tbl_kunjungan_kapal_tambatan` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `tahun` INT(11) NULL DEFAULT NULL ,
  `dermaga_umum` DOUBLE NULL DEFAULT NULL ,
  `dermaga_khusus` DOUBLE NULL DEFAULT NULL ,
  `create_date` DATETIME NULL DEFAULT NULL ,
  `create_by` VARCHAR(100) NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
AUTO_INCREMENT = 8
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_swedish_ci;


-- -----------------------------------------------------
-- Table `tbl_luas_wilayah_kecamatan`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `tbl_luas_wilayah_kecamatan` (
  `id` BIGINT(20) NOT NULL AUTO_INCREMENT ,
  `cl_kecamatan_kode` VARCHAR(5) NULL DEFAULT NULL ,
  `tahun` INT(11) NULL DEFAULT NULL ,
  `luas_wilayah` DOUBLE NULL DEFAULT NULL ,
  `persentase` DOUBLE NULL DEFAULT NULL ,
  `create_date` DATETIME NULL DEFAULT NULL ,
  `create_by` VARCHAR(100) NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
AUTO_INCREMENT = 15
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_swedish_ci;


-- -----------------------------------------------------
-- Table `tbl_makro_pertumbuhan_ekonomi`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `tbl_makro_pertumbuhan_ekonomi` (
  `id` BIGINT(20) NOT NULL AUTO_INCREMENT ,
  `tahun` INT(11) NULL DEFAULT NULL ,
  `lapangan_kerja` VARCHAR(200) NULL DEFAULT NULL ,
  `jumlah` DOUBLE NULL DEFAULT NULL ,
  `create_date` DATETIME NULL DEFAULT NULL ,
  `create_by` VARCHAR(100) NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
AUTO_INCREMENT = 20
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_swedish_ci;


-- -----------------------------------------------------
-- Table `tbl_menu_frontend`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `tbl_menu_frontend` (
  `id_menu_frontend` INT(11) NOT NULL AUTO_INCREMENT ,
  `menu_name` VARCHAR(30) NOT NULL ,
  `stat` ENUM('A','T') NOT NULL ,
  `url` VARCHAR(50) NULL DEFAULT NULL ,
  `group_na` ENUM('F','B') NOT NULL ,
  `have_sub_menu` ENUM('Y','N') NULL DEFAULT NULL ,
  PRIMARY KEY (`id_menu_frontend`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_swedish_ci;


-- -----------------------------------------------------
-- Table `tbl_multimedia`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `tbl_multimedia` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `title` VARCHAR(255) NOT NULL ,
  `filename` VARCHAR(255) NULL DEFAULT NULL ,
  `kategori_file` VARCHAR(5) NULL DEFAULT NULL ,
  `tanggal_upload` DATE NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
AUTO_INCREMENT = 31
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_swedish_ci;


-- -----------------------------------------------------
-- Table `tbl_pad`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `tbl_pad` (
  `id` BIGINT(20) NOT NULL AUTO_INCREMENT ,
  `tahun` INT(11) NULL DEFAULT NULL ,
  `target` DOUBLE NULL DEFAULT NULL ,
  `realisasi` DOUBLE NULL DEFAULT NULL ,
  `create_date` DATETIME NULL DEFAULT NULL ,
  `create_by` VARCHAR(100) NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
AUTO_INCREMENT = 4
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_swedish_ci;


-- -----------------------------------------------------
-- Table `tbl_panjang_jalan`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `tbl_panjang_jalan` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `tahun` INT(11) NULL DEFAULT NULL ,
  `arteri` DOUBLE NULL DEFAULT NULL ,
  `kolektor` DOUBLE NULL DEFAULT NULL ,
  `lokal` DOUBLE NULL DEFAULT NULL ,
  `inspeksi_kanal` DOUBLE NULL DEFAULT NULL ,
  `create_by` VARCHAR(100) NULL DEFAULT NULL ,
  `create_date` DATETIME NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
AUTO_INCREMENT = 8
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_swedish_ci;


-- -----------------------------------------------------
-- Table `tbl_pdrb`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `tbl_pdrb` (
  `id` BIGINT(20) NOT NULL AUTO_INCREMENT ,
  `tahun` INT(11) NULL DEFAULT NULL ,
  `pmdn` FLOAT(11) NULL DEFAULT NULL ,
  `satuan_pmdn` VARCHAR(10) NULL DEFAULT NULL ,
  `pma` FLOAT(11) NULL DEFAULT NULL ,
  `satuan_pma` VARCHAR(10) NULL DEFAULT NULL ,
  `pdrb` FLOAT(11) NULL DEFAULT NULL ,
  `satuan_pdrb` VARCHAR(10) NULL DEFAULT NULL ,
  `create_date` DATE NULL DEFAULT NULL ,
  `create_by` VARCHAR(100) NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
AUTO_INCREMENT = 7
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_swedish_ci;


-- -----------------------------------------------------
-- Table `tbl_perbankan`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `tbl_perbankan` (
  `id` BIGINT(20) NOT NULL AUTO_INCREMENT ,
  `tahun` INT(11) NULL DEFAULT NULL ,
  `pinjaman` DOUBLE NULL DEFAULT NULL ,
  `pinjaman_investasi` DOUBLE NULL DEFAULT NULL ,
  `create_date` DATETIME NULL DEFAULT NULL ,
  `create_by` VARCHAR(100) NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
AUTO_INCREMENT = 4
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_swedish_ci;


-- -----------------------------------------------------
-- Table `tbl_pertumbuhan_ekonomi`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `tbl_pertumbuhan_ekonomi` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `tahun` INT(11) NULL DEFAULT NULL ,
  `pdrb` FLOAT(11) NULL DEFAULT NULL ,
  `satuan_pdrb` VARCHAR(100) NULL DEFAULT NULL ,
  `pendatan_kapita` FLOAT(11) NULL DEFAULT NULL ,
  `satuan_pendapatan` VARCHAR(100) NULL DEFAULT NULL ,
  `inflasi` FLOAT(11) NULL DEFAULT NULL ,
  `create_date` DATE NULL DEFAULT NULL ,
  `create_by` VARCHAR(100) NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
AUTO_INCREMENT = 6
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_swedish_ci;


-- -----------------------------------------------------
-- Table `tbl_pertumbuhan_penduduk`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `tbl_pertumbuhan_penduduk` (
  `id` BIGINT(20) NOT NULL AUTO_INCREMENT ,
  `tahun` INT(11) NULL DEFAULT NULL ,
  `jml_pertumbuhan_penduduk` DOUBLE NULL DEFAULT NULL ,
  `create_date` DATETIME NULL DEFAULT NULL ,
  `create_by` VARCHAR(100) NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
AUTO_INCREMENT = 6
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_swedish_ci;


-- -----------------------------------------------------
-- Table `tbl_profil`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `tbl_profil` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `konten` TEXT NULL DEFAULT NULL ,
  `kategori` VARCHAR(10) NULL DEFAULT NULL ,
  `create_date` DATETIME NULL DEFAULT NULL ,
  `create_by` VARCHAR(100) NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_swedish_ci;


-- -----------------------------------------------------
-- Table `tbl_rata2_ekonomi`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `tbl_rata2_ekonomi` (
  `id` BIGINT(20) NOT NULL AUTO_INCREMENT ,
  `tahun` INT(11) NULL DEFAULT NULL ,
  `cl_kab_kota_kode` VARCHAR(5) NULL DEFAULT NULL ,
  `rata` DOUBLE NULL DEFAULT NULL ,
  `create_date` DATETIME NULL DEFAULT NULL ,
  `create_by` VARCHAR(100) NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
AUTO_INCREMENT = 24
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_swedish_ci;


-- -----------------------------------------------------
-- Table `tbl_sambungan_telp`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `tbl_sambungan_telp` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `tahun` INT(11) NULL DEFAULT NULL ,
  `pelanggan` DOUBLE NULL DEFAULT NULL ,
  `line_service` DOUBLE NULL DEFAULT NULL ,
  `connected_line` DOUBLE NULL DEFAULT NULL ,
  `create_date` DATETIME NULL DEFAULT NULL ,
  `create_by` VARCHAR(100) NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
AUTO_INCREMENT = 8
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_swedish_ci;


-- -----------------------------------------------------
-- Table `tbl_sub_menu_frontend`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `tbl_sub_menu_frontend` (
  `id_sub_menu` INT(11) NOT NULL AUTO_INCREMENT ,
  `sub_menu_name` VARCHAR(30) NULL DEFAULT NULL ,
  `url` VARCHAR(50) NULL DEFAULT NULL ,
  `stat` ENUM('A','T') NULL DEFAULT NULL ,
  `id_menu` INT(11) NULL DEFAULT NULL ,
  PRIMARY KEY (`id_sub_menu`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_swedish_ci;


-- -----------------------------------------------------
-- Table `tbl_user`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `tbl_user` (
  `user_id` VARCHAR(20) NOT NULL DEFAULT '' ,
  `group_user_id` INT(11) NULL DEFAULT NULL ,
  `password` VARCHAR(20) NULL DEFAULT NULL ,
  `nama_lengkap` VARCHAR(100) NULL DEFAULT NULL ,
  `email` VARCHAR(50) NULL DEFAULT NULL ,
  `alamat` TEXT NULL DEFAULT NULL ,
  `telp` VARCHAR(15) NULL DEFAULT NULL ,
  `hp` VARCHAR(15) NULL DEFAULT NULL ,
  `tgl_buat` DATE NULL DEFAULT NULL ,
  `status_user` VARCHAR(1) NULL DEFAULT NULL ,
  `foto` VARCHAR(30) NULL DEFAULT NULL ,
  `update_date` DATE NULL DEFAULT NULL ,
  PRIMARY KEY (`user_id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_swedish_ci;


-- -----------------------------------------------------
-- Table `tbl_user_group_menu`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `tbl_user_group_menu` (
  `cl_user_group_id` INT(11) NULL DEFAULT NULL ,
  `tbl_menu_grouping_id` INT(11) NULL DEFAULT NULL )
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_swedish_ci;


-- -----------------------------------------------------
-- Table `tbl_news_comment`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `tbl_news_comment` (
  `comment_id` INT NOT NULL AUTO_INCREMENT ,
  `comment_name` VARCHAR(255) NULL ,
  `comment_email` VARCHAR(255) NULL ,
  `comment_date` TIMESTAMP NULL ,
  `comment_description` TEXT NULL ,
  `comment_is_publish` TINYINT(1) NULL DEFAULT 0 COMMENT '0=Draft, 1=publish' ,
  `berita_id` BIGINT(20) NULL ,
  PRIMARY KEY (`comment_id`) ,
  INDEX `fk_tbl_news_comment_tbl_berita_idx` (`berita_id` ASC) ,
  CONSTRAINT `fk_tbl_news_comment_tbl_berita`
    FOREIGN KEY (`berita_id` )
    REFERENCES `tbl_berita` (`id` )
    ON DELETE SET NULL
    ON UPDATE SET NULL)
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
