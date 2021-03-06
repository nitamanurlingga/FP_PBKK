<!-- Footer-->
<footer class="footer py-4">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-4 text-lg-left">Copyright © Your Website 2020</div>
            <div class="col-lg-4 text-lg-right"><a class="mr-3" href="#!">Privacy Policy</a><a href="#!">Terms of Use</a></div>
        </div>
    </div>
</footer>
<!-- Portfolio Modals-->
<?php foreach ($program as $row) : ?>
    <div class="portfolio-modal modal fade" id="<?= 'program' . $row->id ?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="close-modal" data-dismiss="modal"><img src="<?= base_url(); ?>assets/img/close-icon.svg" /></div>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="modal-body">
                                <!-- Project Details Go Here-->
                                <h2 class="text-uppercase"><?= $row->name ?></h2>
                                <p class="item-intro text-muted"><?= $row->place ?></p>
                                <img class="img-fluid d-block mx-auto" src="<?= base_url('assets/img/program/' . $row->image); ?>" alt="" />
                                <p><?= $row->description ?></p>
                                <ul class="list-inline">
                                    <li>Date: <?= date('d F Y', $row->date_created); ?></li>
                                    <li>Donasi terkumpul: Rp <?= $row->jumlah ?></li>
                                    <li>Target donasi: Rp <?= $row->target ?></li>
                                    <br>
                                    <?php
                                    $penyelenggaraId = $row->penyelenggara_id;
                                    $queryPenyelenggara = "SELECT *  
                                    FROM `user`    
                                    WHERE `user`.`id` = $penyelenggaraId 
                                    ";
                                    $penyelenggara = $this->db->query($queryPenyelenggara)->result_array();
                                    ?>
                                    <!-- <?php echo print_r($penyelenggara); ?> -->

                                    <li>Penyelenggara: <?php echo $penyelenggara[0]['name']; ?></li>
                                    <li>Nomor Hp: <?= $penyelenggara[0]['no_hp']; ?></li>
                                    <?php if ($row->status == 1) : ?>
                                        <li>Status: Berlangsung</li>
                                    <?php else : ?>
                                        <li>Status: Selesai</li>
                                        <?php
                                        $programId = $row->id;
                                        $queryBerita = "SELECT *
                                        FROM `berita`
                                        WHERE `berita`.`program_id` = $programId
                                        ";
                                        $berita = $this->db->query($queryBerita)->result_array();
                                        ?>
                                        <!-- Berita -->
                                        <?php if ($berita) : ?>
                                            <hr>
                                            <br>
                                            <h1 class="text-uppercase" style="color:yellow;">Berita Acara</h1>
                                            <div class="modal-body">
                                                <!-- Project Details Go Here-->
                                                <h2 class="text-uppercase"><?= $berita[0]['name'] ?></h2>
                                                <img class="img-fluid d-block mx-auto" src="<?= base_url('assets/img/berita/' . $berita[0]['image']); ?>" alt="" />
                                                <p><?= $berita[0]['description'] ?></p>

                                            </div>
                                        <?php endif; ?>
                                        <!-- End Berita -->

                                    <?php endif; ?>
                                </ul>
                                <button class="btn btn-primary" data-dismiss="modal" type="button"><i class="fas fa-times mr-1"></i>Close Project</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<!-- Bootstrap core JS-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<!-- Third party plugin JS-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
<!-- Contact form JS-->
<script src="<?= base_url(); ?>assets/mail/jqBootstrapValidation.js"></script>
<script src="<?= base_url(); ?>assets/mail/contact_me.js"></script>
<!-- Core theme JS-->
<script src="<?= base_url(); ?>assets/js/scripts.js"></script>
</body>

</html>