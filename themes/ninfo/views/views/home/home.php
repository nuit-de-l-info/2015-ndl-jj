<div class="jumbotron">
      <div class="container">
        <h1>Bienvenue sur InfoCrises</h1>
        <p>Site d'information pour les cas d'urgences. Ce site vise à recenser en temps réel les états de crises actuels et les informations associées. Avant de signaler une situation d'urgence merci de vérifier si celui-ci n'est pas déjà référencé dans la liste ci-dessous.</p>
      </div>
</div>
	<div class="row" id="homepage">
		<div class="col-xs-12 col-md-6">
			<select id="crises" name="crises" class="js-chosen">
				<option value="-1" selected>--Choisir une crise</option>
					<?php foreach($crises as $id_crise => $crise): ?>
						<option value="<?= $id_crise; ?>"><?= $crise->nom; ?></option>
					<?php endforeach ?>
 			</select>
		</div>
		<div class="col-xs-12 col-md-4 col-md-offset-2">
			<a href="<?= site_url('crise/nouvelle-crise') ?>" class="btn btn-info" accesskey="2" tabindex="2">
				Signaler une situation d'urgence
 			</a>
		</div>
	</div>

	<div class="row">
		<div class="col-xs-12">
			<div id="map-home">
	
			</div>
		</div>
	</div>

