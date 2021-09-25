import { useState,useEffect,Fragment } from 'react';
import { Button,  Table} from 'reactstrap';
import {  getLeases } from './../../api';
const Arriendos = () => {
    const [leases, setLeases] = useState([]);
    const [clientDelete, setClientDelete] = useState(null);
    const handleGetbLeases = async () => setLeases(await getLeases());
    const handlerDelete = () => {
      //const id = userDelete.id;
      //setUserDelete(null)
      //dispatch(deleteActionsAsyncCreator(id));
    }
    useEffect(() => {
      handleGetbLeases();
    },[]);
    return (
      <Fragment>
        <Table>
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Empresa</th>
                        <th>Cli. Nombre</th>
                        <th>Cli. Apellido</th>
                        <th>Costo Diario</th>
                        <th>Dias</th>
                        <th clospan="2"/>
                    </tr>
                </thead>
                <tbody>
                    {leases.map((e, i) => (
                        <tr key={e.id}>
                            <td>{e.id}</td>
                            <td>{e.empresa}</td>
                            <td>{e.nombre}</td>
                            <td>{e.paterno}</td>
                            <td>{e.costo_diario}</td>
                            <td>{e.dias}</td>
                            <td>
                                
                                <Button className="btn btn-danger " onClick={() => setClientDelete(e)}></Button>
                            </td>
                        </tr>
                    ))}
                </tbody>
            </Table>
      </Fragment>
    );
  }

  export default Arriendos;