<section>
  <section>
    <h2>Bad parts</h2>
    <ul>
      <li style="padding: 2px 0;" class="fragment fade-in">Type coercion equality operators <small>(FROM JAVA)</small></li>
      <li style="padding: 2px 0;" class="fragment fade-in">typeof</li>
      <li style="padding: 2px 0;" class="fragment fade-in">Global variables</li>
      <li style="padding: 2px 0;" class="fragment fade-in">Adding vs concatenating <small>(FROM JAVA)</small></li>
      <li style="padding: 2px 0;" class="fragment fade-in">Auto semicolon insertion</li>
      <li style="padding: 2px 0;" class="fragment fade-in">parseInt</li>
      <li style="padding: 2px 0;" class="fragment fade-in">Phony arrays</li>
      <li style="padding: 2px 0;" class="fragment fade-in">Reserved words</li>
      <li style="padding: 2px 0;" class="fragment fade-in">Too many falsy values</li>
    </ul>

    <aside class="notes">
      <ul>
        <li>Ok, over naar de slechte delen van javascript, hou u vast want het zijn er veel.</li>
        <li>De type coecion equality operators zijnde dus de dubbel is gelijk aan en het uitroeptkene is gelijkaan</li>
        <li>typeof is een operator die het type van iets teruggeeft vrij straightforward maar deze geeft soms rare zaken terug</li>
        <li>dan toevoegen en concateneren is hetzelfde teken in tegensteling met php</li>
        <li>parseint is een functie die een string kan omzetten naar een integer</li>
        <li>Arrays in javascript zijn eigenlijk hashtables, maw objecten</li>
        <li>In Javascript heb je een lange lijst met reserved words die je niet mag gebruiken als naam, vrij moeilijk te spotten errors</li>
        <li>In js kun je op teveel manieren false omschrijven false, null, undefined, NaN, 0, ""</li>
      <ul>
    </aside>
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
typeof blabla === 'undefined';

// Functions
typeof function(){} === 'function';
typeof Math.sin === 'function';

// Objects
typeof {a:1} === 'object';
typeof new Date() === 'object';


// The weirdness begins
// DO NOT USE
typeof new Boolean(true) === 'object';
typeof new Number(1) === 'object';
typeof new String("abc") === 'object';

typeof [1, 2, 4] === 'object'; // HOW DO WE TEST FOR ARRAYNESS
typeof NaN === "number" // SAY WHUT?
typeof null === "object";

      </code>
    </pre>

    <aside class="notes">
      <ul>
        <li>typeof doet het wel vrij goed over het algemeen, toch zeker voor de eerste groep primitieven.</li>
        <li>Maar als we naar objecten en speciale gevallen gaan kijken valt typeof wel door de mand.</li>
      <ul>
    </aside>
  </section>

  <section>
    <h2>Global variables</h2>

    <pre>
      <code data-trim contenteditable>
var foo = value; // outside of any scope
window.foo = value; // anywhere in the code
foo = value; // anywhere in the code IMPLIED GLOBAL

(function () {
    var not_a_global = 1;
    alert(not_a_global);
})();
      </code>
    </pre>

    <aside class="notes">
      <ul>
        <li>Misschien zijn globale variabelen wel de slechtste feature van javascript.</li>
        <li>Het gebruik maken van teveel globale variabelen maakt je programma of u website onbetrouwbaar.</li>
        <li>Er zijn drie manniere om globale variabelen te maken, 1 die zeer lastig is om te onderscheppen.</li>
        <li>Voorbeelden van globale variabelen zijn: het dolar teken van jquery en jquery zelf, underscore, het drupal object, etc.</li>
        <li>Om globale variabelen te reduceren kun je gebruik maken van lamda funcitons.</li>
      <ul>
    </aside>
  </section>

  <section>
    <h2>+ Adds and concatenates</h2>
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
    <aside class="notes">
      <ul>
        <li>In JAVA is dat geen probleem omdat dat een typeerror throwed.</li>
        <li>IN Javascript is het geen error, de compiler zorgt voor de meest logishe oplossing.</li>
        <li>Maar in sommige gevallen is de meest logische oplossing niet de gewenste of verwachte oplossing.</li>
      <ul>
    </aside>

  </section>
  <section>
    <h2>Auto semicolon insertion</h2>
    <pre>
      <code data-trim contenteditable>
