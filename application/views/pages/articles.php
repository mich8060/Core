<div class="articles">
	<div>
		<? foreach($data as $a) {?>
			<a href="<? echo base_url().$a->url; ?>" class="article-card" style="background-image:url(<? echo $a->image; ?>);">
				<div class="title">
					<h1><? echo $a->headline; ?></h1>
					<h3 class="normal"><? echo $a->subheadline; ?></h3>
				</div>
				<div class="shadow"></div>
			</a>
		<? } ?>
		<div class="article-pagination">
			<a href="#" class="button blue-solid">Prev</a>
			<a href="#" class="button blue-solid">Next</a>
		</div>
	</div>
</div>