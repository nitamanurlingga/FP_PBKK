<body id="page-top">
    <!-- Portfolio Grid-->
    <section class="page-section bg-light" id="login">
        <div class="container">
            <?= $this->session->flashdata('message'); ?>
            <div class="card o-hidden border-0 shadow-lg my-5 col-lg-10 mx-auto">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">List User</h1>
                                </div>
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">Nama</th>
                                            <th scope="col">Nomor Hp</th>
                                            <th scope="col">Date Created</th>
                                            <th scope="col">Status</th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($akun as $row) : ?>
                                            <tr>
                                                <td><?= $row->name ?></td>
                                                <td><?= $row->no_hp ?></td>
                                                <td><?= date('d F Y', $row->date_created); ?></td>
                                                <?php if ($row->is_active == 0) : ?>
                                                    <form class="user" method="post" action="<?= base_url('verifikasi/edit') ?>">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control form-control-user" id="id_user" name="id_user" value="<?= $row->id ?>" visibility: hidden>
                                                        </div>
                                                        <td>
                                                            <button type="submit" class="btn btn-danger btn-user">
                                                                Activate
                                                            </button>
                                                        </td>
                                                    </form>
                                                <?php else : ?>
                                                    <td>Activated!</td>
                                                <?php endif ?>
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>