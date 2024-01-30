import "./new.styles.css";

const New = ({key, image, author, content}) => {
    return (<div className={"new"}>
        <div key={key}>
            <img src={image} alt={""} className={"image"}/>
            <span className={"title"}>{author}</span>
            <div>{content}</div>
        </div>
    </div>);
};

export default New;