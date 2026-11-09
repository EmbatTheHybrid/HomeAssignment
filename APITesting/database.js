import mysql from 'mysql2'

import dotenv from 'dotenv'
dotenv.config()

const pool = mysql.createPool({
    host: process.env.HOST,
    user: process.env.USER,
    password: process.env.PASSWORD,
    database: process.env.DATABASE
}).promise()

export async function getDevelopers() {
    const [rows] = await pool.query("SELECT * FROM developers")
    return rows
}

export async function getDeveloper(id) {
    const [rows] = await pool.query(`
     SELECT *
     FROM developers
     WHERE id = ?
    `, [id])
    return rows[0]
}

export async function getGenres() {
    const [rows] = await pool.query("SELECT * FROM genres")
    return rows
}

export async function updateGenre(id, newValue) {
    console.log(id, newValue)
    const [result] = await pool.query("UPDATE genres SET name = ? WHERE id = ?", [newValue, id])
    // return `Update successful, rows affected: ${result[0].affectedRows}`
    return result
}

export async function createDeveloper(name, is_group) {
    const [result] = await pool.query(`
        INSERT INTO developers (name, is_group)
        VALUES (?,?)
    `, [name, is_group])

    return result
}

export async function deleteDeveloper(id) {
    const [result] = await pool.query(`DELETE FROM developers WHERE id = ?`, [id])
    return result
}

// const devs = await getDevelopers()
// console.log(devs)

// const developer = await getDeveloper(1)

// console.log(developer)

// createDeveloper('test', true)