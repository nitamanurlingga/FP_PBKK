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
                                    <h1 class="h4 text-gray-900 mb-4">Create Berita Acara!</h1>
                                </div>
                                <!-- <form class="user" method="post" action="<?= base_url('berita/create') ?>" enctype="multipart/form-data"> -->
                                <?= form_open_multipart('berita/create'); ?>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="name" name="name" placeholder="Judul berita acara...">
                                    <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <textarea type="text" class="form-control form-control-user" id="description" name="description" placeholder="Deskripsi program..."></textarea>
                                    <?= form_error('description', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="id_program" name="id_program" value="<?= $program['id'] ?>" visibility: hidden>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-2">Foto</div>
                                    <div class="col-sm-10">
                                        <div class="row">
                                            <input type="file" class="form-control form-control-user" id="image" name="image">
                                            <?= form_error('image', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-info btn-user btn-block">
                                    Create Berita Acara
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