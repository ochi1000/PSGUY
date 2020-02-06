import React, {Component} from 'react';
import * as Yup from 'yup';
import {withFormik} from 'formik';
import ServiceForm from './ServiceForm';

const fields = [
    serctions:[
        {name: 'name', elementName:'input', type:'checkbox', placeholder: 'Ps4 pad'},
        {name: 'email', elementName:'input', type:'email', id:'email', placeholder: 'Your email'},
        {name: 'phone', elementName:'input', type:'number', id:'name', placeholder: 'Your phone number'}
    ]
]

class Service extends Component{
    render(){
        return(

        )
    }
}

export default withFormik({

}) (Service);
