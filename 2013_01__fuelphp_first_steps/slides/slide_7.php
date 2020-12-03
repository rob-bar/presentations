<section>
	<h2>Routes & folders example</h2>
	<pre>
		<code contenteditable style="font-size: 18px;">
			$site_base = 'site/base';

			return array(
			'save-locales/(:any)' => $site_base . '/save_locales/$1',
			':lang/home' => $site_base . '/home',
			':lang/my-account' => $site_base . '/my_account',
			);

      - controller/
			  + api/
			  + platform/
			  - site/
			    base.php
		</code>
	</pre>
</section>