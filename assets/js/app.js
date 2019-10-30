/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */
const routes = require('../../public/js/fos_js_routes.json');
import Routing from '../../vendor/friendsofsymfony/jsrouting-bundle/Resources/public/js/router.min.js';

Routing.setRoutingData(routes);
// any CSS you require will output into a single css file (app.css in this case)
require('../css/app.css');
// Need jQuery? Install it with "yarn add jquery", then uncomment to require it.
// const $ = require('jquery');

import React from 'react';
import ReactDOM from 'react-dom';
import axios from 'axios';


class App extends React.Component {

    constructor() {
        super();
        this.state = { users: [], loading: true};
    }
    
    componentDidMount() {
        this.getUsers();
    }
    
    getUsers() {
       axios.get(`api/users`).then(users => {
           this.setState({ users: users.data, loading: false})
       })
       console.log(this.state.users)
    }

    render() {
        
        const loading = this.state.loading;
        return(
            <div>
                
            </div>
        )
    }
}

ReactDOM.render(<App />, document.getElementById('profil'));