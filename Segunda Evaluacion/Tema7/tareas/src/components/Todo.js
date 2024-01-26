import React, {Component} from "react";
import "../style/Todo.css";

export default class Todo extends Component {

    constructor(props) {
        super(props);
        this.state = {
            showName: true
        }
    }

    render() {
        return (<li className={"todo stack-small"}>
            <div className={"c-cb"}>
                <input id={"todo-0"} type={"checkbox"} defaultChecked={true}/>
                {this.state.showName ? <label className={"todo-label"} htmlFor={"todo-0"}>
                    {this.props.name}
                </label> : <label></label>}
            </div>
            <div className={"btn-group"}>
                <button type={"button"} className={"btn"}>
                    Edit <span className={"visually-hidden"}>{this.props.name}</span>
                </button>
                <button type={"button"} className={"btn btn__danger"}>
                    Delete <span className={"visually-hidden"}>{this.props.name}</span>
                </button>
            </div>
        </li>)
    }
}