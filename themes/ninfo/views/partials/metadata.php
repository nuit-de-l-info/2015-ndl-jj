<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
	<title>NUIT DE L'INFO</title>
<meta name="robots" content="index, follow">
<meta name="description" content="NINFO">

<?php
Asset::css('asset::bootstrap.min.css', false, 'front');
Asset::css('asset::hoverify-bootnav.css', false, 'front');
Asset::css('asset::chosen.min.css', false, 'front');
Asset::css('theme::style.css', false, 'front');
Asset::css('theme::mobile.css', false, 'front');
Asset::js('asset::jquery.1.11.1.min.js', false, 'front');
Asset::js('asset::jquery.easing.js', false, 'front');
Asset::js('asset::bootstrap.min.js', false, 'front');
Asset::js('asset::zoombox.js', false, 'front');
Asset::js('asset::chosen.jquery.min.js', false, 'front');
Asset::js('asset::hoverify-bootnav.js', false, 'front');
Asset::js('asset::jquery.konami.min.js', false, 'front');
Asset::js('asset::vanilla.konami.min.js', false, 'front');
Asset::js('theme::script.js', false, 'front');
Asset::js('theme::howler.min.js', false, 'front');
echo Asset::render_css('front');
echo Asset::render_js('front');
?>

     <script type="text/javascript">
        	var base_url = "<?= site_url(''); ?>/";
			var theme_url = "<?= base_url('themes') ?>/";
        </script>

<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
