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
		<?php foreach ($queryprodi as $a) { ?>
		data = new Array();
		data['id_prodi'] = "<?php echo $a->id_prodi ?>";
		data['id_jurusan'] = "<?php echo $a->id_jurusan ?>";
		data['nama_prodi'] = "<?php echo $a->nama_prodi ?>";
		prodi.push(data);
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
	
	function confirmPass() {
        var pass = document.getElementById("pass").value
        var confPass = document.getElementById("c_pass").value
        if(pass != confPass) {
            alert('Ulang kata sandi salah!');
			document.getElementById("c_pass").value = "";
        }
    }
</script>

<!-- MAIN -->
        <div id="main">	
            <div class="wrapper">

                <!-- slider holder -->
                <div id="slider-holder" class="clearfix" >

                    <!-- slider -->
                    <div class="flexslider home-slider" style="border-radius:5px;">
                        <ul class="slides">
							<?php
							foreach($queryevent as $row){
							?>
                            <li>
                                <img src="<?php echo base_url();?><?php echo $row->foto_event; ?>" alt="alt text" style="width:620px; height:400px; border-radius:5px;" />
								<p class="flex-caption" style="margin-bottom:0px; opacity:0.6; border-radius:2px;"><?php echo $row->nama_event; ?></p>
                            </li>
							<?php
							}
							?>
                        </ul>
                    </div>
                    <!-- ENDS slider -->

                    <div class="home-slider-clearfix"></div>

                    <!-- Headline -->
                    <div id="headline" style="height:425px;">
                        <h1 style="margin-top:-20px;">Mendaftar</h1>
                        <!-- form -->
						<form id="contactForm" action="<?php echo base_url(); ?>home/ambil_daftar/" method="post">
							<fieldset>
								<div style="margin-top:-10px;">
									<input name="nama_lengkap"  id="name" type="text" class="form-poshytip" title="Masukan nama lengkap" placeholder="Nama lengkap" style="width:220px; height:10px;" required />
								</div>
								<div style="margin-top:-15px;">
									<input name="nrp"  id="name" type="text" class="form-poshytip" title="Masukan NRP" placeholder="NRP" style="width:220px; height:10px;" required />
								</div>
								<div style="margin-top:-10px;">
									<input type="radio" name="jenis_kelamin" value="Laki-laki" checked="checked" /> Laki-laki &nbsp; &nbsp;
									<input type="radio" name="jenis_kelamin" value="Perempuan"/> Perempuan &nbsp; &nbsp;
								</div>
								<div style="margin-top:10px;">
									<select name="fakultas" class="form-poshytip" id="fakultas" onchange="fakultas_change()" title="Pilih fakultas" style="height:30px; width:123px;">
										<?php foreach ($queryfakultas as $row) { ?>
										<option value="<?php echo $row->id_fakultas; ?>"><?php echo $row->nama_fakultas; ?></option>
										<?php } ?>        
									</select>
									<select name="jurusan" class="form-poshytip" id="jurusan" onchange="jurusan_change()" title="Pilih jurusan" style="height:30px; width:123px;">">
										<?php foreach ($queryjurusan as $row) { ?>
										<option value="<?php echo $row->id_jurusan; ?>"><?php echo $row->nama_jurusan; ?></option>
										<?php } ?>        
									</select>
								</div>
								<div style="margin-top:5px;">
									<select name="prodi" class="form-poshytip" id="prodi" onchange="prodi_change()" title="Pilih prodi" style="height:30px; width:123px;">
										<?php foreach ($queryprodi as $row) { ?>
										<option value="<?php echo $row->id_prodi; ?>"><?php echo $row->nama_prodi; ?></option>
										<?php } ?>        
									</select>
								</div>
								<div style="margin-top:5px;">
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
                    <!-- ENDS headline -->
                </div>
                <!-- ENDS slider holder -->
            </div>
        </div>
        <!-- ENDS MAIN -->