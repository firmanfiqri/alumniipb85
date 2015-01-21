<div id="background">
<div id="main">	
    <div class="wrapper clearfix">

        <!-- posts list -->
        <div id="posts-list" class="single-post">

            <h2 class="page-heading"><span>PENDAFTARAN EVENT</span></h2>	

            <article class="format-standard">
                <h3 class="post-heading">EVENT : "<?php echo $event->nama_event; ?>"</h3>
                <form id="contactForm" class="isian" action="<?php echo base_url(); ?>alumni/daftar" method="post" enctype="multipart/form-data">
                    Jumlah anggota keluarga yang ikut serta:<br>
                    <input type="hidden" name="id_event" value="<?php echo $event->id_event; ?>">
                    <table>
						<tr style="height:10px;"></tr>
                        <tr>
                        <tr>
                            <td>Dewasa</td>
							<td style="width:20px;"><td>
                            <td><input type="number" class="clearfix" name="dewasa_ikut" placeholder="Dewasa" style="width:225px; height:15px;" required></td>
                        </tr>
						<tr style="height:10px;"></tr>
                        <tr>
                            <td>Anak</td>
							<td style="width:20px;"><td>
                            <td><input type="number" class="clearfix" name="anak_ikut" placeholder="Anak" style="width:225px; height:15px;" required></td>
                        </tr>
						<tr style="height:10px;"></tr>
                        <tr>
                        <tr>
                            <td>Tanggal Tiba</td>
							<td style="width:20px;"><td>
                            <td><input type="date" class="clearfix" name="tgl_tiba" style="width:225px; height:15px;" required></td>
                        </tr>
                        <tr>
                            <td></td>
							<td style="width:5px;"><td>
                            <td align="right"><input type="submit" class="clearfix" name="daftar" style="width:60px; height:30px;" required></td>
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