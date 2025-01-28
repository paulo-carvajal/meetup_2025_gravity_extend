Ejecutar el servidor:

node server.js

Para probar el servidor:

Puedes usar una herramienta como Postman o cURL para enviar una solicitud POST al endpoint /form.
Aquí tienes un ejemplo usando cURL:

curl -X POST http://localhost:3000/form -H "Content-Type: application/json" -d '{"nombre": "Juan", "email": "juan@example.com", "mensaje": "Hola, mundo!"}'

O si prefieres enviar los datos como application/x-www-form-urlencoded:

curl -X POST http://localhost:3000/form -d "nombre=Juan&email=juan@example.com&mensaje=Hola, mundo!"

Este servidor básico acepta campos de un formulario a través de una API REST y los imprime en la consola.
También responde al cliente con un mensaje de confirmación y los datos recibidos.
