<?php 
if (!$crise) { 
?>

<p> Cette page n'existe pas </p>
<?php 
} else {
?>
<div class="container">
	<div class="jumbotron">
		<div class="row">
			<div class="col-xs-12 col-md-10">
				<h1><?= $crise->nom ?></h1>
			</div>
			<div class="col-xs-12 col-md-2">
				<h2><span class="label label-default"><?= $categorie->libelle ?></span></h2>
			</div>
		</div>
	
		<div class="row">
			<div class="col-xs-12"><p>Hashtags associés : <?= $crise->hashtag ?></p></div>
		</div>
	
		<div class="row">
			<div class="col-xs-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">Description</h3>
					</div>
					<div class="panel-body">
						<?= $crise->description?>
					</div>
				</div>
			</div>		
		</div>
	</div>
</div>
<div class="container">
	<div class="row">
		<div class="col-xs-12 col-md-6">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Commentaires Facebook, Twitter</h3>
				</div>
				<div class="panel-body">
					<table class="table table-striped">
					<thead>
						<tr>

  						<th>Commentaire</th>
  						<th>+</th>
  						<th>-</th>
						</tr>
				</thead>
	  			<?php 
	  			for ($i = 0; $i < count($commentaire); $i ++) {
  				?>
	  			<tr>
  					<th><span><?= $commentaire[$i]->commentaire ?></span></th>
  					<th><div class="row"><div class="col-xs-3"><span><?= $commentaire[$i]->nb_votes_positifs ?></span></div><div class="col-xs-9"><a href="<?= site_url('vote-plus/' . $crise->id . '/' . $commentaire[$i]->id) ?>"><span class="glyphicon glyphicon-thumbs-up"></span></a></div></div></th>
  					<th><div class="row"><div class="col-xs-3"><span><?= $commentaire[$i]->nb_votes_negatifs ?></span></div><div class="col-xs-9"><a href="<?= site_url('vote-moins/' . $crise->id . '/' . $commentaire[$i]->id)  ?>"><span class="glyphicon glyphicon-thumbs-down"></span></a></div></div></th>
  				</tr>
  				<?php
	  			}
	  			?>
	  			<?php if(!$tweets_in_base) {
	  				$tweets_in_base = [];
	  			} ?>
	  			<?php foreach($tweets_in_base as $tweet): ?>
	  				<tr>
		  				<td>
		  					<h3><?= str_replace('@@','@',$tweet->username); ?></h3>
		  					<date><?= date('d/m/Y',$tweet->time); ?></date>
		  					<p><?= $tweet->content ?></p>
		  				</td>
		  				<td><div class="row"><div class="col-xs-3"><span><?= $tweet->nb_votes_positifs ?></span></div><div class="col-xs-9"><a href="<?= site_url('vote-plus/' . $crise->id . '/' . $tweet->id) ?>"><span class="glyphicon glyphicon-thumbs-up"></span></a></div></div>
		  				<div class="row"><div class="col-xs-3"><span><?= $tweet->nb_votes_negatifs ?></span></div><div class="col-xs-9"><a href="<?= site_url('vote-moins/' . $crise->id . '/' . $tweet->id)  ?>"><span class="glyphicon glyphicon-thumbs-down"></span></a></div></div></td>
		  				<td></td>
	  				</tr>
	  			<?php endforeach; ?>
				</table>
				</div>
			</div>
		</div>		
	
		  	<!-- api google ? -->
	  	<div class="col-xs-12 col-md-6" id="map">
		  	<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Carte</h3>
				</div>
				<div class="panel-body" id="googlemap">
				</div>
			</div>
	  	</div>
	</div>
</div>
	<div class="row">
		<div class="col-xs-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Gallerie</h3>
				</div>
				<div class="panel-body">
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
		radius: 1000 * <?= $crise->rayon_en_metres ?>
	});
	 
	};
	 
	initialize();
</script>
<?php } ?>