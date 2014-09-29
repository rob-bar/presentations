<section>
  <section>
    <h2>JSHint</h2>
    <ul>
      <li style="padding: 2px 0;" class="fragment fade-in"><a href="http://www.jshint.com/">JSHint</a> is a program that flags suspicious usage in programs written in JavaScript.</li>
      <li style="padding: 2px 0;" class="fragment fade-in">It is a community driven <a href="https://www.npmjs.org/package/jshint">npm module</a>, unlike JSLint by Douglas Crockford</li>
      <li style="padding: 2px 0;" class="fragment fade-in">It detects the bad parts.</li>
      <li style="padding: 2px 0;" class="fragment fade-in">Grunt integration.</li>
      <li style="padding: 2px 0;" class="fragment fade-in">configuration levels and code editor support</li>
    </ul>
  </section>

  <section>
    <h2>Instalation</h2>
    <blockquote>
      npm install jshint -g
    </blockquote>
    <br><br><br>

    <h2>Configuration</h2>
    <ul>
      <li style="padding: 2px 0;">via the <i>--config</i> flag from the command line</li>
      <li style="padding: 2px 0;">In <a>package.json</a> under <a>jshintConfig</a> key</li>
      <li style="padding: 2px 0;">In a <a>.jshintrc</a> file in your project folder</li>
    </ul>
  </section>

  <section>
    <h2>Immediate error indication</h2>
    <h3>Sublime Text 3</h3>
    <ul>
      <li style="padding: 2px 0;">Install <a href="http://www.jshint.com/">JSHint</a></li>
      <li style="padding: 2px 0;">Install <a href="http://www.sublimelinter.com/en/latest/">Sublime linter</a></li>
      <li style="padding: 2px 0;">Install <a href="https://github.com/SublimeLinter/SublimeLinter-jshint">JSHint plugin</a>, <a href="https://github.com/SublimeLinter">plugin list</a> for other languages.</li>
      <li style="padding: 2px 0;">You can lint: json, html5, php, css, etc</li>
    </ul>
    <img src="https://dl.dropboxusercontent.com/u/7422112/screenshots/Screen%20Shot%202014-09-25%20at%2010.58.33.png" height="300" alt="screen">
  </section>

  <section>
    <h2>Flags</h2>
    <ul>
      <li>option <a href="http://www.jshint.com/docs/options/">list</a></li>
    </ul>

    <pre><code data-trim contenteditable>
{
    "browser": true,
    "bitwise": true,
    "white": true,
    "devel": true,
    "curly": true,
    "eqeqeq": true,
    "forin": true,
    "immed": true,
    "indent": 2,
    "latedef": true,
    "newcap": true,
    "noarg": true,
    "quotmark": true,
    "regexp": true,
    "undef": true,
    "unused": true,
    "trailing": true,
    "smarttabs": true,
    "jquery": true,
    "predef": [
        "Drupal",
        "$",
        "Modernizr",
        "_",
        "bowser",
        "settings",
        "context"
    ]
}
    </code>
  </pre>
  </section>
</section>
