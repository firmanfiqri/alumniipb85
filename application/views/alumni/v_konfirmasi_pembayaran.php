<script>
    function foto_change() {
        //check whether browser fully supports all File API
        if (window.File && window.FileReader && window.FileList && window.Blob)
        {
            //get the file size and file type from file input field
            var fsize = $('#foto')[0].files[0].size;

            if (fsize > 100000) //do something if file size more than 1 mb (1048576)
            {
                //alert($("#foto").val());
                $("#foto").val("");
                alert(fsize + " bytes\nUkuran file terlalu besar!");
            } else {
                //alert($("#foto").val());
                //$("#foto").val("");
                //alert(fsize + " bytes\nYou are good to go!");
            }
        } else {
            alert("Please upgrade your browser, because your current browser lacks some new features we need!");
        }
    }
</script>

<div id="background">
<div id="main">	
    <div class="wrapper clearfix">

        <!-- posts list -->
        <div id="posts-list" class="single-post">

            <h2 class="page-heading"><span>KONFIRMASI PEMBAYARAN</span></h2>	

            <article class="format-standard">
                <h3 class="post-heading">EVENT : "<?php echo $peserta->nama_event; ?>"</h3>
                <form id="contactForm" class="isian" action="<?php echo base_url(); ?>alumni/submit_konfirmasi" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id_peserta_event" value="<?php echo $peserta->id_peserta_event; ?>">
                    <table>
                        <tr>
                            <td>No. Registrasi</td>
							<td style="width:20px;"><td>
                            <td><input type="text" class="clearfix" name="noreg" value="<?php echo $peserta->no_registrasi;?>" style="width:225px; height:15px;" required readonly></td>
                        </tr>
						<tr style="height:0px;"></tr>
                        <tr>
                            <td>Rekening Bank Kami</td>
							<td style="width:20px;"><td>
                            <td>
                                <select name="bank_kami" id="fakultas" style="width:225px; height:35px;">
                                    <option value="BCA" selected>BCA</option>                         
                                    <option value="BNI" selected>BNI</option>                         
                                    <option value="Madiri" selected>Mandiri</option>
                                </select>
                            </td>
                        </tr>
						<tr style="height:10px;"></tr>
                        <tr>
                            <td>Atas Nama</td>
							<td style="width:20px;"><td>
                            <td><input type="text" class="clearfix" name="atas_nama" placeholder="Atas Nama" style="width:225px; height:15px;" required></td>
                        </tr>
                        <tr>
                            <td>Jumlah Transfer</td>
							<td style="width:20px;"><td>
                            <td><input type="number" class="clearfix" name="jumlah_transfer" placeholder="Jumlah Transfer" style="width:225px; height:15px;" required></td>
                        </tr>
						<tr style="height:10px;"></tr>
                        <tr>
                            <td>Tanggal Transfer</td>
							<td style="width:20px;"><td>
                            <td><input type="date" class="clearfix" name="tgl_transfer" style="width:225px; height:15px;" required></td>
                        </tr>
                        <tr style="height:10px;"></tr>
                        <tr>
                            <td>Bukti Pembayaran</td>
							<td style="width:20px;"><td>
                            <td><input type="file" id="foto" onchange="foto_change()" name="foto" accept="image/*" ><br>Maks 100KB (Optional)</td>
                        </tr>
                        <tr>
                            <td></td>
							<td style="width:20px;"><td>							
                            <td align="right"><input type="submit" class="clearfix" name="konfirmasi" style="width:60px; height:30px;" ></td>
                        </tr>
                    </table>

                </form>
            </article>

        </div>
        <!-- ENDS posts list -->

        <!-- sidebar -->
        <aside id="sidebar">

            <ul>
                <?php
                $pertama = 0;
                $tahun = 0;
                foreach ($semua_event as $row) {
                    $tahunn = date("Y", strtotime($row->tanggal_event));
                    if ($tahun != $tahunn) {
                        $tahun = $tahunn;
                        $pertama++;
                        if ($pertama == 1) {
                            ?>
                            <li class="block">
                                <h4><?php echo $tahun; ?></h4>
                                <ul>
                                    <?php
                                } else {
                                    ?>
                                </ul>
                            </li>
                            <li class="block">
                                <h4><?php echo $tahun; ?></h4>
                                <ul>
                                    <?php
                                }
                            }
                            ?>
                            <li class="cat-item"><a href="<?php echo base_url(); ?>alumni/detail_event/<?php echo $row->id_event; ?>" title="View all posts"><?php echo $row->nama_event; ?></a></li>                
                            <?php
                        }
                        ?>
                    </ul>
                </li>


            </ul>

            <em id="corner"></em>
        </aside>
        <!-- ENDS sidebar -->

    </div>
</div>