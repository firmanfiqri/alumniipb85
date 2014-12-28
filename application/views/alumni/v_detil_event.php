<div id="main">	
    <div class="wrapper clearfix">

        <!-- posts list -->
        <div id="posts-list" class="single-post">

            <h2 class="page-heading"><span>DETAIL EVENT</span></h2>	

            <article class="format-standard">
                <?php 
                    $nama_bulan = array("", "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
                    $tanggal = date("d", strtotime($event->tanggal_event));
                    $bulan = date("m", strtotime($event->tanggal_event));                        
                    $tahun = date("Y", strtotime($event->tanggal_event));
                ?>
                <div class="entry-date"><div class="number"><?php echo $tanggal; ?></div> <div class="year"><?php echo substr($nama_bulan[$bulan], 0, 3); ?>, <?php echo $tahun; ?></div></div>
                <div class="feature-image">
                    <a href="<?php echo base_url().$event->foto_event;?>" data-rel="prettyPhoto"><img src="<?php echo base_url().$event->foto_event;?>" alt="Alt text" /></a>
                </div>
                <h2  class="post-heading"><?php echo $event->nama_event; ?></h2>
                <div class="post-content"><?php echo $event->deskripsi; ?>
                </div>
                <div class="meta">
                    <div class="categories">In <a href="#">Category 1</a>, <a href="#">Category 2</a></div>
                    <div class="comments"><a href="#">5 comments </a></div>
                    <div class="user"><a href="#">By admin</a></div>
                </div>

            </article>

        </div>
        <!-- ENDS posts list -->

        <!-- sidebar -->
        <aside id="sidebar">

            <ul>
                <?php
                    $pertama = 0;
                    $tahun=0;
                    foreach($semua_event as $row){
                        $tahunn = date("Y", strtotime($row->tanggal_event));
                        if($tahun != $tahunn){
                            $tahun = $tahunn;
                            $pertama++;
                            if($pertama==1){
                                ?>
                                <li class="block">
                                    <h4><?php echo $tahun;?></h4>
                                    <ul>
                                <?php
                            }else{
                                ?>
                                        </ul>
                </li>
                <li class="block">
                                    <h4><?php echo $tahun;?></h4>
                                    <ul>
                                        <?php
                            }
                        }?>
                                        <li class="cat-item"><a href="<?php echo base_url();?>alumni/detail_event/<?php echo $row->id_event;?>" title="View all posts"><?php echo $row->nama_event;?></a></li>                
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