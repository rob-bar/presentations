<section>
	<section>
		<h1>Fronteers</h1>
		<h2>review</h2>
		<img src="img/fr.png" alt="Fronteers-logo">
	</section>

	<section>
		<h2>Kris</h2>
		<ul>
			<li>Peter-Paul Koch
				<em><small> (A Pixel is not a Pixel)</small></em>
			</li>
			<li>Lea Verou
				<em><small> (More CSS secrets: Another 10 things you may not know about CSS )</small></em>
			</li>
			<li>Jeroen Wijering
				<em><small> (The State of HTML5 Video)</small></em>
			</li>
	</ul>
	</section>

	<section>
		<h2>Robbie</h2>
		<ul>
			<li>Addy Osmani
				<em><small> (The New And Improved Delveoper Toolbelt)</small></em>
			</li>
			<li>Phil Hawksworth
				<em><small> (I can smell your CMS)</small></em>
			</li>
			<li>Rebecca Murphey
				<em><small> (JS Minty Fresh: Identifying and Eliminating Smells in Your Code Base)</small></em>
			</li>
		</ul>
	</section>
</section>

<section>
	<h2>Peter-Paul Koch <em><small> (A Pixel is not a Pixel)</small></em></h2>
	<ul>
		<li>Three kinds of pixels</li>
		<li>Two viewports</li>
		<li>Zooming</li>
	</ul>
</section>

<section>
	<h2>three kinds of pixels</h2>
	<h4>CSS pixels</h4>
	<ul>
		<li>CSS pixels are the ones we use in declarations such as width:</li>
		<li>They are what we want</li>
		<li>Their size may be increased or decreased, though</li>
	</ul>
</section>

<section>
	<h2>three kinds of pixels</h2>
	<h4>Device pixels</h4>
	<ul>
		<li>Device pixels are the physical pixels on the device</li>
		<li>They have a ﬁxed size that depends on the device</li>
		<li>So on the iPhone, your site is restricted to 320px</li>
		<li>But ...</li>
		<li>Devices get higher and higher pixel densities</li>
	</ul>
</section>

<section>
	<h2>three kinds of pixels</h2>
	<h4>Density-independent pixels</h4>
	<ul>
		<li>Thus device vendors created densityindependent pixels (dips)</li>
		<li>They are another abstraction layer </li>
		<li>The number of dips is equal to the number 
of CSS pixels that is optimal for viewing a 
website on the device at 100% zoom</li>
		<li>So on the iPhone, your site is still restricted to 320px</li>	
	</ul>
</section>

<section>
	<h2>what kind of pixels</h2>
	<p>f a certain JavaScript property is expressed in 
pixels
always ask yourself what kind of pixels.
Usually it’s CSS pixels, especially for anything 
related to CSS
Sometimes it’s device pixels or dips, for 
anything related to screen size</p>
</section>

<section>
	<h2>Viewports</h2>
	<ul>
		<li>The viewport is the total amount of space 
available for CSS layouts</li>
		<li>On the desktop it’s equal to the browser 
window</li>
		<li>mobile browser vendors 
have split the viewport into two:</li>
		<li>The layout viewport, the viewport that CSS 
declarations such as padding-left: 34% use,</li>
<li>and the visual viewport, which is the part of 
the page the user is currently seeing</li>
	</ul>
</section>

<section>
	<h2>Viewports</h2>
	<ul>
		<li>Initially most browsers make the visual 
viewport equal to the layout viewport</li>
		<li>by zooming the page out as much as 
possible</li>
		<li>Although the page is unreadable, the user 
can at least decide which part he’d like to 
concentrate on and zoom in on that part</li>
	</ul>
</section>

<section>
	<h2>Zooming</h2>
	<ul>
		<li>On the desktop the viewport becomes less 
wide and the CSS pixels become larger.</li>
		<li>The same amount of device pixels now 
contain less CSS pixels, after all.</li>
		<li>On mobile the visual viewport becomes 
less wide, but the layout viewport remains 
static. Thus CSS declarations are not recomputed.</li>
		<li>The visual viewport now contains less CSS 
pixels.</li>
	</ul>
</section>

<section>
	<h1>Jeroen Wijering - The State of HTML5 Video</h1>
</section>

<section>
	<h2>Why HTML5?</h2>
	<ul>
		<li>Flash is dead!</li>
		<li>Support for flash is gone on mobile systems like iOS and Android</li>
		<li>HTML5 is easy to use!</li>
		<li>HTML5 Videos are: Accessible, their Fast, secure and stable and you can use existing tools (CSS Styling, JS scripting)</li>
	</ul>
</section>

<section>
	<h2>Current state</h2>
	<ul>
		<li>80% of world supports HTML5 videos</li>
		<li>And it's growing</li>
		<li>MP4 / WebM support is evently split</li>
		<li>Fullscreen API (All browsers but IE have it now)</li>
		<li>New Elements <track> and WebVTT</li>
	</ul>
</section>

<section>
	<h2><track> and WebVTT</h2>
	<ul>
		<li><track> is a new HTML5 element</li>
		<li>It defines captions</li>
		<li>Embeds video WEBVTT files</li>
		<li><a href="http://demo.longtailvideo.com/track_demos/captions.html">demo</a></li>
	</ul>
</section>