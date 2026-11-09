import { createRequire } from "module";
const require = createRequire(import.meta.url);

import express from "express";


import { getDevelopers, getDeveloper, createDeveloper, updateGenre, getGenres, deleteDeveloper} from './database.js'
const cors = require('cors')
const app = express()

app.use(express.json()) 

app.use(cors({
    origin: '*'
}));


app.get("/developers", async (req, res) => {
    const developers = await getDevelopers()
    res.send(developers)
})

app.get("/developers/:id", async(req,res) => {
    const id = req.params.id
    const developer = await getDeveloper(id)
    res.send(developer)
})

app.post("/developers", async (req, res) => {
    const {name, is_group} = req.body
    const developer = await createDeveloper(name,is_group)
    res.status(201).send(developer)
})

app.get("/genres", async (req, res) => {
    const genres = await getGenres()
    res.send(genres)
})

app.patch("/genres", async(req,res) => {
    const {id, name} = req.body
    const result = await updateGenre(id, name)
    res.status(201).send(result)
})

app.delete("/developers/:id", async(req,res) => {
    const id = req.params.id
    console.log(id)
    const result = await deleteDeveloper(id)
    res.status(201).send(result)
})

app.use((err,req, res, next ) => {
    console.error(err.stack)
    res.status(500).send("Something broke")
})

app.listen(8080, () => {
    console.log("Server is running")
})