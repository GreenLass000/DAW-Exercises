import React from 'react';
import Item from '../item';

function ListTasks({componentes}) {
    return (<ul>
            {componentes.map((componente, index) => (
                <Item key={index} nombre={componente.nombre} fecha={componente.fecha}/>))}
        </ul>);
}

export default ListTasks;
