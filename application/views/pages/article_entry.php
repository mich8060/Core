<section class="title" style="background-image:url(<? echo $index->image; ?>);">
	<div class="title-timer hint"><? echo $index->length; ?></div>
	<div class="container">
		<div class="title-copy">
			<h3 class="light"><? echo $index->subheadline; ?></h3>
			<h1><? echo $index->headline; ?></h1>
			<div class="profile">
				<div class="photo"><img src="<? echo $index->pic; ?>" alt="" /></div>
				<div class="author"><? echo $index->first." ".$index->last; ?></div>
				<div class="location"><? echo $index->title; ?></div>
			</div>
		</div>
	</div>
</section>
<div>
<? echo $index->body; ?>
</div>
<div class="clear"></div>
<div class="article-comments">
	<div class="container">
		<h4>Questions &amp; Comments</h4>
		<form action="<? echo base_url(); ?>forms/comments.php" method="post">
			<label for="name">
				<input type="text" name="name" id="name" placeholder="Name" />
			</label>
			<label for="comment">
				<textarea name="comment" id="comment" placeholder="Question/Comments"></textarea>
			</label>
			<label for="">
				<input type="submit" value="Add Comment" />
			</label>
		</form>
	</div>
</div>