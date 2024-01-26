import {useState} from "react";
import "./add-tarea.css";

const AddTarea = ({add}) => {
    const [name, setName] = useState("");

    const handleChange = (event) => {
        setName(event.target.value);
    };
    const handleSubmit = (event) => {
        event.preventDefault();
        add(name);
        setName("");
    };

    return (<form onSubmit={handleSubmit}>
        <input type={"text"} value={name} onChange={handleChange}/>
        <button type={"submit"}>Añadir</button>
    </form>);
};

export default AddTarea;