<?= $this->extend("dashboard/base") ?>
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
                            <h5 class="m-b-10"><?= $title ?? 'Liste des PCs' ?></h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= site_url() ?>dashboard"><i
                                            class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#!">Pcs</a></li>
                            <li class="breadcrumb-item"><a href="#!"><?= $title ?? 'Liste de PCs' ?></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->
        <!-- [ Main Content ] start -->
        <div class="row">
            <!-- customar project  start -->
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">

                        <?php if(session()->getFlashdata('error')):?>
                            <div class="alert alert-danger"><?=session()->getFlashdata('error');?></div>
                        <?php endif;?>
                        
                        <?php if(session()->getFlashdata('success')):?>
                            <div class="alert alert-success"><?=session()->getFlashdata('success');?></div>
                        <?php endif;?>

                        <div class="row">
                            <div class="col-sm-4 mt-2 mb-2">
                                <select class="js-example-placeholder-multiple col-sm-12" name="search_type"
                                        id="search_type"
                                        data-placeholder="Rechercher par">
                                    <option value="all">Rechercher par</option>
                                    <option value="numero">Numéro d'enregistrement</option>
                                    <option value="pv">Numéro PV</option>
                                    <option value="pl_or_pc">Numéro PL ou PC</option>
                                    <option value="demandeur">Nom demandeur</option>
                                    <option value="initiateur">Nom de l'initiateur</option>
                                    <option value="date_enregistrement">Date d'enregistrement</option>
                                </select>
                            </div>

                            <div class="col-sm-4 mb-2">
                                <div class="form-group">
                                    <label class="floating-label" for="search_text">Tappez
                                        l'élément que vous recherchez</label>
                                    <input type="text" class="form-control" id="search_text">
                                </div>
                            </div>
                            <div class="col-sm-4 mb-2">
                                <a type="button" href="<?= site_url() ?>add-pc"
                                   class="btn btn-success btn-sm btn-round has-ripple"><i class="feather icon-plus"></i>&nbsp;PC</a>
                            </div>
                        </div>
                        <div class="dt-responsive table-responsive">
                            <table id="order-table" class="table table-striped table-bordered nowrap">
                                <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Numéro</th>
                                    <th>Numéro PV</th>
                                    <th>Numéro PL ou PC</th>
                                    <th>Superficie</th>
                                    <th>Commune</th>
                                    <th>Lotissement</th>
                                    <th>Demandeur</th>
                                    <th>Initiateur</th>
                                    <th>Fichier</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody id="pcs-result">


                                </tbody>
                            </table>
                        </div
                    </div>
                </div>
            </div>
            <!-- customar project  end -->
        </div>
        <!-- [ Main Content ] end -->
    </div>

</div>
<!-- [ Main Content ] end -->


<!--<script type="text/javascript">-->
<!--    $(function () {-->
<!--        $('[data-toggle="tooltip"]').tooltip()-->
<!--    });-->
<!---->
<!--    // DataTable start-->
<!--    $('#report-table').DataTable({-->
<!--        "lengthMenu": [-->
<!--            [5, 10, 25, 50, -1],-->
<!--            [5, 10, 25, 50, "All"]-->
<!--        ]-->
<!--    });-->
<!--    // DataTable end-->
<!--</script>-->

<?= $this->endSection() ?>

