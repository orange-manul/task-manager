<h1>About the project</h1>
<ul>
<li>Used resource routes</li>
<li>The project is based on CRUD operations.</li>
<li> There is a Service class for separating the controller from working with the database.</li>
<li>Filtering is implemented in two cases: "pending" and "completed", more statuses can be added if needed.</li>
<li>For deploying the project, Docker without Sail was used.</li>
<li> Also used seed/factory for testing the project's functionality.</li>
</ul>

<h1>Main features:</h1>
<ul>
<li>Creation, editing, and deletion of tasks.</li>
<li>Setting task statuses.</li>
<li>Searching and filtering tasks for quick access.</li>
</ul>

<h1>Technology stack in the project:</h1>
<ul>
<li>PHP: 8.1.2</li>
<li>Laravel: 9.19</li>
<li>MySQL: 5.7</li>
<li>Docker</li>
</ul>


<h1>Project setup:</h1>

<li>docker-compose build</li>
<li>docker-compose up -d</li>
<li>composer install</li>
<li>php artisan migrate (for correct migration, it's better to run it inside the app container, docker exec -it app bash, and then use migration)</li>
</li>php artisan db:seed</li>
<br>

<h1>Routes</h1>

<table>
  <thead>
    <tr>
      <th>Method</th>
      <th>URI</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>GET</td>
      <td>/tasks</td>
    </tr>
    <tr>
      <td>POST</td>
      <td>/tasks</td>
    </tr>
    <tr>
      <td>GET</td>
      <td>/tasks/{id}</td>
    </tr>
    <tr>
      <td>PUT</td>
      <td>/tasks/{id}</td>
    </tr>
    <tr>
      <td>DELETE</td>
      <td>/tasks/{id}</td>
    </tr>
  </tbody>
</table>

