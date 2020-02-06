import React, { Component } from 'react'
    import ReactDOM from 'react-dom'
    import { BrowserRouter, Route, Switch } from 'react-router-dom'
    import Test from './Test'
    import NotFound from './NotFound'

    class App extends Component {
      render () {
        return (
          <BrowserRouter>
            <div>
              <Switch>
                <Route exact path='/test' component={Test} />
                <Route component={NotFound}/>
              </Switch>
            </div>
          </BrowserRouter>
        )
      }
    }

    ReactDOM.render(<App />, document.getElementById('app'))
