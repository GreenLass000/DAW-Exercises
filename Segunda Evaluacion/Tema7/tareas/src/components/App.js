import '../style/App.css';
import Todo from "./Todo";
import NumberList from "./NumberList";
import NameForm from "./NameForm";
import Reservation from "./Reservation";

function App() {

    const numbers = [1, 2, 3, 4, 5];

    return (<div className="App">
        <h1>Mi lista de tareas</h1>
        <ul>
            <Todo name={"Gato"} showName/>
            <Todo name={"Pajaro"}/>
            <Todo name={"Perrete"} showName/>
        </ul>
        <NumberList numbers={numbers}/>
        <NameForm/>
        <Reservation/>
    </div>);
}

export default App;
