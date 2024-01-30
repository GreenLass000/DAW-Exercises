import "./logo.styles.css";

const Logo = ({src, alt}) => {
    return (<div>
        <img src={src} alt={alt} className={"bi me-2"}/>
    </div>);
};

export default Logo;