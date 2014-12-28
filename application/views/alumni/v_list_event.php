<!-- MAIN -->
<div id="main">	
    <div class="wrapper clearfix">
        <h2 class="page-heading"><span>DAFTAR EVENT</span></h2>	
        <!-- thumbs -->
        <div class="portfolio-thumbs clearfix" >
            <?php foreach ($event as $row) { ?>
                <figure>
                    <figcaption>
                        <strong><?php echo $row->nama_event;?></strong>
                        <span><?php echo substr($row->deskripsi, 0, 100) ."...";?></span>
                        <?php 
                        $nama_bulan = array("", "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
                        $tanggal = date("d", strtotime($row->tanggal_event));
                        $bulan = date("m", strtotime($row->tanggal_event));                        
                        $tahun = date("Y", strtotime($row->tanggal_event));
                        ?>
                        <em><?php echo $tanggal . " " . $nama_bulan[$bulan]." ". $tahun;?></em>
                        <a href="<?php echo base_url(); ?>alumni/detail_event/<?php echo $row->id_event;?>" class="opener"></a>
                    </figcaption>

                    <a href="<?php echo base_url(); ?>alumni/detail_event/<?php echo $row->id_event;?>"  class="thumb"><img src="<?php echo base_url().$row->foto_event;?>" alt="Alt text" /></a>
                </figure>
            <?php } ?>
        </div>
        <!-- ends thumbs-->
    </div>
</div>
<!-- ENDS MAIN -->