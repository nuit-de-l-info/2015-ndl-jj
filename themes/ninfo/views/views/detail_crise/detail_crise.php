<?php 
if (!$crise) { 
?>

<p> Cette page n'existe pas </p>
<?php 
} else {
?>
<div class="container">
	<div class="row">
		<h1>Détail de la crise <?= $crise->nom ?></h1>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>Nom</th>
					<th>#</th>
					<th>Catégorie</th>
					<th>
						<label for="description">Description</label>
					</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<th scope="row"><?= $crise->nom ?></th>
				<td><?= $crise->hashtag ?></td>
				<td><?= $crise->categorie ?></td>
				<td><textarea id="description" class="form-control" disabled><?= $crise->description?></textarea></td>
			</tr>
			</tbody>
		</table>
	</div>
	<div class="row container-fluid">	
	  	<!-- récupérer informations facebook, ... -->
	  	<div class="col-xs-6">Commentaires Facebook, Twitter
		  	<div>
				<table class="table table-striped">
					<thead>
						<tr>
  						<th>#</th>
  						<th>Commentaire</th>
  						<th>+</th>
  						<th>-</th>
						</tr>
				</thead>
	  			<?php 
	  			for ($i = 0; $i < count($commentaire); $i ++) {
  				?>
	  			<tr>
  					<th><span><?= $i ?></span></th>
  					<th><span><?= $commentaire[$i]->commentaire ?></span></th>
  					<th><div class="row"><div class="col-xs-3"><span><?= $commentaire[$i]->nb_votes_positifs ?></span></div><div class="col-xs-9"><a href="<?= site_url('vote-plus/' . $crise->id . '/' . $commentaire[$i]->id) ?>"><span class="glyphicon glyphicon-thumbs-up"></span></a></div></div></th>
  					<th><div class="row"><div class="col-xs-3"><span><?= $commentaire[$i]->nb_votes_negatifs ?></span></div><div class="col-xs-9"><a href="<?= site_url('vote-moins/' . $crise->id . '/' . $commentaire[$i]->id)  ?>"><span class="glyphicon glyphicon-thumbs-down"></span></a></div></div></th>
  				</tr>
  				<?php
	  			}
				?>
				</table>
		  	</div>
	  	</div>
	  	<!-- api google ? -->
	  	<div class="col-xs-6" id="map">Carte
				<div id="googlemap"></div>
	  	</div>
	</div>
		<div class="row container-fluid">
			<div class="col-xs-12">Gallerie
			<!--
	  			<?php 
	  			for ($i = 0; $i < count($crise->gallerie); $i ++) {
  				?>
  				<?php
  				}
  				?>
  			-->
				<div class='list-group gallery'>
		            <div class='col-sm-4 col-xs-6 col-md-3 col-lg-3'>
		                <a class="thumbnail fancybox" rel="ligthbox" href="http://placehold.it/300x320.png">
		                    <img class="img-responsive" alt="" src="http://placehold.it/320x320" />
		                    <div class='text-right'>
		                        <small class='text-muted'>Image Title</small>
		                    </div> <!-- text-right / end -->
		                </a>
		            </div> <!-- col-6 / end -->
		            <div class='col-sm-4 col-xs-6 col-md-3 col-lg-3'>
		                <a class="thumbnail fancybox" rel="ligthbox" href="http://placehold.it/300x320.png">
		                    <img class="img-responsive" alt="" src="http://placehold.it/320x320" />
		                    <div class='text-right'>
		                        <small class='text-muted'>Image Title</small>
		                    </div> <!-- text-right / end -->
		                </a>
		            </div> <!-- col-6 / end -->
		            <div class='col-sm-4 col-xs-6 col-md-3 col-lg-3'>
		                <a class="thumbnail fancybox" rel="ligthbox" href="http://placehold.it/300x320.png">
		                    <img class="img-responsive" alt="" src="http://placehold.it/320x320" />
		                    <div class='text-right'>
		                        <small class='text-muted'>Image Title</small>
		                    </div> <!-- text-right / end -->
		                </a>
		            </div> <!-- col-6 / end -->
		            <div class='col-sm-4 col-xs-6 col-md-3 col-lg-3'>
		                <a class="thumbnail fancybox" rel="ligthbox" href="http://placehold.it/300x320.png">
		                    <img class="img-responsive" alt="" src="http://placehold.it/320x320" />
		                    <div class='text-right'>
		                        <small class='text-muted'>Image Title</small>
		                    </div> <!-- text-right / end -->
		                </a>
		            </div> <!-- col-6 / end -->
		            <div class='col-sm-4 col-xs-6 col-md-3 col-lg-3'>
		                <a class="thumbnail fancybox" rel="ligthbox" href="http://placehold.it/300x320.png">
		                    <img class="img-responsive" alt="" src="http://placehold.it/320x320" />
		                    <div class='text-right'>
		                        <small class='text-muted'>Image Title</small>
		                    </div> <!-- text-right / end -->
		                </a>
		            </div> <!-- col-6 / end -->
		            <div class='col-sm-4 col-xs-6 col-md-3 col-lg-3'>
		                <a class="thumbnail fancybox" rel="ligthbox" href="http://placehold.it/300x320.png">
		                    <img class="img-responsive" alt="" src="http://placehold.it/320x320" />
		                    <div class='text-right'>
		                        <small class='text-muted'>Image Title</small>
		                    </div> <!-- text-right / end -->
		                </a>
		            </div> <!-- col-6 / end -->
		        </div>
			</div>
		</div>
		<button class="btn btn-default">Commenter</button>
	</div>
</div>

<script src="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script type="text/javascript">
	var map;
	var initialize;
	 
	initialize = function(){
		var latLng = new google.maps.LatLng(<?= $crise->latitude ?>, <?= $crise->longitude ?>); // Correspond au coordonnées de Lille
		var myOptions = {
		zoom      : 10,
		center    : latLng,
		mapTypeId : google.maps.MapTypeId.TERRAIN, // Type de carte, différentes valeurs possible HYBRID, ROADMAP, SATELLITE, TERRAIN
		maxZoom   : 20
	};

	  map = new google.maps.Map(document.getElementById('googlemap'), myOptions);
	var cityCircle = new google.maps.Circle({
		strokeColor: '#FF0000',
		strokeOpacity: 0.8,
		strokeWeight: 2,
		fillColor: '#FF0000',
		fillOpacity: 0.35,
		map: map,
		center: latLng,
		radius: 1000
	});
	 
	};
	 
	initialize();
</script>
<?php } ?>