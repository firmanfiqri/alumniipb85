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

        $(".isian").submit(function(e) {
            var pass = "<?php echo$data_profile->password; ?>";
            var pass_ketik = md5($("#pwd_lama").val());
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
    
        $('#nrp').tipsy({gravity: 'w'});
        $('#bidang_keahlian').tipsy({gravity: 'n'});
    });
    function edit_data() {
        $('.data_alumni').hide();
        $('.form_alumni').show();
        
        profesi_change();
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
        
        if(id[0]==1){
            $("#kode_fak").val("A");
        }else if(id[0]==2){
            $("#kode_fak").val("B");
        }else if(id[0]==3){
            $("#kode_fak").val("C");
        }else if(id[0]==4){
            $("#kode_fak").val("D");
        }else if(id[0]==5){
            $("#kode_fak").val("E");
        }else if(id[0]==6){
            $("#kode_fak").val("F");
        }else if(id[0]==7){
            $("#kode_fak").val("G");
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
        
        var x = document.getElementById("nama_panggilan");
        x.value = capitalizeEachWord(x.value.toUpperCase());
    }

    function profesi_change() {
        var x = document.getElementById("profesi");
        if(x.value == "IRT"){
            $('.irt_hide').hide();
            $("#instansi").val("-");
            $("#bidang_usaha").val("-");
            $("#alamat_kantor").val("-");
        }else{            
            $('.irt_hide').show();
            $("#instansi").val("");
            $("#bidang_usaha").val("");
            $("#alamat_kantor").val("");
        }
    }

    function md5(str) {
        //  discuss at: http://phpjs.org/functions/md5/
        // original by: Webtoolkit.info (http://www.webtoolkit.info/)
        // improved by: Michael White (http://getsprink.com)
        // improved by: Jack
        // improved by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
        //    input by: Brett Zamir (http://brett-zamir.me)
        // bugfixed by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
        //  depends on: utf8_encode
        //   example 1: md5('Kevin van Zonneveld');
        //   returns 1: '6e658d4bfcb59cc13f96c14450ac40b9'

        var xl;
        var rotateLeft = function(lValue, iShiftBits) {
            return (lValue << iShiftBits) | (lValue >>> (32 - iShiftBits));
        };
        var addUnsigned = function(lX, lY) {
            var lX4, lY4, lX8, lY8, lResult;
            lX8 = (lX & 0x80000000);
            lY8 = (lY & 0x80000000);
            lX4 = (lX & 0x40000000);
            lY4 = (lY & 0x40000000);
            lResult = (lX & 0x3FFFFFFF) + (lY & 0x3FFFFFFF);
            if (lX4 & lY4) {
                return (lResult ^ 0x80000000 ^ lX8 ^ lY8);
            }
            if (lX4 | lY4) {
                if (lResult & 0x40000000) {
                    return (lResult ^ 0xC0000000 ^ lX8 ^ lY8);
                } else {
                    return (lResult ^ 0x40000000 ^ lX8 ^ lY8);
                }
            } else {
                return (lResult ^ lX8 ^ lY8);
            }
        };
        var _F = function(x, y, z) {
            return (x & y) | ((~x) & z);
        };
        var _G = function(x, y, z) {
            return (x & z) | (y & (~z));
        };
        var _H = function(x, y, z) {
            return (x ^ y ^ z);
        };
        var _I = function(x, y, z) {
            return (y ^ (x | (~z)));
        };
        var _FF = function(a, b, c, d, x, s, ac) {
            a = addUnsigned(a, addUnsigned(addUnsigned(_F(b, c, d), x), ac));
            return addUnsigned(rotateLeft(a, s), b);
        };
        var _GG = function(a, b, c, d, x, s, ac) {
            a = addUnsigned(a, addUnsigned(addUnsigned(_G(b, c, d), x), ac));
            return addUnsigned(rotateLeft(a, s), b);
        };
        var _HH = function(a, b, c, d, x, s, ac) {
            a = addUnsigned(a, addUnsigned(addUnsigned(_H(b, c, d), x), ac));
            return addUnsigned(rotateLeft(a, s), b);
        };
        var _II = function(a, b, c, d, x, s, ac) {
            a = addUnsigned(a, addUnsigned(addUnsigned(_I(b, c, d), x), ac));
            return addUnsigned(rotateLeft(a, s), b);
        };
        var convertToWordArray = function(str) {
            var lWordCount;
            var lMessageLength = str.length;
            var lNumberOfWords_temp1 = lMessageLength + 8;
            var lNumberOfWords_temp2 = (lNumberOfWords_temp1 - (lNumberOfWords_temp1 % 64)) / 64;
            var lNumberOfWords = (lNumberOfWords_temp2 + 1) * 16;
            var lWordArray = new Array(lNumberOfWords - 1);
            var lBytePosition = 0;
            var lByteCount = 0;
            while (lByteCount < lMessageLength) {
                lWordCount = (lByteCount - (lByteCount % 4)) / 4;
                lBytePosition = (lByteCount % 4) * 8;
                lWordArray[lWordCount] = (lWordArray[lWordCount] | (str.charCodeAt(lByteCount) << lBytePosition));
                lByteCount++;
            }
            lWordCount = (lByteCount - (lByteCount % 4)) / 4;
            lBytePosition = (lByteCount % 4) * 8;
            lWordArray[lWordCount] = lWordArray[lWordCount] | (0x80 << lBytePosition);
            lWordArray[lNumberOfWords - 2] = lMessageLength << 3;
            lWordArray[lNumberOfWords - 1] = lMessageLength >>> 29;
            return lWordArray;
        };
        var wordToHex = function(lValue) {
            var wordToHexValue = '',
                    wordToHexValue_temp = '',
                    lByte, lCount;
            for (lCount = 0; lCount <= 3; lCount++) {
                lByte = (lValue >>> (lCount * 8)) & 255;
                wordToHexValue_temp = '0' + lByte.toString(16);
                wordToHexValue = wordToHexValue + wordToHexValue_temp.substr(wordToHexValue_temp.length - 2, 2);
            }
            return wordToHexValue;
        };
        var x = [],
                k, AA, BB, CC, DD, a, b, c, d, S11 = 7,
                S12 = 12,
                S13 = 17,
                S14 = 22,
                S21 = 5,
                S22 = 9,
                S23 = 14,
                S24 = 20,
                S31 = 4,
                S32 = 11,
                S33 = 16,
                S34 = 23,
                S41 = 6,
                S42 = 10,
                S43 = 15,
                S44 = 21;
        str = this.utf8_encode(str);
        x = convertToWordArray(str);
        a = 0x67452301;
        b = 0xEFCDAB89;
        c = 0x98BADCFE;
        d = 0x10325476;
        xl = x.length;
        for (k = 0; k < xl; k += 16) {
            AA = a;
            BB = b;
            CC = c;
            DD = d;
            a = _FF(a, b, c, d, x[k + 0], S11, 0xD76AA478);
            d = _FF(d, a, b, c, x[k + 1], S12, 0xE8C7B756);
            c = _FF(c, d, a, b, x[k + 2], S13, 0x242070DB);
            b = _FF(b, c, d, a, x[k + 3], S14, 0xC1BDCEEE);
            a = _FF(a, b, c, d, x[k + 4], S11, 0xF57C0FAF);
            d = _FF(d, a, b, c, x[k + 5], S12, 0x4787C62A);
            c = _FF(c, d, a, b, x[k + 6], S13, 0xA8304613);
            b = _FF(b, c, d, a, x[k + 7], S14, 0xFD469501);
            a = _FF(a, b, c, d, x[k + 8], S11, 0x698098D8);
            d = _FF(d, a, b, c, x[k + 9], S12, 0x8B44F7AF);
            c = _FF(c, d, a, b, x[k + 10], S13, 0xFFFF5BB1);
            b = _FF(b, c, d, a, x[k + 11], S14, 0x895CD7BE);
            a = _FF(a, b, c, d, x[k + 12], S11, 0x6B901122);
            d = _FF(d, a, b, c, x[k + 13], S12, 0xFD987193);
            c = _FF(c, d, a, b, x[k + 14], S13, 0xA679438E);
            b = _FF(b, c, d, a, x[k + 15], S14, 0x49B40821);
            a = _GG(a, b, c, d, x[k + 1], S21, 0xF61E2562);
            d = _GG(d, a, b, c, x[k + 6], S22, 0xC040B340);
            c = _GG(c, d, a, b, x[k + 11], S23, 0x265E5A51);
            b = _GG(b, c, d, a, x[k + 0], S24, 0xE9B6C7AA);
            a = _GG(a, b, c, d, x[k + 5], S21, 0xD62F105D);
            d = _GG(d, a, b, c, x[k + 10], S22, 0x2441453);
            c = _GG(c, d, a, b, x[k + 15], S23, 0xD8A1E681);
            b = _GG(b, c, d, a, x[k + 4], S24, 0xE7D3FBC8);
            a = _GG(a, b, c, d, x[k + 9], S21, 0x21E1CDE6);
            d = _GG(d, a, b, c, x[k + 14], S22, 0xC33707D6);
            c = _GG(c, d, a, b, x[k + 3], S23, 0xF4D50D87);
            b = _GG(b, c, d, a, x[k + 8], S24, 0x455A14ED);
            a = _GG(a, b, c, d, x[k + 13], S21, 0xA9E3E905);
            d = _GG(d, a, b, c, x[k + 2], S22, 0xFCEFA3F8);
            c = _GG(c, d, a, b, x[k + 7], S23, 0x676F02D9);
            b = _GG(b, c, d, a, x[k + 12], S24, 0x8D2A4C8A);
            a = _HH(a, b, c, d, x[k + 5], S31, 0xFFFA3942);
            d = _HH(d, a, b, c, x[k + 8], S32, 0x8771F681);
            c = _HH(c, d, a, b, x[k + 11], S33, 0x6D9D6122);
            b = _HH(b, c, d, a, x[k + 14], S34, 0xFDE5380C);
            a = _HH(a, b, c, d, x[k + 1], S31, 0xA4BEEA44);
            d = _HH(d, a, b, c, x[k + 4], S32, 0x4BDECFA9);
            c = _HH(c, d, a, b, x[k + 7], S33, 0xF6BB4B60);
            b = _HH(b, c, d, a, x[k + 10], S34, 0xBEBFBC70);
            a = _HH(a, b, c, d, x[k + 13], S31, 0x289B7EC6);
            d = _HH(d, a, b, c, x[k + 0], S32, 0xEAA127FA);
            c = _HH(c, d, a, b, x[k + 3], S33, 0xD4EF3085);
            b = _HH(b, c, d, a, x[k + 6], S34, 0x4881D05);
            a = _HH(a, b, c, d, x[k + 9], S31, 0xD9D4D039);
            d = _HH(d, a, b, c, x[k + 12], S32, 0xE6DB99E5);
            c = _HH(c, d, a, b, x[k + 15], S33, 0x1FA27CF8);
            b = _HH(b, c, d, a, x[k + 2], S34, 0xC4AC5665);
            a = _II(a, b, c, d, x[k + 0], S41, 0xF4292244);
            d = _II(d, a, b, c, x[k + 7], S42, 0x432AFF97);
            c = _II(c, d, a, b, x[k + 14], S43, 0xAB9423A7);
            b = _II(b, c, d, a, x[k + 5], S44, 0xFC93A039);
            a = _II(a, b, c, d, x[k + 12], S41, 0x655B59C3);
            d = _II(d, a, b, c, x[k + 3], S42, 0x8F0CCC92);
            c = _II(c, d, a, b, x[k + 10], S43, 0xFFEFF47D);
            b = _II(b, c, d, a, x[k + 1], S44, 0x85845DD1);
            a = _II(a, b, c, d, x[k + 8], S41, 0x6FA87E4F);
            d = _II(d, a, b, c, x[k + 15], S42, 0xFE2CE6E0);
            c = _II(c, d, a, b, x[k + 6], S43, 0xA3014314);
            b = _II(b, c, d, a, x[k + 13], S44, 0x4E0811A1);
            a = _II(a, b, c, d, x[k + 4], S41, 0xF7537E82);
            d = _II(d, a, b, c, x[k + 11], S42, 0xBD3AF235);
            c = _II(c, d, a, b, x[k + 2], S43, 0x2AD7D2BB);
            b = _II(b, c, d, a, x[k + 9], S44, 0xEB86D391);
            a = addUnsigned(a, AA);
            b = addUnsigned(b, BB);
            c = addUnsigned(c, CC);
            d = addUnsigned(d, DD);
        }

        var temp = wordToHex(a) + wordToHex(b) + wordToHex(c) + wordToHex(d);
        return temp.toLowerCase();
    }

</script>

<div id="background">
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
                            <?php if ($data_profile->foto == null) { ?>
                                <img src="<?php echo base_url(); ?>assets/img/dummy_profile.jpg" style="height: 240px" alt="Alt text"/>
                            <?php } else { ?>
                                <img src="<?php echo base_url() . $data_profile->foto; ?>" style="height: 240px" alt="Alt text"/>
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
                            <input type="text" class="form_alumni" name="nama_lengkap" id="nama_lengkap" onblur="Kapital()" value="<?php echo $data_profile->nama_alumni; ?>" style="width:225px; height:15px;" required>
                        </p>
                        <p>
                            <strong class="hilang">Nama Panggilan</strong><br/>
                            <span class="data_alumni"><?php echo $data_profile->nama_panggilan; ?></span>
                            <input type="text" class="form_alumni" name="nama_panggilan" id="nama_panggilan" onblur="Kapital()" value = "<?php echo $data_profile->nama_panggilan; ?>" style="width:225px; height:15px;" required>
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
                            <input type="text" name="kode_fak" id="kode_fak" class="form_alumni" style="width:10px; height:15px;" value="A" readonly=""> <span class="form_alumni">.</span> <input type="text" name="angkatan" class="form_alumni" style="width:15px; height:15px;" value="22" readonly=""> <span class="form_alumni">.</span> <input type="text" id="nrp" class="form_alumni" name="nrp" maxlength="4" onkeypress="return isNumber(event)" value="<?php echo substr($data_profile->nrp,5); ?>" style="width:40px; height:15px;" title="Masukan 4 digit terakhir NRP anda. Contoh: '0001'. Silahkan kosongkan bila anda lupa.">
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
                            <strong class="hilang">Nomor HP</strong><br/>
                            <span class="data_alumni"><?php echo $data_profile->no_hp; ?></span>
                            <input type="text" class="form_alumni" onkeypress="return isNumber(event)" name="hp" value="<?php echo $data_profile->no_hp; ?>" style="width:200px; height:15px;" required>

                        </p>
                        <p>
                            <strong class="hilang">Email</strong><br/>
                            <span class="data_alumni"><?php echo $data_profile->email; ?></span>
                            <input type="email" class="form_alumni" name="email" value="<?php echo $data_profile->email; ?>" style="width:200px; height:15px;" required readonly>
                        </p>
                        
                    </div>

                    <div class="project-info" style="margin-left:100px;">
                        <p>
                            <strong class="hilang">Alamat Rumah</strong><br/>
                            <span class="data_alumni"><?php echo $data_profile->alamat_rumah; ?></span>
                            <textarea name="alamat_rumah" class="form_alumni" style="width:200px; height:100px;" required><?php echo $data_profile->alamat_rumah; ?></textarea>
                        </p>
                        
                        
                        <p>
                            <strong class="hilang">Profesi</strong><br/>
                            <span class="data_alumni"><?php echo $data_profile->profesi; ?></span>
                            <select name="profesi" id="profesi" onchange="profesi_change()" class="form_alumni" style="width:225px; height:35px;" required>
                                
                                <option value="PNS" <?php if($data_profile->profesi == "PNS"){ echo "selected"; }?> >PNS</option>
                                <option value="Pegawai Swasta" <?php if($data_profile->profesi == "Pegawai Swasta"){ echo "selected"; }?> >Pegawai Swasta</option>
                                <option value="Wiraswasta" <?php if($data_profile->profesi == "Wiraswasta"){ echo "selected"; }?> >Wiraswasta</option>
                                <option value="Lembaga Non Pemeritah (LSM)" <?php if($data_profile->profesi == "Lembaga Non Pemeritah (LSM)"){ echo "selected"; }?> >Lembaga Non Pemeritah (LSM)</option>
                                <option value="Badan Dunia dan Afiliasi" <?php if($data_profile->profesi == "Badan Dunia dan Afiliasi"){ echo "selected"; }?> >Badan Dunia dan Afiliasi</option>
                                <option value="IRT" <?php if($data_profile->profesi == "IRT"){ echo "selected"; }?> >IRT</option>
                                <option value="BUMN" <?php if($data_profile->profesi == "BUMN"){ echo "selected"; }?> >BUMN</option>
                                <option value="BUMD" <?php if($data_profile->profesi == "BUMD"){ echo "selected"; }?> >BUMD</option>
                                                                   

                            </select>
                        </p>
                        
                        
                        <p class="irt_hide">
                            <strong class="hilang">Instansi/Perusahaan/Lembaga</strong><br/>
                            <span class="data_alumni"><?php echo $data_profile->instansi; ?></span>
                            <input type="text" class="form_alumni" name="instansi" id="instansi" value="<?php echo $data_profile->instansi; ?>" style="width:200px; height:15px;" required>
                        </p>
                        
                        <p class="irt_hide">
                            <strong class="hilang">Bidang Usaha/Kegiatan</strong><br/>
                            <span class="data_alumni"><?php echo $data_profile->bidang_usaha; ?></span>
                            <input type="text" class="form_alumni" name="bidang_usaha" id="bidang_usaha" value="<?php echo $data_profile->bidang_usaha; ?>" style="width:200px; height:15px;" required>
                        </p>
                        
                        <p class="irt_hide">
                            <strong class="hilang">Alamat Kantor</strong><br/>
                            <span class="data_alumni"><?php echo $data_profile->alamat_kantor; ?></span>
                            <textarea name="alamat_kantor" id="alamat_kantor" class="form_alumni" style="width:200px; height:100px;" required><?php echo $data_profile->alamat_kantor; ?></textarea>
                        </p>
                        
                        
                        
                        
                        <p>
                            <strong class="hilang">Bidang Keahlian</strong><br/>
                            <span class="data_alumni"><?php echo $data_profile->bidang_keahlian; ?></span>
                            <textarea id="bidang_keahlian" name="bidang_keahlian" class="form_alumni" style="width:200px; height:100px;" title="Deskripsikan bidang keahlian anda." required><?php echo $data_profile->bidang_keahlian; ?></textarea>
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
