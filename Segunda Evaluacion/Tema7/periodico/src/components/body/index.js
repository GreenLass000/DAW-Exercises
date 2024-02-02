import {useEffect, useState} from "react";
import "./body.styles.css";
import SimpleSlider from "../slider";

const Body = () => {
    const [news, setNews] = useState([]);
    const [recuperado, setRecuperado] = useState(false)

    useEffect(() => {
        fetch('http://localhost:3001/Noticias')
            .then((response) => {
                return response.json()
            })
            .then((news) => {
                setNews(news);
                setRecuperado(true)
            })
    }, []);

    if (recuperado) {
        return (
            <SimpleSlider/>
        );

        // return (<div className={"grid-container"}>
        //     {news.map(_new => {
        //         return (<New key={_new.IdNoticia} image={_new.Imagen} author={_new.Titulo} content={_new.Noticia}/>);
        //     })}
        // </div>);
    } else {
        return (<button className="btn btn-primary" type="button" disabled="">
            <span className="spinner-border spinner-border-sm" aria-hidden="true"></span>
            <span className="visually-hidden" role="status">Loading...</span>
        </button>);
    }
};

export default Body;