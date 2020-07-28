


	<section id="fh5co-explore" data-section="explore">
		<div class="container">
			<div class="row">
				<div class="col-md-12 section-heading text-center">
					<h2 class="animate-box"><?= $title; ?></h2>
					<div class="row">
						<div class="col-md-8 col-md-offset-2 subtext animate-box">
							<h3>Silahkan masukan daftar download</h3>
							<?php if(!empty($this->session->flashdata('pesan'))): ?>
								<?= $this->session->flashdata('pesan'); ?>
							<?php endif; ?>
                            <a href="<?= base_url('index.php/auth/tambah'); ?>" class="btn btn-primary">Tambah</a>
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
                        <p>
							<?php $i = 1; foreach($download as $d): ?>
							<?= $i++; ?>. <?= $d->nama; ?> <a href="<?= base_url('index.php/auth/ubah/'.$d->id); ?>" style="color:blue;">ubah</a> <a href="<?= base_url('index.php/auth/hapus/'.$d->id); ?>" style="color:red;" onclick="return confirm('anda yakin akan menghapus')">hapus</a><br>
							<?php endforeach; ?>
                        </p>
                    </div>
                    <div class="col-md-3"></div>
                </div>
			</div>
		</div>
		
	</section>