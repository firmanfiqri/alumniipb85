<div id="background">
<!-- MAIN -->
<div id="main">	
    <div class="wrapper clearfix">
        <!-- thumbs -->
            <?php if ($this->session->userdata('status') == 0) { ?>
			<h2 class="page-heading"><span>EVENT</span></h2>	
			<div class="portfolio-thumbs clearfix" >
                <h4>Lengkapi data diri untuk mengakses bagian ini.</h4>
			</div>
            <?php } else { ?>
			<h2 class="page-heading"><span>EVENT: 'SEMINAR'</span></h2>	
			<div class="portfolio-thumbs clearfix" >
                <?php foreach ($event as $row) { 
						if($row->kategori == 'Seminar'){
				?>
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
						
						<?php
						if($row->foto_event){
						?>
                        <a href="<?php echo base_url(); ?>alumni/detail_event/<?php echo $row->id_event; ?>"  class="thumb"><img src="<?php echo base_url() . $row->foto_event; ?>" alt="Alt text" style="width:620px; height:200px; border-radius:0px;" /></a>
						<?php
						}else{
						?>
                        <a href="<?php echo base_url(); ?>alumni/detail_event/<?php echo $row->id_event; ?>"  class="thumb"><img src="<?php echo base_url(); ?>assets/img/dummy_event.png" alt="Alt text" style="width:620px; height:200px; border-radius:0px;" /></a>
						<?php } ?>
						
                    </figure>

                <?php
						}
					}
				?>
			</div>
				
			<div class="clearfix"></div>
			<br />
			<br />
			<br />
			
			<h2 class="page-heading"><span>EVENT: 'TRIP'</span></h2>	
			<div class="portfolio-thumbs clearfix" >
                <?php foreach ($event as $row) { 
						if($row->kategori == 'Trip'){
				?>
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

                        <?php
						if($row->foto_event){
						?>
                        <a href="<?php echo base_url(); ?>alumni/detail_event/<?php echo $row->id_event; ?>"  class="thumb"><img src="<?php echo base_url() . $row->foto_event; ?>" alt="Alt text" style="width:620px; height:200px; border-radius:0px;" /></a>
						<?php
						}else{
						?>
                        <a href="<?php echo base_url(); ?>alumni/detail_event/<?php echo $row->id_event; ?>"  class="thumb"><img src="<?php echo base_url(); ?>assets/img/dummy_event.png" alt="Alt text" style="width:620px; height:200px; border-radius:0px;" /></a>
						<?php } ?>
                    </figure>

                <?php
						}
					}
				?>
			</div>
			
            <?php } ?>
        <!-- ends thumbs-->
    </div>
</div>
<!-- ENDS MAIN -->