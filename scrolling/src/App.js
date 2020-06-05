import React from "react";
// import styled from "styled-components";
import ScrollDistance from "./components/ScrollDistance";
import SlideColor from "./components/SlideColor";
import SlideGif from "./components/SlideGif";
import Prism from "prismjs";

function App() {
  return (
    <div className="App reveal">
      <SlideGif
        src="https://media.giphy.com/media/xT5LMMjQXvcTi1xh0Q/giphy.gif"
        alt="Let's Scroll"
      />
      <SlideColor>
        <h3>View content below the fold.</h3>
      </SlideColor>
      <SlideColor>
        <h3>How much do we scroll?</h3>
        <h5>Let's do the math</h5>
      </SlideColor>
      <SlideColor>
        <h4>
          <span class="fragment">90 minutes/day</span>
          <span class="fragment"> * 30cm/5sec</span>
          <span class="fragment"> = 324 m/day</span>
        </h4>
        <h4>
          <span class="fragment">324 m/day</span>
          <span class="fragment"> * 365d</span>
          <span class="fragment"> = 118km</span>
        </h4>
      </SlideColor>
      <SlideGif src="/img/robert.jpg" alt="Cat" />
      <SlideColor>
        <h3>Common tools for scrolling</h3>
      </SlideColor>
      <SlideColor>
        <h3>Box Overflow Control</h3>
        <pre>
          <code className="language-css">
            {`.selector {
  overflow: auto | visible | hidden | scroll;
  overflow-x: auto | visible | hidden | scroll;
  overflow-y: auto | visible | hidden | scroll;
}`}
          </code>
        </pre>
      </SlideColor>
      <SlideColor>
        <h3>Text Overflow Control</h3>
        <pre>
          <code className="language-css">
            {`.selector {
  text-overflow: ellipsis | clip;
  // works in combination with
  white-space: nowrap;
  overflow: hidden;
  
  // On another line
  -webkit-line-clamp: 3;
  -webkit-box-orient: vertical;  
}`}
          </code>
        </pre>
      </SlideColor>
      <SlideColor>
        <h3>Scroll Control</h3>
        <ul>
          <li>
            First api:{" "}
            <a href="https://www.w3.org/TR/2015/WD-css-snappoints-1-20150326/#scroll-snap-points">
              Scroll snap points
            </a>{" "}
            <small>(26/03/2015, discontinued)</small>.
          </li>
          <li>
            Current api:{" "}
            <a href="https://drafts.csswg.org/css-scroll-snap-1/#propdef-scroll-snap-stop">
              CSS Scroll Snap Module Level 1
            </a>{" "}
            <small>(23/06/2016, first draft)</small>.
          </li>
        </ul>
      </SlideColor>
      <SlideGif src="/img/steve.jpg" alt="Cat" />
      <SlideColor>
        <h3>Api Parent Properties</h3>
        <pre>
          <code className="language-css">
            {`.parent {
  scroll-snap-type: none | x | y | both | block | inline | y mandatory | x proximity | both proximity;
  scroll-padding: auto | 0 | 20px | 1em 2em 3em 4em;
  scroll-padding-inline: auto | 0 | 20px | 2em 1em;
  scroll-padding-block: auto | 0 | 20px | 2em 1em;
  scroll-snap-stop: normal | always; // (at risk | experimental)
}`}
          </code>
        </pre>
      </SlideColor>
      <SlideColor>
        <h3>Api Child Properties</h3>
        <pre>
          <code className="language-css">
            {`.child {
  scroll-snap-align: none | start | center | end | start end;
  scroll-margin: auto | 0 | 20px | 2em;
  scroll-margin-inline: auto | 0 | 20px | 2em;
  scroll-margin-block: auto | 0 | 20px | 2em;
}`}
          </code>
        </pre>
      </SlideColor>
      <SlideGif src="/img/duck.jpg" alt="Duck" />
      <SlideColor>
        <h3>Extra Css Properties</h3>
        <pre>
          <code className="language-css">
            {`html {
  scroll-behavior: auto | smooth; //(no ie, no safari)  
  overscroll-behavior: auto | contain | none | auto contain; //(no safari)
  scrollbar-color: red blue | red | blue; //(only ff)
  scrollbar-width: auto | thin | none; //(only ff)
}`}
          </code>
        </pre>
      </SlideColor>
      <SlideColor>
        <h3>Alter scrollbar on MacOS</h3>
        <p>System preferences > general > show scrollbars</p>
      </SlideColor>
      <SlideGif src="/img/scrolls.jpg" alt="Duck" />
      <SlideColor>
        <h3>Scroll snap support</h3>
        <p>
          <a href="https://caniuse.com/#feat=css-snappoints">Can I Use</a>
        </p>
      </SlideColor>
      <SlideColor>
        <h3>Thank you ;)</h3>
      </SlideColor>
      <SlideGif src="/img/dawson.jpg" alt="Dawson" />
      <ScrollDistance />
    </div>
  );
}

export default App;
