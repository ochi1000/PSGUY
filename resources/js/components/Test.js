import React, {Component} from 'react';
import {Form, Formik, Field} from 'formik';

class Test extends Component {
    render(){
        return (
            <div className="container">
                <div className="row justify-content-center">
                    <div className="col-md-8">
                        <div className="card">
                            <div className="card-header">Example Component</div>

                            <div className="card-body">
                                I'm an example Component
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        )
    }

}

export default Test;
// if(document.getElementById('test')){
//     ReactDOM.render(<Test />, document.getElementById('test'));
// }
