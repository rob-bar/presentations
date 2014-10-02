<section>
  <section>
    <h2>29 years of History</h2>
    <h3>
      1995 <br>
      <small> Invented by <a href="http://en.wikipedia.org/wiki/Brendan_Eich">Brendan Eich</a>, <a href="https://www.youtube.com/watch?v=aZqhRICne_M">see</a> in action</small>
    </h3>

    <h3>
      1996 <br>
      <small> ECMA-262, standardisation began</small>
    </h3>

    <h3>
      1997 <br>
      <small> Microsoft used JScript so <a>ECMA script 1</a> had to be made</small>
    </h3>

    <h3>
      1998 <br>
      <small> <a>ECMA script 2</a> followed with minor editorial changes</small>
    </h3>

    <aside class="notes" style="width:100%">
      <ul>
        <li>Javascript is uitgevonden door Brendan Eich in 1995, implementeerde het in netscape, het kreeg een aantal namen , livescript, Mocha.</li>
        <li>Standaarden volgde snel omdat andere browsers ook javascript begonnen te gebruiken</li>
        <li>ES2 had een aantal kleine wijzigingen en toevoegingen.</li>
      </ul>
    </aside>

  </section>

  <section>
    <h2>29 years of History</h2>
    <h3>
      1999 <br>
      <small> <a>ECMA script 3</a></small><br>
      <small>Legacy browsers like ie8 use this</small>
    </h3>
    <h3>
      Unknown <br>
      <small> <a>ECMA script 4</a> abandoned due to political differences</small>
    </h3>
    <h3>
      2009 <br>
      <small> <a>ECMA script 5</a></small><br>
      <small>adds strict mode and adds some new features</small>
    </h3>

    <aside class="notes">
      <ul>
        <li>ES3 zit nu vooral nog in de legacy browsers. ik denk aan ie8 etc.</li>
        <li>ES3 voegde reguliere expresies, bettere string afhandeling, nieuwe control statements, try/catch error handling toe.</li>
        <li>ES4 werd verlaten omdat er teveel politieke meningen mee gemoeid waren.
        Veel van de features zijn gedroped en veel features zijn nu doorgevoerd in es6 harmony, zoals modules..</li>
        <li>ES5 is nu in alle moderne browsers geimplementeerd: Dingen zoals JSON, strict mode, Array.prototype.forEach etc </li>
        <li>strict mode = Strict Mode is a new feature in ECMAScript 5 that allows you to place a program, or a function, in a "strict" operating context. This strict context prevents certain actions from being taken and throws more exceptions.</li>
      </ul>
    </aside>
  </section>

  <section>
    <h2>29 years of History</h2>
    <h3>
      18 juli, 2014 <a href="http://people.mozilla.org/~jorendorff/es6-draft.html">draft</a> <br>
      <small> <a>ECMA script 6</a></small><br>
      <small>Adds better code support for writing front-end apps.</small>
    </h3>

    <h3>
      Unknown <br>
      <small> <a>ECMA script 7</a></small><br>
      <small>Early stage of development</small>
    </h3>

    <aside class="notes">
      <ul>
        <li>Browsers zijn vollop bezig met features uit ES6 te implementeren, de spec is er nu moeten de browsers nog volgen.</li>
        <li>Hot topics zijn: const, modules, for of vs for in, arrow function.</li>
        <li>ES7 zal verder bouwen op es6: topics zullen taalhervorming, code isolatie en verbetring zijn.</li>
      </ul>
    </aside>
  </section>

  <section>
    <h2>Browser Rendering engines</h2><br>
    <h4>Chrome 28+ and Opera 15+</h4>
    <p>uses <a href="http://en.wikipedia.org/wiki/Blink_%28layout_engine%29">Blink</a>, a fork of <a href="http://nl.wikipedia.org/wiki/WebKit">webkit</a> uses the <a href="http://en.wikipedia.org/wiki/V8_%28JavaScript_engine%29">V8</a> Javascript engine</p>

    <h4>Internet explorer</h4>
    <p>uses <a href="http://en.wikipedia.org/wiki/Trident_%28layout_engine%29">Trident</a> that uses <a href="http://en.wikipedia.org/wiki/Chakra_%28JScript_engine%29">Chakra</a> Jscript engine</p>

    <h4>Firefox</h4>
    <p>uses <a href="http://en.wikipedia.org/wiki/Gecko_%28layout_engine%29">Gecko</a> that uses <a href="http://en.wikipedia.org/wiki/SpiderMonkey_%28JavaScript_engine%29">Spidermonkey</a> Javascript engine</p>

    <h4>Safari</h4>
    <p>uses <a href="http://en.wikipedia.org/wiki/Gecko_%28layout_engine%29">Webkit2</a> build on top of webkit that uses <a href="http://en.wikipedia.org/wiki/WebKit#JavaScriptCore">JavascriptCore</a> Javascript engine</p>

    <h4><a href="http://en.wikipedia.org/wiki/List_of_ECMAScript_engines">full list</a></h4>

    <aside class="notes">
      <ul>
        <li>Dus wij moeten ervoor zorgen dat onze websites werken in 4 verschillende layout engines, die dan ook hun eigen js engine hebben.</li>
        <li>Diegene die zegt dat chrome en safari dezelfde engine(WEBKIT) hebben is fout.</li>
      </ul>
    </aside>
  </section>

  <section>
    <h2>Indeed!</h2>
  </section>

  <section>
    <img src="http://www.evilenglish.net/wp-content/uploads/2014/05/305908d1359615600-madejski-miracle-wtf-shit_640_417_s_c1_center_top_0_0.jpg" alt="WTF">
  </section>

  <section>
    <h2>What can I use in browser X?</h2>
    <h4>Can I use <a href="https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Array/forEach">Array.forEach(callback[, thisArg])</a>?</h4>
    <h4>Can I use <a href="https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/JSON">JSON</a>?</h4>
    <h4>Can I use <a href="https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Object/keys">Object.keys()</a>?</h4>
  </section>

  <section>
    <h2>The answer</h2>
    <h4>Helper libraries <br>(<a href="http://jquery.com/">jQuery</a>, <a href="http://underscorejs.org/">Underscorejs</a>, <a href="http://requirejs.org/">requireJS</a>)</h4>
    <h4>Shims <br>(<a href="https://github.com/es-shims/es5-shim">Es5-shim</a>, <a href="https://github.com/paulmillr/es6-shim/">Es6-shim</a>)</h4>
    <h4>Polyfills</h4>
  </section>

  <section>
    <h2>The reference</h2>
    <h4>ECMASCRIPT tables <br>(<a href="http://kangax.github.io/compat-table/es5/#">ES5</a>, <a href="http://kangax.github.io/compat-table/es6/#">ES6</a>)</h4>
    <h4>Mozilla documentation <br>(<a href="https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference">js reference</a>)</h4>
    <aside class="notes">
      <ul>
        <li>De javascript documetatie van mozila is dezelfde als die uit dash.(TONEN)</li>
      </ul>
    </aside>
  </section>
</section>


<section>
  <h2>First questions?</h2>
</section>

<section>
  <h2>So Javascript</h2>
  <h3>Should you know everything? </h3>

  <br><br>

  <h1 class="fragment fadein">No</h1>
  <h2 class="fragment fadein">not everything</h2>
  <aside class="notes">
    <ul>
      <li>Er is immens veel te leren als het over javascript gaat, om dan nog niet te beginnen over alles wat bovenop javascript is gebouwd.</li>
      <li>Meestal zul je een soort mix van vanila javascript en een library of framework gaan gebruiken, de bedoeling is dan dat je je plan kunt trekken, je weet hoe het framework werkt, maar je zal ook moeten weten hoe je je code goed moet opbouwen.</li>
      <li>In ieder geval vanila javascript kennen en beheersen zorgt ervoor dat je geen beginnersfouten maakt en het geeft je een beter beeld hoe zo een framework als jquery of nodejs is opgebouwd.</li>
      <li>Zo kun je sneller errors spotten en betere apps maken</li>
      <li>In het volgende stuk gaan we iets dieper gaan kijken naar de goede en slechte delen in de spec / syntax</li>
    </ul>
  </aside>
</section>
