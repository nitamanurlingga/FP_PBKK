<section class="page-section bg-light" id="portfolio">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">Daftar Program Donasi</h2>
            <h3 class="section-subheading text-muted">Ini daftar program donasi yang <?= $user['name'] ?> buat.</h3>
        </div>
        <div class="row">

            <?php
            $penyelenggaraId = $user['id'];
            $queryProgram = "SELECT *  
                                    FROM `program`    
                                    WHERE `program`.`penyelenggara_id` = $penyelenggaraId 
                                    ";
            $program = $this->db->query($queryProgram)->result();
            ?>

            <?php foreach ($program as $row) : ?>
                <div class="col-lg-4 col-sm-6 mb-4">
                    <div class="portfolio-item">
                        <a class="portfolio-link" data-toggle="modal" href="<?= '#program' . $row->id ?>">
                            <div class="portfolio-hover">
                                <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <img class="img-fluid" src="<?= base_url('assets/img/program/' . $row->image); ?>" alt="" />
                        </a>
                        <div class="portfolio-caption">
                            <div class="portfolio-caption-heading"><?= $row->name ?></div>
                            <div class="portfolio-caption-subheading text-muted"> Tempat : <?php $row->place ?></div>
                            <div class="portfolio-caption-subheading text-muted">Status : <?php if ($row->status == 1) : ?>
                                    Berlangsung
                                <?php else : ?>
                                    Selesai
                                <?php endif; ?></div>
                            <form class="user" method="post" action="<?= base_url('program/edit') ?>">
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="id_program" name="id_program" value="<?= set_value($row->id) ?>" visibility: hidden>
                                </div>
                                <button type="submit" class="btn btn-info btn-user">
                                    Edit Program
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
</section>