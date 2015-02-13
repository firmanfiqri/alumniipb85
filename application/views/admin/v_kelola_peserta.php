<script>
	function buka_notifikasi(id_alumni_notifikasi, status_notifikasi){
		document.getElementById("id_alumni_notifikasi").value = id_alumni_notifikasi;
		document.getElementById("status_notifikasi").value = status_notifikasi;
	}
   
   function buka_email(id_peserta_event, no_registrasi, bank_kami, atas_nama, jumlah_transfer, tanggal_transfer, bukti_foto, tanggal_daftar, jumlah_dewasa, jumlah_anak, tanggal_tiba, status_pembayaran) {
        $('#modal').show();
        document.getElementById("id_peserta_event").value = id_peserta_event;
        document.getElementById("no_registrasi").innerHTML = no_registrasi;
        document.getElementById("bank_kami").innerHTML = bank_kami;
        document.getElementById("atas_nama").innerHTML = atas_nama;
        document.getElementById("jumlah_transfer").innerHTML = "Rp. " + jumlah_transfer;
        document.getElementById("tanggal_transfer").innerHTML = tanggal_transfer;
        if (bukti_foto == "") {
            document.getElementById("bukti_foto").src = "<?php echo base_url(); ?>assets/img/dummy_event.png";
        } else {
            document.getElementById("bukti_foto").src = "<?php echo base_url(); ?>" + bukti_foto;
        }
        document.getElementById("tanggal_daftar").innerHTML = tanggal_daftar;
        document.getElementById("jumlah_dewasa").innerHTML = jumlah_dewasa;
        document.getElementById("jumlah_anak").innerHTML = jumlah_anak;
        document.getElementById("tanggal_tiba").innerHTML = tanggal_tiba;

        if ((status_pembayaran == 2) || (status_pembayaran == 0)) {
            $('#submit_konfirmasi').hide();
        } else {
            $('#submit_konfirmasi').show();
        }

    }
    $(document).ready(function() {

        $('#myTable').DataTable();
    });

</script>

<?php

function nominalisasi($biaya) {
    $harga = $biaya;

    $jml = strlen($harga);
    $rupiah = "";

    while ($jml > 3) {
        $rupiah = "." . substr($harga, -3) . $rupiah;
        $l = strlen($harga) - 3;
        $harga = substr($harga, 0, $l);
        $jml = strlen($harga);
    }
    $rupiah = $harga . $rupiah . ",-";

    return $rupiah;
}
?>

