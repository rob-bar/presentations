<section data-state="blackout">
	<section>
		<h2>Configs, Loading & usage</h2>
		<blockquote>If the config exists in the core copy it to the app and edit it.</blockquote>
		<pre>
			<code contenteditable style="font-size: 18px;">
				//LOADING AND USAGE
		   Config::load('configfile');
		   Config::get('part');
			</code>
		</pre>
	</section>
	<section>
		<h2>Dummy data</h2>
		<blockquote>
			It's good that you can call in a task that runs a truncate on all your tables and refils it with dummy data.
		</blockquote>
		<p>oil r data:add_all</p>
		<p>oil r data:add_banners</p>
		<p>oil r data:...</p>
	</section>
</section>
