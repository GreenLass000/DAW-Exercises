import './App.css';
import Header from "./components/header";
import Footer from "./components/footer";
import Body from "./components/body";

function App() {
    return (<div>
        <Header
            logo_src={"https://picsum.photos/50"}
            logo_alt={"Imagen"}
            header_text={"Periodico"}/>

        <Body/>

        <Footer src={"https://picsum.photos/50"} alt={""}/>
    </div>);
}

export default App;
