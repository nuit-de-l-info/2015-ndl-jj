<script src="http://maps.google.com/maps/api/js?sensor=true"></script>
<script src="<?= site_url('themes/ninfo/js/script_googlemap.js') ?>"></script>
<div class="container">
	<div class="row">
		<h1>Déclaration d'une nouvelle crise</h1>
			<?= form_open("http://ninfo.fr/index.php/crise/nouvelle-crise", array('role' => 'form','class' => 'form-horizontal col-xs-12')); ?>
				<div class="col-xs-12 col-sm-6">
					<div class="row">
						<div class="form-group col-xs-12">
							<label for="nom_crise">Nom de la crise</label>
				        	<input class="form-control" type="text" id="nom_crise" name="nom_crise" placeholder="exemple : Tsunami à Marseille" required/>
						</div>
					</div>
					<div class="row">
						<div class="form-group col-xs-12">
						    <label for="description_crise">Description crise</label>
						    <textarea class="form-control" id="description_crise" required></textarea>
						</div>
					</div>
					<div class="row">
						<div class="form-group col-xs-4">
							<label for="type_crise">Type de la crise</label>
							<select class="form-control" id="type_crise" required>
								<!-- foreach sur le tableau des catégories -->
								<?php foreach ($categories as $categorie) : ?>
									<option value="<?php echo $categorie; ?>"><?php echo $categorie; ?></option>
								<?php endforeach; ?>
							</select>
						</div>
					</div>
					<div class="row">
						<div class="form-group col-xs-12">
						   <label for="hashtag_1">Hashtag associé</label>
						   <div class="row">
							   <div class="col-xs-6"><input class="form-control" type="text" id="hashtag_1" name="hashtag_1" value="#crise" disabled/></div>
							   <div class="col-xs-6"><input class="form-control" type="text" id="hashtag_2" name="hashtag_2" placeholder="example : attentat" required></div>  
						   </div>
						</div>
					</div>
					<div class="form-group row">
						<div class="form-group col-xs-12 col-sm-4">
						   <label for="email">Email</label>
						   <input class="form-control" type="email" id="email" name="email" placeholder="adresse.email@email.fr" required/>
						</div>
						<div class="form-group col-xs-12 col-sm-4 col-sm-offset-2">
						   <label for="twitter">Compte Twitter</label>
						   <input class="form-control" type="text" id="twitter" name="twitter" placeholder="@nom_prenom"/>
						</div>
					</div>
					<div class="row">
						<div class="form-group col-xs-4">
							<button type="submit" class="btn btn-default btn-success" name="ajouter_crise" value="sent">
		                    Ajouter crise
		                	</button>
	                	</div>
                	</div>
				</div>

				<div class="form-group col-xs-12 col-sm-6">
					<div id="googlemap"></div>
				</div>
		<?= form_close(); ?>
	</div>
</div>
