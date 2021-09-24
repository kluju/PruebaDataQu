import './App.css';
import { useState } from 'react';
import { JsonToTable } from "react-json-to-table";
import { getExample } from './api';

const App = () => {
  const [data, setData] = useState([]);

  const handleGetExample = async () => setData(await getExample())

  return (
    <div className="App">
      <button onClick={handleGetExample} >get Example</button>
      <p>Su tabla</p>
      {data.length > 0 && <JsonToTable json={data} />}
      <hr />
    </div>
  );
}

export default App;
