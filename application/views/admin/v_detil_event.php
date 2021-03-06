<div id="background">
<div id="main">	
    <div class="wrapper clearfix">

        <!-- posts list -->
        <div id="posts-list" class="single-post">
			<?php
			if($event->kategori != "Reuni"){
			?>
            <h2 class="page-heading"><span>DETAIL EVENT</span></h2>	
			<?php }else{ ?>
            <h2 class="page-heading"><span>DETAIL ACARA PUNCAK</span></h2>	
			<?php } ?>

            <article class="format-standard">
                <?php 
                    $nama_bulan = array("", "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
                    $tanggal = date("d", strtotime($event->tanggal_event));
                    if(date("m", strtotime($event->tanggal_event)) < 10){
						$bulan = substr(date("m", strtotime($event->tanggal_event)), 1, 1);
					}else{
						$bulan = date("m", strtotime($event->tanggal_event));
					}
					$tahun = date("Y", strtotime($event->tanggal_event));
                ?>
                <div class="entry-date"><div class="number"><?php echo $tanggal; ?></div> <div class="year"><?php echo substr($nama_bulan[$bulan], 0, 3); ?>, <?php echo $tahun; ?></div></div>
				<?php
				if($event->kategori != "Reuni"){
				?>
                <a href="<?php echo base_url().$event->foto_event;?>" data-rel="prettyPhoto"><img src="<?php echo base_url().$event->foto_event;?>" alt="Alt text" style="width:90%; height:60%;" /></a>
				<?php } ?>
                <h2  class="post-heading"><?php echo $event->nama_event; ?></h2>
                <div class="post-content"><?php echo $event->deskripsi; ?></div>
                <div class="meta">
				<div class="address"> At <a><?php echo $event->tempat_event; ?></a>, <a><?php echo $event->tanggal_event; ?></a></div>
				<div class="categories"> Category <a><?php echo $event->kategori; ?></a></div>
                </div>

            </article>

        </div>
        <!-- ENDS posts list -->
    </div>
</div>