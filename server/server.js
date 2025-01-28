const express = require('express');
const bodyParser = require('body-parser');

const app = express();
const port = 3000;

// Middleware para parsear el cuerpo de las solicitudes como JSON
app.use(bodyParser.json());
app.use(bodyParser.urlencoded({ extended: true }));

// Ruta para manejar las solicitudes POST al endpoint /form
app.post('/form', (req, res) => {
    const { nombre, email, mensaje } = req.body;

    // Aquí puedes procesar los datos recibidos
    console.log('Nombre:', nombre);
    console.log('Email:', email);
    console.log('Mensaje:', mensaje);

    // Responder al cliente
    res.json({
        message: 'Formulario recibido correctamente',
        data: {
            nombre,
            email,
            mensaje
        }
    });
});

// Iniciar el servidor
app.listen(port, () => {
    console.log(`Servidor escuchando en http://localhost:${port}`);
});
