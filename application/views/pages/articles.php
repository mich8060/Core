<div class="articles">
	<div class="fullscreen"></div>
	<div class="inner-container">
		<p class="lead">
			Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean et justo quis erat 
			consequat faucibus eu at sapien. Ut sollicitudin erat non cursus sollicitudin. 
		</p>
		<? foreach($data as $a) {?>
			<a href="<? echo base_url().$a->url; ?>" class="article-card">
				<div class="article-card-top">
					<img src="<? echo $a->image; ?>" alt="" />
					<div class="article-card-title">
						<h2 class="semi"><? echo $a->headline; ?></h2>
						<h4 class="normal"><? echo $a->subheadline; ?></h4>
					</div>
				</div>
				<div class="article-card-bottom">
					<p>
						<span class="hint"><? echo $a->date; ?> written by <? echo $a->first." ".$a->last; ?></span>
						<? echo $a->lead; ?>
					</p>
				</div>
			</a>
		<? } ?>
		<div class="article-pagination">
			<a href="#" class="button blue-solid">Prev</a>
			<a href="#" class="button blue-solid">Next</a>
		</div>
	</div>
</div>