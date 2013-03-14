<section data-state="blackout">
	<h2>Setting globals</h2>
	<pre>
		<code contenteditable style="font-size: 18px;">
			// assign global variables so all views have access to them
			$view->set_global('username', 'Jim');
			//or
			$template->set_global('username', 'Daisy');

			//then getting in controller sub functions
			$template->get('username');
		</code>
	</pre>
</section>