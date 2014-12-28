<script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
</script>

<!-- MAIN -->
<div id="main">	
    <div class="wrapper clearfix">

		<h2 class="page-heading"><span>DATA PEMBAYARAN</span></h2>	
	
		<!-- form -->
		<form id="contactForm" action="#" method="post" style="margin-top:20px;">
			<fieldset>
				<div>
					<select name="kelompok" class="form-poshytip" title="Pilih event" style="height:40px;">
						<option value="">Reuni IPB '85</option>
						<option value="">Seminar Nasional Pertanian</option>
					</select>
					&nbsp;&nbsp;
					<input type="button" value="Pilih" name="submit" id="submit" style="margn-top:-20px; width:62px; height:40px;" />
				</div>
			</fieldset>
			
		</form>
		<!-- ENDS form -->
		
        <!-- project content -->
        <div id="project-content" class="clearfix" style="overflow-x: scroll;">
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
                    <tr>
                        <td>1</td>
                        <td>AI-001</td>
                        <td>Rp. 250.000,-</td>
                        <td>Belum Konfirmasi</td>
                        <td>
						<a href=""><button style="height:30px; width:56px;">Detail</button></a>
						</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>AI-001</td>
                        <td>Rp. 250.000,-</td>
                        <td>Belum Konfirmasi</td>
                        <td>
						<a href=""><button style="height:30px; width:56px;">Detail</button></a>
						</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>AI-001</td>
                        <td>Rp. 250.000,-</td>
                        <td>Belum Konfirmasi</td>
                        <td>
						<a href=""><button style="height:30px; width:56px;">Detail</button></a>
						</td>
                    </tr>
                </tbody>
            </table>
            <!-- ends fullwidth content -->
            <div class="clearfix"></div>

        </div>	        	
        <!--  ENDS project content-->
    </div>
</div>
<!-- ENDS MAIN -->
