import React from "react";

import policeLogo from "../imgs/police.png";

import "../scss/_nav.scss";

export default function Navbar() {
  return (
    <div className='nav-container'>
      <nav></nav>
      <div className="side-nav">
        <img src={policeLogo} alt="police-logo" />
      </div>
    </div>
  );
}
