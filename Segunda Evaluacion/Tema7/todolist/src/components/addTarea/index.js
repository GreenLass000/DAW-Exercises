import React, { Component } from 'react';

class AddTask extends Component {
    constructor(props) {
        super(props);
        this.state = {
            nombreComponente: ''
        };
        this.handleChange = this.handleChange.bind(this);
        this.handleSubmit = this.handleSubmit.bind(this);
    }

    handleChange(event) {
        this.setState({ nombreComponente: event.target.value });
    }

    handleSubmit(event) {
        event.preventDefault();
        this.props.onFormSubmit(this.state.nombreComponente);
        this.setState({ nombreComponente: '' }); // Limpiar el campo después de enviar
    }

    render() {
        return (
            <form onSubmit={this.handleSubmit}>
                <label>
                    Nombre del Componente:
                    <input
                        type="text"
                        value={this.state.nombreComponente}
                        onChange={this.handleChange}
                    />
                </label>
                <button type="submit">Enviar</button>
            </form>
        );
    }
}

export default AddTask;
