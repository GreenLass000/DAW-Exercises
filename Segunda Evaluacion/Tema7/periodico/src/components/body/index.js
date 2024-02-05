import {useEffect, useState} from "react";
import "./body.styles.css";
import New from "../new";

const Body = () => {
    const [news, setNews] = useState([]);
    const [dataCatched, setDataCatched] = useState(false)

    useEffect(() => {
        fetch('http://localhost:3001/Noticias')
            .then((response) => {
                return response.json()
            })
            .then((news) => {
                setNews(news);
                setDataCatched(true)
            })
    }, []);

    if (dataCatched) {
        return (<div className={"grid-container"}>
            {news.map(_new => {
                return (<New key={_new.id} image={_new.Imagen} author={_new.Titulo} content={_new.Noticia}/>);
            })}
        </div>);
    } else {
        return (<button className="btn btn-primary" type="button" disabled="">
            <span className="spinner-border spinner-border-sm" aria-hidden="true"></span>
            <span className="visually-hidden" role="status">Loading...</span>
        </button>);
    }
};

export default Body;