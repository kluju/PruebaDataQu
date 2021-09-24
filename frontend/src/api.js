const url = `${process.env.REACT_APP_ENDPOINT}/amiibo/?name=mario`;
const urlGetClientIds = `${process.env.REACT_APP_ENDPOINT_LARAVEL_CLIENTES}/getClientIds`;

export const getExample = async () => {
  let response = await fetch(url);
  response = await response.json();
  return response.amiibo;
}

export const getClientIds = async () => {
  let response = await fetch(urlGetClientIds);
  response = await response.json();
  return response;
}

export const clients = [
  { 'id': 1, 'rut': '18620855-1', 'name': 'Angel Serrano' },
  { 'id': 2, 'rut': '11345435-2', 'name': 'Roser Abreu' },
  { 'id': 3, 'rut': '14256777-k', 'name': 'Rosa Campos' },
  { 'id': 4, 'rut': '12675688-0', 'name': 'Celestino Fuentes' },
  { 'id': 5, 'rut': '14234334-4', 'name': 'Rebeca Rojas' },
  { 'id': 6, 'rut': '10152323-8', 'name': 'Andrea Palomo' },
  { 'id': 7, 'rut': '15587715-4', 'name': 'Maria Inmaculada Jiménez' },
  { 'id': 8, 'rut': '15034590-7', 'name': 'Marcela Navarro' },
  { 'id': 9, 'rut': '11804345-3', 'name': 'Francisco Manuel Gago' },
  { 'id': 10, 'rut': '13804238-0', 'name': 'Patricio Duran' },
]

export const empresas = [
  { 'id': 1, 'name': 'CHILE ARRIENDA AUTOS S.A' },
  { 'id': 2, 'name': 'AUTOK S.A' },
  { 'id': 3, 'name': 'RENT A CAR S.A' },
]

export const arriendos = [
  { 'id_cliente': 6, 'id_empresa': 1, 'costo_diario': 15000, 'dias': 3},
  { 'id_cliente': 1, 'id_empresa': 3, 'costo_diario': 18000, 'dias': 2},
  { 'id_cliente': 5, 'id_empresa': 3, 'costo_diario': 135000, 'dias': 1},
  { 'id_cliente': 2, 'id_empresa': 2, 'costo_diario': 5600, 'dias': 4},
  { 'id_cliente': 3, 'id_empresa': 1, 'costo_diario': 23000, 'dias': 3},
  { 'id_cliente': 7, 'id_empresa': 2, 'costo_diario': 15000, 'dias': 3},
  { 'id_cliente': 8, 'id_empresa': 3, 'costo_diario': 45900, 'dias': 2},
  { 'id_cliente': 10, 'id_empresa': 3, 'costo_diario': 19000, 'dias': 5},
  { 'id_cliente': 9, 'id_empresa': 3, 'costo_diario': 51000, 'dias': 7},
  { 'id_cliente': 5, 'id_empresa': 1, 'costo_diario': 89000, 'dias': 7},
  { 'id_cliente': 1, 'id_empresa': 2, 'costo_diario': 16000, 'dias': 1},
  { 'id_cliente': 3, 'id_empresa': 3, 'costo_diario': 37500, 'dias': 1},
  { 'id_cliente': 6, 'id_empresa': 1, 'costo_diario': 19200, 'dias': 2},
  { 'id_cliente': 6, 'id_empresa': 3, 'costo_diario': 10000, 'dias': 3},
  { 'id_cliente': 6, 'id_empresa': 2, 'costo_diario': 5900, 'dias': 2},
  { 'id_cliente': 10, 'id_empresa': 1, 'costo_diario': 9000, 'dias': 5},
  { 'id_cliente': 10, 'id_empresa': 3, 'costo_diario': 13500, 'dias': 5},
  { 'id_cliente': 9, 'id_empresa': 1, 'costo_diario': 38200, 'dias': 4},
  { 'id_cliente': 7, 'id_empresa': 2, 'costo_diario': 17000, 'dias': 1},
  { 'id_cliente': 5, 'id_empresa': 3, 'costo_diario': 1000, 'dias': 10},
  { 'id_cliente': 1, 'id_empresa': 2, 'costo_diario': 6000, 'dias': 20},
  { 'id_cliente': 3, 'id_empresa': 1, 'costo_diario': 16200, 'dias': 7},
  { 'id_cliente': 2, 'id_empresa': 2, 'costo_diario': 10000, 'dias': 5}
]

