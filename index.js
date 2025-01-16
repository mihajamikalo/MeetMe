


import fs from 'fs';
import express from 'express';

const port = process.env.PORT || 1010

const app = express();

app.get('/',welcome);

app.listen(port, ()=> console.log("server runing on http://localhost:1010"))

function welcome(req,res){
    res.end("<h1>Hello </h1>")
    res.end(req.query)
    
}

document.getElementsByClassName