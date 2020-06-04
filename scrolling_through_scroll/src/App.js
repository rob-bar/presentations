import React from "react";
import styled from "styled-components";

function App() {
  return (
    <App>
      <GifSlide>testing</GifSlide>
    </App>
  );
}

const GifSlide = styled.section`
  background-color: #15171b;
  /* height: 100%; */

  img {
    /* object-fit: contain;
    height: 100%;
    width: auto; */
  }
`;

export default App;
