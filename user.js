const db = require('../config/config');
const bcrypt = require('bcryptjs');

const User = {
    create: async (User, result) => {
        try {
            const hash = await bcrypt.hash(User.Password, 10);

            db.beginTransaction((err) => {
                if (err) {
                    console.log("Error al iniciar transacción: ", err);
                    return result(err, null);
                }

                const sqlUsuario = `
                INSERT INTO usuario (
                    Tipo_Documento,
                    Num_Documento,
                    Nombres,
                    Apellidos,
                    Teléfono,
                    Correo
                ) VALUES (?, ?, ?, ?, ?, ?)`;

                db.query(sqlUsuario, [
                    User.Tipo_Documento,
                    User.Num_Documento,
                    User.Nombres,
                    User.Apellidos,
                    User.Teléfono,
                    User.Correo
                ], (err, res) => {
                    if (err) {
                        console.log("Error al crear el usuario: ", err);
                        return db.rollback(() => result(err, null));
                    }

                    console.log("Usuario Creado: ", { id: res.insertId, ...User });

                    const sqlLogin = `INSERT INTO login (Num_Documento, Password) VALUES (?, ?)`;

                    db.query(sqlLogin, [
                        User.Num_Documento,
                        hash
                    ], (err, res) => {
                        if (err) {
                            console.log("Error al guardar contraseña: ", err);
                            return db.rollback(() => result(err, null));
                        }

                        db.commit((err) => {
                            if (err) {
                                console.log("Error al confirmar transacción: ", err);
                                return db.rollback(() => result(err, null));
                            }

                            console.log("Contraseña guardada correctamente.");
                            result(null, { id: User.Num_Documento, ...User });
                        });
                    });
                });
            });

        } catch (error) {
            console.log("Error en el proceso: ", error);
            result(error, null);
        }
    }
};

module.exports = User;
