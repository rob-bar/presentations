<section>
  <section>
    <h2>Bad parts</h2>
    <ul>
      <li style="padding: 2px 0;" class="fragment fade-in">Type coercion equality operators</li>
      <li style="padding: 2px 0;" class="fragment fade-in">typeof</li>
      <li style="padding: 2px 0;" class="fragment fade-in">Global variables</li>
      <li style="padding: 2px 0;" class="fragment fade-in">Adding vs concatenating (JAVA)</li>
      <li style="padding: 2px 0;" class="fragment fade-in">Auto semicolon insertion</li>
      <li style="padding: 2px 0;" class="fragment fade-in">parseInt</li>
      <li style="padding: 2px 0;" class="fragment fade-in">Phony arrays</li>
      <li style="padding: 2px 0;" class="fragment fade-in">Reserved words</li>
      <li style="padding: 2px 0;" class="fragment fade-in">To many falsy values</li>
    </ul>
  </section>

  <section>
    <h2>type coercion == and !=</h2>
    <pre><code data-trim contenteditable>
"" == "0" // false
0 == "" // true
0 == "0" // true
false == "false" // false
false == "0" // true
false == undefined // false
false == null // false
null == undefined // true
" \t\r\n" == 0 // true
"abc" == new String("abc") // true ANTIPATERN
    </code>
  </pre>
  <pre>
    <code data-trim contenteditable>
// BAD
var name = object[namekey];
if (name == null) { // two errors that cancel each other out
  console.log("Name not found.");
}

// GOOD
var name = object[namekey];
if (name === undefined) {
  console.log("Name not found.");
}

      </code>
    </pre>
  </section>
  <section>
    <h2>typeof</h2>
    <pre>
      <code data-trim contenteditable>
// Numbers
typeof 37 === 'number';
typeof 3.14 === 'number';
typeof Math.LN2 === 'number';
typeof Infinity === 'number';
typeof NaN === 'number'; // Despite being "Not-A-Number"
typeof Number(1) === 'number'; // but never use this form!


// Strings
typeof "" === 'string';
typeof "bla" === 'string';
typeof (typeof 1) === 'string'; // typeof always return a string
typeof String("abc") === 'string'; // but never use this form!


// Booleans
typeof true === 'boolean';
typeof false === 'boolean';
typeof Boolean(true) === 'boolean'; // but never use this form!


// Undefined
typeof undefined === 'undefined';
typeof blabla === 'undefined'; // an undefined variable


// Objects
typeof {a:1} === 'object';

// use Array.isArray or Object.prototype.toString.call
// to differentiate regular objects from arrays
typeof [1, 2, 4] === 'object';

typeof new Date() === 'object';


// The following is confusing. Don't use!
typeof new Boolean(true) === 'object';
typeof new Number(1) === 'object';
typeof new String("abc") === 'object';


// Functions
typeof function(){} === 'function';
typeof Math.sin === 'function';
      </code>
    </pre>
  </section>
  <section>
    <h2>Global variables</h2>
    <ul>
      <li>A global variable is a variable that is visible in every scope.</li>
      <li>Use of global variables degrades the reliability of the programms that use them.</li>
      <li>3 ways of defining globals</li>
      <li>examples: Drupal, $, _, etc</li>
    </ul>
    <pre>
      <code data-trim contenteditable>
var foo = value; // outside of any scope
window.foo = value; // anywhere in the code
foo = value; // anywhere in the code IMPLIED GLOBAL
      </code>
    </pre>
  </section>
  <section>
    <h2>+ Adds and concatenates</h2>
    <ul>
      <li>In JAVA this isn't an issue, in javascript however the compiler doesn't throw type errors.</li>
      <li>Example:</li>
    </ul>
    <pre>
      <code data-trim contenteditable>
var a = 10;
var b = 20;
console.log("result is " + a + b);
// RESULT IS 1020

// fast solution
console.log("result is " + (a + b));
// RESULT IS 30
      </code>
    </pre>
  </section>
  <section>
    <h2>Style isn't subjective in JS</h2>
    <ul>
      <li>The compiler injects semicolons where he thinks he should inject them.</li>
      <li>ADVICE: No shorthand ifs, good indenting (2 spaces), good whitespacing</li>
      <li>Example:</li>
    </ul>
    <pre>
      <code data-trim contenteditable>
