<section class="title">
	<div class="title-timer hint">8 minutes read</div>
	<div class="container">
		<div class="title-copy">
			<h3 class="light">Just another css tutorial</h3>
			<h1>Webfonts Done Right</h1>
			<div class="profile">
				<div class="photo"><img src="img/authors/michael_stevens_profile_pic.jpg" alt="" /></div>
				<div class="author">Michael Stevens</div>
				<div class="location">UX Designer &amp; UI Developer</div>
			</div>
		</div>
	</div>
</section>
<div class="container">
	<div>
		<p class="lead">
			I've seen webfonts executed in so many ways, but there never seems to be any rhythm
			or reason to the way people do it. So I took it upon myself to come up with a system based
			on best practices &amp; scalability. 
		</p>
		<p>
		<a href="#" class="button blue-outline"><span class="icons">&#59146;</span>View Demo</a>
			<a href="#" class="button blue-solid"><span class="icons">&#128229;</span>Download Project</a>
		</p>
			<p class="hint">
				<span class="icons">&#128161;</span><strong>Required Knowledge</strong> CSS, HTML
			</p>
		<p>
			The best place to start is actually going to be where you decide to put your webfonts. Many people
			opt to create a seperate file called, <i>fonts.css</i> or <i>webfonts.css</i>. While this might seem like the
			cleanest approach to manager your font's long term, it does however require an extra call on every page just to
			read more <span class="tooltip" title="Cascading Style Sheets">CSS</span>. Typically having all of your 
			<span class="tooltip" title="Cascading Style Sheets">CSS</span> in one file called <i>screen.css</i> is the best approach from a
			performance standpoint. However, if you are familiar with <span class="tooltip" title="Syntactically Awesome Style Sheets">SASS</span>, you could always managing your webfonts as a seperate
			<span class="tooltip" title="Syntactically Awesome Style Sheets">SASS</span> file and then compile them all into a single file for production. Either way the point is to not request more than one
			css file on page load.
		</p>
<pre class="prettyprint linenums lang-html">
&lt;link rel="stylesheet" type="text/css" media="screen" href="css/screen.css" /&gt;
</pre>
		<p>
			Now that we've covered where to include your font face, we need to discuss where to call it. Since
			loading a font face can often mean waiting for it to download, there are a few things we want to 
			make sure we do in order to prevent a delay in the rendering of our fonts. First things first, since your
			font is probably one of the most important elements to allow the your site to be useable it's probably a good idea to place it
			first or at the very top of your <i>screen.css</i> file. So lets start by declaring our @font-face property at the top of our <i>screen.css</i>
			file.
		</p>
<pre class="prettyprint linenums lang-css">
@font-face { }
</pre>
		<p>
			Next we are going to declare a font family name for our webfont, technicaully this can be any name and it doesn't even have to match
			the font file name itself, but to be obvious we would probably want to keep the names the same. You'll notice below that no matter 
			how many font weights a font we always use the same family name. This will allow you to call the entire family via the single name 
			declaration and then use the font weight property to display which weight you want to display.
		</p>
<pre class="prettyprint linenums lang-css">
@font-face {
	font-family:"Proxima-Nova";
}

@font-face {
	font-family:"Proxima-Nova";
}

body {
	font: 400 16px/24px "Proxima-Nova",Helvetica,Arial,Sans-Serif;
}
</pre>
		<p>
			Next we want to decided which font we want to embed first. Now we could just go alphabetically or by weight, but lets stop and think about
			how computers load information. A computer is not like a human, it can't glance at a page and decide what catches it's eye must be the most
			important place to start. No, it has to start at the top and work it's way down through to the end. This means that whatever font is presented 
			first in the CSS is the first thing the computer is going to request. Based off this logic, it is probably best to load the font that we use most
			on the page first, before loading the others. In my cause I load the font that I call in my main body declaration, because it is the font that
			I use the most across the page. Next I might load the font I use for my headlines, and so forth and so on. It's really up to you what you load
			first, but the point is to be mindful of what and when you load them.
		</p>
		<p>
			Honestly there is no reason for us to load anything if the user already has the font on their local machine. So before you go off requesting server calls 
			make sure you check for the font locally, most of the time they probably will not have your particular font installed, but it they do this will speed up 
			your load time immensely. Make sure you include any &amp; all names the font might be called as. Often font names can have multiple spellings which makes
			finding a local copy that much harder.
		</p>
<pre class="prettyprint linenums lang-css">
@font-face {
	font-family:"Proxima-Nova";
	src: local("ProximaNova-Regular"),
	     local("ProximaNova Regular"),
	     local("Proxima Nova Regular")
}

@font-face {
	font-family:"Proxima-Nova";
}

