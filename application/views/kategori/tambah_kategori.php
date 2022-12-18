<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="<?= base_url(); ?>/produk/tambah_kategori">
							<?php if($_SESSION['tipe'] === 'admin'){?>
							<div class="form-group">
                                <label for="nama">Nama User</label>
                                <select name="user" id="user" class="form-control">
									<option value="">-- Pilih User --</option>
									<?php foreach($users as $user){?>
										<option value="<?= $user['id_username']; ?>"><?= $user['username']; ?></option>
									<?php }?>
								</select>
								<?= form_error('user', '<small class="form-text text-danger">', '</small>'); ?>
                            </div>
							<?php } ?>

                            <div class="form-group">
                                <label for="nama_kat">Nama Kategori</label>
                                <input type="text" class="form-control text-capitalize" id="nama_kat" name="nama_kat" autocomplete="off">
                                <?= form_error('nama_kat', '<small class="form-text text-danger">', '</small>'); ?>
                            </div>
                            <a href="<?= base_url(); ?>/produk/kategori" class="btn btn-danger">Kembali</a>
                            <button type="submit" class="btn btn-primary float-right">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
