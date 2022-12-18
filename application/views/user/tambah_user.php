<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="<?= base_url(); ?>/user/tambah_user">
							<div class="form-row">
								<div class="form-group col-md-12">
									<label for="username">Username</label>
									<input type="text" class="form-control" id="username" name="username" autocomplete="off" placeholder="Masukan Username..." value="<?= set_value('username');  ?>">
									<?= form_error('username', '<small class="form-text text-danger">', '</small>'); ?>
								</div>
							</div>
                            <div class=" form-row">
								<div class="form-group col-md-6">
									<label for="email">Email</label>
									<input type="text" class="form-control" id="email" name="email" autocomplete="off" placeholder="Masukan email..." value="<?= set_value('email');  ?>">
									<?= form_error('email', '<small class="form-text text-danger">', '</small>'); ?>
								</div>
                                <div class=" form-group col-md-6">
                                    <label for="nama_usaha">Nama Usaha</label>
                                    <input type="text" class="form-control" id="nama_usaha" name="nama_usaha" autocomplete="off" placeholder="Masukan Nama Usaha" value="<?= set_value('nama_usaha');  ?>">
                                    <?= form_error('nama_usaha', '<small class="form-text text-danger">', '</small>'); ?>
                                </div>
                            </div>
                            <div class=" form-group">
								<label for="password">Password</label>
								<input type="password" class="form-control" id="password" name="password" autocomplete="off"  value="<?= set_value('password');  ?>">
								<?= form_error('password', '<small class="form-text text-danger">', '</small>'); ?>
							</div>
							<div class=" form-group">
								<label for="password2">Konfirmasi Password</label>
								<input type="password" class="form-control" id="password2" name="password2" autocomplete="off"  value="<?= set_value('password2');  ?>">
								<?= form_error('password2', '<small class="form-text text-danger">', '</small>'); ?>
							</div>

                            <a href="<?= base_url(); ?>user" class="btn btn-danger">Kembali</a>
                            <button type="submit" class="btn btn-primary float-right">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
