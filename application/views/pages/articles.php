<div class="articles dark-theme">
	<div class="fullscreen"><img src="<? echo base_url(); ?>/core/img/layout/03.jpg" alt="" /></div>
	<div class="page-title" style="background:transparent;">
		<div class="outer-container" style="text-align:center;">
			<div class="grid_1">
				<h2 class="light">Hello, I'm Michael Stevens</h2>
				<h1 class="light">UX Designer, UX Mananger, &amp; UI Developer</h1>
				<p>
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
	<div class="feed inner-container">
		<? foreach($data as $d){ ?>
			<? if($d['type'] == "article") { ?>
			<a href="<? echo $d['url']; ?>" class="item <? echo $d['type']; ?>">
				<div class="preview" style="background-image:url(<? echo $d['image']; ?>);"></div>
				<div class="title">
					<h4 class="light"><? echo $d['sub']; ?></h4>
					<h2><? echo $d['title']; ?></h2>
					<p>
						<? echo $d['lead']; ?>
					</p>
				</div>
			</a>	
			<? } ?>

			<? if($d['type'] == "dribbble-likes") { ?>
			<a href="<? echo $d['url']; ?>" target="_blank" class="item <? echo $d['type']; ?>">
				<img src="<? echo $d['image']; ?>" alt="" />
				<div class="author">
					By <? echo $d['author']; ?>
				</div>
			</a>	
			<? } ?>
			<? if($d['type'] == "quote") { ?>
			<a href="#" target="_blank" class="item <? echo $d['type']; ?>">
				<div class="quotes">
					<? echo $d['quote']; ?>
					<div class="author">
						&ndash; <? echo $d['author']; ?>
					</div>
				</div>
			</a>	
			<? } ?>
			<? if($d['type'] == "status") { ?>
			<a href="#" target="_blank" class="item <? echo $d['type']; ?>">
				<? if($d['photo'] != ""){  ?>
					<img src="<? echo $d['photo']; ?>" alt="" />
				<? } ?>
				<? if($d['video'] != ""){  ?>
					<video width="320" height="240" controls>
					  <source src="<? echo $d['video']; ?>" type="video/mp4">
					Your browser does not support the video tag.
					</video>
				<? } ?>
				<? if($d['status'] != ""){  ?>
					<div class="update">
						<div class="hint"><? echo $d['date']; ?></div>
						<? echo $d['status']; ?>
					</div>
				<? } ?>
			</a>	
			<? } ?>
		<? } ?>
	</div>
	<div class="clear"></div>
</div>