// AT THE END OF A FUNCTION FOR EXAMPLE
// Style isn't subjective in JS
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
var myFunc = function foo(par1, par2) {
  if(par2 === undefined) {

    return "par2 is undefined";
    par2 = "Ok";
  } else {

    return "par2 is defined";
  }

  return "Bar";
};

      </code>
    </pre>

    <aside class="notes">
      <ul>
        <li>De javascript compilers hebben een feature ingebouwd die ervoor zorgt dat er automatish semicolons worden toegevoegd wanneer de compiler denkt dat er 1 hoeft te staan.</li>
        <li>In dit voorbeeld is dit zeker niet gewenst.</li>
        <li>Er wordt een stuk code gewoon genegeerd door die semicolon insertion.</li>
        <li>Onderaan vind je een voorbeeld.</li>
        <li>Een goede raad die ik kan meegeven is: goeie indentering en witruimte op de juiste plaatsen en eventueel linebreaks.</li>
        <li>Shorthands zoals ifs enzo vermijden</li>
      <ul>
    </aside>
  </section>

  <section>
    <h2>parseInt</h2>
    <pre>
      <code data-trim contenteditable>
/// ALL RETURN 15
parseInt(" 0xF", 16);
parseInt(" F", 16);
parseInt("17", 8);
parseInt(021, 8);
parseInt("015", 10);
parseInt(15.99, 10);
parseInt("FXX123", 16);
parseInt("1111", 2);
parseInt("15*3", 10);
parseInt("15e2", 10);
parseInt("15px", 10);
parseInt("12", 13);

parseInt("16"); // 16
parseInt("16 ton"); // 16

parseInt("0e0"); // 0
parseInt("08"); // 0, '8' is not an octal digit.
parseInt("09"); // 0, '8' is not an octal digit.
parseInt("027"); // 23
parseInt("011"); // ?
parseInt("0111"); // ? :D
      </code>
    </pre>

    <aside class="notes">
      <ul>
        <li>parseInt is een functie in javascript die een string kan omvormen in een nummer</li>
        <li>De eerste parameter van die functie is een string en de tweede is een radix. vb 10, 8, 16</li>
        <li>De functie stopt wanneer het een letter ziet</li>
        <li>in ecma script 3 is deze functie zijn 2de parameter default 10, maar wanneer de string begint met 0 wordt dat omgezet naar 8, wat dus rare resultaten kan geven, zeker als je met datums werkt bijvoorbeeld.</li>
      <ul>
    </aside>
  </section>

  <section>
    <h2>Phony arrays</h2>
    <pre>
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

    <aside class="notes">
      <ul>
        <li>Javascript heeft geen arrays, het heeft hashtables.</li>
        <li>Het is iets trager maar je krijgt geen index out of bouns errors bijvoorvbeeld</li>
        <li>Het is iets moeilijker om te gaan checken of je array wel effectief een array voorsteld.</li>
      <ul>
    </aside>
  </section>
  <section>
    <h2>Reserved Words</h2>
    <blockquote>
      <small>
        break, case, class, catch, const, continue, debugger, default, delete, do, else, export, extends, finally, for, function, if, import, in, instanceof, let, new, return, super, switch, this, throw, try, typeof, var, void, while, with, yield
        enum, await, implements, package, protected, static, interface, private, public, abstract, boolean, byte, char, double, final, float, goto, int, long, native, short, synchronized, transient, volatile
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

    <aside class="notes">
      <ul>
        <li>Javascript heeft een gigantische lijst met gereserveerde woorden.</li>
        <li>als je die woorden gebruikt als naam van een variabele of als naam van een key op een object, crahed u app</li>
      <ul>
    </aside>
  </section>

  <section>
    <h2>false, null, undefined, NaN, 0, ""</h2>
    <pre>
      <code data-trim contenteditable>
false == null; // false
false == undefined; // false
false == NaN; // false
false == 0; // true
false == ""; // true

null == NaN // false
null == 0 // false
null == "" // false
null == undefined // true

undefined == NaN // false
undefined == 0 // false
undefined == "" // false

0 == "" //true
      </code>
    </pre>

    <aside class="notes">
      <ul>
        <li>Als je deze waarden in if statements zou zetten, zouden ze false weergeven.</li>
        <li>Gecombineerd met de type coertion opperators is dit een slecht idee</li>
      <ul>
    </aside>
  </section>

  <section>
    <h2>OMG! More bad parts!</h2>

    <ul class="fragment fade-in">
      <li style="padding: 2px 0;">NaN</li>
      <li style="padding: 2px 0;">Floating point</li>
      <li style="padding: 2px 0;">hasOwnProperty</li>
      <li style="padding: 2px 0;">With Statement</li>
      <li style="padding: 2px 0;">Eval <small>is as evil as in php</small></li>
      <li style="padding: 2px 0;">Bitwise operators</li>
      <li style="padding: 2px 0;">Typed wrappers</li>
      <li style="padding: 2px 0;">new</li>
      <li style="padding: 2px 0;">void</li>
    </ul>

    <aside class="notes">
      <ul>
        <li>The void operator evaluates the given expression and then returns undefined.</li>
      <ul>
    </aside>

  </section>
</section>
