<script>
		
	function buka_hapus(id_alumni_hapus){
		document.getElementById("id_alumni_hapus").value = id_alumni_hapus;
	}
	function buka_reset(id_alumni_reset){
		document.getElementById("id_alumni_reset").value = id_alumni_reset;
	}
	function buka_notifikasi(id_alumni_notifikasi, status_notifikasi){
		document.getElementById("id_alumni_notifikasi").value = id_alumni_notifikasi;
		document.getElementById("status_notifikasi").value = status_notifikasi;
	}
	
    $(document).ready(function() {
        $("#hapus").click(function(){
			var id_alumni = $("#id_alumni").val();
			var txt;
			var r = confirm("Anda yakin untuk menghapus?");
			if (r == true) {
				alert($("#id_alumni").val());
				//window.location.href='admin/hapus_alumni/'+id_alumni;
			}
		});
		
		$("#reset").click(function(){
			var id_alumni = $("#id_alumni").val();
			var txt;
			var r = confirm("Anda yakin untuk mereset?");
			if (r == true) {
				alert($("#id_alumni").val());
				//window.location.href='admin/reset_password/'+id_alumni;
			}
		});
		
		$('#myTable').DataTable();
    });
	
</script>

<div id="background">
<!-- MAIN -->
<div id="main">	
    <div class="wrapper clearfix">

        <h2 class="page-heading"><span>DATA ALUMNI</span></h2>	

        <!-- project content -->
        <div id="project-content" class="clearfix" style="overflow-x: scroll; margin-top:50px;">
            <table id="myTable" class="display" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NRP</th>
                        <th>Nama Lengkap</th>
						<!--
                        <th>Kelompok</th>
						-->
                        <th>Fakultas</th>
                        <th>Jurusan</th>
                        <th>Kelompok</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>               
                <tbody>
				
					<?php 
					$no = 1;
					foreach($queryalumni as $row){
					?>
					<input type="hidden" id="id_alumni" value="<?php echo $row->id_alumni;?>">
					<tr>
						<td><?php echo $no,'.';?></td>
						<td><?php echo $row->nrp;?></td>
						<td><?php echo $row->nama_alumni;?></td>
						<!--
						<td><?php echo $row->kelompok;?></td>
						-->
						<td><?php echo $row->nama_fakultas;?></td>
						<td><?php echo $row->nama_jurusan;?></td>
						<td><?php echo $row->kelompok;?></td>
						<td>
						<?php
						if($row->status == 0){
							echo '<img src="'.base_url().'assets/img/status_kuning.png" style="border-radius:2px;" />';
						}else if($row->status == 1){
							echo '<img src="'.base_url().'assets/img/status_biru.png" style="border-radius:2px;" />';
						}else if($row->status == 2){
							echo '<img src="'.base_url().'assets/img/status_hijau.png" style="border-radius:2px;" />';
						}else{
							echo '<img src="'.base_url().'assets/img/status_merah.png" style="border-radius:2px;" />';
						}
						?>
						</td>
						<td>
							<a href="<?php echo base_url();?>admin/detail_profile/<?php echo $row->id_alumni;?>"><button style="height:30px; width:56px;">Detail</button></a>
							<a href="#modal1"><button onclick="buka_hapus('<?php echo $row->id_alumni;?>')" style="height:30px; width:56px;">Hapus</button></a>
							<!--<a href="#modal2"><button onclick="buka_reset('<?php echo $row->id_alumni;?>')" style="height:30px; width:51px;">Reset</button></a>-->
							<?php
							if($row->status != 2){
							?>
							<a href="#modal3"><button onclick="buka_notifikasi('<?php echo $row->id_alumni;?>','<?php echo $row->status;?>')" style="height:30px; width:65px;">Notif.</button></a>
							<?php
							}
							?>
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
		<div style="margin-top:50px;">
			<h3 style="margin-top:-20px;">STATUS</h3>
			<h5 style="margin-top:10px;"><img src="<?php echo base_url(); ?>assets/img/status_hijau.png" style="border-radius:2px;" />&nbsp;&nbsp;&nbsp; : &nbsp;&nbsp;Aktif (sudah terdaftar Reuni Akbar)</h5>
			<h5 style="margin-top:10px;"><img src="<?php echo base_url(); ?>assets/img/status_biru.png" style="border-radius:2px;" />&nbsp;&nbsp;&nbsp; : &nbsp;&nbsp;Aktif (belum terdaftar Reuni Akbar)</h5>
			<h5 style="margin-top:10px;"><img src="<?php echo base_url(); ?>assets/img/status_kuning.png" style="border-radius:2px;" />&nbsp;&nbsp;&nbsp; : &nbsp;&nbsp;Aktif (data belum lengkap)</h5>
			<h5 style="margin-top:10px;"><img src="<?php echo base_url(); ?>assets/img/status_merah.png" style="border-radius:2px;" />&nbsp;&nbsp;&nbsp; : &nbsp;&nbsp;Belum aktif</h5>
		</div>
    </div>
</div>
<!-- ENDS MAIN -->

<aside id="modal1" style="width:25%; height:32%; margin-left:-180px;box-shadow: 0px 0px 15px #888888;">
	<header>
		<h2 class="page-heading"><span>PESAN PERSETUJUAN</span></h2>	
	</header>
	
	<section style="margin-top:15px; margin-left:65px;">
		<div class="project-info">
			<p>
				<strong style="font-size:14px;">Apakah anda yakin untuk menghapus alumni ini?</strong><br/>
			</p>
		</div>
		<div class="clearfix"></div>
		<div style="margin-top:-100px; float:center;">
			<form id="contactForm" action="<?php echo base_url(); ?>admin/hapus_alumni" method="post" enctype="multipart/form-data">
				<fieldset>
					<input name="id_alumni_hapus" id="id_alumni_hapus" type="hidden" class="form-poshytip" />
					&nbsp;&nbsp;&nbsp;&nbsp;
					<input type="submit" value="Ya" name="submit" id="submit" style="margin-top:0px; width:60px; height:40px;" />
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<a href="#"><input type="button" value="Tidak" name="submit" id="submit" style="width:60px; height:40px;" /></a>
				</fieldset>
			</form>
		</div>
	</section>
</aside>
<aside id="modal2" style="width:25%; height:32%; margin-left:-180px;box-shadow: 0px 0px 15px #888888;">
	<header>
		<h2 class="page-heading"><span>PESAN PERSETUJUAN</span></h2>	
	</header>
	
	<section style="margin-top:15px; margin-left:65px;">
		<div class="project-info">
			<p>
				<strong style="font-size:14px;">Apakah anda yakin untuk mereset password alumni ini?</strong><br/>
			</p>
		</div>
		<div class="clearfix"></div>
		<div style="margin-top:-100px; float:center;">
			<form id="contactForm" action="<?php echo base_url(); ?>admin/reset_password" method="post" enctype="multipart/form-data">
				<fieldset>
					<input name="id_alumni_reset" id="id_alumni_reset" type="hidden" class="form-poshytip" />
					&nbsp;&nbsp;&nbsp;&nbsp;
					<input type="submit" value="Ya" name="submit" id="submit" style="margin-top:0px; width:60px; height:40px;" />
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<a href="#"><input type="button" value="Tidak" name="submit" id="submit" style="width:60px; height:40px;" /></a>
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
			<form id="contactForm" action="<?php echo base_url(); ?>admin/kirim_notifikasi" method="post" enctype="multipart/form-data">
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