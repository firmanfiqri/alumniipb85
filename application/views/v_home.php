<script>
    var fakultas = new Array();
    var jurusan = new Array();
    var prodi = new Array();

    $(document).ready(function() {

        var data;
<?php foreach ($queryfakultas as $a) { ?>
            data = new Array();
            data['id_fakultas'] = "<?php echo $a->id_fakultas ?>";
            data['nama_fakultas'] = "<?php echo $a->nama_fakultas ?>";
            fakultas.push(data);
<?php } ?>
<?php foreach ($queryjurusan as $a) { ?>
            data = new Array();
            data['id_jurusan'] = "<?php echo $a->id_jurusan ?>";
            data['id_fakultas'] = "<?php echo $a->id_fakultas ?>";
            data['nama_jurusan'] = "<?php echo $a->nama_jurusan ?>";
            jurusan.push(data);
<?php } ?>


        fakultas_change();

    });

    function fakultas_change() {
        var id = $("#fakultas").val();

        document.getElementById("jurusan").options.length = 0;
        for (var i = 0; i < jurusan.length; i++) {
            if (jurusan[i]['id_fakultas'] == id) {
                var select = document.getElementById("jurusan");
                select.options[select.options.length] = new Option(jurusan[i]['nama_jurusan'], jurusan[i]['id_jurusan']);
            }
        }

        //jurusan_change();
    }


    function confirmPass() {
        var pass = document.getElementById("pass").value
        var confPass = document.getElementById("c_pass").value
        if (pass != confPass) {
            alert('Ulang kata sandi salah!');
            document.getElementById("c_pass").value = "";
        }
    }

    function daftar_dulu() {
        alert('Mohon Login terlebih dahulu!');
    }

    function isNumber(evt) {
        evt = (evt) ? evt : window.event;
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        if (charCode > 31 && (charCode < 48 || charCode > 57)) {
            return false;
        }
        return true;
    }


    function capitalizeEachWord(str) {
        return str.replace(/\w\S*/g, function(txt) {
            return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();
        });
    }

    function Kapital() {
        var x = document.getElementById("nama_lengkap");
        x.value = capitalizeEachWord(x.value.toUpperCase());

    }



</script>

