<script>
    var fakultas = new Array();
    var jurusan = new Array();
    var prodi = new Array();

    $(document).ready(function() {
        $('.form_alumni').hide();
        $('.form_sandi').hide();

        var data;
<?php foreach ($fakultas as $a) { ?>
            data = new Array();
            data['id_fakultas'] = "<?php echo $a->id_fakultas ?>";
            data['nama_fakultas'] = "<?php echo $a->nama_fakultas ?>";
            fakultas.push(data);
<?php } ?>
<?php foreach ($jurusan as $a) { ?>
            data = new Array();
            data['id_jurusan'] = "<?php echo $a->id_jurusan ?>";
            data['id_fakultas'] = "<?php echo $a->id_fakultas ?>";
            data['nama_jurusan'] = "<?php echo $a->nama_jurusan ?>";
            jurusan.push(data);
<?php } ?>
<?php foreach ($prodi as $a) { ?>
            data = new Array();
            data['id_prodi'] = "<?php echo $a->id_prodi ?>";
            data['id_jurusan'] = "<?php echo $a->id_jurusan ?>";
            data['nama_prodi'] = "<?php echo $a->nama_prodi ?>";
            prodi.push(data);
<?php } ?>

        $(".isian").submit(function(e) {
            var pass = "<?php echo$data_profile->password;?>";
            var pass_ketik = $("#pwd_lama").val();
            var pass_baru = $("#pwd_baru").val();
            var konfirm_pass_baru = $("#konfirm_pwd").val();
            if (pass_ketik != "" || pass_baru != "" || konfirm_pass_baru != "") {
                if (pass == pass_ketik) {
                    if (pass_baru == konfirm_pass_baru) {

                    } else {
                        alert("Konfirmasi password baru tidak sesuai");
                        $("#pwd_lama").val("");
                        $("#pwd_baru").val("");
                        $("#konfirm_pwd").val("");
                        e.preventDefault();
                    }
                } else {
                    alert("Password lama tidak sesuai");
                    $("#pwd_lama").val("");
                    $("#pwd_baru").val("");
                    $("#konfirm_pwd").val("");
                    e.preventDefault();
                }
            }

        });


        fakultas_change();
<?php if ($edit == true) { ?>
    <?php if ($sukses_edit == true) { ?>
                alert("Berhasil ubah data!");
    <?php } else { ?>
                alert("Gagal ubah data!");
    <?php } ?>
<?php } ?>
    });

    function edit_data() {
        $('.data_alumni').hide();
        $('.form_alumni').show();
    }
	
	function edit_sandi() {
        $('.data_alumni').hide();
        $('.hilang').hide();
        $('.form_sandi').show();
    }
	
    function fakultas_change() {
        var id = $("#fakultas").val();

        document.getElementById("jurusan").options.length = 0;
        for (var i = 0; i < jurusan.length; i++) {
            if (jurusan[i]['id_fakultas'] == id) {
                var select = document.getElementById("jurusan");
                select.options[select.options.length] = new Option(jurusan[i]['nama_jurusan'], jurusan[i]['id_jurusan']);
            }
        }

        jurusan_change();
    }
    function jurusan_change() {
        var id = $("#jurusan").val();

        document.getElementById("prodi").options.length = 0;
        for (var i = 0; i < prodi.length; i++) {
            if (prodi[i]['id_jurusan'] == id) {
                var select = document.getElementById("prodi");
                select.options[select.options.length] = new Option(prodi[i]['nama_prodi'], prodi[i]['id_prodi']);
            }
        }
    }

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

