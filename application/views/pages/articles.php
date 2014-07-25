<div class="articles dark-theme">
	<div class="fullscreen"><img src="http://localhost:8888/core/img/articles/michael_stevens_human_interface_guidlines.jpg" alt="" /></div>
	<div class="page-title" style="background:transparent;">
		<div class="wide-container">
			<div class="grid_1">
				<h2 class="light">Make a dent in the universe</h2>
				<h1>The Latest Articles</h1>
				<p class="lead">
					My name is Davey Heuser and I have a great passion for solving problems by designing user interfaces that 
					are both easy to use and visually appealing. That is what I hope to do the rest of my life.
				</p>
			</div>
		</div>
	</div>
	<div class="clear"></div>
		<div class="grid_1">
			<ul class="tabs">
				<li><a href="#" class="active">All</a></li>
				<li><a href="#">Articles</a></li>
				<li><a href="#">Work</a></li>
				<li><a href="#">Entry</a></li>
				<li><a href="#">Video</a></li>
			</ul>
		</div>
	<div class="clear"></div>
	<div class="wide-container">
		<? foreach($data as $a) {?>
			<div class="grid_4 fluff">
				<a href="<? echo base_url().$a->url; ?>" class="article-card" style="background-image:url(<? echo $a->image; ?>);">
					<div class="outer-container">
						<div class="title">
							<h4 class="normal"><? echo $a->subheadline; ?></h4>
							<h3><? echo $a->headline; ?></h3>
						</div>
						<div class="clear"></div>
					</div>
					<div class="shadow"></div>
				</a>
			</div>
		<? } ?>
	</div>
	<div class="clear"></div>
	<div class="article-pagination">
		<a href="#" class="button blue-solid">Prev</a>
		<a href="#" class="button blue-solid">Next</a>
	</div>
</div>