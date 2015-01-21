<script>
    function buka_hapus(id_event_hapus){
		document.getElementById("id_event_hapus").value = id_event_hapus;
	}
	
	$(document).ready(function() {
		
		$("#hapus").click(function(){
			var id_event = $("#id_event").val();
			var txt;
			var r = confirm("Anda yakin untuk menghapus?");
			if (r == true) {
				alert($("#id_event").val());
				//window.location.href='hapus_event/'+ $("#id_event").val();
			}
		});
		
		$("#buka").show();
		$("#tutup").hide();
		$("#tambah").hide();
		
		$("#buka").click(function(){
			$("#tutup").show();
			$("#buka").hide();
			$("#tambah").slideDown();
		});
		
		$("#tutup").click(function(){
			$("#buka").show();
			$("#tutup").hide();
			$("#tambah").slideUp();
		});
		
		function foto_change() {
			//check whether browser fully supports all File API
			if (window.File && window.FileReader && window.FileList && window.Blob)
			{
				//get the file size and file type from file input field
				var fsize = $('#foto')[0].files[0].size;

				if (fsize > 100000) //do something if file size more than 1 mb (1048576)
				{
					//alert($("#foto").val());
					$("#foto").val("");
					alert(fsize + " bytes\nUkuran file terlalu besar!");
				} else {
					//alert($("#foto").val());
					//$("#foto").val("");
					//alert(fsize + " bytes\nYou are good to go!");
				}
			} else {
				alert("Please upgrade your browser, because your current browser lacks some new features we need!");
			}
		}
		
        $('#myTable').DataTable();
		
    });
</script>
<?php
	function nominalisasi($biaya) {
		$harga = $biaya;
		
		$jml = strlen($harga);
		$rupiah = "";
		
		while($jml > 3){
			$rupiah = "." . substr($harga,-3) . $rupiah;
			$l = strlen($harga) - 3;
			$harga = substr($harga,0,$l);
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

        <h2 class="page-heading"><span>DATA EVENT</span></h2>	

        <!-- project content -->
        <div id="project-content" class="clearfix" style="overflow-x: scroll; margin-top:50px;">
            <table id="myTable" class="display" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Event</th>
                        <th>Tanggal</th>
                        <th>Tempat</th>
                        <th>Biaya</th>
                        <th>Aksi</th>
                    </tr>
                </thead>               
                <tbody>
                    <?php 
					$no = 1;
					foreach($queryevent as $row){
					?>
					<input type="hidden" id="id_event" value="<?php echo $row->id_event;?>">
					<tr>
						<td><?php echo $no,'.';?></td>
						<td><?php echo $row->nama_event;?></td>
						<td><?php echo $row->tanggal_event;?></td>
						<td><?php echo $row->tempat_event;?></td>
						<td><?php
						$biaya = nominalisasi($row->biaya);
						echo "Rp. ".$biaya;
						?></td>
						<td>
							<a href="<?php echo base_url();?>admin/detail_event/<?php echo $row->id_event;?>"><button style="height:30px; width:56px;">Detail</button></a>
							<a href="<?php echo base_url();?>admin/lihat_edit_event/<?php echo $row->id_event;?>"><button style="height:30px; width:42px;">Edit</button></a>
							<a href="#modal"><button onclick="buka_hapus('<?php echo $row->id_event;?>')" style="height:30px; width:56px;">Hapus</button></a>
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
		<div style="float:left;width:100%;">
		<form id="contactForm">
			<a href="#" id="buka"><input type="button" value="Tambah Event" name="submit" id="submit" style="width:100px; height:40px;" /></a>
			<a href="#" id="tutup"><input type="button" value="Tambah Event" name="submit" id="submit" style="width:100px; height:40px;" /></a>
		</form>
		</div>
		<div id="tambah">
			<!-- form -->
			<form id="contactForm" action="<?php echo base_url(); ?>admin/add_event" method="post" enctype="multipart/form-data">
				<h2 class="heading">Tambah Event</h2>
				<fieldset>
					<div>
						<label class="clearfix">Nama Event</label>
						<input name="nama_event"  id="name" type="text" class="form-poshytip" title="Masukan nama event" style="width:250px;" required />
					</div>
					<div>
						<label class="clearfix">Deskripsi</label>
						<textarea name="deskripsi" class="form-poshytip" title="Masukan deskripsi event" style="resize: vertical" required></textarea>
					</div>
					<div style="margin-top:10px;">
						<label class="clearfix">Tanggal</label>
						<input name="tanggal_event"  id="name" type="date" class="form-poshytip" title="Masukan tanggal event" style="width:125px;" required />
					</div>
					<div style="margin-top:10px;">
						<label class="clearfix">Tempat</label>
						<input name="tempat_event"  id="name" type="text" class="form-poshytip" title="Masukan tempat event" style="width:250px;" required />
					</div>
					<div style="margin-top:-10px;">
						<label class="clearfix">Foto Event</label>
						<input type="file" name="foto" onchange="foto_change()" style="width:205px;" accept="image/*" /><br>Maks 1000KB
					</div>
					<div style="margin-top:5px;">
						<label class="clearfix">Biaya</label>
						Rp. <input name="biaya"  id="name" type="text" class="form-poshytip" title="Masukan biaya event" style="width:150px;" required /> ,-
					</div>
					<div style="margin-top:5px;">
						<label class="clearfix">Keterangan</label>
						<input name="keterangan_event"  id="name" type="text" class="form-poshytip" title="Masukan keterangan event" style="width:250px;" required />
					</div>
					<input type="submit" value="Simpan" name="submit" id="submit" style="margin-top:0px; width:62px; height:40px;" />
				</fieldset>
				
			</form>
			<!-- ENDS form -->
		</div>
		<!--  ENDS project content-->
    </div>
</div>
<!-- ENDS MAIN -->

<aside id="modal" style="width:25%; height:32%; margin-left:-180px;">
	<header>
		<h2 class="page-heading"><span>PESAN PERSETUJUAN</span></h2>	
	</header>
	
	<section style="margin-top:15px; margin-left:65px;">
		<div class="project-info">
			<p>
				<strong style="font-size:14px;">Apakah anda yakin untuk menghapus event ini?</strong><br/>
			</p>
		</div>
		<div class="clearfix"></div>
		<div style="margin-top:-100px; float:center;">
			<form id="contactForm" action="<?php echo base_url(); ?>admin/hapus_event" method="post" enctype="multipart/form-data">
				<fieldset>
					<input name="id_event_hapus" id="id_event_hapus" type="hidden" class="form-poshytip" />
					&nbsp;&nbsp;&nbsp;&nbsp;
					<input type="submit" value="Ya" name="submit" id="submit" style="margin-top:0px; width:60px; height:40px;" />
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<a href="#"><input type="button" value="Tidak" name="submit" id="submit" style="width:60px; height:40px;" /></a>
				</fieldset>
			</form>
		</div>
	</section>
</aside>