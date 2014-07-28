<?

$query = json_decode(file_get_contents('http://api.dribbble.com/players/mich8060/shots?page=1&per_page=9'));
$shots = $query->shots;

?>

<footer>
	<div class="outer-container">
		<div class="grid_3">
			<div class="address">
				<h4>Michael Stevens</h4>
				<address>
					1097 North Chidester Dr. <br />
					North Salt Lake, UT 84054
				</address>
				<div>Email: <a href="mailto:design@michael-stevens.me">design@michael-stevens.me</a></div>
				<div>Phone: <a href="tel:+18018242870">801-824-2870</a></div>
			</div>
			<p>
				<div class="icons-social">&#62217;</div>
				<div class="icons-social">&#62220;</div>
				<div class="icons-social">&#62223;</div>
				<div class="icons-social">&#62286;</div>
				<div class="icons-social">&#62253;</div>
				<div class="icons-social">&#62229;</div>
			</p>
		</div>
		<? if($mobile != "Phone") { ?>
		<div class="grid_3">
			<div class="grid_1 flush-horizontal">
				<h5>Latest Articles</h5>
			</div>
			<div class="grid_1 flush-horizontal">
				<a href="#">
					<div>Article Name</div>
					<div>December 24, 2014</div>
				</a>
				<a href="#">
					<div>Article Name</div>
					<div>December 24, 2014</div>
				</a>
				<a href="#">
					<div>Article Name</div>
					<div>December 24, 2014</div>
				</a>
				<a href="#">
					<div>Article Name</div>
					<div>December 24, 2014</div>
				</a>
			</div>
		</div>
		<div class="grid_3 flush-horizontal">
			<div class="grid_1"><h5>Recent Dribbble's</h5></div>
			<?php

				foreach($shots as $s){
					echo '<div class="grid_3"><a href="'.$s->url.'" target="_blank"><img src="'.$s->image_teaser_url.'" /></a></div>';
				}	

			?>
			<div class="grid_1 hint">
				<a href="#">View all Dribbble's</a>
			</div>
		</div>
		<? } ?>
		<div class="grid_1">
			<div class="grid_1 flush-horizontal">
				<a href="<? echo base_url(); ?>">Home</a> |
				<a href="<? echo base_url(); ?>about">About</a> |
				<a href="<? echo base_url(); ?>discoveries">Discoveries</a> |
				<a href="<? echo base_url(); ?>contact">Contact</a> |
				<a href="#">Resources</a> |
				<a href="<? echo base_url(); ?>guide">Guidelines</a> |
				<a href="<? echo base_url(); ?>site-map">Site Map</a>
			</div>
			<hr />
			<p class="hint">
				Copyright &#169;2009–<? echo date('Y'); ?> Michael Stevens. All screenshots &#169; their respective owners.
			</p>
		</div>
	</div>
	<div class="clear"></div>
</footer>