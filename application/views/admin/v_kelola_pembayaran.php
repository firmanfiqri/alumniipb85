<script>
    function buka_konfirmasi(id_peserta_event,no_registrasi,bank_kami,atas_nama,jumlah_transfer,tanggal_transfer,bukti_foto,tanggal_daftar,jumlah_dewasa,jumlah_anak,tanggal_tiba){
		$('#modal').show();
		document.getElementById("id_peserta_event").value = id_peserta_event;
		document.getElementById("no_registrasi").innerHTML = no_registrasi;
		document.getElementById("bank_kami").innerHTML = bank_kami;
		document.getElementById("atas_nama").innerHTML = atas_nama;
		document.getElementById("jumlah_transfer").innerHTML = jumlah_transfer;
		document.getElementById("tanggal_transfer").innerHTML = tanggal_transfer;
		document.getElementById("bukti_foto").src = "<?php echo base_url(); ?>"+bukti_foto;
		document.getElementById("tanggal_daftar").innerHTML = tanggal_daftar;
		document.getElementById("jumlah_dewasa").innerHTML = jumlah_dewasa;
		document.getElementById("jumlah_anak").innerHTML = jumlah_anak;
		document.getElementById("tanggal_tiba").innerHTML = tanggal_tiba;
		
		//alert(id_peserta_event);
		
	}
	$(document).ready(function() {
		
		$('#myTable').DataTable();
    });
	
</script>

<!-- MAIN -->
<div id="main">	
    <div class="wrapper clearfix">

		<h2 class="page-heading"><span>DATA PEMBAYARAN</span></h2>	
	
		<!-- form -->
		<form id="contactForm" action="<?php echo base_url();?>admin/konfirmasi_pembayaran" method="post" style="margin-top:20px;">
			<fieldset>
				<div>
					<select name="id_event" class="form-poshytip" title="Pilih event" style="height:40px;">
						<option value="<?php echo $id_event; ?>"><?php echo $nama_event; ?></option>
						<?php
						$no = 1;
						foreach($queryevent as $row){
							if($row->id_event != $id_event){
							?>
							<option value="<?php echo $row->id_event; ?>"><?php echo $row->nama_event; ?></option>
							<?php
							}
						}
						?>
					</select>
					&nbsp;&nbsp;
					<input type="submit" value="Pilih" name="submit" id="submit" style="margn-top:-20px; width:62px; height:40px;" />
				</div>
			</fieldset>
		</form>
		<!-- ENDS form -->
		
        <!-- project content -->
        <div id="project-content" class="clearfix" style="overflow-x: scroll;">
			<h3><span>EVENT : "<?php echo $nama_event; ?>"</span></h3>
			<br />
			<br />
            <table id="myTable" class="display" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>No Registrasi</th>
                        <th>Jumlah Pembayaran</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>               
                <tbody>
                    <?php 
					$no = 1;
					foreach($querypembayaran as $row){
					?>
					<tr>
                        <td><?php echo $no,'.';?></td>
						<td><?php echo $row->no_registrasi;?></td>
						<td><?php echo $row->jumlah_transfer;?></td>
						<td><?php
						if($row->status_pembayaran == 2){
							echo "Sudah konfirmasi";
						}else{
							echo "Belum konfirmasi";
						}
						?></td>
			            <td>
						<a href="#modal"><button onclick="buka_konfirmasi('<?php echo $row->id_peserta_event;?>','<?php echo $row->no_registrasi;?>','<?php echo $row->bank_kami;?>','<?php echo $row->atas_nama;?>','<?php echo $row->jumlah_transfer;?>','<?php echo $row->tanggal_transfer;?>','<?php echo $row->bukti_foto;?>','<?php echo $row->tanggal_daftar;?>','<?php echo $row->jumlah_dewasa;?>','<?php echo $row->jumlah_anak;?>','<?php echo $row->tanggal_tiba;?>')" style="height:30px; width:56px;">Detail</button></a>
						</td>
                    </tr>
                    <?php 
					$no++;
					} ?>
                </tbody>
            </table>
            <!-- ends fullwidth content -->
            <div class="clearfix"></div>

        </div>	        	
        <!--  ENDS project content-->
    </div>
</div>
<!-- ENDS MAIN -->

<aside id="modal">
	<header>
		<h2 class="page-heading"><span>KONFIRMASI PEMBAYARAN</span></h2>	
	</header>
	
	<section style="margin-top:20px;">
		<div class="project-info" style="margin-left:150px;">
			<p>
				<strong>No Registrasi</strong><br/>
				<span id="no_registrasi" style="font-size:18px;"></span>
			</p>
			<p>
				<strong>Bank Tujuan</strong><br/>
				<span id="bank_kami" style="font-size:18px;"></span>
			</p>
			<p>
				<strong>Atas Nama</strong><br/>
				<span id="atas_nama" style="font-size:18px;"></span>
			</p>
			<p>
				<strong>Jumlah Transfer</strong><br/>
				<span id="jumlah_transfer" style="font-size:18px;"></span>
			</p>
			<p>
				<strong>Tanggal Transfer</strong><br/>
				<span id="tanggal_transfer" style="font-size:18px;"></span>
			</p>
		</div>
		<div class="project-info" style="margin-left:0px;">
			<p>
				<strong>Bukti Foto</strong><br/>
				<span>
				<img id="bukti_foto" style="width:240px; height:160px;"/>
				</span>
			</p>
		</div>
		<div class="project-info" style="margin-left:120px;">
			<p>
				<strong>Tanggal Daftar</strong><br/>
				<span id="tanggal_daftar" style="font-size:18px;"></span>
			</p>
			<p>
				<strong>Jumlah Dewasa</strong><br/>
				<span id="jumlah_dewasa" style="font-size:18px;"></span>
			</p>
			<p>
				<strong>Jumlah Anak</strong><br/>
				<span id="jumlah_anak" style="font-size:18px;"></span>
			</p>
			<p>
				<strong>Tanggal Tiba</strong><br/>
				<span id="tanggal_tiba" style="font-size:18px;"></span>
			</p>
			<form id="contactForm" action="<?php echo base_url(); ?>admin/konfirmasi_status" method="post" enctype="multipart/form-data">
				<fieldset>
					<input name="id_peserta_event" id="id_peserta_event" type="hidden" class="form-poshytip" />
					<input type="submit" value="Konfirmasi" name="submit" id="submit" style="margin-top:0px; width:82px; height:40px;" />
					<a href="#"><input type="button" value="Keluar" name="submit" id="submit" style="width:70px; height:40px;" /></a>
				</fieldset>
			</form>
		</div>
	</section>
</aside>