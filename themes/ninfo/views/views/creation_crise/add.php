<script src="http://maps.google.com/maps/api/js?sensor=true"></script>
<script src="<?= site_url('themes/ninfo/js/script_googlemap.js') ?>"></script>
<div class="container">
	<div class="row">
		<h1>Déclaration d'une nouvelle crise</h1>
			<?= form_open(current_url(), array('role' => 'form','class' => 'form-horizontal col-xs-12')); ?>
				<div class="col-xs-12 col-sm-6">
					<div class="row">
						<div class="form-group col-xs-12">
							<label for="nom_crise">Nom de la crise</label>
				        	<input class="form-control" type="text" id="nom_crise" name="nom_crise" placeholder="exemple : Tsunami à Marseille"/>
						</div>
					</div>
					<div class="row">
						<div class="form-group col-xs-12">
						    <label for="description_crise">Description crise</label>
						    <textarea class="form-control" id="description_crise"></textarea>
						</div>
					</div>
					<div class="row">
						<div class="form-group col-xs-4">
							<label for="type_crise">Type de la crise</label>
							<select class="form-control" id="type_crise">
								<!-- foreach sur le tableau des catégories -->
								<?php foreach ($categories as $categorie) : ?>
								<option value="<?php echo $categorie; ?>"><?php echo $categorie; ?></option>
								<?php endforeach; ?>
							</select>
						</div>
					</div>
					<div class="row">
						<div class="form-group col-xs-12">
						    <label for="hashtag">Hashtag associés</label>
						   <input class="form-control" type="text" id="hashtag" name="hashtag" placeholder="exemple : #tsunami #Marseille"/>
						</div>
					</div>
					<div class="form-group row">
						<div class="form-group col-xs-12 col-sm-4">
						   <label for="email">Email</label>
						   <input class="form-control" type="email" id="email" name="email" placeholder="adresse.email@email.fr"/>
						</div>
						<div class="form-group col-xs-12 col-sm-4 col-sm-offset-2">
						   <label for="twitter">Compte Twitter</label>
						   <input class="form-control" type="text" id="twitter" name="twitter" placeholder="@nom_prenom"/>
						</div>
					</div>
					<div class="row">
						<div class="form-group col-xs-4">
							<button type="submit" class="btn btn-block btn-success" name="ajouter_crise" value="sent">
		                    Ajouter crise
		                	</button>
	                	</div>
                	</div>
				</div>
				<div class="col-xs-12 col-sm-6">
					<div id="googlemap"></div>
				</div>
		<?= form_close(); ?>
	</div>
</div>