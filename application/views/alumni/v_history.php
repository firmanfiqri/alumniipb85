<script>
    $(document).ready(function() {
        $('#myTable').dataTable();
    });
</script>

<!-- MAIN -->
<div id="main">	
    <div class="wrapper clearfix">

        <h2 class="page-heading"><span>LOG PENDAFTARAN</span></h2>	
        <?php if ($this->session->userdata('status') == 0) { ?>
            <h4>Lengkapi data diri untuk mengakses bagian ini.</h4>
        <?php } else { ?>
            <!-- project content -->
            <div id="project-content" class="clearfix" style="overflow-x:scroll;overflow-y: hidden; height: 500px">
                <table id="myTable" class="display" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Event</th>
                            <th>Tanggal Registrasi</th>
                            <th>Keluarga Ikut</th>                        
                            <th>Status Pembayaran</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>               
                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($history as $row) { ?>
                            <tr>
                                <td><?php echo $no; ?></td>
                                <td><?php echo $row->nama_event; ?></td>
                                <td><?php echo $row->tanggal_daftar; ?></td>
                                <td><?php echo $row->jumlah_dewasa; ?> dewasa/<?php echo $row->jumlah_anak; ?> anak</td>
                                <?php if ($row->status_pembayaran == 0) { ?>
                                    <td>Belum Konfimasi</td>
                                <?php } else if ($row->status_pembayaran == 1) { ?>
                                    <td>Menunggu Verifikasi Admin</td>
                                <?php } else if ($row->status_pembayaran == 2) { ?>
                                    <td>OK</td>
                                <?php } ?>

                                <?php if ($row->status_pembayaran == 0) { ?>
                                    <td><a href="<?php echo base_url(); ?>alumni/konfirmasi/<?php echo $row->no_registrasi; ?>"><button class="button button-sp">Konfirmasi</button></a></td>
                                <?php } else { ?>
                                    <td></td>
                                <?php } ?>

                                <?php $no++; ?>
                            </tr>
                        <?php } ?>

                    </tbody>
                </table>
                <!-- ends fullwidth content -->
                <div class="clearfix"></div>


            </div>	        	
            <!--  ENDS project content-->
        <?php } ?>
    </div>
</div>
<!-- ENDS MAIN -->