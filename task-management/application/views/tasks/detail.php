<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header">
                    Detail Task
                </div>
                <div class="card-body">
                    <h5 class="card-title"><?= $tasks['title']; ?></h5>
                    <h6 class="card-subtitle mb-2 text-primary">Status : <?= $tasks['status']; ?></h6>
                    <p class="card-text"><b>Description : </b><?= $tasks['description']; ?></p>
                    <a class="card-link"><b>Start Date : </b><?= $tasks['start_date']; ?></a> <br>
                    <a class="card-link"><b>Finish Date : </b><?= $tasks['finish_date']; ?></a> <br>
                    <a href="<?= base_url(); ?>tasks" class="btn btn-danger float-right">Kembali</a>
                </div>
            </div>

        </div>
    </div>
</div>