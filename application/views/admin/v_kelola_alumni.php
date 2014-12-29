<script>
	
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
		
		$('#myTable').DataTable();
    });
	
</script>

<!-- MAIN -->
<div id="main">	
    <div class="wrapper clearfix">

        <h2 class="page-heading"><span>DATA ALUMNI</span></h2>	

        <!-- project content -->
        <div id="project-content" class="clearfix" style="overflow-x: scroll;">
            <table id="myTable" class="display" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NRP</th>
                        <th>Nama Lengkap</th>
                        <th>Kelompok</th>
                        <th>Fakultas</th>
                        <th>Jurusan</th>
                        <th>Program Studi</th>
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
						<td><?php echo $row->kelompok;?></td>
						<td><?php echo $row->nama_fakultas;?></td>
						<td><?php echo $row->nama_jurusan;?></td>
						<td><?php echo $row->nama_prodi;?></td>
						<td>
							<a href="<?php echo base_url();?>admin/detail_profile/<?php echo $row->id_alumni;?>"><button style="height:30px; width:56px;">Detail</button></a>
							<a href="#"><button id="hapus" style="height:30px; width:56px;">Hapus</button></a>
							<a href="<?php echo base_url();?>admin/reset_password/<?php echo $row->id_alumni;?>"><button style="height:30px; width:51px;">Reset</button></a>
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
