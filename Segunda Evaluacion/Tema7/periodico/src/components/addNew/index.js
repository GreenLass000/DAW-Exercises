import {useEffect, useState} from "react";
import "./addnew.styles.css";

const AddNew = () => {
    const [image, setImage] = useState("https://picsum.photos/200");
    const [title, setTitle] = useState("");
    const [descr, setDescr] = useState("");

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

    function handleSubmit(event) {
        event.preventDefault();

        const postData = async () => {
            if (image !== '' && title !== '' && descr !== '') {
                try {
                    const response = await fetch('http://localhost:3001/Noticias', {
                        method: 'POST', headers: {
                            'Content-Type': 'application/json',
                        }, body: JSON.stringify({"Imagen": image, "Titulo": title, "Noticia": descr}),
                    });

                    if (response.ok) {
                        console.log('Post creado exitosamente');
                        setImage('');
                        setTitle('');
                        setDescr('');
                    } else {
                        console.error('Error al crear el post');
                    }
                } catch (error) {
                    console.error('Error al crear el post:', error);
                }
            }
        };
        postData();

        window.location.reload();
    }

    // useEffect(() => {
    //
    // }, []);

    return (<div className={"container"}>
        <input type={"text"} placeholder={"URL de Imagen"} onChange={handleChangeImage} value={image}/>
        <input type={"text"} placeholder={"Titular"} onChange={handleChangeTitle} value={title}/>
        <textarea placeholder={"Noticia"} onChange={handleChangeNew} value={descr}/>
        <input type={"submit"} value={"Añadir Noticia"} onClick={handleSubmit}/>
    </div>);
}

export default AddNew;