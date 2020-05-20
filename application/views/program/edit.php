<body id="page-top">
    <!-- Portfolio Grid-->
    <section class="page-section bg-warning" id="login">
        <div class="container">
            <div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Edit Program!</h1>
                                </div>
                                <?= form_open_multipart('program/edit'); ?>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="id_program" name="id_program" value="<?= $program['id'] ?>" visibility: hidden>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <label for="name">Judul</label>
                                        </div>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control form-control-user" id="name" name="name" value="<?= $program['name'] ?>">
                                            <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <label for="place">Tempat</label>
                                        </div>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control form-control-user" id="place" name="place" value="<?= $program['place'] ?>">
                                            <?= form_error('place', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <label for="description">Deskripsi Program</label>
                                        </div>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control form-control-user" id="description" name="description" value="<?= $program['description'] ?>">
                                            <?= form_error('description', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <label for="jumlah">Jumlah Donasi Terkumpul</label>
                                        </div>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control form-control-user" id="jumlah" name="jumlah" value="<?= $program['jumlah'] ?>">
                                            <?= form_error('jumlah', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <label for="target">Total Target Donasi</label>
                                        </div>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control form-control-user" id="target" name="target" value="<?= $program['target'] ?>">
                                            <?= form_error('target', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <label for="name">Status Program</label>
                                        </div>
                                        <div class="col-sm-10">
                                            <select class="form-control form-control-user" id="status" name="status" value="Berlangsung">
                                                <option>Berlangsung</option>
                                                <option>Selesai</option>
                                            </select>
                                        </div>
                                    </div>
                                    <?= form_error('status', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-2">Foto</div>
                                    <img src="<?= base_url('assets/img/program/' . $program['image']); ?>" class="img-thumbnail">
                                    <div class="col-sm-10">
                                        <input type="file" class="form-control form-control-user" id="image" name="image">
                                        <?= form_error('image', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-info btn-user btn-block">
                                    Edit Program
                                </button>
                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="<?= base_url('program/list') ?>">Back</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>