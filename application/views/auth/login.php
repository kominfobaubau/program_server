


	<section id="fh5co-explore" data-section="explore">
		<div class="container">
			<div class="row">
				<div class="col-md-12 section-heading text-center">
					<h2 class="animate-box"><?= $title; ?></h2>
					<div class="row">
						<div class="col-md-8 col-md-offset-2 subtext animate-box">
							<h3>Silahkan masukan data akun anda</h3>
							<?php
							if ($this->session->flashdata('pesan') || validation_errors()) {
								echo validation_errors();
								echo $this->session->flashdata('pesan');
							} 
							 ?>
							
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
						<?php echo form_open('auth/proses_login'); ?>
							<div class="form-group">
								<label for="exampleInputEmail1">Username</label>
								<input type="text" autofocus name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Username">
							</div>
							<div class="form-group">
								<label for="exampleInputPassword1">Password</label>
								<input type="text" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
							</div>
							<input type="submit" class="btn btn-primary" value="Login">
						</form>
                    </div>
                    <div class="col-md-3"></div>
                </div>
			</div>
		</div>
		
	</section>