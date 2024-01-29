import React, { Component } from 'react';
import AddTask from './components/addTarea';
import ListTasks from './components/listTareas';

class App extends Component {
    constructor(props) {
        super(props);
        this.state = {
            componentesCreados: []
        };
        this.handleFormSubmit = this.handleFormSubmit.bind(this);
    }

    handleFormSubmit(nombreComponente) {
        const fechaActual = new Date();
        const fechaFormateada = `${fechaActual.getDate()}/${fechaActual.getMonth() + 1}/${fechaActual.getFullYear()} ${fechaActual.getHours()}:${fechaActual.getMinutes()}`;
        const nuevoComponente = { nombre: nombreComponente, fecha: fechaFormateada };
        this.setState(prevState => ({
            componentesCreados: [...prevState.componentesCreados, nuevoComponente]
        }));
    }

    render() {
        return (
            <div>
                <h1>Enviar Nombre del Componente</h1>
                <AddTask onFormSubmit={this.handleFormSubmit} />
                <h2>Componentes Creados:</h2>
                <ListTasks componentes={this.state.componentesCreados} />
            </div>
        );
    }
}

export default App;
