import './App.css';
import { useState } from 'react';
import { JsonToTable } from "react-json-to-table";
import { getExample, getClientIds } from './api';

const App = () => {
  const [data, setData] = useState([]);
  const [clientIds, setClientIds] = useState([]);

  const handleGetExample = async () => setData(await getExample())

  const handleGetClientIds = async () => setClientIds(await getClientIds())

  return (
    <div className="App">
      <button onClick={handleGetExample} >getExample</button>
      <p>Su tabla</p>
      {data.length > 0 && <JsonToTable json={data} />}
      <hr />
      Ahora comienzas las tuyas
      <hr />
      <button onClick={handleGetClientIds} >getClientIds</button>
      <p>Su tabla</p>
      {clientIds.length > 0 && <JsonToTable json={clientIds} />}
      <hr />
    </div>
  );
}

export default App;
