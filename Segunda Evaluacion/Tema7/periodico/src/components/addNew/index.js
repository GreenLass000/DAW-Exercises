import {useState} from "react";
import "./addnew.styles.css";

const AddNew = () => {
    const [image, setImage] = useState();
    const [title, setTitle] = useState();
    const [descr, setDescr] = useState();

    function handleChangeImage(event) {
        setImage(event.target.value);
        console.log(event.target.value);
    }

    function handleChangeTitle(event) {
        setTitle(event.target.value);
    }

    function handleChangeNew(event) {
        setDescr(event.target.value);
    }

    return (<div className={"container"}>
        <input type={"text"} placeholder={"URL de Imagen"} onChange={handleChangeImage} value={image}/> <br/>
        <input type={"text"} placeholder={"Titular"} onChange={handleChangeTitle} value={title}/> <br/>
        <input type={"text"} placeholder={"Noticia"} onChange={handleChangeNew} value={descr}/> <br/>
        <input type={"submit"} value={"Añadir Noticia"} onChange={handleChangeImage}/>
    </div>);
}

export default AddNew;