const  User = require('../models/user.js');
const keys = require('../config/keys.js')

module.exports = {
    login(req, res) {
    const Num_Documento = req.body.Num_Documento;
    const password = req.body.password;

    User.finByNum_Documento(Num_Documento, async(err, user) => {
        if (err) {
            return res.status(501).json ({
                succes: false,
                message: 'Error al consultar el usuario ',
                error: err
            });
        }

        if (!myUser) {
            return res.status(401).json({
                success: false,
                message: 'El email no existe en la base de datos'
            });
        }
        
    })
    }
}

module.exports = {
    register(req, res) {
        const user = req.body;
        User.create(user, (err, data) => {
            if (err) {
                return res.status(500).json({
                    succes: false,
                    message: 'Error al registrar el usuario',
                    error : err
                });
            }


            return res.status(200).json({
                success: true,
                message: 'Creado el usuario correctamente',
                data: data
            });
            });
            },
    }