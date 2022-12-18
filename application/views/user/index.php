<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="row mt-5">
            <div class="col-lg-12 mt-2">
                <div class="flash-data" data-flashdata="<?= $this->session->flashdata('pesan'); ?>"></div>
                <a href="<?= base_url(); ?>user/tambah_user" class="btn btn-lg btn-primary mb-3 font-weight-bold">
                    Tambah user
                </a>
                <table class="table table-bordered table-light shadow-sm p-3 mb-5 bg-white rounded" id="tabel-produk">
                    <thead>
                        <tr>
                            <th class="text-center">Username</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">Tipe</th>
                            <th class="text-center">Nama Usaha</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $item) : ?>
                            <tr>
                                <td class="text-capitalize"><?= $item['username']; ?></td>
                                <td class="text-center"><?= $item['email'] ?></td>
                                <td class="text-center"><?= $item['tipe'] ?></td>
                                <td class="text-center font-weight-bolder"><?= $item['namaUsaha']; ?></td>
                                <td class="text-center">
                                    <!-- Button Update -->
                                    <a href="<?= base_url(); ?>user/update_user/<?= $item['id_username']; ?>" class="btn btn-sm btn-success text-light"><i class="fas fa-edit"></i></a>
                                    <!-- Button Hapus -->
                                    <a href="<?= base_url(); ?>user/hapus_user/<?= $item['id_username']; ?>" class="btn btn-sm btn-danger text-light tombol-hapus"><i class="fas fa-trash-alt"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

            </div>
        </div>
    </section>
</div>
