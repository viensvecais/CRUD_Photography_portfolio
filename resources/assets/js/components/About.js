import React from "react";

export class About extends React.Component {
  render() {
    return (
      <div className="about">
        <img
          className="about__background"
          src={require("../../img/aboutme.jpg")}
          alt="About me background"
        />
        <div className="about__content">
          <div className="about__content__brand">
            <h5 className="about__content__brand__name">Jolanta Liva</h5>
            <h6 className="about__content__brand__subt">photography</h6>
          </div>
          <h1 className="about__content__title">Nedaudz par mani</h1>
          <hr className="about__content__horizontal-line" />
          <h4 className="about__content__subtitle">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Cum,
            repellendus.
          </h4>
        </div>
      </div>
    );
  }
}
