import React from "react";
import styled from "styled-components";
import ScrollDistance from "./components/ScrollDistance";
import SlideColor from "./components/SlideColor";
import Prism from "prismjs";
function App() {
  return (
    <div className="App reveal">
      <SlideGif>
        <img
          src="https://media.giphy.com/media/xT5LMMjQXvcTi1xh0Q/giphy.gif"
          alt="Let's Scroll"
        />
      </SlideGif>
      <SlideColor>
        <h3>View content below the fold.</h3>
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
      <SlideGif>
        <img src="/img/elevator.jpg" alt="Up up up" />
      </SlideGif>
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
  text-overflow: clip | ellipsis;
  white-space: normal | nowrap | pre | pre-wrap | pre-line | break-spaces;
}`}
          </code>
        </pre>
      </SlideColor>
      <ScrollDistance />
    </div>
  );
}

const SlideGif = styled.section`
  background-color: #171a1f;
  height: 100%;
  display: flex;
  justify-content: center;

  img {
    height: 100%;
    object-fit: contain;
  }
`;

export default App;
