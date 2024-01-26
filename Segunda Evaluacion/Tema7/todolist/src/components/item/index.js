import "./item-style.css";

const Item = ({name}) => {

    const datenow = new Date(Date.now());
    const options = {
        hour: "2-digit", minute: "2-digit"
    };
    const time = datenow.toLocaleDateString(undefined, options);

    return (<li>{name}</li>);
};

export default Item;