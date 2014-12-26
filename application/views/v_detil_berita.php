<script type="text/javascript">
    $(document).ready(function() {
        $("#beritaUtama").show();
    });
    
    function sembunyiBerita(){
         $("#beritaUtama").slideUp()();
    }
</script>


<div class="section secondary-section " id="portfolio">
    <div class="container">
        <!-- Start details for portfolio project 1 -->
        <div id="single-project">
            
            <div id="beritaUtama" class="row-fluid single-project">
                <div class="span6">
                    <img src="<?php echo base_url(); ?>assets/images/Portfolio01.png" alt="project 1" />
                </div>
                <div class="span6">
                    <div class="project-description">
                        <div class="project-title clearfix">
                            <h3>Judul Event</h3>
                        </div>
                        <div class="project-info">
                            <div>
                                <span>Client</span>Some Client Name</div>
                            <div>
                                <span>Date</span>July 2013</div>
                            <div>
                                <span>Skills</span>HTML5, CSS3, JavaScript</div>
                            <div>
                                <span>Link</span>http://examplecomp.com</div>
                        </div>
                        <p>Believe in yourself! Have faith in your abilities! Without a humble but reasonable confidence in your own powers you cannot be successful or happy.</p>
                    </div>
                </div>
            </div>
            <?php for($i=1;$i<10;$i++){ ?>
                 
            <div id="slidingDiv<?php echo $i; ?>" class="toggleDiv row-fluid single-project">
                <div class="span6">
                    <img src="<?php echo base_url(); ?>assets/images/Portfolio01.png" alt="project 1" />
                </div>
                <div class="span6">
                    <div class="project-description">
                        <div class="project-title clearfix">
                            <h3>Judul Event</h3>
                        </div>
                        <div class="project-info">
                            <div>
                                <span>Client</span>Some Client Name</div>
                            <div>
                                <span>Date</span>July 2013</div>
                            <div>
                                <span>Skills</span>HTML5, CSS3, JavaScript</div>
                            <div>
                                <span>Link</span>http://examplecomp.com</div>
                        </div>
                        <p>Believe in yourself! Have faith in your abilities! Without a humble but reasonable confidence in your own powers you cannot be successful or happy.</p>
                    </div>
                </div>
            </div>            
            <?php } ?>
        </div>
    </div>
</div>

<div class="section third-section">
    <div class="container centered">
        <div class="sub-section">
            <div class="title clearfix">
                <div class="pull-left">
                    <h3>Event Lain</h3>
                </div>
                <ul class="client-nav pull-right">
                    <li id="client-prev"></li>
                    <li id="client-next"></li>
                </ul>
            </div>
            <ul class="row client-slider" id="clint-slider">
                <?php for($i=1;$i<10;$i++){ ?>
                    <li>
                        <a href="#single-project" class="show_hide more" rel="#slidingDiv<?php echo $i; ?>" onclick="sembunyiBerita()">
                            <img src="<?php echo base_url(); ?>assets/images/clients/ClientLogo01.png" alt="client logo 1">
                        </a>
                    </li>
                <?php } ?>                
            </ul>
        </div>
    </div>
</div>

