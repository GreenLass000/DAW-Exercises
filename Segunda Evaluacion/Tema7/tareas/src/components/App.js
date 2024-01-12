import '../style/App.css';
import Todo from "./Todo";

function App() {
    return (<div className="App">
        <h1>Mi lista de tareas</h1>
        <ul>
            <Todo name={"Gato"}/>
            <Todo name={"Pajaro"}/>
            <Todo name={"Perrete"}/>
        </ul>
    </div>);
}

export default App;
