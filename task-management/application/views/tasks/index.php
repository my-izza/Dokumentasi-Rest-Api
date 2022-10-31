<div class="container">

    <?php if ($this->session->flashdata('flash')) : ?>
        <div class="row mt-3">
            <div class="col-md-6">
                <div class="alert alert-success alert-dismissible fade show" role="alert"> Task
                    <strong>berhasil</strong> <?= $this->session->flashdata('flash'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <div class="row mt-4">
        <div class="col-md-6">
            <a href="<?= base_url(); ?>tasks/tambah" class="btn btn-primary">Tambah Task Baru</a>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-6">
            <h3>Daftar Tasks</h3>
            <ul class="list-group">
                <?php foreach ($tasks as $task) : ?>
                    <li class="list-group-item">
                        <?= $task['title']; ?>
                        <a href="<?= base_url(); ?>tasks/hapus/<?= $task['id']; ?>" class="badge badge-danger float-right" onclick="return confirm('Hapus task?'); ">Hapus</a>
                        <a href="<?= base_url(); ?>tasks/ubah/<?= $task['id']; ?>" class="badge badge-warning float-right">Ubah</a>
                        <a href="<?= base_url(); ?>tasks/detail/<?= $task['id']; ?>" class="badge badge-success float-right">Detail</a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>

</div>