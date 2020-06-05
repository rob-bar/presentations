import React from "react";
import styled from "styled-components";

const SlideGif = ({ src, alt }) => {
  return (
    <SlideGifStyled>
      <img src={src} alt={alt} />
    </SlideGifStyled>
  );
};

export default SlideGif;

const SlideGifStyled = styled.section`
  background-color: #171a1f;
  scroll-snap-align: start;
  height: 100%;
  display: flex;
  justify-content: center;

  img {
    height: 100%;
    object-fit: contain;
  }
`;
