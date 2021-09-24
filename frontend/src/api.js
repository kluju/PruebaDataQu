const url = `${process.env.REACT_APP_ENDPOINT}/amiibo/?name=mario`;

export const getExample = async () => {
  let response = await fetch(url);
  response = await response.json();
  return response.amiibo;
}
