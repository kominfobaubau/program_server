<div id="fh5co-footer" role="contentinfo">
		<div class="container">
			<div class="row">
				<div class="col-md-4 animate-box">
					<h3 class="section-title">Alamat</h3>
					<ul class="contact-info">
						<li><i class="icon-map"></i>Jl. Bakti Abri No. Kel. Wolio Kec. Bukit Wolio Indah </li>
						<li><i class="icon-envelope"></i><a href="#">kominfo@baubaukota.go.id</a></li>
						<li><i class="icon-globe"></i><a href="<?= base_url(); ?>">http://software.baubaukota.go.id</a></li>
					</ul>
					<h3 class="section-title">Hubungi kami</h3>
					<ul class="social-media">
						<li><a href="#" class="facebook"><i class="icon-facebook"></i></a></li>
						<li><a href="#" class="twitter"><i class="icon-twitter"></i></a></li>
						<li><a href="#" class="dribbble"><i class="icon-dribbble"></i></a></li>
						<li><a href="#" class="github"><i class="icon-github-alt"></i></a></li>
					</ul>
				</div>
				<div class="col-md-4 animate-box">
					<h3 class="section-title">Kirim pertanyaan seputar software</h3>
					<form class="contact-form" action="<?= base_url('index.php/kirim_email/index'); ?>" method="post">
						<div class="form-group">
							<label for="name" class="sr-only">Nama</label>
							<input type="name" class="form-control" id="name" placeholder="Nama" name="nama">
							<small id="emailHelp" class="form-text text-muted"><?= form_error('nama'); ?></small>
						</div>
						<div class="form-group">
							<label for="email" class="sr-only">Email</label>
							<input type="email" class="form-control" id="email" placeholder="Email" name="email">
						</div>
						<div class="form-group">
							<label for="message" class="sr-only">Pesan</label>
							<textarea class="form-control" id="message" rows="7" placeholder="Pesan" name="pesan"></textarea>
						</div>
						<div class="form-group">
							<input type="submit" id="btn-submit" class="btn btn-send-message btn-md" value="Kirim Pesan">
						</div>
					</form>
				</div>

				<div class="col-md-4 animate-box">
					<h3 class="section-title">Maps</h3>
					<iframe  src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1180.369527429985!2d122.61392118048731!3d-5.47345772709019!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2da476b2585963cb%3A0x3cee85532334aba1!2sLPP%20RRI%20BAUBAU!5e1!3m2!1sen!2sid!4v1595855050235!5m2!1sen!2sid" height="350" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<p class="copy-right">&copy; DISKOMINFO Baubau <?= date('Y'); ?>. All Rights Reserved. <br>
						Developer by E-Gov TEAM
					</p>
				</div>
			</div>
		</div>
	</div>

	
	<!-- jQuery -->
	<script src="<?= base_url('assets/solid'); ?>/js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="<?= base_url('assets/solid'); ?>/js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="<?= base_url('assets/solid'); ?>/js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="<?= base_url('assets/solid'); ?>/js/jquery.waypoints.min.js"></script>
	<!-- Stellar Parallax -->
	<script src="<?= base_url('assets/solid'); ?>/js/jquery.stellar.min.js"></script>
	<!-- Counters -->
	<script src="<?= base_url('assets/solid'); ?>/js/jquery.countTo.js"></script>
	<!-- Main JS (Do not remove) -->
	<script src="<?= base_url('assets/solid'); ?>/js/main.js"></script>

	</body>
</html>

