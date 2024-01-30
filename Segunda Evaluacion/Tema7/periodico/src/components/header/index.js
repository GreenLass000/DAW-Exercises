import "./header.styles.css";
import Logo from "../logo";

const Header = ({logo_src, logo_alt, header_text}) => {
    return (<header className={"d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom"}>
        <Logo src={logo_src} alt={logo_alt}/>
        <span className={"fs-4"}>{header_text}</span>
    </header>);
};

export default Header;