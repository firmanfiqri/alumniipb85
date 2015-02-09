<script>
    $(document).ready(function() {
        $('#myTable').dataTable();
    });
</script>

<div id="background">
<!-- MAIN -->
<div id="main">	
    <div class="wrapper clearfix">

        <h2 class="page-heading"><span>LOG PENDAFTARAN</span></h2>	
        <?php if ($this->session->userdata('status') == 0) { ?>
            <h4>Lengkapi data diri untuk mengakses bagian ini.</h4>
        <?php } else { ?>
            <!-- project content -->
            <div id="project-content" class="clearfix" style="overflow-x:scroll;overflow-y: hidden; margin-top:50px;">
                <table id="myTable" class="display" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Event</th>
                            <th>Tanggal Registrasi</th>
                            <th>Keluarga Ikut</th>                        
                            <th>Status</th>
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
                                <td><?php
								if($row->status_pembayaran == 0){
									echo '<img src="'.base_url().'assets/img/status_merah.png" style="border-radius:2px;" />';
								}else if($row->status_pembayaran == 1){
									echo '<img src="'.base_url().'assets/img/status_kuning.png" style="border-radius:2px;" />';
								}else{
									echo '<img src="'.base_url().'assets/img/status_hijau.png" style="border-radius:2px;" />';
								}
								?></td>
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
			
			<div style="margin-top:50px;">
			<h3 style="margin-top:-20px;">STATUS</h3>
			<h5 style="margin-top:10px;"><img src="<?php echo base_url(); ?>assets/img/status_hijau.png" style="border-radius:2px;" />&nbsp;&nbsp;&nbsp; : &nbsp;&nbsp;Sudah dikonfirmasi</h5>
			<h5 style="margin-top:10px;"><img src="<?php echo base_url(); ?>assets/img/status_kuning.png" style="border-radius:2px;" />&nbsp;&nbsp;&nbsp; : &nbsp;&nbsp;Belum dikonfirmasi</h5>
			<h5 style="margin-top:10px;"><img src="<?php echo base_url(); ?>assets/img/status_merah.png" style="border-radius:2px;" />&nbsp;&nbsp;&nbsp; : &nbsp;&nbsp;Belum melakukan pembayaran</h5>
		</div>
        <?php } ?>
    </div>
</div>
<!-- ENDS MAIN -->