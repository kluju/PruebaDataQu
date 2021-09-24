import * as React from "react";
import { Admin, Resource } from 'react-admin';
import restProvider from 'ra-data-simple-rest';
import { data } from './api';

import { PostList, PostEdit, PostCreate, PostIcon } from './posts';

function App() {
  const apiUrl = data; // 'http://localhost:3000'
  return (
    <Admin dataProvider={restProvider(apiUrl)}>
      <Resource name="posts" list={PostList} edit={PostEdit} create={PostCreate} icon={PostIcon}/>
    </Admin>
  );
}

export default App;
