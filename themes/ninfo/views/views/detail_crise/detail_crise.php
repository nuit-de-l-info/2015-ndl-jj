<?php 
if (!$crise) { 
?>

<p> Cette page n'existe pas </p>
<?php 
} else {
?>
<div class="container">
	<div class="row">
		<div id="ee" style="display:none" align="center">
			<img id = "myImage" src = "<?php echo base_url("assets/files/cantina.gif")?>">
		</div>
		<h1>Détail de la crise <?= $crise->nom ?></h1>
		<table id="table_description" class="table table-bordered">
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

	<div id="jumbotron" class="jumbotron">
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
			<div id="panel_commentaire" class="panel panel-default">
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
				</table>
						<button class="btn btn-default">Commenter</button>

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

<button id="buttonPopup" type="button" class="btn btn-primary btn-lg hidden" data-toggle="modal" data-target="#popupEasterEgg"> Launch demo modal </button>

<div id="popupEasterEgg" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body text-center">
        <img id = "myImage" src = "<?php echo base_url("assets/files/cantina.gif")?>"/>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script src="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script src="//cdn.rawgit.com/namuol/cheet.js/master/cheet.min.js" type="text/javascript"></script>
<script src="" type="text/javascript"></script>
<script src="" type="text/javascript"></script>
<script type="text/javascript">
	// EASTER EGG
	var sound = new Howl({
		urls: ['<?php echo base_url("assets/files/cantina_loop.wav")?>'],
		autoplay: false,
		loop: true
	});

	var sound1 = new Howl({
		urls: ['<?php echo base_url("assets/files/c1.mp3")?>'],
		autoplay: false,
		loop: false
	});

	var sound2 = new Howl({
		urls: ['<?php echo base_url("assets/files/C2.mp3")?>'],
		autoplay: false,
		loop: false
	});

	var sound3 = new Howl({
		urls: ['<?php echo base_url("assets/files/DV1.mp3")?>'],
		autoplay: false,
		loop: false
	});

	var sound4 = new Howl({
		urls: ['<?php echo base_url("assets/files/DV2.mp3")?>'],
		autoplay: false,
		loop: false
	});

	cheet('c a n t i n a', function () {
		sound.play();
	   $('#buttonPopup').click();

	});

	cheet('g o d m o d', function () {
		$("#table_description").mouseenter(
			function() {
				sound4.stop();
				sound2.stop();
				sound3.stop();
				sound.stop();
				sound1.play();
			}
		);

		$("#googlemap").mouseenter(
			function() {
				sound4.stop();
				sound1.stop();
				sound3.stop();
				sound.stop();
				sound2.play();
			}
		);

		$("#jumbotron").mouseenter(
			function() {
				sound2.stop();
				sound1.stop();
				sound4.stop();
				sound.stop();
				sound3.play();
			}
		);

		$("#panel_commentaire").mouseenter(
			function() {
				sound2.stop();
				sound1.stop();
				sound3.stop();
				sound.stop();
				sound4.play();
			}
		);

	});

	cheet('s t o p', function () {
		sound.stop();
		sound2.stop();
		sound1.stop();
		sound3.stop();
		sound4.stop();
	});

	$('#popupEasterEgg').on('hidden.bs.modal', function () {
	    sound.stop();
	})
	// END EASTER EGG

 	$( window ).konami({
        code : [38,38,40,40,37,39,37,39], // up up down down left right left right
        cheat: function() {
		    $('body').toggleClass('replace_cursor');   
        }
    });

    
    cheet('y o d a', function () {
	    $('body').toggleClass('replace_cursor');
	});
   

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