<div id="background">

    <!-- MAIN -->
    <div id="main">	
        <div class="wrapper">

            <!-- slider holder -->
            <div id="slider-holder" class="clearfix" >

                <!-- slider -->
                <div class="flexslider home-slider" style="border-radius:5px;">
                    <ul class="slides">
                        <?php
                        if ($queryevent) {

                            foreach ($queryevent as $row) {
                                ?>
                                <li>
                                    <a href="" onclick="daftar_dulu()">
                                        <img src="<?php echo base_url(); ?><?php echo $row->foto_event; ?>" alt="alt text" style="width:620px; height:400px; border-radius:5px;" />
                                        <p class="flex-caption" style="margin-bottom:0px; opacity:0.6; border-radius:2px;"><?php echo $row->nama_event; ?></p>
                                    </a>
                                </li>
                                <?php
                            }
                        } else {
                            ?>
                            <li>
                                <a href="" onclick="daftar_dulu()">
                                    <img src="<?php echo base_url(); ?>assets/img/tidak_ada_event.png" alt="alt text" style="width:620px; height:400px; border-radius:5px;" />
                                </a>
                            </li>
                            <?php
                        }
                        ?>
                    </ul>
                </div>
                <!-- ENDS slider -->

                <div class="home-slider-clearfix"></div>

                <!-- Headline -->
                <div id="headline" style="height:450px;">
                    <h1 style="margin-top:-20px;">Mendaftar</h1>
                    <!-- form -->
                    <form id="contactForm" action="<?php echo base_url(); ?>home/ambil_daftar/" method="post" style="width:0px">
                        <fieldset>
                            <div style="margin-top:-10px; width:10%;">
                                <input name="nama_lengkap"  id="nama_lengkap" type="text" class="form-poshytip" title="Masukan nama lengkap" placeholder="Nama lengkap" style="width:220px; height:10px;" onblur="Kapital()" required />
                            </div>
                            <div style="margin-top:-15px;">
                                <input name="nrp"  id="name" type="text" class="form-poshytip" title="Masukan NRP" placeholder="NRP" style="width:220px; height:10px;" onkeypress="return isNumber(event)" required />
                            </div>
                            <div style="margin-top:-10px;">
                                <input type="radio" name="jenis_kelamin" value="Laki-laki" checked="checked" /> Laki-laki &nbsp; &nbsp;
                                <input type="radio" name="jenis_kelamin" value="Perempuan"/> Perempuan &nbsp; &nbsp;
                            </div>
                            <div style="margin-top:10px;">
                                <select name="fakultas" class="form-poshytip" id="fakultas" onchange="fakultas_change()" title="Pilih fakultas" style="height:30px; width:250px;">
                                    <?php foreach ($queryfakultas as $row) { ?>
                                        <option value="<?php echo $row->id_fakultas; ?>"><?php echo $row->nama_fakultas; ?></option>
                                    <?php } ?>        
                                </select>
                            </div>
                            <div style="margin-top:5px;">
                                <select name="jurusan" class="form-poshytip" id="jurusan" title="Pilih jurusan" style="height:30px; width:123px;">
                                    <?php foreach ($queryjurusan as $row) { ?>
                                        <option value="<?php echo $row->id_jurusan; ?>"><?php echo $row->nama_jurusan; ?></option>
                                    <?php } ?>        
                                </select>
                                <select name="kelompok" class="form-poshytip" id="prodi" title="Pilih kelompok" style="height:30px; width:123px;">
                                    <?php for ($i = 3; $i < 11; $i++) { ?>
                                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div style="margin-top:5px;">
                                <input name="no_hp"  id="no_hp" type="text" class="form-poshytip" title="Masukan no. HP" placeholder="Nomor HP" style="width:220px; height:10px;" onkeypress="return isNumber(event)" required />
                            </div >
                            <div style="margin-top:-15px;">
                                <input name="email"  id="email" type="email" class="form-poshytip" title="Masukan email" placeholder="Email" style="width:220px; height:10px;" required />
                            </div >
                            <div style="margin-top:5px;">
                                <input name="password"  id="pass" type="password" class="form-poshytip" title="Masukan kata sandi" placeholder="Kata Sandi" style="width:220px; height:10px;" required />
                            </div >
                            <div style="margin-top:5px;">
                                <input name="konfirmasi_password"  id="c_pass" type="password" class="form-poshytip" title="Masukan lagi kata sandi" placeholder="Ulang Kata Sandi" style="width:220px; height:10px;" onblur="confirmPass()" required />
                            </div >
                            <div style="position:right">
                                <input type="submit" value="Daftar" name="submit" id="submit" style="width:70px; height:30px;" />
                            </div>
                        </fieldset>
                    </form>
                    <!-- ENDS form -->

                    <em id="corner"></em>
                </div>

            </div>
            <!-- ENDS headline -->
        </div>
        <!-- ENDS slider holder -->
    </div>
</div>
<!-- ENDS MAIN -->



<div id="modal" style="width:21%; height:50%; margin-left:-180px;">
    <header>
        <h2 class="page-heading"><span>Lupa Password</span></h2>	
    </header>
    <form id="contactForm" class="isian" action="<?php echo base_url(); ?>login/lupa_password" method="post">

        <section style="margin-top:20px;">
            <div class="project-info" style="margin-left:40px;">
                	
                <p>
                    <strong>Email</strong><br/>
                    <input name="email" type="email" class="form-poshytip" title="Masukan email" placeholder="Email" style="height:8px;width:140px;" required />
                </p>
                <p>
                    <strong>No Hp</strong><br/>
                    <input name="hp" type="text" class="form-poshytip" title="Masukan No HP" placeholder="No HP" style="height:8px;width:140px;" onkeypress="return isNumber(event)" required />
                </p>
                <p>                    
                    <a href="#"><input type="button" value="Batal" name="submit" style="width:84px; height:30px;" /></a>
                    <input name="submit" type="submit" id="submit" value="OK" style="height:30px; width:84px;" />
                </p>
                
            </div>
            
        </section>
    </form>
</div>