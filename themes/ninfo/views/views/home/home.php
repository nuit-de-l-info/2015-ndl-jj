<div id="homepage" class="container">
    <div class="row">
        <div class="col-xs-6">
         	<select id="crises" name="crises" class="js-chosen">
         		<option value="-1" selected>--Choisir une crise</option>
         		<?php foreach($crises as $id_crise => $crise): ?>
         			<option value="<?= $id_crise; ?>"><?= $crise['name']; ?></option>
         		<?php endforeach ?>
         	</select>
        </div>
         <div class="col-xs-6">
         	<a href="<?= site_url('crise/nouvelle-crise') ?>" class="btn btn-info">
         		Déclarer une crise
         	</a>
        </div>
    </div>

    <div class="row">
    	<div class="col-xs-12">
    		<div id="map-home">

    		</div>
    	</div>
    </div>
</div>