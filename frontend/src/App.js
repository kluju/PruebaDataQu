import './App.css';
import { useState,useEffect,Fragment } from 'react';
import { JsonToTable } from "react-json-to-table";
import 'bootstrap/dist/css/bootstrap.css';
import {  getClientIds, getClients,getBusiness,getLeases } from './api';
import React from "react";
import { Button, Alert, Table, Card, CardHeader, Modal, ModalHeader, ModalBody, ModalFooter,  CardBody, Container, Row, Col,Spinner ,} from 'reactstrap';
import {
  BrowserRouter as Router,
  Switch,
  Route,
  Link
} from "react-router-dom";
import {Clientes,ClientesADD, ClientesUPDATE}from './Views/Clientes';
import Empresas from './Views/Empresas';
import Arriendos from './Views/Arriendos';

const App = () => {
  
  const [clientIds, setClientIds] = useState([]);
  const [clients, setClients] = useState([]);
  const handleGetClientIds = async () => setClientIds(await getClientIds())
  const handleGetClient = async () => setClients(await getClients())
  return (<div className="App">
      <main role="main">
            <div className="container">
            <Router>
            <div className="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow">
              <h5 className="my-0 mr-md-auto font-weight-normal">Prueba DataQu</h5>
              <nav className="my-2 my-md-0 mr-md-3">
                <Link className="p-2 text-dark" to="/">Clientes</Link>
                <Link className="p-2 text-dark" to="/empresas">Empresas</Link>
                <Link className="p-2 text-dark" to="/arriendos">Arriendos</Link>
              </nav>
            </div>
            <Switch>
            <Route exact path="/">
              <Clientes />
            </Route>
            <Route exact path="/clientes/create">
              <ClientesADD />
            </Route>
            <Route exact path="/clientes/update/:id" component={ClientesUPDATE}/>
            <Route path="/empresas">
              <Empresas />
            </Route>
            <Route path="/arriendos">
              <Arriendos />
            </Route>
          </Switch>
          </Router>
            </div> 
      </main>

  </div>)
  
}




export default App;
