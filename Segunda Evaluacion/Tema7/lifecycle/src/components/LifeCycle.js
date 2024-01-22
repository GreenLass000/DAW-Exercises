import React from "react";

export default class LifeCycle extends React.Component {
    constructor(...args) {
        super(...args);

        console.log("Ejecuto constructor", ...args);
        this.state = {
            state: "Inicializando constructor"
        };
    }

    componentDidMount() {
        console.log("Se ejecuta componentDidMount");
    }

    componentDidUpdate(prevProps, prevState, snapshot) {
        console.log("Ejecutando componentDidUpdate. Anteriores propiedades y estado: ", prevProps, prevState);
    }

    shouldComponentUpdate(nextProps, nextState, nextContext) {
        console.log("Ejecutando shouldComponentUpdate. Proximas propiedades y estado: ", nextProps, nextState);
        return true;
    }

    static getDerivedStateFromProps(nextProps, prevState) {
        console.log("Ejecutando getDerivedStateFromProps con las propiedades futuras y el estado antiguo: ", nextProps, prevState);
        return null;
    }

    render() {
        return (<div>
            <p>Componente con propiedades y estado inicializado</p>
            <p>Estado: {this.state.state}</p>
            <p>Propiedad: {this.props.property}</p>
        </div>);
    }
}

LifeCycle.defaultProps = {
    property: "Valor por defecto definido para la propiedad"
};