<div id="background">
<!-- MAIN -->
<div id="main">	
    <div class="wrapper clearfix">

        <h2 class="page-heading"><span>DATA PESERTA EVENT</span></h2>	

        <!-- form -->
        <form id="contactForm" action="<?php echo base_url(); ?>admin/data_peserta" method="post" style="margin-top:20px;">
            <fieldset>
                <div>
                    <select name="id_event" class="form-poshytip" title="Pilih event" style="height:40px;">
                        <option value="<?php echo $id_event; ?>"><?php echo $nama_event; ?></option>
                        <?php
                        $no = 1;
                        foreach ($queryevent as $row) {
                            if ($row->id_event != $id_event) {
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
        <div id="project-content" class="clearfix">
            <?php
			if($id_event != 4){
			?>
			<h3><span>EVENT : "<?php echo $nama_event; ?>"</span></h3>
			<?php
			}else{
			?>
			<h3><span>ACARA PUNCAK : "<?php echo $nama_event; ?>"</span></h3>
			<?php
			}
			?>
            <br />
            <br />
            <table id="myTable" class="display" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>No Registrasi</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>No. HP</th>
						<?php
						if($id_event == 4){
						?>
                        <th>Jumlah Ikut</th>
                        <th>Tanggal Tiba</th>
						<?php
						}
						?>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>               
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($querypembayaran as $row) {
                        $biaya = nominalisasi($row->jumlah_transfer);
						?>
                        <tr>
                            <td><?php echo $no, '.'; ?></td>
                            <td><?php echo $row->no_registrasi; ?></td>
                            <td><?php echo $row->nama_alumni; ?></td>
                            <td><?php echo $row->email; ?></td>
                            <td><?php echo $row->no_hp; ?></td>
							<?php
							if($id_event == 4){
							?>
                            <td><?php echo $row->jumlah_dewasa + $row->jumlah_anak; ?></td>
                            <td><?php echo $row->tanggal_tiba; ?></td>
							<?php
							}
							?>
                            <td><?php
							if($row->status_pembayaran == 0){
								echo '<img src="'.base_url().'assets/img/status_merah.png" style="border-radius:2px;" />';
							}else if($row->status_pembayaran == 1){
								echo '<img src="'.base_url().'assets/img/status_kuning.png" style="border-radius:2px;" />';
							}else{
								echo '<img src="'.base_url().'assets/img/status_hijau.png" style="border-radius:2px;" />';
							}
							?></td>
                            <td>
                                <a href="#modal"><button onclick="buka_email('<?php echo $row->id_peserta_event; ?>', '<?php echo $row->no_registrasi; ?>', '<?php echo $row->bank_kami; ?>', '<?php echo $row->atas_nama; ?>', '<?php echo $biaya; ?>', '<?php echo $row->tanggal_transfer; ?>', '<?php echo $row->bukti_foto; ?>', '<?php echo $row->tanggal_daftar; ?>', '<?php echo $row->jumlah_dewasa; ?>', '<?php echo $row->jumlah_anak; ?>', '<?php echo $row->tanggal_tiba; ?>', '<?php echo $row->status_pembayaran; ?>')" style="height:30px; width:56px;">Detail</button></a>
								<?php
								if($row->status_pembayaran != 2){
								?>
								<a href="#modal3"><button onclick="buka_notifikasi('<?php echo $row->id_alumni;?>','<?php echo $row->status_pembayaran;?>')" style="height:30px; width:65px;">Notif.</button></a>
								<?php
								}
								?>
                            </td>
                        </tr>
                        <?php
                        $no++;
                    }
                    ?>
                </tbody>
            </table>
            <!-- ends fullwidth content -->
            <div class="clearfix"></div>

        </div>	        	
        <!--  ENDS project content-->
		<div style="margin-top:0px;">
			<form id="contactForm" style="margin-top:0px;">
			<a href="#modal_email" id="email_semua"><input type="button" value="Kirim Pesan ke Semua" name="submit" id="submit" style="height:40px;" /></a>
			</form>
		</div>
		<div class="clearfix"></div>
		<div style="margin-top:0px;">
			<h3 style="margin-top:0px;">STATUS</h3>
			<h5 style="margin-top:10px;"><img src="<?php echo base_url(); ?>assets/img/status_hijau.png" style="border-radius:2px;" />&nbsp;&nbsp;&nbsp; : &nbsp;&nbsp;Sudah dikonfirmasi</h5>
			<h5 style="margin-top:10px;"><img src="<?php echo base_url(); ?>assets/img/status_kuning.png" style="border-radius:2px;" />&nbsp;&nbsp;&nbsp; : &nbsp;&nbsp;Belum dikonfirmasi</h5>
			<h5 style="margin-top:10px;"><img src="<?php echo base_url(); ?>assets/img/status_merah.png" style="border-radius:2px;" />&nbsp;&nbsp;&nbsp; : &nbsp;&nbsp;Belum melakukan pembayaran</h5>
		</div>
		
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
                    <input type="submit" value="Konfirmasi" name="submit" id="submit_konfirmasi" style="margin-top:0px; width:82px; height:40px;" />
                    <a href="#"><input type="button" value="Keluar" name="submit" style="width:70px; height:40px;" /></a>
                </fieldset>
            </form>
        </div>
    </section>
</aside>
<aside id="modal3" style="width:25%; height:32%; margin-left:-180px; box-shadow: 0px 0px 15px #888888;">
	<header>
		<h2 class="page-heading"><span>PESAN PERSETUJUAN</span></h2>	
	</header>
	
	<section style="margin-top:15px; margin-left:65px;">
		<div class="project-info">
			<p>
				<strong style="font-size:14px;">Apakah anda yakin untuk mengirimkan pesan notifikasi?</strong><br/>
			</p>
		</div>
		<div class="clearfix"></div>
		<div style="margin-top:-100px; float:center;">
			<form id="contactForm" action="<?php echo base_url(); ?>admin/kirim_notifikasi_event" method="post" enctype="multipart/form-data">
				<fieldset>
					<input name="id_alumni_notifikasi" id="id_alumni_notifikasi" type="hidden" class="form-poshytip" />
					<input name="status_notifikasi" id="status_notifikasi" type="hidden" class="form-poshytip" />
					&nbsp;&nbsp;&nbsp;&nbsp;
					<input type="submit" value="Ya" name="submit" id="submit" style="margin-top:0px; width:60px; height:40px;" />
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<a href="#"><input type="button" value="Tidak" name="submit" id="submit" style="width:60px; height:40px;" /></a>
				</fieldset>
			</form>
		</div>
	</section>
</aside>
<aside id="modal_email">
    <header>
        <h2 class="page-heading"><span>KIRIM PESAN KE SEMUA</span></h2>	
    </header>

    <section style="margin-top:20px;">
        <div class="project-info" style="margin-left:150px;">
            <form id="contactForm" action="<?php echo base_url(); ?>admin/email_semua" method="post" enctype="multipart/form-data">
				<fieldset>
					<div>
						<label class="clearfix">Pesan</label>
						<textarea name="pesan" class="form-poshytip" title="Masukan pesan" style="resize: vertical" required></textarea>
					</div>
					<input name="email_semua" type="hidden" class="form-poshytip" value="<?php echo htmlentities(serialize($email_semua)); ?>"  />
					<input name="nama_semua" type="hidden" class="form-poshytip" value="<?php echo htmlentities(serialize($nama_semua)); ?>"  />
					<input name="nama_event" type="hidden" class="form-poshytip" value="<?php echo $nama_event; ?>"  />
					<input type="submit" value="Kirim" name="submit" id="submit" style="margin-top:0px; width:65px; height:40px;" />
					<a href="#"><input type="button" value="Keluar" style="margin-top:0px; width:65px; height:40px;" /></a>
				</fieldset>
			</form>
			<!-- ENDS form -->
        </div>
    </section>
</aside>