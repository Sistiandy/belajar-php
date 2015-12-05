<html>
    <head>
    </head>
    <body>
        <div style="padding:0px 0px;">

            <strong><u><h4 style="padding-bottom: 0px   " align="center">SURAT KETERANGAN MAGANG KERJA</h4></u></strong>
            <h5 style="padding-top: 0px" align="center">008/SAT-HRA/CLS2/XI/2015</h5>

            <p align="justify">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Yang bertanda tangan dibawah ini :</p>

            <table border="0">
                <tbody>
                    <tr>
                        <td>Nama</td>
                        <td>:</td>
                        <td>TATI NUTHAYATI</td>
                    </tr>
                    <tr>
                        <td>Jabatan</td>
                        <td>:</td>
                        <td>People Development Manager</td>
                    </tr>
                    <tr>
                        <td>Perusahaan</td>
                        <td>:</td>
                        <td>PT. Sumber Alfaria Trijaya, Tbk</td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>:</td>
                        <td>Kawasan Industri Menara Permai Kav.18 Jl. Raya Narogong KM. 23,8 Cileungsi </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>Bogor 16820 </td>
                    </tr>
                </tbody>
            </table>
            <br>
            <p align="justify">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Menerangkan bahwa :</p>
             <table border="0">
                <tbody>
                    <tr>
                        <td>Nama</td>
                        <td>:</td>
                        <td><?php echo $member['member_full_name'] ?></td>
                    </tr>
                    <tr>
                        <td>Asal Sekolah</td>
                        <td>:</td>
                        <td><?php echo $member['member_school'] ?></td>
                    </tr>
                    <tr>
                        <td>Dept. Magang</td>
                        <td>:</td>
                        <td><?php echo $member['member_division'] ?></td>
                    </tr>
                </tbody>
             </table>
            <br>
            <p align="justify">Bahwa yang bersankutan telah melaksanakan kegiatan magang kerja di PT. Sumber Alfaria Trijaya, Tbk, magang kerja tersebut telah dilaksanakan selama 3 bulan, yaitu mulai tanggal <?php echo pretty_date( $member['member_input_date'],'d F Y',false) ?> s/d tanggal <?php echo pretty_date( $member['member_last_update'],'d F Y',false) ?>.</p>
            
            <p align="justify">Selama bekerja, yang bersangkutan telah menunjukan presetasi dan dedikasi yang baik, Manajemen mengucapkan terima kasih atas partisipasinya selama magang di perusahaan.</p>
            
            <p align="justify">Demikian Surat Keterangan Magang ini dibuat dengan sebenarnya, untuk dapat dipergunakan seperlunya.</p>

            <br>
            <strong><i><h4 align="justify">Cileungsi, <?php echo pretty_date(date('Y-m-d'), 'd F Y',false)?></h4></i></strong>
            <strong><i align="justify">PT. Sumber Alfaria Trijaya, Tbk</i></strong>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <strong><u align="justify">TATI NURHAYATI</u></strong>
            <strong><p><i align="justify">People Development Manager</i></p></strong>
        </div>
    </body>
</html>