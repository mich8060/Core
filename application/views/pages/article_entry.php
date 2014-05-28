<section class="title" style="background-image:url(<? echo $data->image; ?>);">
	<div class="title-timer hint"><? echo $data->length; ?></div>
	<div class="inner-container">
		<div class="title-copy">
			<h3 class="light"><? echo $data->subheadline; ?></h3>
			<h1><? echo $data->headline; ?></h1>
			<div class="profile">
				<div class="photo"><img src="<? echo $data->pic; ?>" alt="" /></div>
				<div class="author"><? echo $data->first." ".$data->last; ?></div>
				<div class="location"><? echo $data->title; ?></div>
			</div>
		</div>
	</div>
</section>
<div>
<? echo $data->body; ?>
</div>
<div class="clear"></div>
<div class="article-comments">
	<div class="inner-container">
		<hr />
		<h4>Questions &amp; Comments</h4>
		<form action="<? echo base_url(); ?>forms/comments" method="post" class="comments">
			<div class="success-msg">
				<span class="icons">&#10003;</span> Your comment has been added!
			</div>
			<div class="error-msg">
				<span class="icons">&#9888;</span> Please correct the following errors.
			</div>
			<label for="name">
				<input type="text" name="name" id="name" placeholder="Your Name" />
			</label>
			<label for="comment">
				<textarea name="comment" id="comment" placeholder="Question/Comments"></textarea>
			</label>
			<input type="hidden" name="token" />
			<input type="hidden" name="type" value="articles" />
			<input type="hidden" name="ref" value="<? echo $data->id; ?>" />
			<label for="">
				<input type="submit" value="Add Comment" />
			</label>
		</form>
	</div>
</div>