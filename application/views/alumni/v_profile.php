<script>
    var fakultas = new Array();
    var jurusan = new Array();
    var prodi = new Array();

    $(document).ready(function() {
        $('.form_alumni').hide();

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

        fakultas_change();

    });

    function edit_data() {
        $('.data_alumni').hide();
        $('.form_alumni').show();
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
                alert($("#foto").val());
                $("#foto").val("");
                alert(fsize + " bytes\nToo big!");
            } else {
                alert($("#foto").val());
                $("#foto").val("");
                alert(fsize + " bytes\nYou are good to go!");
            }
        } else {
            alert("Please upgrade your browser, because your current browser lacks some new features we need!");
        }
    }

</script>
<!-- MAIN -->
<div id="main">	

    <div class="wrapper clearfix">
        <form class="isian" action="<?php echo base_url(); ?>alumni/profile" method="post">
            <h2 class="page-heading"><span>PROFIL</span></h2>	

            <!-- project content -->
            <div id="project-content" class="clearfix">

                <div class="home-block">
                    <div class="one-fourth-thumbs">
                        <figure>
                            <img src="<?php echo base_url(); ?>assets/img/dummies/featured-7.jpg" alt="Alt text" />
                            <input type="file" id="foto" onchange="foto_change()" name="foto" accept="image/*" class="form_alumni" required>
                        </figure>
                    </div>

                    <div class="project-info">
                        <p>
                            <strong>Nama Lengkap</strong><br/>
                            <span class="data_alumni"><?php echo $data_profile->nama_alumni; ?></span>
                            <input type="text" class="form_alumni" name="nama_lengkap" value="<?php echo $data_profile->nama_alumni; ?>" required>
                        </p>
                        <p>
                            <strong>Nama Panggilan</strong><br/>
                            <span class="data_alumni"><?php echo $data_profile->nama_panggilan; ?></span>
                            <input type="text" class="form_alumni" name="nama_panggilan" value = "<?php echo $data_profile->nama_panggilan; ?>" required>
                        </p>
                        <p>
                            <strong>Jenis Kelamin</strong><br/>
                            <span class="data_alumni">Laki-laki</span>
                            <select name="jenis_kelamin" class="form_alumni">
                                <option value="Laki-laki" <?php
                                if ($data_profile->jenis_kelamin == "Laki-laki") {
                                    echo "selected";
                                }
                                ?>>Laki-laki</option>
                                <option value="Perempuan" <?php
                                if ($data_profile->jenis_kelamin == "Perempuan") {
                                    echo "selected";
                                }
                                ?>>Perempuan</option>
                            </select>
                        </p>
                        <p>
                            <strong>NRP</strong><br/>
                            <span class="data_alumni"><?php echo $data_profile->nrp; ?></span>
                            <input type="text" class="form_alumni" name="nrp" value="<?php echo $data_profile->nrp; ?>" srequired>
                        </p>
                        <p>
                            <strong>Kelompok</strong><br/>
                            <span class="data_alumni"><?php echo $data_profile->kelompok; ?></span>
                            <input type="text" class="form_alumni" name="kelompok" value="<?php echo $data_profile->kelompok; ?>" required>
                        </p>
                        <p>
                            <strong>Fakultas</strong><br/>
                            <span class="data_alumni"><?php echo $data_profile->nama_fakultas; ?></span>
                            <select name="fakultas" id="fakultas" onchange="fakultas_change()" class="form_alumni">
                                <?php foreach ($fakultas as $row) { ?>
                                    <option value="<?php echo $row->id_fakultas; ?>" <?php
                                    if ($data_profile->nama_fakultas == $row->nama_fakultas) {
                                        echo "selected";
                                    }
                                    ?>><?php echo $row->nama_fakultas; ?></option>
                                        <?php } ?>                             

                            </select>
                        </p>
                    </div>

                    <div class="project-info">
                        <p>
                            <strong>Jurusan</strong><br/>
                            <span class="data_alumni"><?php echo $data_profile->nama_jurusan; ?></span>
                            <select name="jurusan" id="jurusan" onchange="jurusan_change()" class="form_alumni">
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
                            <strong>Program Studi</strong><br/>
                            <span class="data_alumni"><?php echo $data_profile->nama_prodi; ?></span>
                            <select name="prodi" id="prodi" onchange="prodi_change()" class="form_alumni">
                                <?php foreach ($prodi as $row) { ?>
                                    <option value="<?php echo $row->id_prodi; ?>" <?php
                                    if ($data_profile->nama_prodi == $row->nama_prodi) {
                                        echo "selected";
                                    }
                                    ?>><?php echo $row->nama_prodi; ?></option>
                                        <?php } ?>                             

                            </select>
                        </p>                    
                        <p>
                            <strong>No. HP</strong><br/>
                            <span class="data_alumni"><?php echo $data_profile->no_hp; ?></span>
                            <input type="number" class="form_alumni" name="hp" value="<?php echo $data_profile->no_hp; ?>" required>

                        </p>
                        <p>
                            <strong>Email</strong><br/>
                            <span class="data_alumni"><?php echo $data_profile->email; ?></span>
                            <input type="email" class="form_alumni" name="email" value="<?php echo $data_profile->email; ?>" required>
                        </p>
                        <p>
                            <strong>Profesi</strong><br/>
                            <span class="data_alumni"><?php echo $data_profile->profesi; ?></span>
                            <input type="text" class="form_alumni" name="profesi" value="<?php echo $data_profile->profesi; ?>" required>
                        </p>
                        <p>
                            <strong>Alamat Rumah</strong><br/>
                            <span class="data_alumni"><?php echo $data_profile->alamat_rumah; ?></span>
                            <textarea name="alamat_rumah" class="form_alumni" cols="22" rows="5" required><?php echo $data_profile->alamat_rumah; ?></textarea>
                        </p>
                    </div>
                    <div class="project-info">

                        <p>
                            <strong>Alamat Kantor</strong><br/>
                            <span class="data_alumni"><?php echo $data_profile->alamat_kantor; ?></span>
                            <textarea name="alamat_kantor" class="form_alumni" cols="22" rows="5" required><?php echo $data_profile->alamat_kantor; ?></textarea>
                        </p>
                        <p>
                            <strong>Bidang Keahlian</strong><br/>
                            <span class="data_alumni"><?php echo $data_profile->bidang_keahlian; ?></span>
                            <textarea name="bidang keahlian" class="form_alumni" cols="22" rows="5" required><?php echo $data_profile->bidang_keahlian; ?></textarea>
                        </p>

                    </div>
                </div>


                <div class="clearfix"></div>


            </div>	        	
            <!--  ENDS project content-->


            <div class="page-navigation clearfix">

                <div class="nav-previous">
                    <input class="form_alumni" type="submit" name="edit" value="Simpan">
                    <a class="data_alumni" onclick="edit_data()">Ubah Data</a> 
                </div>
                <!--ENDS page-navigation -->

            </div>
        </form>
    </div>

</div>
<!-- ENDS MAIN -->
