import React from "react";
import styled from "styled-components";
import uniqolor from "uniqolor";

const SlideColor = ({ children }) => {
  return (
    <MySlide
      color={uniqolor.random({ lightness: [30, 40], saturation: [20, 30] })}
    >
      {children}
    </MySlide>
  );
};

const MySlide = styled.section`
  background-color: ${(props) => props.color.color};
  scroll-snap-align: start;
  height: 100%;
  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: column;
  color: ${(props) => (props.color.isLight ? "#000" : "#FFF")};
`;

export default SlideColor;
