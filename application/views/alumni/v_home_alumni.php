<?php

function nominalisasi($biaya) {
    $harga = $biaya;

    $jml = strlen($harga);
    $rupiah = "";

    while ($jml > 3) {
        $rupiah = "." . substr($harga, -3) . $rupiah;
        $l = strlen($harga) - 3;
        $harga = substr($harga, 0, $l);
        $jml = strlen($harga);
    }
    $rupiah = $harga . $rupiah . ",-";

    return $rupiah;
}
?>

<div id="background">
<!-- MAIN -->
<div id="main">	
    <div class="wrapper clearfix">

        <h2 class="page-heading"><span>Reuni Akbar Alumni IPB 1985</span></h2>	
        <br />

        <!-- project content -->
        <div id="project-content" class="clearfix">


            <div id="posts-list" class="single-post">

            
            <article class="format-standard">
                <?php
                $nama_bulan = array("00" => "", "01" => "Januari", "02" => "Februari", "03" => "Maret", "04" => "April", "05" => "Mei", "06" => "Juni", "07" => "Juli", "08" => "Agustus", "09" => "September", "10" => "Oktober", "11" => "November", "12" => "Desember");
                $tanggal = date("d", strtotime($event->tanggal_event));
                $bulan = date("m", strtotime($event->tanggal_event));
                $tahun = date("Y", strtotime($event->tanggal_event));
                ?>
                <div class="entry-date"><div class="number"><?php echo $tanggal; ?></div> <div class="year"><?php echo substr($nama_bulan[$bulan], 0, 3); ?>, <?php echo $tahun; ?></div></div>
                <div id="posts-list" class="single-post">	
                <img src="<?php echo base_url().$event->foto_event; ?>" alt="Alt text" style="width:100%; height:80%;"/>
            </div>
                
                <div class="post-content"><?php echo $event->deskripsi; ?></div>
                <div class="post-content"><strong>Tanggal : </strong><?php echo $event->tanggal_event; ?></div>
                <div class="post-content"><strong>Lokasi : </strong><?php echo $event->tempat_event; ?></div>
                <?php if ($event->biaya == 0) { ?>
                    <div class="post-content"><strong>Biaya : GRATIS!</strong></div>
                    <?php } else { ?>
                    <div class="post-content"><strong>Biaya : </strong><?php
                        $biaya = nominalisasi($event->biaya);
                        echo "Rp. " . $biaya;
                        ?></div>
<?php } ?>                
                <div class="post-content"><strong>Keterangan : </strong><?php echo $event->keterangan; ?></div>
                <div class="post-content">
                    <h4>Prosedur Pendaftaran</h4><br>
<?php if ($event->biaya > 0) { ?>
                        <lu>
                            <li>Klik tombol daftar yang ada dibawah</li>
                            <li>Lengkapi isian yang disediakan</li>
                            <li>Lakukan pembayaran ke rekening BCA 0987654321 a/n Fadhilah</li>
                            <li>Pastikan jumlah yang ditransfer sama dengan biaya event</li>
                            <li>lakukan konfirmasi pada halaman <a href="<?php echo base_url(); ?>alumni/history">history</a></li>
                            <li>Tunggu verifikasi dari admin</li>
                            <li>Selesai</li>
                        </lu>
                    <?php } else { ?>
                    Silahkan langsung datang ke lokasi acara.
                <?php } ?>
                </div>
<?php if ($event->biaya > 0) { ?>
                    <div class="page-navigation clearfix">
                        <div class="nav-previous">
                            <a href="<?php echo base_url(); ?>alumni/daftar_event/<?php echo $event->id_event; ?>">Daftar</a> 
                        </div>
                    </div>
<?php } ?>
                <br>
                <div class="meta">
                    <div class="user"><a href="#">By admin</a></div>
                </div>

            </article>

        </div>
            <!-- ends fullwidth content -->
            <div class="clearfix"></div>


        </div>	        	
        <!--  ENDS project content-->


    </div>
</div>
<!-- ENDS MAIN -->