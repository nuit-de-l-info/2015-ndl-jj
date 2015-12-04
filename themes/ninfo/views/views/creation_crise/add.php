<script src="http://maps.google.com/maps/api/js?sensor=true"></script>
<script src="<?= site_url('themes/ninfo/js/script_googlemap.js') ?>"></script>

<?php
	if(isset($values_form)){
		$crisis_name = ($values_form['nom_crise'] !== '' ? $values_form['nom_crise'] : '');
		$crisis_description = ($values_form['description_crise'] !== '' ? $values_form['description_crise'] : '');
		$crisis_type = $values_form['type_crise'];
		$crisis_hashtag = ($values_form['hashtag_2'] !== '' ? $values_form['hashtag_2'] : '');
		$crisis_email = ($values_form['email'] !== '' ? $values_form['email'] : '');
		$crisis_twitter = ($values_form['twitter'] !== '' ? $values_form['twitter'] : '');
	}else{
		$crisis_name = '';
		$crisis_description = '';
		$crisis_type = '';
		$crisis_hashtag = ''; 
		$crisis_email = '';
		$crisis_twitter = '';
	}
?>

<div class="container">
	<div class="row">
		<h3>Déclaration d'une nouvelle crise</h3>
			<?= form_open("http://ninfo.fr/index.php/crise/nouvelle-crise", array('role' => 'form','class' => 'form-horizontal col-xs-12')); ?>
				<div class="col-xs-12 col-sm-6">
					<div class="row">
						<div class="form-group col-xs-12">
							<label for="nom_crise">Nom de la crise</label>
				        	<input class="form-control" type="text" id="nom_crise" value="<?php echo $crisis_name; ?>" name="nom_crise" placeholder="exemple : Tsunami à Marseille" required/>
						</div>
					</div>
					<div class="row">
						<div class="form-group col-xs-12">
						    <label for="description_crise">Description crise</label>
						    <textarea class="form-control" name="description_crise" id="description_crise"><?php echo $crisis_description; ?></textarea>
						</div>
					</div>
					<div class="row">
						<div class="form-group col-xs-4">
							<label for="type_crise">Type de la crise</label>
							<select class="form-control" id="type_crise" name="type_crise">
								<!-- foreach sur le tableau des catégories -->
								<?php foreach ($categories as $value => $categorie) : ?>
									<option <?php echo ($crisis_type == $value ? 'selected="selected"' : '');?> value="<?php echo $value; ?>"><?php echo $categorie; ?></option>
								<?php endforeach; ?>
							</select>
						</div>
					</div>
					<div class="row">
						<div class="form-group col-xs-12">
						   <label for="hashtag_1">Hashtag associé</label>
						   <div class="row">
							   <div class="col-xs-6"><input class="form-control" type="text" id="hashtag_1" name="hashtag_1" value="#crise" disabled/></div>
							   <div class="col-xs-6"><input class="form-control" type="text" id="hashtag_2" name="hashtag_2" value="<?php echo $crisis_hashtag; ?>" placeholder="exemple : attentat" required></div>  
						   </div>
						</div>
					</div>
					<div class="form-group row">
						<div class="form-group col-xs-12 col-sm-4">
						   <label for="email">Email</label>
						   <input class="form-control" type="email" id="email" name="email" value="<?php echo $crisis_email;?>" placeholder="adresse.email@email.fr" required/>
						</div>
						<div class="form-group col-xs-12 col-sm-4 col-sm-offset-2">
						   <label for="twitter">Compte Twitter</label>
						   <input class="form-control" type="text" id="twitter" name="twitter" value="<?php echo $crisis_twitter;?>" placeholder="@nom_prenom"/>
						</div>
					</div>
					<input type="hidden" id="latitude" name="latitude"/>
					<input type="hidden" id="longitude" name="longitude"/>
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
