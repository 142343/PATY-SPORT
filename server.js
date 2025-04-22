const express = require('express');
const passport = require('passport');
const app = express();
const http = require('http');
const server = http.createServer(app);
const lagger = require('morgan');
const cors = require('cors');
const db = require('./config/config');

// Rutas externas
const UserRoutes = require('./routes/UserRoutes');

const port = process.env.PORT || 3000;

app.use(lagger('dev'));
app.use(express.json());
app.use(express.urlencoded({ extended: true }));
app.use(cors());
app.use(passport.initialize());
app.use(passport.session());

require('./config/passport')(passport);
app.disable('x-powered-by');

app.set('port', port);

// Rutas externas
UserRoutes(app);

// Iniciar servidor
server.listen(3000, '192.168.10.13', function () {
    console.log('Aplicación de NodeJs ejecutando en ' + server.address().address + ':' + server.address().port);
});

// Ruta raíz
app.get('/', (req, res) => {
    res.send('Ruta raíz del Backend');
});

app.get('/test', (req, res) => {
    res.send('Estás en la ruta test');
});

// Obtener todos los productos
app.get('/producto', (req, res) => {
    const query = `
        SELECT 
            p.CodigoProducto,
            p.Nombre,
            p.Precio,
            p.IVA,
            p.Imagen,
            c.Nombre AS Categoria,
            e.tipoEstado AS Estado,
            m.Nombre AS Marca,
            t.Tallas AS Talla
        FROM producto p
        JOIN categoria c ON p.CategoriaCodigoCategoría = c.CodigoCategoría
        JOIN estado e ON p.EstadoCodigoEstado = e.CodigoEstado
        JOIN marcas m ON p.MarcasCodigoMarca = m.CodigoMarca
        JOIN tallas t ON p.TallasCodigoTallas = t.CodigoTallas
    `;

    db.query(query, (err, results) => {
        if (err) throw err;
        res.json(results);
    });
});

// Obtener un producto por Código
app.get('/producto/:CodigoProducto', (req, res) => {
    const { CodigoProducto } = req.params;
    const query = `
        SELECT 
            p.CodigoProducto,
            p.Nombre,
            p.Precio,
            p.IVA,
            p.Imagen,
            c.Nombre AS Categoria,
            e.tipoEstado AS Estado,
            m.Nombre AS Marca,
            t.Tallas AS Talla
        FROM producto p
        JOIN categoria c ON p.CategoriaCodigoCategoría = c.CodigoCategoría
        JOIN estado e ON p.EstadoCodigoEstado = e.CodigoEstado
        JOIN marcas m ON p.MarcasCodigoMarca = m.CodigoMarca
        JOIN tallas t ON p.TallasCodigoTallas = t.CodigoTallas
        WHERE p.CodigoProducto = ?
    `;

    db.query(query, [CodigoProducto], (err, results) => {
        if (err) throw err;
        res.json(results[0]);
    });
});

// Crear producto
app.post('/producto', (req, res) => {
    const {
        Nombre,
        Precio,
        IVA,
        Imagen,
        CategoriaCodigoCategoría,
        EstadoCodigoEstado,
        MarcasCodigoMarca,
        TallasCodigoTallas
    } = req.body;

    const insertQuery = `
        INSERT INTO producto 
        (Nombre, Precio, IVA, Imagen, CategoriaCodigoCategoría, EstadoCodigoEstado, MarcasCodigoMarca, TallasCodigoTallas) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)
    `;

    const values = [Nombre, Precio, IVA, Imagen, CategoriaCodigoCategoría, EstadoCodigoEstado, MarcasCodigoMarca, TallasCodigoTallas];

    db.query(insertQuery, values, (err, results) => {
        if (err) throw err;

        const newCodigoProducto = results.insertId;

        const selectQuery = `
            SELECT 
                p.CodigoProducto,
                p.Nombre,
                p.Precio,
                p.IVA,
                p.Imagen,
                c.Nombre AS Categoria,
                e.tipoEstado AS Estado,
                m.Nombre AS Marca,
                t.Tallas AS Talla
            FROM producto p
            JOIN categoria c ON p.CategoriaCodigoCategoría = c.CodigoCategoría
            JOIN estado e ON p.EstadoCodigoEstado = e.CodigoEstado
            JOIN marcas m ON p.MarcasCodigoMarca = m.CodigoMarca
            JOIN tallas t ON p.TallasCodigoTallas = t.CodigoTallas
            WHERE p.CodigoProducto = ?
        `;

        db.query(selectQuery, [newCodigoProducto], (err, finalResult) => {
            if (err) throw err;
            res.json(finalResult[0]);
        });
    });
});

