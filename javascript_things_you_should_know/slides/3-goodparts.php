<section>
  <section>
    <h2>Good parts</h2>
    <ul>
      <li style="padding: 2px 0;" class="fragment fade-in">Loose typing</li>
      <li style="padding: 2px 0;" class="fragment fade-in">Functions as first class objects</li>
      <li style="padding: 2px 0;" class="fragment fade-in">Dynamic objects</li>
      <li style="padding: 2px 0;" class="fragment fade-in">Expresive object literal</li>
      <li style="padding: 2px 0;" class="fragment fade-in">Function scope / closure</li>
    </ul>
  </section>

  <section>
    <h2>Loose typing</h2>
    <ul>
      <li>Primitives: <a>Number</a>, <a>Boolean</a>, <a>String</a>.</li>
      <li>Objects: <a>Object</a>, <a>Function</a>, <a>Array</a>, <a>Date</a>, <a>RegExp</a>, etc.</li>
      <li>Special cases: <a>Null</a>, <a>Undefined</a>.</li>
    </ul>
  </section>

  <section>
    <h2>Loose typing</h2>
    <br>
    <pre><code data-trim contenteditable>
var a = 13; // Number declaration
var b = "thirteen"; // String declaration
    </code></pre>
    <br>
    <ul>
      <li>Loose typing means that variables are declared without a type.</li>
      <li>Variables in JavaScript are typed, but that type is determined internally.</li>
    </ul>
  </section>

  <section>
    <h2>Functions as first class objects</h2>
    <ul>
      <li>A function is an instance of the Object type</li>
      <li>A function can have properties and has a link back to its constructor method</li>
      <li>You can store the function in a variable</li>
      <li>You can pass the function as a parameter to another function</li>
      <li>You can return the function from a function</li>
    </ul>
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

getKeys(myBarFunc);
    </code></pre>

    <p>consoles:</p>

    <blockquote style="text-align: left;">
      "prototype -> [object Object]"<br>
      "length -> 1"<br>
      "name -> test"<br>
    </blockquote>
  </section>

  <section>
    <h2>Expresive object literal</h2>
    <ul>
      <li>JSON like object literal</li>
    </ul>
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
    <ul>
      <li>You can fully modify objects at runtime</li>
    </ul>

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

    <ul>
      <li style="padding: 2px 0;" class="fragment fade-in">Scope controls the visibility and lifetimes of variables and parameters.</li>
      <li style="padding: 2px 0;" class="fragment fade-in">Reduces naming collisions and provides automatic memory management.</li>
      <li style="padding: 2px 0;" class="fragment fade-in">Can someone see the error?</li>
    </ul>

    <pre class="fragment fade-in"><code data-trim contenteditable>
var foo = function() {
  var a = 3, b = 5;

  var bar = function() {
    var b = 7, c = 11;
    // At this point, a is 3, b is 7 and c is 11

    a += b + c;
    // At this point, a is 21, b is 7 and c is 11
  };
  // At this point, a is 3, b is 7 and c is undefined

  bar();
  // At this point, a is 21, b is 5
}
    </code></pre>
  </section>
  <section>
    <h2>Closure</h2>
    <ul>
      <li style="padding: 2px 0;" class="fragment fade-in">Whenever you see the function keyword within another function, the inner function has access to variables in the outer function context.</li>
      <li style="padding: 2px 0;" class="fragment fade-in">You can understand this best by example.</li>
    </ul>

    <pre class="fragment fade-in"><code data-trim contenteditable>
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
  </section>
</section>

