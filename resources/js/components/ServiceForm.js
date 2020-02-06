import React, {Component} from 'react';


class ServiceForm extends Component{

    render(){
        return(
            <div className='form-group'>
                {this.props.elementName === 'input' ?
                <input
                    className='input-group'
                    type={this.props.type}
                    name={this.props.name}
                    placeholder={this.props.placeholder}
                    required='required'
                    data-validation-message='G, we need this info'
                    onChange={this.props.onChange}
                    onBlur={this.props.onBlur}
                />
                :
                <textarea
                    className='input-group'
                    type={this.props.type}
                    name={this.props.name}
                    placeholder={this.props.placeholder}
                    required='required'
                    data-validation-message='G, we need to know the problem'
                    onChange={this.props.onChange}
                    onBlur={this.props.onBlur}
                />
            }
            <p className="help-block text-danger">
                {
                    (this.props.touched && this.props.errors) &&
                    <span>{this.props.errors}</span>
                }
            </p>
            </div>
        )
    }

}

export default ServiceForm;