// Actualizar producto
app.put('/producto/:CodigoProducto', (req, res) => {
    const { CodigoProducto } = req.params;
    const {
        Nombre,
        Precio,
        IVA,
        Imagen,
        CategoriaCodigoCategoría,
        EstadoCodigoEstado,
        MarcasCodigoMarca,
        TallasCodigoTallas
    } = req.body;

    const updateQuery = `
        UPDATE producto 
        SET Nombre = ?, Precio = ?, IVA = ?, Imagen = ?, CategoriaCodigoCategoría = ?, EstadoCodigoEstado = ?, MarcasCodigoMarca = ?, TallasCodigoTallas = ?
        WHERE CodigoProducto = ?
    `;

    const values = [Nombre, Precio, IVA, Imagen, CategoriaCodigoCategoría, EstadoCodigoEstado, MarcasCodigoMarca, TallasCodigoTallas, CodigoProducto];

    db.query(updateQuery, values, (err) => {
        if (err) throw err;

        const selectQuery = `
            SELECT 
                p.CodigoProducto,
                p.Nombre,
                p.Precio,
                p.IVA,
                p.Imagen,
                c.Nombre AS Categoria,
                e.tipoEstado AS Estado,
                m.Nombre AS Marca,
                t.Tallas AS Talla
            FROM producto p
            JOIN categoria c ON p.CategoriaCodigoCategoría = c.CodigoCategoría
            JOIN estado e ON p.EstadoCodigoEstado = e.CodigoEstado
            JOIN marcas m ON p.MarcasCodigoMarca = m.CodigoMarca
            JOIN tallas t ON p.TallasCodigoTallas = t.CodigoTallas
            WHERE p.CodigoProducto = ?
        `;

        db.query(selectQuery, [CodigoProducto], (err, finalResult) => {
            if (err) throw err;
            res.json(finalResult[0]);
        });
    });
});

// Eliminar producto
app.delete('/producto/:CodigoProducto', (req, res) => {
    const { CodigoProducto } = req.params;
    db.query('DELETE FROM producto WHERE CodigoProducto = ?', [CodigoProducto], (err) => {
        if (err) throw err;
        res.json({ CodigoProducto });
    });
});

// Categorías
app.get('/categoria', (req, res) => {
    db.query('SELECT CodigoCategoría, Nombre FROM categoria', (err, results) => {
        if (err) throw err;
        res.json(results);
    });
});

// Estados
app.get('/estado', (req, res) => {
    db.query('SELECT CodigoEstado, tipoEstado FROM estado', (err, results) => {
        if (err) throw err;
        res.json(results);
    });
});

// Marcas
app.get('/marca', (req, res) => {
    db.query('SELECT CodigoMarca, Nombre FROM marcas', (err, results) => {
        if (err) throw err;
        res.json(results);
    });
});

// Tallas
app.get('/talla', (req, res) => {
    db.query('SELECT CodigoTallas, Tallas FROM tallas', (err, results) => {
        if (err) throw err;
        res.json(results);
    });
});





//usuario
app.get('/usuario', (req, res) => {
    const query = `
        SELECT 
            u.Tipo_Documento, 
            u.Num_Documento, 
            u.Nombres, 
            u.Apellidos, 
            u.Teléfono,
            u.Correo, 
            r.tipoRol AS Rol, 
            e.tipoEstado AS Estado, 
            g.Nombre AS Genero
        FROM usuario u
        JOIN rol r ON u.RolidRol = r.idRol
        JOIN estado e ON u.EstadoCodigoEstado = e.CodigoEstado
        JOIN genero g ON u.GeneroidGenero = g.idGenero
    `;

    db.query(query, (err, results) => {
        if (err) throw err;
        res.json(results);
    });
});




// Actualizar usuario
app.put('/usuario/:Num_Documento', (req, res) => {
    const { Num_Documento } = req.params;
    const {
        Tipo_Documento,
        Nombres,
        Apellidos,
        Teléfono,
        Correo,
        RolidRol,
        EstadoCodigoEstado,
        GeneroidGenero
    } = req.body;

    const updateQuery = `
        UPDATE usuario 
        SET Tipo_Documento = ?, Nombres = ?, Apellidos = ?, Teléfono = ?, 
            Correo = ?, RolidRol = ?, EstadoCodigoEstado = ?, GeneroidGenero = ?
        WHERE Num_Documento = ?
    `;

    const values = [Tipo_Documento, Nombres, Apellidos, Teléfono, Correo, RolidRol, EstadoCodigoEstado, GeneroidGenero, Num_Documento];

    db.query(updateQuery, values, (err) => {
        if (err) throw err;

        const selectQuery = `
            SELECT u.Tipo_Documento, u.Num_Documento, u.Nombres, u.Apellidos, u.Teléfono,
                   u.Correo, r.tipoRol AS Rol, e.tipoEstado AS Estado, g.Nombre AS Genero
            FROM usuario u
            JOIN rol r ON u.RolidRol = r.idRol
            JOIN estado e ON u.EstadoCodigoEstado = e.CodigoEstado
            JOIN genero g ON u.GeneroidGenero = g.idGenero
            WHERE u.Num_Documento = ?
        `;

        db.query(selectQuery, [Num_Documento], (err, finalResult) => {
            if (err) throw err;
            res.json(finalResult[0]);
        });
    });
});


