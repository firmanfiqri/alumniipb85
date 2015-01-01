<div id="main">	
    <div class="wrapper clearfix">

        <!-- posts list -->
        <div id="posts-list" class="single-post">

            <h2 class="page-heading"><span>DETAIL EVENT</span></h2>	

            <article class="format-standard">
                <?php
                $nama_bulan = array("00" => "", "01" => "Januari", "02" => "Februari", "03" => "Maret", "04" => "April", "05" => "Mei", "06" => "Juni", "07" => "Juli", "08" => "Agustus", "09" => "September", "10" => "Oktober", "11" => "November", "12" => "Desember");
                $tanggal = date("d", strtotime($event->tanggal_event));
                $bulan = date("m", strtotime($event->tanggal_event));
                $tahun = date("Y", strtotime($event->tanggal_event));
                ?>
                <div class="entry-date"><div class="number"><?php echo $tanggal; ?></div> <div class="year"><?php echo substr($nama_bulan[$bulan], 0, 3); ?>, <?php echo $tahun; ?></div></div>
                <a href="<?php echo base_url() . $event->foto_event; ?>" data-rel="prettyPhoto"><img src="<?php echo base_url() . $event->foto_event; ?>" alt="Alt text" style="width:90%; height:60%;" /></a>
                <h2  class="post-heading"><?php echo $event->nama_event; ?></h2>
                <div class="post-content"><?php echo $event->deskripsi; ?></div>
                <div class="post-content"><strong>Tanggal : </strong><?php echo $event->tanggal_event; ?></div>
                <div class="post-content"><strong>Lokasi : </strong><?php echo $event->tempat_event; ?></div>
                <?php if ($event->biaya == 0) { ?>
                    <div class="post-content"><strong>Biaya : GRATIS!</strong></div>
                <?php } else { ?>
                    <div class="post-content"><strong>Biaya : </strong><?php echo $event->biaya; ?></div>
                <?php } ?>                
                <div class="post-content"><strong>Keterangan : </strong><?php echo $event->keterangan; ?></div>
                <div class="post-content">
                    <h4>Prosedur Pendaftaran</h4>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.

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
        <!-- ENDS posts list -->

        <!-- sidebar -->
        <aside id="sidebar" style="background: url(<?php echo base_url();?>assets/img/daftar_kuning_1.png) top left repeat-y; background-size: 100% 100%;">

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