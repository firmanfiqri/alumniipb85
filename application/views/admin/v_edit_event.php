<script>
    $(document).ready(function() {
		
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
		
    });
</script>

<div id="background">
<!-- MAIN -->
<div id="main">	
    <div class="wrapper clearfix">

        <h2 class="page-heading"><span>EDIT EVENT</span></h2>	
        <!-- project content -->
        <div id="project-content" class="clearfix">
			<!-- form -->
			<form id="contactForm" action="<?php echo base_url(); ?>admin/edit_event" method="post" enctype="multipart/form-data">
				<fieldset>
					<input name="id_event" type="hidden" value = "<?php echo $editevent->id_event; ?>" />
					<div style="margin-top:10px;">
						<label class="clearfix">Kategori Event</label>
						<select name="kategori" id="kategori" class="form-poshytip" title="Masukan nama event" style="width:150px;" required>
							<?php
							if($editevent->kategori == "Seminar"){
							?>
								<option value="Seminar">Seminar</option>
								<option value="Trip">Trip</option>
							<?php
							}else{
							?>
								<option value="Trip">Trip</option>
								<option value="Seminar">Seminar</option>
							<?php
							}
							?>
						</select>
					</div>
					<div style="margin-top:10px;">
						<label class="clearfix">Nama Event</label>
						<input name="nama_event"  id="name" type="text" class="form-poshytip" title="Masukan nama event" value = "<?php echo $editevent->nama_event; ?>" style="width:250px;" required />
					</div>
					<div>
						<label class="clearfix">Deskripsi</label>
						<textarea name="deskripsi" class="form-poshytip" title="Masukan deskripsi event" style="resize: vertical" required><?php echo $editevent->deskripsi; ?></textarea>
					</div>
					<div style="margin-top:10px;">
						<label class="clearfix">Tanggal</label>
						<input name="tanggal_event"  id="name" type="date" class="form-poshytip" title="Masukan tanggal event" value = "<?php echo $editevent->tanggal_event; ?>" style="width:125px;" required />
					</div>
					<div style="margin-top:10px;">
						<label class="clearfix">Tempat</label>
						<input name="tempat_event"  id="name" type="text" class="form-poshytip" title="Masukan tempat event" value = "<?php echo $editevent->tempat_event; ?>" style="width:250px;" required />
					</div>
					<div style="margin-top:-10px;">
						<label class="clearfix">Foto Event</label>
						<?php if($editevent->foto_event==null){?>
							<img src="<?php echo base_url(); ?>assets/img/dummy_event.png" alt="Alt text" style="width:60%; height:40%;"/>
						<?php }else{ ?>
							<img src="<?php echo base_url().$editevent->foto_event; ?>" alt="Alt text" style="width:60%; height:40%;"/>
						<?php } ?>
						<br />
						<input type="file" name="foto" onchange="foto_change()" style="width:205px;" accept="image/*" /><br/>Maks 1000KB
					</div>
					<div style="margin-top:5px;">
						<label class="clearfix">Biaya</label>
						Rp. <input name="biaya"  id="name" type="text" class="form-poshytip" title="Masukan biaya event" value = "<?php echo $editevent->biaya; ?>" style="width:150px;" required /> ,-
					</div>
					
					<div style="margin-top:5px;">
						<label class="clearfix">Keterangan</label>
						<input name="keterangan_event"  id="name" type="text" class="form-poshytip" title="Masukan keterangan event" value = "<?php echo $editevent->keterangan; ?>" style="width:250px;" required />
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