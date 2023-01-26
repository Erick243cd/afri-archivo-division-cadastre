<?= $this->extend("dashboard/base") ?>
<?= $title; ?>
<?= $this->section("content") ?>

    <!-- [ Main Content ] start -->
    <div class="pcoded-main-container">
        <div class="pcoded-content">
            <!-- [ breadcrumb ] start -->
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <div class="page-header-title">
                                <h5 class="m-b-10">Page d'Administration</h5>
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#"><i class="feather icon-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="#!">Tableau de Bord</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ breadcrumb ] end -->
            <!-- [ Main Content ] start -->
            <div class="row">
                <?php if (session()->getFlashdata('error')): ?>
                    <div class="alert alert-danger"><?= session()->getFlashdata('error'); ?></div>
                <?php endif; ?>
                <?php if (session()->getFlashdata('success')): ?>
                    <div class="alert alert-success"><?= session()->getFlashdata('success'); ?></div>
                <?php endif; ?>
                <div class="col-lg-12 col-md-12">
                    <!-- support-section start -->
                    <div class="row justify-content-center">

                        <div class="col-sm-4 text-center">
                            <div class="card support-bar overflow-hidden">
                                <div class="card-body pb-0">
                                    <h2 class="m-0"><?= $communes; ?></h2>
                                    <span class="text-c-green"><strong><a href="<?= site_url() ?>communes">COMMUNES</a></strong></span>
                                    <p class="mb-3 mt-3"><a href="">Total Communes</a></p>
                                </div>
                                <div class="card-footer text-dark">
                                    <div class="row text-center">
                                        <div class="col">
                                            <a type="button" href="<?= site_url() ?>add-commune" data-toggle="tooltip"
                                               data-placement="top" title="Ajout Commune"
                                               class="btn btn-icon btn-danger">
                                                <i class="feather icon-plus"></i>
                                            </a>
                                        </div>
                                        <div class="col">
                                            <h5 class="m-0">Total</h5>
                                            <span><?= $communes; ?></span>
                                        </div>
                                        <div class="col">
                                            <a type="button" href="<?= site_url() ?>communes-list" data-toggle="tooltip"
                                               data-placement="top" title="Liste"
                                               class="btn btn-icon btn-warning">
                                                <i class="feather icon-eye"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- support-section end -->
                </div>
                <!-- project ,team member start -->

                <!-- project ,team member start -->
            </div>
            <!-- [ Main Content ] end -->
        </div>
    </div>
    <!-- Button trigger modal -->
<?= $this->endSection() ?>