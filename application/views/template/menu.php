<header role="banner" id="fh5co-header">
    <div class="container">
        <div class="row">
            <nav class="navbar navbar-default navbar-fixed-top">
                <div class="navbar-header">
                    <!-- Mobile Toggle Menu Button -->
                    <a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"><i></i></a>
                    <a class="navbar-brand" href="<?= base_url(); ?>">SOFTWARE</a> 
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="active"><a href="#" ><span>Beranda</span></a></li>
                        <li><a href="<?= base_url('download'); ?>"  target="_blank"><span>Download</span></a></li>
                        <li>
                        <?php if($this->session->userdata('logged_in') == TRUE) {  ?>
                            <a><span><p>Selamat datang "<?= $this->session->userdata("username"); ?>"</p></span></a>
                        
                        <?php } else { ?>

                            <a href="<?= base_url('login'); ?>" target="_blank"><span>Login</span></a>"
                        <?php } ?>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
  </div>
</header>