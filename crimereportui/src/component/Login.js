import React, { useState } from "react";

import police from "../imgs/police.png";

import bgSignin from "../imgs/bg-signin.jpg";

import "../scss/_login.scss";

export default function Login() {
  const [formState, setFormState] = useState({
    email: "",
    password: "",
  });

  const handleChange = (e) => {
    const { name, value } = e.target;
    setFormState((prevState) => ({
      ...prevState,
      [name]: value,
    }));
  };

  return (
    <div className="login">
      <div className="bg">
        <img src={bgSignin} alt="police logo" />
      </div>
      <div className="login-form">
        <img src={police} alt="police logo" />
        <h3>
          Dont have an account? <a>Sign up</a>
        </h3>
        <form>
          <div className="input-box">
            <input
              type="email"
              name="email"
              required
              value={formState.email}
              onChange={handleChange}
            />
            <label>E-mail</label>
          </div>
          <div className="input-box">
            <input
              type="password"
              name="password"
              required
              value={formState.password}
              onChange={handleChange}
            />
            <label>Password</label>
          </div>
          <button>Sign in</button>
        </form>
        <h3>&copy;{new Date().getFullYear()} Snipstreams</h3>
      </div>
    </div>
  );
}
