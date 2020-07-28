<section id="fh5co-home" data-section="home" style="background-image: url(<?= base_url('assets/img'); ?>/tumpukan-buku.jpg);" data-stellar-background-ratio="0.5">
		<div class="gradient"></div>
		<div class="container">
			<div class="text-wrap">
				<div class="text-inner">
					<div class="row">
						<div class="col-md-8 col-md-offset-2 text-center">
							<h1 class="animate-box"><span class="big">Selamat datang</span> <br><span>di</span> <br><span class="medium">Layanan software gratis</span><br></h1>
							<!-- <h2 class="animate-box">Klik disini<a href="<?= base_url('download'); ?>" target="_blank" class="fh5co-link"><br><br><img src="<?= base_url('assets/img'); ?>/tangantunjukbawah.svg" alt="" height="50px"></a></h2> -->
							<div class="call-to-action">
								<a href="<?= base_url('download'); ?>" class="download animate-box"><i class="icon-download"></i> Download</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
    </section>


	<section id="fh5co-explore" data-section="explore">
		<div class="container">
			<div class="row">
				<div class="col-md-12 section-heading text-center">
					<h2 class="animate-box">Daftar Software</h2>
					<div class="row">
						<div class="col-md-8 col-md-offset-2 subtext animate-box">
							<h3>Silahkan download software yang anda inginkan! Gratis!!</h3>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div id="fh5co-counter-section" class="fh5co-counters" >
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-md-offset-3 animate-box">
						<p>
							<?php $i = 1; foreach($download as $d): ?>
							- <?= $d->nama; ?> <a href="<?= base_url('index.php/download/index/'.$d->link); ?>">unduh</a><br>
							<?php endforeach; ?>
						</p>
					</div>
				</div>
				<br><br>
				<div class="row animate-box text-center">
					<h2 class="animate-box">Jumlah software</h2>
					<span class="fh5co-counter js-counter text-center" data-from="0" data-to="<?= $jumlah_software; ?>" data-speed="5000" data-refresh-interval="50"></span>
				</div>
			</div>
		</div>
		
	</section>