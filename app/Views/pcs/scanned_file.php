<?= $this->extend("dashboard/base") ?>
<?= $this->section("content") ?>

<section class="pcoded-main-container">
    <div class="pcoded-content">
        <!-- [ breadcrumb ] start -->

        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Demandeur : <?= ucfirst($pc->demandeur) ?></h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= base_url() ?>/dashboard"><i
                                            class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#!">Changement du fichier scanné</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->
        <!-- [ Main Content ] start -->

        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>N° PC ou PL : <?= $pc->pl_or_pc ?></h5>
                    </div>
                    <div class="card-body">
                        <?= form_open_multipart('change-pc-scanned-file/' . $pc->pc_id) ?>
                        <div class="row text-c">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <input type="file" class="form-control" name="scanned_file">
                                </div>
                                <small id="input-help"
                                       class="form-text text-danger mb-2"><?= $validation['scanned_file'] ?? null; ?></small>
                            </div>
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-icon btn-primary has-ripple p-2"><i
                                            class="feather icon-check"></i></button>
                            </div>
                        </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- [ Main Content ] end -->
    </div>
</section>
<!-- [ Main Content ] end -->

<?= $this->endSection() ?>
