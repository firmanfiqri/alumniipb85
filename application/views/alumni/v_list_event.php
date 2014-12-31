<!-- MAIN -->
<div id="main">	
    <div class="wrapper clearfix">
        <h2 class="page-heading"><span>DAFTAR EVENT</span></h2>	
        <!-- thumbs -->
        <div class="portfolio-thumbs clearfix" >
            <?php if ($this->session->userdata('status') == 0) { ?>
                <h4>Lengkapi data diri untuk mengakses bagian ini.</h4>
            <?php } else { ?>
                <?php foreach ($event as $row) { ?>
                    <figure>
                        <figcaption>
                            <strong><?php echo $row->nama_event; ?></strong>
                            <span><?php echo substr($row->deskripsi, 0, 100) . "..."; ?></span>
                            <?php
                            $nama_bulan = array("00" => "", "01" => "Januari", "02" => "Februari", "03" => "Maret", "04" => "April", "05" => "Mei", "06" => "Juni", "07" => "Juli", "08" => "Agustus", "09" => "September", "10" => "Oktober", "11" => "November", "12" => "Desember");
                            $tanggal = date("d", strtotime($row->tanggal_event));
                            $bulan = date("m", strtotime($row->tanggal_event));
                            $tahun = date("Y", strtotime($row->tanggal_event));
                            ?>
                            <em><?php echo $tanggal . " " . $nama_bulan[$bulan] . " " . $tahun; ?></em>
                            <a href="<?php echo base_url(); ?>alumni/detail_event/<?php echo $row->id_event; ?>" class="opener"></a>
                        </figcaption>

                        <a href="<?php echo base_url(); ?>alumni/detail_event/<?php echo $row->id_event; ?>"  class="thumb"><img src="<?php echo base_url() . $row->foto_event; ?>" alt="Alt text" /></a>
                    </figure>
                <?php } ?>
            <?php } ?>
        </div>
        <!-- ends thumbs-->
    </div>
</div>
<!-- ENDS MAIN -->