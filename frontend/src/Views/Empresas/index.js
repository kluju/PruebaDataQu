import { useState,useEffect,Fragment } from 'react';
import { Button,  Table,Card,CardHeader} from 'reactstrap';
import {  getBusiness } from './../../api';
import { Link } from 'react-router-dom';
const Empresas = () => {
  const [business, setBusiness] = useState([]);
  const [clientDelete, setClientDelete] = useState(null);
  const handleGetbBusiness = async () => setBusiness(await getBusiness());
  const handlerDelete = () => {
    //const id = userDelete.id;
    //setUserDelete(null)
    //dispatch(deleteActionsAsyncCreator(id));
  }
  useEffect(() => {
    
    handleGetbBusiness();
  },[]);
  return (
    <Fragment>
      <Card>
            <CardHeader>
                <h4 style={{float:"left"}}>Listado</h4>
                <Link to="/clientes/create" className="btn btn-info " style={{float:"right"}}>+ Agregar</Link>
            </CardHeader>
        <Table>
              <thead>
                  <tr>
                      <th>Id</th>
                      <th>Nombre</th>
                      
                      <th clospan="2"/>
                  </tr>
              </thead>
              <tbody>
                  {business.map((e, i) => (
                      <tr key={e.id}>
                          <td>{e.id}</td>
                          <td>{e.name}</td>
                          
                          <td>
                              
                              <Button className="btn btn-danger " onClick={() => setClientDelete(e)}></Button>
                          </td>
                      </tr>
                  ))}
              </tbody>
          </Table>
      </Card>
    </Fragment>
  );
}


  export default Empresas;