const JwStrategy = require("passport-jwt").Strategy;
const ExtrasctJwt = require("passport-jwt").ExtrasctJwt;
const Keys = require('./keys');
const User = require('../models/user');

module.exports = (passport) => {
    const opts ={};
    opts.jwtFromRequest = ExtrasctJwt.fromAuthHeaderAsBearerToken('jwt');
    opts.secretOrKey = Keys.secretOrKey;

    passport.use(new JwStrategy(opts, (jwt_payLoad, done) => {
        User.findByNum_Documento(jwt_payLoad.Num_Documento, (err, user) => {
            if (err) {
                return done(err, false);
            }
        })
    })
    )
}