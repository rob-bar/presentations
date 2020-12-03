<section>
  <section>
    <h2>Good parts</h2>
    <ul>
      <li style="padding: 2px 0;" class="fragment fade-in">Loose typing</li>
      <li style="padding: 2px 0;" class="fragment fade-in">Functions</li>
      <li style="padding: 2px 0;" class="fragment fade-in">Expressive object literal</li>
      <li style="padding: 2px 0;" class="fragment fade-in">Dynamic objects</li>
      <li style="padding: 2px 0;" class="fragment fade-in">Function scope / closure</li>
    </ul>

    <aside class="notes">
      <ul>
        <li>Loose typing in de browser is een goed ding, vergelijkbaar dus met php.</li>
        <li>Functies als eerste klas objecten.</li>
        <li>De mannier waarop javascript objecten worden gevormd, vergelijkbaar en deels overgenomen uit JSON.</li>
        <li>Dynamische objecten, aanpassen van objecten is een makkie.</li>
        <li>In Javascript hebben we functio scope en closures.</li>
      </ul>
    </aside>
  </section>

  <section>
    <h2>Loose typing</h2>
    <ul>
      <li>Primitives: <a>Number</a>, <a>Boolean</a>, <a>String</a>.</li>
      <li>Objects: <a>Object</a>, <a>Function</a>, <a>Array</a>, <a>Date</a>, <a>RegExp</a>, etc.</li>
      <li>Special cases: <a>Null</a>, <a>Undefined</a>, <a>NaN</a>.</li>
    </ul>
    <br><br>
    <pre><code data-trim contenteditable>
var a = 13; // Number declaration
var b = "beee"; // String declaration
var c = true; // Boolean declaration
var d = []; // Array declaration
var e = {}; // Object declaration
var f = function(){}; // Function declaration
    </code></pre>
    <br>

    <aside class="notes">
      <ul>
        <li>Onder te verdelen in 3 grote groepen</li>
        <li>Loosely typed wil gewoon zeggen dat elke variabele in javascript automatisch een type krijgt, je hoeft niet te zeggen wat je variabele zal zijn.</li>
        <li>De compiler detecteerd welk type je declareerd.</li>
      <ul>
    </aside>
  </section>

  <section>
    <h2>Functions as first class objects</h2>
    <ul>
      <li>Instance of the Object type</li>
      <li>Store in a variable</li>
      <li>As a parameter to another function</li>
      <li>Return a function from another function</li>
    </ul>

    <aside class="notes">
      <ul>
        <li>Een functie in javascript is een instantie van een object.</li>
        <li>Je kan functies opslaan in variabelen</li>
        <li>Je kan functies doorgeven aan functies</li>
        <li>Je kan functies terug geven vanuit functies</li>
      </ul>
    </aside>
  </section>

  <section>
    <h2>Functions as first class objects</h2>

    <pre><code data-trim contenteditable>
var myBarFunc = function test(foo) {
  foo += 1;
  return foo;
};

var getKeys = function(obj){
Object.getOwnPropertyNames(obj).forEach(function(val, idx, array) {
  console.log(val + " -> " + obj[val]);
});
};
// consoles
// "prototype -> [object Object]"
// "length -> 1"
// "name -> test"

getKeys(myBarFunc);

    </code></pre>
  </section>

  <section>
    <h2>Expressive object literal</h2>
    <pre><code data-trim contenteditable>
var person = {
  firstName: "John",
  lastName: "Doe",
  gunType: "Revolver",
  sayHi: function() {
    console.log("Howdy");
  }
};
    </code></pre>
  </section>

  <section>
    <h2>Dynamic objects</h2>
    <pre><code data-trim contenteditable>
var person = {
  firstName: "John",
  lastName: "Doe",
  gunType: "Revolver",
  sayHi: function() {
    console.log("Howdy");
  }
};

console.log(person.firstName + " " + person.lastName); //GET
person.sayHi(); //GET
person.gunType = "Shotgun"; //SET = update key
person["shoe-type"] = "Cowboy Boots"; //Other Notation
person.fireGun = function() {
  console.log("BAM");
}; //SET = create key

person.fireGun(); //GET
delete person.fireGun; //REMOVE
    </code></pre>
  </section>
  <section>
    <h2>Function scope</h2>
    <pre><code data-trim contenteditable>
var foo = function() {
  var a = 3, b = 5;

  var bar = function() {
    var b = 7, c = 11;
    /// At this point, a is 3, b is 7 and c is 11

    a += b + c;
    // At this point, a is 21, b is 7 and c is 11
  };
  // At this point, a is 3, b is 7 and c is undefined

  bar();
  // At this point, a is 21, b is 5

}
    </code></pre>

    <aside class="notes">
      <ul>
        <li>Scope zorgt voor de zichtbaarheid en duurbaarheid van variabelen en parameters</li>
        <li>Scope reduceerd ook naam overlapping en scope zorgt ook voor memory management</li>
        <li>Ziet iemand hier een error</li>
      </ul>
    </aside>
  </section>
  <section>
    <h2>Closure</h2>

    <pre><code data-trim contenteditable>
function foo(x) {
  var tmp = 3;
  return function (y) {
    alert(x + y + (++tmp)); // will also alert 16
  }
}

var bar = foo(2); // bar is now a closure.
bar(10);
/////////// another example ///////////

var quo = function(status) {
  return { // return an object
      get_status: function() {
      return status; // access status from outer function
    }
  }
}

var myQuo = quo("amazed");
console.log(myQuo.get_status()); // outputs amazed
    </code></pre>

    <aside class="notes">
      <ul>
        <li>Van zodra je het function keyword in een anderer function ziet, dan heeft de binnenste functie toegang tot de buitenste functie zijn context</li>
        <li>closure werkt ook goed samen met this</li>
      </ul>
    </aside>
  </section>
</section>

