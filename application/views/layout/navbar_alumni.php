<header class="clearfix">

    <div class="wrapper">
        <a href="<?php echo base_url(); ?>" id="logo"><img  src="<?php echo base_url(); ?>assets/img/logo.png" alt="Zeni"></a>

        <nav>
            <ul id="nav" class="sf-menu">
                <li <?php if($lv == 1){echo "class='current-menu-item'";}?>><a href="<?php echo base_url();?>alumni">HOME</a></li>
                <li <?php if($lv == 2){echo "class='current-menu-item'";}?>><a href="<?php echo base_url();?>alumni/profile">PROFILE</a></li>
                <li <?php if($lv == 3){echo "class='current-menu-item'";}?>><a href="<?php echo base_url();?>alumni/event">EVENT</a></li>
                <li <?php if($lv == 4){echo "class='current-menu-item'";}?>><a href="<?php echo base_url();?>alumni/history">HISTORY</a></li>
                <li><a href="<?php echo base_url();?>login/logout">LOGOUT</a></li>
            </ul>
            <div id="combo-holder"></div>
        </nav>

    </div>
</header>