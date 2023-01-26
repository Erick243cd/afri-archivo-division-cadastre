<?= $this->extend("dashboard/base") ?>
<?= $this->section("content") ?>
<!-- [ Main Content ] start -->
<section class="pcoded-main-container">
    <div class="pcoded-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">PCs</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= base_url() ?>/dashboard"><i
                                            class="feather icon-home"></i>Tableau de Bord</a></li>
                            <li class="breadcrumb-item"><a href="<?= site_url() ?>pcs">Liste de PCs</a></li>
                            <li class="breadcrumb-item"><a href="#!">Création d'un nouveau PC</a></li>
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
                        <h5><?= $title ?? "Nouveau PC" ?></h5>
                    </div>
                    <div class="card-body">
                        <?= form_open_multipart('add-pc') ?>
                        <?= csrf_field() ?>
                        <div class="row">
                            <div class="col-xl-4 col-md-4 mb-md-0 mb-sm-5">
                                <div class="form-group">
                                    <label class="floating-label font-weight-bold text-muted" for="Text">Numéro
                                        d'enregistrement</label>
                                    <input type="text" class="form-control" id="Text" placeholder=""
                                           name="numero"
                                           value="<?= set_value('numero') ?>">
                                    <small class="text-danger"><?= $validation['numero'] ?? null ?></small>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-4 mb-md-0 mb-sm-5">
                                <div class="form-group">
                                    <label class="floating-label font-weight-bold text-muted" for="Text">Numéro
                                        PV</label>
                                    <input type="text" class="form-control" id="Text" placeholder=""
                                           name="pv"
                                           value="<?= set_value('pv') ?>">
                                    <small class="text-danger"><?= $validation['pv'] ?? null ?></small>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-4 mb-md-0 mb-sm-5">
                                <div class="form-group">
                                    <label class="floating-label font-weight-bold text-muted" for="Text">Numéro PL ou
                                        PC</label>
                                    <input type="text" class="form-control" id="Text" placeholder="" name="pl_or_pc"
                                           value="<?= set_value('pl_or_pc') ?>">
                                    <small class="text-danger"><?= $validation['pl_or_pc'] ?? null ?></small>
                                </div>
                            </div>

                            <div class="col-xl-4 col-md-4 mb-md-0 mb-sm-5">
                                <div class="form-group">
                                    <label class="floating-label font-weight-bold text-muted"
                                           for="Text">Superficie</label>
                                    <input type="text" class="form-control" id="Text" placeholder="" name="superficie"
                                           value="<?= set_value('superficie') ?>">
                                    <small class="text-danger"><?= $validation['superficie'] ?? null ?></small>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-4 mb-md-0 mb-sm-5">
                                <div class="form-group">
                                    <label class="floating-label font-weight-bold text-muted" for="Text">Nom du
                                        demandeur</label>
                                    <input type="text" class="form-control" id="Text" placeholder="" name="demandeur"
                                           value="<?= set_value('demandeur') ?>">
                                    <small class="text-danger"><?= $validation['demandeur'] ?? null ?></small>
                                </div>
                            </div>

                            <div class="col-xl-4 col-md-4 mb-md-0 mb-sm-5 mt-2">
                                <select class="js-example-placeholder-multiple col-sm-12" name="commune" id="commune">
                                    <option value="Genre" disabled selected>Commune</option>
                                    <option value="M" <?= set_select('commune', "M"); ?>>M</option>
                                </select>
                                <small class="text-danger"><?= $validation['commune'] ?? null ?></small>
                            </div>
                            <div class="col-xl-4 col-md-4 mb-md-0 mb-sm-5 mt-2">
                                <select class="js-example-placeholder-multiple col-sm-12" name="lotissement"
                                        id="lotissement">
                                    <option value="Genre" disabled selected>Lotissement</option>
                                    <option value="M" <?= set_select('lotissement', "M"); ?>>M</option>
                                </select>
                                <small class="text-danger"><?= $validation['lotissement'] ?? null ?></small>
                            </div>

                            <div class="col-xl-4 col-md-4 mb-md-0 mb-sm-5">
                                <div class="form-group">
                                    <label class="floating-label font-weight-bold text-muted" for="Text">Nom de
                                        l'Initiateur</label>
                                    <input type="text" class="form-control" id="Text" placeholder="" name="initiateur"
                                           value="<?= set_value('initiateur') ?>">
                                    <small class="text-danger"><?= $validation['initiateur'] ?? null ?></small>
                                </div>
                            </div>

                            <div class="col-xl-4 col-md-4 mb-md-0 mb-sm-5">
                                <div class="form-group">
                                    <label class="floating-label font-weight-bold text-muted" for="Text">Date
                                        d'enregistrement</label>
                                    <input type="date" class="form-control" id="Text" placeholder=""
                                           name="date_enregistrement"
                                           value="<?= set_value('date_enregistrement') ?>">
                                    <small class="text-danger"><?= $validation['date_enregistrement'] ?? null ?></small>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <label class="floating-label font-weight-bold text-muted" for="Text">Fichier
                                    Scanné</label>
                                <div class="form-group">
                                    <input type="file" class="form-control" name="scanned_file">
                                </div>
                                <small class="text-danger"><?= $validation['scanned_file'] ?? null ?></small>
                            </div>
                            <div class="col-xl-12 col-md-12 mb-md-0 mb-sm-5">
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1" class="font-weight-bold text-muted">Observation</label>
                                    <textarea name="observation" class="form-control" id="exampleFormControlTextarea1"
                                              rows="0"><?= set_value('observation') ?></textarea>
                                </div>
                            </div>
                            <button class="btn btn-primary ml-3 has-ripple" type="submit">Enregistrer</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ Main Content ] end -->
    </div>
</section>
<!-- [ Main Content ] end -->
<?= $this->endSection() ?>
