<div class="article-detail">

	<section class="article-head" style="background-image:url(<? echo $data[0]->image; ?>)">
		<div class="outer-container">
			<img src="" alt="" />
		</div>
		<div class="timer hint"><? echo $data[0]->length; ?></div>
		<div class="inner-container">
			<h2 class="normal"><? echo $data[0]->subheadline; ?></h2>
			<h1><? echo $data[0]->headline; ?></h1>
			<p class="lead">
				 <? echo $data[0]->lead; ?>
			</p>
		</div>
	</section>
	<div class="article-body">
	<? echo $data[0]->body; ?>
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
				<input type="hidden" name="type" value="articles" />
				<input type="hidden" name="ref" value="<? echo $data[0]->id; ?>" />
				<label for="">
					<input type="submit" value="Add Comment" />
				</label>
			</form>
			<?
				if(sizeof($data[1])){
					foreach($data[1] as $c){
						echo '<div class="article-comment">';
						echo '<h5>'.$c->name.'</h5>';
						echo '<div>';
						echo $c->comment;
						echo '</div>';
						echo '</div>';
					}
				}

			?>
		</div>
	</div>
</div>