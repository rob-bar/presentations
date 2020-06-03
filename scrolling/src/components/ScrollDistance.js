import React, { useState, useEffect } from "react";
import styled from "styled-components";

const ScrollDistance = () => {
  const [scrollPosition, setScrollPosition] = useState(0);
  const handleScroll = () => {
    const position = window.pageYOffset;
    setScrollPosition(((position / 89) * 2).toFixed(2));
  };

  useEffect(() => {
    window.addEventListener("scroll", handleScroll, { passive: true });

    return () => {
      window.removeEventListener("scroll", handleScroll);
    };
  }, []);

  return (
    <ScrollDistanceStyled>
      Scrolled:{" "}
      {scrollPosition < 100
        ? `${scrollPosition} cm`
        : `${(scrollPosition / 100).toFixed(2)} m`}
    </ScrollDistanceStyled>
  );
};

const ScrollDistanceStyled = styled.p`
  color: #fff;
  margin: 0;
  padding: 0;
  position: fixed;
  bottom: 1rem;
  left: 1rem;
  font-size: 1.25rem;
`;

export default ScrollDistance;
