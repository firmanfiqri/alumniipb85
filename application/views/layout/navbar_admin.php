<header class="clearfix">

    <div class="wrapper clearfix">
		<a href="<?php echo base_url(); ?>" id="logo"><img  src="<?php echo base_url();?>assets/img/logo.png" alt="Zeni"></a>
		
		<nav>
			<ul id="nav" class="sf-menu">
				<li <?php if($lv == 1){echo "class='current-menu-item'";}?>><a href="<?php echo base_url();?>admin">ALUMNI</a></li>
				<li <?php if($lv == 2){echo "class='current-menu-item'";}?>><a href="<?php echo base_url();?>admin/event">EVENT</a></li>
				<li <?php if($lv == 3){echo "class='current-menu-item'";}?>><a href="<?php echo base_url();?>admin/konfirmasi_pembayaran">KONFIRMASI PEMBAYARAN</a></li>
				<li><a href="<?php echo base_url();?>login/logout">LOGOUT</a></li>
			</ul>
			<div id="combo-holder"></div>
		</nav>
	</div>
</header>