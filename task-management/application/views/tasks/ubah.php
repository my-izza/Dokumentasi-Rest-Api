<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header">
                    Form Ubah Task
                </div>
                <div class="card-body">

                    <form action="" method="post">
                        <div class="form-group">
                            <label for="category">Category</label>
                            <input type="text" name="category_id" class="form-control" id="category_id" value="<?= $tasks['category_id']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" class="form-control" id="title" value="<?= $tasks['title']; ?>">
                            <small class="form-text text-danger"><?= form_error('title') ?></small>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" class="form-control" id="description" rows="3" value="<?= $tasks['description'] ?>"></textarea>
                            <small class="form-text text-danger"><?= form_error('description') ?></small>
                        </div>
                        <div class="form-group">
                            <label for="start_date">Start Date</label>
                            <input type="date" name="start_date" class="form-control" id="start_date" value="<?= $tasks['start_date']; ?>">
                            <small class="form-text text-danger"><?= form_error('start_date') ?></small>
                        </div>
                        <div class="form-group">
                            <label for="finish_date">Finish Date</label>
                            <input type="date" name="finish_date" class="form-control" id="finish_date" value="<?= $tasks['finish_date']; ?>">
                            <small class="form-text text-danger"><?= form_error('finish_date') ?></small>
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control" id="status" name="status" value="<?= $tasks['status']; ?>">
                                <option>Select Option</option>
                                <option>New</option>
                                <option>On Progress</option>
                                <option>Finish</option>
                            </select>
                        </div>
                        <a href="<?= base_url(); ?>tasks" class="btn btn-danger">Batal</a>
                        <button type="submit" name="ubah" class="btn btn-primary float-right">Ubah Data</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>