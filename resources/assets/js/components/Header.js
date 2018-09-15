import React from "react";
import { Link } from "react-router-dom";

export class Header extends React.Component {
  render() {
    return (
      <div className="header">
        <img
          className="header__background"
          src={require("../../img/hero.png")}
          alt="Hero background"
        />
        <div className="header__content">
          <div className="header__content__brand">
            <h5 className="header__content__brand__name">Jolanta Liva</h5>
            <h6 className="header__content__brand__subt">photography</h6>
          </div>
          <h1 className="header__content__title">
            See the world through my lens
          </h1>
          <hr className="header__content__horizontal-line" />
          <h4 className="header__content__subtitle">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Cum,
            repellendus.
          </h4>
        </div>
        <Link className="header__arrow" to="/work">
          <img
            className="header__arrow__img"
            src={require("../../img/arrow.png")}
            alt="Arrow down"
          />
        </Link>
      </div>
    );
  }
}
