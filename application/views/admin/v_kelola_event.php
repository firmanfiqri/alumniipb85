<script>
    $(document).ready(function() {
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
		
        $('#myTable').DataTable();
		
    });
</script>

<!-- MAIN -->
<div id="main">	
    <div class="wrapper clearfix">

        <h2 class="page-heading"><span>DATA EVENT</span></h2>	

        <!-- project content -->
        <div id="project-content" class="clearfix" style="overflow-x: scroll;">
            <table id="myTable" class="display" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Event</th>
                        <th>Tanggal</th>
                        <th>Tempat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>               
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Reuni 30th</td>
                        <td>10 Oktober 2015</td>
                        <td>Kampus IPB Bogor</td>
                        <td>
						<a href=""><button style="height:30px; width:56px;">Detail</button></a>
						<a href=""><button style="height:30px; width:42px;">Edit</button></a>
						<a href=""><button style="height:30px; width:56px;">Hapus</button></a>
						</td>
                    </tr>
					<tr>
                        <td>2</td>
                        <td>Reuni 30th</td>
                        <td>10 Oktober 2015</td>
                        <td>Kampus IPB Bogor</td>
                        <td>
						<a href=""><button style="height:30px; width:56px;">Detail</button></a>
						<a href=""><button style="height:30px; width:42px;">Edit</button></a>
						<a href=""><button style="height:30px; width:56px;">Hapus</button></a>
						</td>
                    </tr>
					<tr>
                        <td>3</td>
                        <td>Reuni 30th</td>
                        <td>10 Oktober 2015</td>
                        <td>Kampus IPB Bogor</td>
                        <td>
						<a href=""><button style="height:30px; width:56px;">Detail</button></a>
						<a href=""><button style="height:30px; width:42px;">Edit</button></a>
						<a href=""><button style="height:30px; width:56px;">Hapus</button></a>
						</td>
                    </tr>
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
			<form id="contactForm" action="#" method="post">
				<h2 class="heading">Tambah Event</h2>
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
		<!--  ENDS project content-->
    </div>
</div>
<!-- ENDS MAIN -->