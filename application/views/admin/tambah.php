


	<section id="fh5co-explore" data-section="explore">
		<div class="container">
			<div class="row">
				<div class="col-md-12 section-heading text-center">
					<h2 class="animate-box"><?= $title; ?></h2>
					<div class="row">
						<div class="col-md-8 col-md-offset-2 subtext animate-box">
							<h3>Silahkan masukan Data download</h3>

						</div>
					</div>
				</div>
			</div>
		</div>
		<div id="fh5co-counter-section" class="fh5co-counters">
			<div class="container">
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
						<?php echo form_open('auth/proses'); ?>
							<div class="form-group">
								<label for="exampleInputEmail1">Nama Software</label>
								<input type="text" name="nama" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukan nama software">
							</div>
							<div class="form-group">
								<label for="exampleInputPassword1">Link Download</label>
								<input type="text" name="link" class="form-control" id="exampleInputPassword1" placeholder="Masukan data link">
							</div>
							<input type="submit" class="btn btn-primary" value="Tambah">
						</form>
                    </div>
                    <div class="col-md-3"></div>
                </div>
			</div>
		</div>
		
	</section>