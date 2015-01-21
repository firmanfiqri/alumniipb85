<script>
    function lupa_password(){
        $('#modal').show();
    }
</script>

<header class="clearfix">

    <!-- top widget -->
    <div id="top-widget-holder">
        <div class="wrapper">
            <div id="top-widget">
                <div class="padding" style="height:20px;">
                    <ul  class="widget-cols clearfix">
                        <li class="first-col" style="float:right; margin-top:-20px; margin-right:20%;">
                            <!-- form -->
                            <form id="contactForm" action="<?php echo base_url(); ?>login/validasi/" method="post">
                                <fieldset>
                                    <div>
                                        <input name="email"  id="email" type="email" class="form-poshytip" title="Masukan email" placeholder="Email" style="height:8px;" required />	
                                        &nbsp;&nbsp;
                                        <input name="password" type="password" class="form-poshytip" title="Masukan kata sandi" placeholder="Kata Sandi" style="height:8px;" required />
                                        &nbsp;&nbsp;
                                        <input name="submit" type="submit" id="submit" value="Login" style="height:30px; width:60px;" /> || <a href="#modal" onclick="lupa_password()">Lupa Password?</a>
                                    </div>
                                </fieldset>

                            </form>
                            <!-- ENDS form -->
                        </li>
                    </ul>				
                </div>
            </div>
        </div>
        <a href="#" id="top-open">Menu</a>
    </div>
    <!-- ENDS top-widget -->

    <div class="wrapper clearfix" style="padding-bottom:10px;">
        <a href="<?php echo base_url(); ?>" id="logo"><img src="<?php echo base_url(); ?>assets/img/logo.png" alt="Alumni IPB '85" style="width:80%;"></a>
    </div>
</header>
