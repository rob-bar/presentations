import React from "react";
import styled from "styled-components";

export const App = () => {
  return (
    <AppStyled className="App">
      <GifSlide>
        <img
          src="https://media.giphy.com/media/xT5LMMjQXvcTi1xh0Q/giphy.gif"
          alt="Let's scroll"
        />
      </GifSlide>
    </AppStyled>
  );
};

const AppStyled = styled.div`
  height: 100%;
`;

const GifSlide = styled.section`
  background-color: #15171b;
  height: 100%;

  img {
    object-fit: contain;
    height: 100%;
    width: auto;
  }
`;
