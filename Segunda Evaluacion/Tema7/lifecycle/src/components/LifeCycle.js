import React from "react";

export default class LifeCycle extends React.Component {
    constructor(...args) {
        super(...args);

        console.log("Ejecuto constructor", ...args);
        this.state = {
            state: "Inicializando constructor"
        };
    }

    /**
     * Este método se ejecuta después de que el componente ha sido montado en el DOM.
     *
     * Se utiliza comúnmente para realizar operaciones que requieren que el componente esté en el DOM,
     * como solicitudes de red (API calls), establecimiento de suscripciones, o cualquier inicialización
     * que necesite ocurrir una vez que el componente está en la interfaz de usuario.
     *
     * No se debe realizar la actualización del estado en este método,
     * ya que podría provocar un bucle de actualización.
     */
    componentDidMount() {
        console.log("Se ejecuta componentDidMount");
    }

    /**
     * Este método se llama después de que el componente se actualiza, es decir, cuando recibe nuevas
     * propiedades (props) o su estado (state) cambia.
     *
     * Puede ser utilizado para realizar acciones después de que se ha producido una actualización,
     * como realizar operaciones basadas en los cambios en las propiedades o el estado.
     *
     * @param {Object} prevProps - Propiedades anteriores del componente.
     * @param {Object} prevState - Estado anterior del componente.
     * @param {any} snapshot - Valor devuelto por getSnapshotBeforeUpdate o null si no está presente.
     */
    componentDidUpdate(prevProps, prevState, snapshot) {
        console.log("Ejecutando componentDidUpdate. Anteriores propiedades y estado: ", prevProps, prevState);
    }

    /**
     * Este método determina si el componente debería volver a renderizarse o no.
     *
     * Se utiliza para optimizar el rendimiento, ya que permite al desarrollador evitar
     * la renderización innecesaria del componente si no ha habido cambios significativos
     * en las propiedades o el estado.
     *
     * @param {Object} nextProps - Próximas propiedades del componente.
     * @param {Object} nextState - Próximo estado del componente.
     * @param {any} nextContext - Próximo contexto del componente.
     * @returns {boolean} - Devuelve true si se debe renderizar, false si no.
     */
    shouldComponentUpdate(nextProps, nextState, nextContext) {
        console.log("Ejecutando shouldComponentUpdate. Proximas propiedades y estado: ", nextProps, nextState);
        return true;
    }

    /**
     * Este es un método estático que se llama cada vez que se recibe un cambio en las
     * propiedades (props) y/o el estado del componente.
     *
     * Se utiliza para calcular el nuevo estado del componente en función de las nuevas propiedades recibidas.
     *
     * @param {Object} nextProps - Próximas propiedades del componente.
     * @param {Object} prevState - Estado actual del componente.
     * @returns {Object|null} - Devuelve el nuevo estado o null si no se desea actualizar el estado.
     */
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
