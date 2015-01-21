<div id="background">
<!-- MAIN -->
<div id="main">	

    <div class="wrapper clearfix">
        <h2 class="page-heading"><span>PROFIL</span></h2>	
            <!-- project content -->
            <div id="project-content" class="clearfix" style="width:1000px;">

                <div class="home-block" style="margin-left:50px;">
				
                    <div class="one-fourth-thumbs">
						<figure>
						<?php if($data_profile->foto==null){?>
							<img src="<?php echo base_url(); ?>assets/img/dummy_profile.jpg" alt="Alt text"/>
						<?php }else{ ?>
							<img src="<?php echo base_url().$data_profile->foto; ?>" alt="Alt text"/>
						<?php } ?>
						</figure>
                    </div>

                    <div class="project-info" style="margin-left:70px;">
                        <p>
                            <strong class="hilang">Nama Lengkap</strong><br/>
                            <span class="data_alumni"><?php echo $data_profile->nama_alumni; ?></span>
                        </p>
                        <p>
                            <strong class="hilang">Nama Panggilan</strong><br/>
                            <span class="data_alumni"><?php echo $data_profile->nama_panggilan; ?></span>
                        </p>
                        <p>
                            <strong class="hilang">Jenis Kelamin</strong><br/>
                            <span class="data_alumni"><?php echo $data_profile->jenis_kelamin; ?></span>
						</p>
                        <p>
                            <strong class="hilang">NRP</strong><br/>
                            <span class="data_alumni"><?php echo $data_profile->nrp; ?></span>
                        </p>
                        <p>
                            <strong class="hilang">Kelompok</strong><br/>
                            <span class="data_alumni"><?php echo $data_profile->kelompok; ?></span>
                        </p>
                        <p>
                            <strong class="hilang">Fakultas</strong><br/>
                            <span class="data_alumni"><?php echo $data_profile->nama_fakultas; ?></span>
                        </p>
						<p>
                            <strong class="hilang">Jurusan</strong><br/>
                            <span class="data_alumni"><?php echo $data_profile->nama_jurusan; ?></span>
                        </p>
						<p>
                            <strong class="hilang">Nomor HP</strong><br/>
                            <span class="data_alumni"><?php echo $data_profile->no_hp; ?></span>
                        </p>
                        <p>
                            <strong class="hilang">Email</strong><br/>
                            <span class="data_alumni"><?php echo $data_profile->email; ?></span>
                        </p>
                    </div>

                    <div class="project-info" style="margin-left:100px;">
                        <p>
                            <strong class="hilang">Alamat Rumah</strong><br/>
                            <span class="data_alumni"><?php echo $data_profile->alamat_rumah; ?></span>
                        </p>
						<p>
                            <strong class="hilang">Profesi</strong><br/>
                            <span class="data_alumni"><?php echo $data_profile->profesi; ?></span>
                        </p>
                        
                        
                        <p class="irt_hide">
                            <strong class="hilang">Instansi/Perusahaan/Lembaga</strong><br/>
                            <span class="data_alumni"><?php echo $data_profile->instansi; ?></span>
                        </p>
                        
                        <p class="irt_hide">
                            <strong class="hilang">Bidang Usaha/Kegiatan</strong><br/>
                            <span class="data_alumni"><?php echo $data_profile->bidang_usaha; ?></span>
                        </p>
                        
                        <p class="irt_hide">
                            <strong class="hilang">Alamat Kantor</strong><br/>
                            <span class="data_alumni"><?php echo $data_profile->alamat_kantor; ?></span>
                        </p>
                        
                        <p>
                            <strong class="hilang">Bidang Keahlian</strong><br/>
                            <span class="data_alumni"><?php echo $data_profile->bidang_keahlian; ?></span>
                        </p>
						
                    </div>
                </div>

                <div class="clearfix"></div>

            </div>	        	
            <!--  ENDS project content-->
    </div>
</div>
<!-- ENDS MAIN -->
