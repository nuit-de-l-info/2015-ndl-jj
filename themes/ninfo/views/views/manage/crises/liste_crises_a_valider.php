<div class="container">
    <div class="row">
        <h1 class="col-xs-12">Liste des crises à valider</h1>
    </div>
    <div class="row">
        <div class="table-responsive">
            <table class="col-xs-12 table table-striped table-responsive">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>hashtag</th>
                        <th>catégorie</th>
                        <th>coordonnées</th>
                        <th>rayon</th>
                        <th>action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($crises as $crise) : ?>
                        <tr class="<?php if( !$crise->est_validee){  echo 'warning'; }?>" >
                            <td><?= $crise->nom; ?></td>
                            <td><?= $crise->hashtag; ?></td>
                            <td><?= $crise->categorie; ?></td>
                            <td>lat:<?= $crise->latitude; ?> long: <?= $crise->longitude; ?></td>
                            <td><?= $crise->rayon_en_metres; ?> m</td>
                             <td><a class="btn btn-default" href="<?= site_url('admin/crise/valider/' . $crise->id); ?>">Valider</a></td>                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>