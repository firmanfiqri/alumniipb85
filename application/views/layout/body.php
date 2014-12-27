<!-- MAIN -->
        <div id="main">	
            <div class="wrapper">

                <!-- slider holder -->
                <div id="slider-holder" class="clearfix" >

                    <!-- slider -->
                    <div class="flexslider home-slider" style="border-radius:5px;">
                        <ul class="slides">
                            <li>
                                <img src="<?php echo base_url();?>assets/img/slides/01.jpg" alt="alt text" style="width:620px; height:400px; border-radius:5px;" />
								<p class="flex-caption" style="margin-bottom:0px; opacity:0.6; border-radius:2px;">Pellentesque habitant morbi  feugiat vitae.</p>
                            </li>
                            <li>
                                <img src="<?php echo base_url();?>assets/img/slides/02.jpg" alt="alt text" style="width:620px; height:400px; border-radius:5px;" />
                                <p class="flex-caption" style="margin-bottom:0px; opacity:0.6; border-radius:2px;">Pellentesque habitant morbi  feugiat vitae.</p>
                            </li>
                            <li>
                                <img src="<?php echo base_url();?>assets/img/slides/03.jpg" alt="alt text" style="width:620px; height:400px; border-radius:5px;" />
								<p class="flex-caption" style="margin-bottom:0px; opacity:0.6; border-radius:2px;">Pellentesque habitant morbi  feugiat vitae.</p>
                            </li>
                        </ul>
                    </div>
                    <!-- ENDS slider -->

                    <div class="home-slider-clearfix"></div>

                    <!-- Headline -->
                    <div id="headline" style="height:425px;">
                        <h1 style="margin-top:-20px;">Mendaftar</h1>
                        <!-- form -->
						<form id="contactForm" action="#" method="post">
							<fieldset>
								<div style="margin-top:-10px;">
									<input name="nama_lengkap"  id="name" type="text" class="form-poshytip" title="Masukan nama lengkap" placeholder="Nama lengkap" style="width:220px; height:10px;" required />
								</div>
								<div style="margin-top:-15px;">
									<input name="nrp"  id="name" type="text" class="form-poshytip" title="Masukan NRP" placeholder="NRP" style="width:220px; height:10px;" required />
								</div >
								<div style="margin-top:-15px;">
									<select name="fakultas" class="form-poshytip" title="Pilih fakultas" style="height:30px;">
										<option value="">FPMIPA</option>
										<option value="">FPTK</option>
										<option value="">FPIPS</option>
										<option value="">FPOK</option>
										<option value="">FPBS</option>
									</select>
									<select name="kelompok" class="form-poshytip" title="Pilih jurusan" style="height:30px;">
										<option value="">Matematika</option>
										<option value="">Biologi</option>
										<option value="">Kimia</option>
										<option value="">Fisika</option>
										<option value="">Ilmu Komputer</option>
									</select>
								</div>
								<div style="margin-top:5px;">
									<select name="kelompok" class="form-poshytip" title="Pilih kelompok" style="height:30px;">
										<option value="">Matematika Murni</option>
										<option value="">Pendidikan Matematika</option>
									</select>
								</div>
								<div style="margin-top:5px;">
									<select name="kelompok" class="form-poshytip" title="Pilih kelompok" style="height:30px;">
										<option value="">1</option>
										<option value="">2</option>
										<option value="">3</option>
										<option value="">4</option>
										<option value="">5</option>
									</select>
								</div>
								<div style="margin-top:5px;">
									<input name="email"  id="email" type="email" class="form-poshytip" title="Masukan email" placeholder="Email" style="width:220px; height:10px;" required />
								</div >
								<div style="margin-top:5px;">
									<input name="password"  id="password" type="password" class="form-poshytip" title="Masukan kata sandi" placeholder="Kata Sandi" style="width:220px; height:10px;" required />
								</div >
								<div style="margin-top:5px;">
									<input name="konfirmasi_password"  id="password" type="password" class="form-poshytip" title="Masukan lagi kata sandi" placeholder="Ulang Kata Sandi" style="width:220px; height:10px;" required />
								</div >
								<div style="position:right">
									<input type="button" value="Daftar" name="submit" id="submit" style="width:70px; height:30px;" />
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