<?php header('Content-type: text/xml'); ?>
<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; echo ("\n");?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">

	<url>
		<loc><? echo base_url();?></loc>
		<lastmod>2011-09-15</lastmod>
		<changefreq>monthly</changefreq>
		<priority>1.0</priority>
	</url>

	<url>
		<loc><? echo base_url();?>nosotros</loc>
		<lastmod>2011-09-15</lastmod>
		<changefreq>monthly</changefreq>
		<priority>0.8</priority>
	</url>

	<url>
		<loc><? echo base_url();?>contacto</loc>
		<lastmod>2011-09-15</lastmod>
		<changefreq>monthly</changefreq>
		<priority>0.8</priority>
	</url>

	<?php foreach ($remates as $item) {?>
	<url>
		<loc><? echo base_url();?>Remate/<? echo url_title($item["titulo"])."/".$item["id"]; ?></loc>
		<lastmod><? echo $item["fecha"]; ?></lastmod>
		<changefreq>weekly</changefreq>
		<priority>0.8</priority>
	</url>
    <? } ?>

	<?php foreach ($clasificados as $item) {?>
	<url>
		<loc><? echo base_url().$item["tipo"]."/".url_title($item["titulo"])."/".$item["id"]; ?></loc>
		<lastmod><? echo $item["fecha"]; ?></lastmod>
		<changefreq>weekly</changefreq>
		<priority>0.8</priority>
	</url>
    <? } ?>



</urlset>