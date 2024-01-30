import {useEffect, useState} from "react";
import "./body.styles.css";
import New from "../new";

const Body = () => {
    const [news, setNews] = useState([]);
    const [recuperado, setRecuperado] = useState(false)

    useEffect(() => {
        fetch('http://localhost:3000/Noticias')
            .then((response) => {
                return response.json()
            })
            .then((news) => {
                setNews(news);
                setRecuperado(true)
            })
    }, []);

    if (recuperado) {
        return (<div id="myCarousel" className="carousel slide mb-6" data-bs-ride="carousel">
            <div className="carousel-indicators">
                {news.map((_new, index) => {
                    return (<button type="button" data-bs-target="#myCarousel" data-bs-slide-to={index} className=""
                                    aria-label="Slide {index + 1}"></button>);
                })}
            </div>
            <div className="carousel-inner">
                {news.map((_new) => {
                    return (<div className="carousel-item">
                        <svg className="bd-placeholder-img" width="100%" height="100%"
                             xmlns="http://www.w3.org/2000/svg"
                             aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false">
                            <rect width="100%" height="100%" fill="var(--bs-secondary-color)"></rect>
                        </svg>
                        <div className="container">
                            <div className="carousel-caption">
                                <New key={_new.IdNoticia} image={_new.Imagen} author={_new.Titulo}
                                     content={_new.Noticia}/>
                            </div>
                        </div>
                    </div>);
                })};
            </div>

            <button className="carousel-control-prev" type="button" data-bs-target="#myCarousel"
                    data-bs-slide="prev">
                <span className="carousel-control-prev-icon" aria-hidden="true"></span>
                <span className="visually-hidden">Previous</span>
            </button>
            <button className="carousel-control-next" type="button" data-bs-target="#myCarousel"
                    data-bs-slide="next">
                <span className="carousel-control-next-icon" aria-hidden="true"></span>
                <span className="visually-hidden">Next</span>
            </button>
        </div>);


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