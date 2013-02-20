<?php if ( !defined('ABSPATH') ) {exit;} ?>
<h2>MAP</h2>

<div style="width:<?=$width?>px; height: <?=$height?>px; border: solid 1px #333;">
    <div id="map_canvas" style="width:100%; height:100%"></div>
</div>

<script>
    jQuery(document).ready(function () {
        gmap = new ggMap('<?=$center?>', <?=$zoom?>);
        <?php foreach ($addresses as $address): ?>
        gmap.addLocation('<?=$address?>');
        <?php endforeach; ?>
    });
</script>