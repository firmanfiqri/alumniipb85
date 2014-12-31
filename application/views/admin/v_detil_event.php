<div id="main">	
    <div class="wrapper clearfix">

        <!-- posts list -->
        <div id="posts-list" class="single-post">

            <h2 class="page-heading"><span>DETAIL EVENT</span></h2>	

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
                <a href="<?php echo base_url().$event->foto_event;?>" data-rel="prettyPhoto"><img src="<?php echo base_url().$event->foto_event;?>" alt="Alt text" style="width:90%; height:60%;" /></a>
                <h2  class="post-heading"><?php echo $event->nama_event; ?></h2>
                <div class="post-content"><?php echo $event->deskripsi; ?></div>
                <div class="meta">
                </div>

            </article>

        </div>
        <!-- ENDS posts list -->
    </div>
</div>