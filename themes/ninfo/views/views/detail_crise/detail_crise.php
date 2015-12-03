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
  					<th><span><?= $commentaire[$i]->nb_votes_positifs ?></span></th>
  					<th><span><?= $commentaire[$i]->nb_votes_negatifs ?></span></th>
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
	  var latLng = new google.maps.LatLng(<?= $crise->longitude ?>, <?= $crise->latitude ?>); // Correspond au coordonnées de Lille
	  var myOptions = {
	    zoom      : 5,
	    center    : latLng,
	    mapTypeId : google.maps.MapTypeId.TERRAIN, // Type de carte, différentes valeurs possible HYBRID, ROADMAP, SATELLITE, TERRAIN
	    maxZoom   : 20
	  };
	 
	  map = new google.maps.Map(document.getElementById('googlemap'), myOptions);
	};
	 
	initialize();
</script>
<?php } ?>