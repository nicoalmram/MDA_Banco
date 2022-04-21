const mysql = require('mysql');
require("dotenv").config();

Node.use(expres)

var conexion= mysql.createConnection({
    host : process.env.HOST,
    database : process.env.DATABASE,
    user : process.env.USER,
    password : process.env.PASSWORD,
});


conexion.connect(function(err) {
    if (err) {
        console.error('Error de conexion: ' + err.stack);
        return;
    }
    console.log('Conectado con el identificador ' + conexion.threadId);
});




/*
// include mysql module
var mysql = require('mysql');

// create a connection variable with the details required
var con = mysql.createConnection({
  host : "localhost",	// ip address of server running mysql
  database : "banco_mda",
  user : "root",	// user name to your mysql database
  password : "bancomda"	// corresponding password
});

// connect to the database.
con.connect(function(err) {
  if (err) throw err;
  console.log("Connected!");
});
*/