</script>
<!-- MAIN -->
<div id="main">	

    <div class="wrapper clearfix">
            <h2 class="page-heading"><span>PROFIL</span></h2>	
            <form id="contactForm" class="isian" action="<?php echo base_url(); ?>alumni/profile" method="post" enctype="multipart/form-data">

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
						<input type="file" id="foto" onchange="foto_change()" name="foto" accept="image/*" class="form_alumni">
						<span class="form_alumni">batas maks 100 KB</span>
						</figure>
                    </div>

                    <div class="project-info" style="margin-left:70px;">
                        <p class="form_sandi">
                            <strong>Password Lama</strong><br/>
                            <input type="password" id="pwd_lama" name="pwd_lama" value="" style="width:200px; height:15px;">

                        </p>
                        <p class="form_sandi">
                            <strong>Password Baru</strong><br/>
                            <input type="password" id="pwd_baru" name="pwd_baru" value="" style="width:200px; height:15px;">
                        </p>
                        <p class="form_sandi">
                            <strong>Konfimasi Password Baru</strong><br/>
                            <input type="password" id="konfirm_pwd" name="konfirm_pwd" value="" style="width:200px; height:15px;">
                        </p>
						
						<input class="form_sandi" type="submit" name="edit" value="Simpan" style="height:40px; width:80px;">
						
						<p>
                            <strong class="hilang">Nama Lengkap</strong><br/>
                            <span class="data_alumni"><?php echo $data_profile->nama_alumni; ?></span>
                            <input type="text" class="form_alumni" name="nama_lengkap" value="<?php echo $data_profile->nama_alumni; ?>" style="width:225px; height:15px;" required>
                        </p>
                        <p>
                            <strong class="hilang">Nama Panggilan</strong><br/>
                            <span class="data_alumni"><?php echo $data_profile->nama_panggilan; ?></span>
                            <input type="text" class="form_alumni" name="nama_panggilan" value = "<?php echo $data_profile->nama_panggilan; ?>" style="width:225px; height:15px;" required>
                        </p>
                        <p>
                            <strong class="hilang">Jenis Kelamin</strong><br/>
                            <span class="data_alumni"><?php echo $data_profile->jenis_kelamin; ?></span>
							<input type="radio" name="jenis_kelamin" class="form_alumni" value="Laki-laki"
								<?php
                                if ($data_profile->jenis_kelamin == "Laki-laki") {
                                    echo "checked";
                                }
                                ?>/> <font class="form_alumni">Laki-laki &nbsp; &nbsp;</font>
							<input type="radio" name="jenis_kelamin" class="form_alumni" value="Perempuan" <?php
                                if ($data_profile->jenis_kelamin == "Perempuan") {
                                    echo "checked";
                                }
                                ?>/> <font class="form_alumni">Perempuan &nbsp; &nbsp;</font>
                        </p>
                        <p>
                            <strong class="hilang">NRP</strong><br/>
                            <span class="data_alumni"><?php echo $data_profile->nrp; ?></span>
                            <input type="text" class="form_alumni" name="nrp" value="<?php echo $data_profile->nrp; ?>" style="width:225px; height:15px;" required>
                        </p>
                        <p>
                            <strong class="hilang">Kelompok</strong><br/>
                            <span class="data_alumni"><?php echo $data_profile->kelompok; ?></span>
                            <input type="text" class="form_alumni" name="kelompok" value="<?php echo $data_profile->kelompok; ?>" style="width:50px; height:15px;" required>
                        </p>
                        <p>
                            <strong class="hilang">Fakultas</strong><br/>
                            <span class="data_alumni"><?php echo $data_profile->nama_fakultas; ?></span>
                            <select name="fakultas" id="fakultas" onchange="fakultas_change()" class="form_alumni" style="width:225px; height:35px;">
                                <?php foreach ($fakultas as $row) { ?>
                                    <option value="<?php echo $row->id_fakultas; ?>" <?php
                                    if ($data_profile->nama_fakultas == $row->nama_fakultas) {
                                        echo "selected";
                                    }
                                    ?>><?php echo $row->nama_fakultas; ?></option>
                                        <?php } ?>                             

                            </select>
                        </p>
						<p>
                            <strong class="hilang">Jurusan</strong><br/>
                            <span class="data_alumni"><?php echo $data_profile->nama_jurusan; ?></span>
                            <select name="jurusan" id="jurusan" onchange="jurusan_change()" class="form_alumni" style="width:225px; height:35px;">
                                <?php foreach ($jurusan as $row) { ?>
                                    <option value="<?php echo $row->id_jurusan; ?>" <?php
                                    if ($data_profile->nama_jurusan == $row->nama_jurusan) {
                                        echo "selected";
                                    }
                                    ?>><?php echo $row->nama_jurusan; ?></option>
                                        <?php } ?>                             

                            </select>

                        </p>
                        <p>
                            <strong class="hilang">Program Studi</strong><br/>
                            <span class="data_alumni"><?php echo $data_profile->nama_prodi; ?></span>
                            <select name="prodi" id="prodi" onchange="prodi_change()" class="form_alumni" style="width:225px; height:35px;">
                                <?php foreach ($prodi as $row) { ?>
                                    <option value="<?php echo $row->id_prodi; ?>" <?php
                                    if ($data_profile->nama_prodi == $row->nama_prodi) {
                                        echo "selected";
                                    }
                                    ?>><?php echo $row->nama_prodi; ?></option>
                                        <?php } ?>                             

                            </select>
                        </p>
                    </div>

                    <div class="project-info" style="margin-left:100px;">
                        <p>
                            <strong class="hilang">Alamat Rumah</strong><br/>
                            <span class="data_alumni"><?php echo $data_profile->alamat_rumah; ?></span>
                            <textarea name="alamat_rumah" class="form_alumni" style="width:200px; height:100px;" required><?php echo $data_profile->alamat_rumah; ?></textarea>
                        </p>
						<p>
                            <strong class="hilang">Alamat Kantor</strong><br/>
                            <span class="data_alumni"><?php echo $data_profile->alamat_kantor; ?></span>
                            <textarea name="alamat_kantor" class="form_alumni" style="width:200px; height:100px;" required><?php echo $data_profile->alamat_kantor; ?></textarea>
                        </p>
                        <p>
                            <strong class="hilang">Nomor HP</strong><br/>
                            <span class="data_alumni"><?php echo $data_profile->no_hp; ?></span>
                            <input type="text" class="form_alumni" name="hp" value="<?php echo $data_profile->no_hp; ?>" style="width:200px; height:15px;" required>

                        </p>
                        <p>
                            <strong class="hilang">Email</strong><br/>
                            <span class="data_alumni"><?php echo $data_profile->email; ?></span>
                            <input type="email" class="form_alumni" name="email" value="<?php echo $data_profile->email; ?>" style="width:200px; height:15px;" required>
                        </p>
                        <p>
                            <strong class="hilang">Profesi</strong><br/>
                            <span class="data_alumni"><?php echo $data_profile->profesi; ?></span>
                            <input type="text" class="form_alumni" name="profesi" value="<?php echo $data_profile->profesi; ?>" style="width:200px; height:15px;" required>
                        </p>
                        <p>
                            <strong class="hilang">Bidang Keahlian</strong><br/>
                            <span class="data_alumni"><?php echo $data_profile->bidang_keahlian; ?></span>
                            <textarea name="bidang_keahlian" class="form_alumni" style="width:200px; height:100px;" required><?php echo $data_profile->bidang_keahlian; ?></textarea>
                        </p>
						<input class="form_alumni" type="submit" name="edit" value="Simpan" style="height:40px; width:80px;">
						
                    </div>
                </div>

            <div class="page-navigation clearfix">

                    <a class="data_alumni" onclick="edit_data()" style="width:100px; margin-left:200px;">Ubah Data Profil</a> 
                    <a class="data_alumni" onclick="edit_sandi()" style="width:100px; margin-left:375px; margin-top:-47px;">Ubah Kata Sandi</a> 
                <!--ENDS page-navigation -->

            </div>
                <div class="clearfix"></div>
            </div>	        	
            <!--  ENDS project content-->


        </form>
    </div>

</div>
<!-- ENDS MAIN -->
