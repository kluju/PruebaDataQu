import './App.css';
import { useCallback, useEffect, useState } from 'react';
import { JsonToTable } from "react-json-to-table";

const url = `${process.env.REACT_APP_ENDPOINT}/amiibo/?name=mario`;

const App = () => {
  const [data, setData] = useState([]);

  const fetchMyAPI = useCallback(async () => {
    let response = await fetch(url);
    response = await response.json();
    response.amiibo.map((res, key) => res.id = key + 1)
    setData(response.amiibo);
  }, [])

  useEffect(() => {
    fetchMyAPI();
  }, [fetchMyAPI])

  return (
    <div className="App">
      Acá va el CRUD o tabla que haya que mostrar.

      {data && <JsonToTable json={data} />}
    </div>
  );
}

export default App;
