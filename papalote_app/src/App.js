import './App.css';
import PetDisplay from './Components/PetDisplay';
import 'bootstrap/dist/css/bootstrap.min.css';
import InitialInstructions from './Components/InitialInstructions';

import { Container, Row} from 'reactstrap';

function App() {
  return (
    
    <Container className="App">
      <Row>
        <PetDisplay/>
      </Row>
      <br/>
      <Row>
        <InitialInstructions/>
      </Row>
      <br/>


    </Container>
  );
}

export default App;


/**

      <header className="App-header">
        <img src={logo} className="App-logo" alt="logo" />
        <p>
          Edit <code>src/App.js</code> and save to reload
        </p>

<a
          className="App-link"
          href="https://reactjs.org"
          target="_blank"
          rel="noopener noreferrer"
        >
          Learn React
        </a>
      </header>

*/