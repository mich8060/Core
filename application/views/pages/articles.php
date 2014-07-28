<div class="articles dark-theme">
	<div class="fullscreen"><img src="http://localhost:8888/core/img/layout/03.jpg" alt="" /></div>
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
			<ul class="tabs" style="display:none;">
				<li><a href="#" class="active">All</a></li>
				<li><a href="#">Articles</a></li>
				<li><a href="#">Work</a></li>
				<li><a href="#">Entry</a></li>
				<li><a href="#">Video</a></li>
			</ul>
		</div>
	<div class="clear"></div>
	<div class="feed wide-container">
		<? foreach($data as $a) {?>

				<a href="<? echo base_url().$a->url; ?>" class="item article">
					<div class="preview" style="background-image:url(<? echo $a->image; ?>);"></div>
					<div class="title">
						<h5 class="normal"><? echo $a->subheadline; ?></h5>
						<h3><? echo $a->headline; ?></h3>
						<p class="hint"><? echo substr($a->lead, 0, 90); ?>...</p>
					</div>
				</a>
		<? } ?>
	</div>
	<div class="clear"></div>
</div>