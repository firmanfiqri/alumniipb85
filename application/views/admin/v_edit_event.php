<!-- MAIN -->
<div id="main">	
    <div class="wrapper clearfix">

        <h2 class="page-heading"><span>EDIT EVENT</span></h2>	

        <!-- form -->
			<form id="contactForm" action="#" method="post" style="margin-top:20px;">
				<fieldset>
					<div>
						<label class="clearfix">Nama Event</label>
						<input name="nama_event"  id="name" type="text" class="form-poshytip" title="Masukan nama event" style="width:250px;" required />
					</div>
					<div>
						<label class="clearfix">Deskripsi</label>
						<textarea name="deskripsi_event" id="comments" class="form-poshytip" title="Masukan deskripsi event" style="resize: vertical" required></textarea>
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
						<label class="clearfix">Logo</label>
						<input type="file" name="userfile" style="width:205px;" />
					</div>
					<div style="margin-top:5px;">
						<label class="clearfix">Keterangan</label>
						<input name="keterangan_event"  id="name" type="text" class="form-poshytip" title="Masukan keterangan event" style="width:250px;" required />
					</div>
					<input type="button" value="Simpan" name="submit" id="submit" style="margn-top:-20px; width:62px; height:40px;" />
				</fieldset>
				
			</form>
			<!-- ENDS form -->
	</div>
</div>
<!-- ENDS MAIN -->