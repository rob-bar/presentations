<section>
	<section>
		<h2>Actions & ajaxheck</h2>
		<pre>
			<code contenteditable style="font-size: 18px;">
		    public function get_index() {
		        // This will be called when the HTTP method is GET.
		    }
		    public function post_index() {
		        // This will be called when the HTTP method is POST.
		    }
		    public function action_index() {
		        // This will be called when the HTTP POST OR GET.
		    }
		    //CHECKS
		    Input::is_ajax();
		    Input::method();
			</code>
		</pre>
					<blockquote>Generaly you want to reuse functions so
				your better of with action_FUNCNAME</blockquote>
	</section>
	<section>
		<h2>Master Template & immediate template definition</h2>
		<pre>
			<code contenteditable style="font-size: 18px;">
				class Controller_Master extends Controller_Template {
					public $template = 'platform/template';

					public function before() {
						parent::before();
					}
					public function after($response) {
						$response = parent::after($response);
					}
				}
			</code>
		</pre>
	</section>
	<section>
		<h2>Ajax calls & the template controller</h2>
		<blockquote>Don't make ajax functions in your template controller.</blockquote>
		<p>
			The before route isn't called. So when you set up stuff in there it isn't executed
			USE: a rest controller or a normal controller
		</p>
	</section>
</section>