// AT THE END OF A FUNCTION FOR EXAMPLE
return
{
  status: true
};

// BECOMES
return ; //SEMICOLON INSERTION
{
  status: true;
}

// SILENT ERROR!!!

// good style example
var myFunc = function foo() {
  return "Bar";
};

      </code>
    </pre>

  </section>

  <section>
    <h2>parseInt</h2>
    <ul>
      <li style="padding: 2px 0;" class="fragment fade-in">String function thst converts a String into Integer</li>
      <li style="padding: 2px 0;" class="fragment fade-in">Stops when it sees a non digit, <a>"16"</a> and <a>"16 tons"</a> would produce same result</li>
      <li style="padding: 2px 0;" class="fragment fade-in">If the input string begins with <a>"0"</a>, radix is eight (octal) or 10 (decimal).  Exactly which radix is chosen is <a>implementation-dependent</a>.  <a>ECMAScript 5 specifies that 10 (decimal) is used</a>, but not all browsers support this yet.  For this reason always specify a radix when using parseInt.</li>
    </ul>
  </section>

  <section>
    <h2>Phony arrays</h2>
    <ul>
      <li style="padding: 2px 0;" class="fragment fade-in">Javascript doesn't have arrays, it has hashtables</li>
      <li style="padding: 2px 0;" class="fragment fade-in">slower, but no index out of bounds errors.</li>
      <li style="padding: 2px 0;" class="fragment fade-in">Harder to check for array existence.</li>
    </ul>
    <pre class="fragment fade-in">
      <code data-trim contenteditable>
var myArray = [1, 2, 3];

//WRONG WAY
if(typeof myArray === 'array') {
  // NOT ENTERED
}

//RIGHT WAY
if(Object.prototype.toString.apply(myArray) === "[object Array]") {
  // myArray is truly an array
}
      </code>
    </pre>
  </section>
  <section>
    <h2>Reserved Words</h2>
    <ul>
      <li style="padding: 2px 0;">Javascript has a large list of reserved words.</li>
    </ul>

    <blockquote>
      <small>
        break, case, class, catch, const, continue, debugger, default, delete, do, else, export, extends, finally, for, function, if, import, in, instanceof, let, new, return, super, switch, this, throw, try, typeof, var, void, while, with, yield
        enum, await, implements, package, protected, static, interface, private, public, abstract, boolean, byte, char, double, final, float, goto, int, long, native, short, synchronized, transient, volatile,
      </small>
    </blockquote>

    <pre>
      <code data-trim contenteditable>
var method; // Ok
var class; // Illegal
var object = {
  box: "value", // Ok
  case: "value", // Illegal
  "case": "value" // Ok
}
object.box = "another value"; // Ok
object.case = "another value"; // Illegal
object["case"] = "another value"; // Ok
      </code>
    </pre>
  </section>

  <section>
    <h2>false, null, undefined, NaN, 0, ""</h2>
    <ul>
      <li style="padding: 2px 0;" class="fragment fade-in">placed in if statements, all return false</li>
      <li style="padding: 2px 0;" class="fragment fade-in">combined with == or !=  === "BAD IDEA"</li>
      <li style="padding: 2px 0;" class="fragment fade-in">undefined and NaN are not constants, they are globals.<small>(means they can be changed)</small></li>
    </ul>

    <pre class="fragment fade-in">
      <code data-trim contenteditable>
NaN !== NaN // true Surprisingly
typeof NaN === "number" // true SAY WHUT?
      </code>
    </pre>
  </section>



  <section>
    <h2>OMG! More bad parts!</h2>

    <ul>
      <li style="padding: 2px 0;" class="fragment fade-in">NaN</li>
      <li style="padding: 2px 0;" class="fragment fade-in">Floating point</li>
      <li style="padding: 2px 0;" class="fragment fade-in">hasOwnProperty</li>
      <li style="padding: 2px 0;" class="fragment fade-in">With Statement</li>
      <li style="padding: 2px 0;" class="fragment fade-in">Eval <small>is as evil as in php</small></li>
      <li style="padding: 2px 0;" class="fragment fade-in">Bitwise operators</li>
      <li style="padding: 2px 0;" class="fragment fade-in">Typed wrappers</li>
      <li style="padding: 2px 0;" class="fragment fade-in">new</li>
      <li style="padding: 2px 0;" class="fragment fade-in">void</li>
    </ul>
  </section>
</section>