body {
	font: 400 16px/24px "Proxima-Nova",Helvetica,Arial,Sans-Serif;
}
</pre>
		<p>
			Make sure that if someone is loading your site on a slow connection that you have thought about your font stack and how the page will look before
			the font loads. Nothing can drive a person crazy faster than being severed a system font before a custom one is ready.
		</p>
		<p>
			Now that we know that we have done our due diligence to find the font locally, we can confidently make the request for a font file knowing that it's not a waste of bandwidth.
			In order to obtain cross browser compatibility we must include five different formats of font files to insure that our font is rendered correctly.
			Again we want to be mindful of how we load these to ensure that we load the most important files first. If you have any analytics or insights into
			which browser is most popular with your users, this is the place where that information can become valuable.  Below I've placed a table that shows which
			font types are compatible with which browsers:
		</p>
		<table>
			<thead>
				<tr>
					<th></th>
					<th>Explorer</th>
					<th>Firefox</th>
					<th>Safari</th>
					<th>Chrome</th>
					<th>Opera</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td data="Font Type">TrueType (ttf)</td>
					<td data="Explorer"><span class="text-failure">No</span></td>
					<td data="Firefox"><span class="text-success">Version 21+</span></td>
					<td data="Safari"><span class="text-success">Version 6+</span></td>
					<td data="Chrome"><span class="text-success">Version 27+</span></td>
					<td data="Opera"><span class="text-success">Version 12+</span></td>
				</tr>
				<tr>
					<td data="Font Type">OpenType (otf)</td>
					<td data="Explorer"><span class="text-success">Version 10+</span></td>
					<td data="Firefox"><span class="text-success">Version 21+</span></td>
					<td data="Safari"><span class="text-success">Version 6+</span></td>
					<td data="Chrome"><span class="text-success">Version 27+</span></td>
					<td data="Opera"><span class="text-success">Version 12+</span></td>
				</tr>
				<tr>
					<td data="Font Type">Web Open Font (woff)</td>
					<td data="Explorer"><span class="text-success">Version 9+</span></td>
					<td data="Firefox"><span class="text-success">Version 21+</span></td>
					<td data="Safari"><span class="text-failure">No</span></td>
					<td data="Chrome"><span class="text-success">Version 27+</span></td>
					<td data="Opera"><span class="text-failure">No</span></td>
				</tr>
				<tr>
					<td data="Font Type">Embedded OpenType (eot)</td>
					<td data="Explorer"><span class="text-success">Yes</span></td>
					<td data="Firefox"><span class="text-failure">No</span></td>
					<td data="Safari"><span class="text-failure">No</span></td>
					<td data="Chrome"><span class="text-failure">No</span></td>
					<td data="Opera"><span class="text-failure">No</span></td>
				</tr>
				<tr>
					<td data="Font Type">Scalable Vector Graphic (svg)</td>
					<td data="Explorer"><span class="text-failure">No</span></td>
					<td data="Firefox"><span class="text-failure">No</span></td>
					<td data="Safari"><span class="text-success">Version 6+</span></td>
					<td data="Chrome"><span class="text-failure">No</span></td>
					<td data="Opera"><span class="text-success">Version 12+</span></td>
				</tr>
			</tbody>
		</table>
		<p>
			As you can see, no one font type is really well supported across multiple browsers so
			just in case it's better to include them all. Once you start to embed them remember to
			start with the file you feel will be the most successful to work based on your user data.
		</p>
<pre class="prettyprint linenums lang-css">
@font-face {
	font-family:"Proxima-Nova";
	src: local("ProximaNova-Regular"),
	     local("ProximaNova Regular"),
	     local("Proxima Nova Regular"),
	     url("fonts/ProximaNova-Regular.otf") format("opentype"),
	     url("fonts/ProximaNova-Regular.ttf") format("truetype"),
	     url("fonts/ProximaNova-Regular.woff") format("woff"),
	     url("fonts/ProximaNova-Regular.svg#ProximaNovaRegular") format("svg");
	     url("fonts/ProximaNova-Regular.eot?#iefix") format("embedded-opentype"),
}
</pre>
	<h4>Scalable Font Weights</h4>
	<p>
		If you are like me you know that just because you've settled on a font for a project it doesn't
		necessarily mean that it will make it to the final product. So making it as easy as possible for
		yourself to switch fonts out without going line by line looking for a specific font weight. To help
		avoid this we can setup some guidelines for what font weight goes with what number, by having this outline
		you can be sure that no mater what light font you use on something, it will always be light no matter if you
		change the font or not.
	</p>
	<p class="hint">
		<strong>100</strong> &ndash; Extra Light or Ultra Light <br />
		<strong>200</strong> &ndash; Light or Thin <br />
		<strong>300</strong> &ndash; Book / Demi <br />
		<strong>400</strong> &ndash; Regular / Normal <br />
		<strong>500</strong> &ndash; Medium <br />
		<strong>600</strong> &ndash; Semibold / Demibold <br />
		<strong>700</strong> &ndash; Bold <br />
		<strong>800</strong> &ndash; Black / Heavy <br />
		<strong>900</strong> &ndash; Extra Black / Ultra Black
	</p>
	<h4>Basic Font Styles</h4>
	<p>
		Of course the last main thing we need to implement is accurate font styles
	</p>
	<h4>One Last Piece of Advice</h4>
<pre class="prettyprint linenums lang-html">
	&lt;link rel="stylesheet" type="text/css" media="screen" href="css/screen.css" /&gt;
	&lt;!--[if IE]&gt;
	&lt;link rel="stylesheet" type="text/css" media="screen" href="css/ie-fonts.css" /&gt;
	&lt;![endif]--&gt;	
</pre>
	</div>
	<div class="clear"></div>
</div>