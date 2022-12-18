<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="">
						<div class="form-row">
							<div class="form-group col-md-12">
									<label for="username">Username</label>
									<input type="text" class="form-control" id="username" name="username" autocomplete="off" placeholder="Masukan Username..." value="<?= $user['username'];  ?>">
									<?= form_error('username', '<small class="form-text text-danger">', '</small>'); ?>
								</div>
							</div>
                            <div class=" form-row">
								<div class="form-group col-md-6">
									<label for="email">Email</label>
									<input type="text" class="form-control" id="email" name="email" autocomplete="off" placeholder="Masukan email..." value="<?= $user['email'];  ?>">
									<?= form_error('email', '<small class="form-text text-danger">', '</small>'); ?>
								</div>
                                <div class=" form-group col-md-6">
                                    <label for="nama_usaha">Nama Usaha</label>
                                    <input type="text" class="form-control" id="nama_usaha" name="nama_usaha" autocomplete="off" placeholder="Masukan Nama Usaha" value="<?= $user['namaUsaha'];  ?>">
                                    <?= form_error('nama_usaha', '<small class="form-text text-danger">', '</small>'); ?>
                                </div>
                            </div>
                            <div class=" form-group">
								<label for="password">Password</label>
								<input type="password" class="form-control" id="password" name="password" autocomplete="off">
								<?= form_error('password', '<small class="form-text text-danger">', '</small>'); ?>
								<small>Biarkan kosong jika tidak ingin mengganti Password</small>
							</div>
							<div class=" form-group">
								<label for="password2">Konfirmasi Password</label>
								<input type="password" class="form-control" id="password2" name="password2" autocomplete="off">
								<?= form_error('password2', '<small class="form-text text-danger">', '</small>'); ?>
							</div>
                            

                            <a href="<?= base_url(); ?>/user" class="btn btn-danger">Kembali</a>
                            <button type="submit" class="btn btn-primary float-right">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
