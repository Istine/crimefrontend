import React from 'react';

import { BrowserRouter as Router, Route, Redirect }  from 'react-router-dom'
import Dashboard from './component/Dashboard';
import Login from './component/Login';

function App() {
  return (
    <Router>
      <Route path='/' exact component={Login} />
      <Route path='/account/dashboard' component={Dashboard} />
    </Router>
  );
}

export default App;
