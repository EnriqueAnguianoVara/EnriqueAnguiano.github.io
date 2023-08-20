package com.example.a20221024apps.data.entities

import javax.inject.Inject


class ClienteEntity @Inject constructor(){
    companion object{
        const val NOMBRE_TABLA_CLIENTE = "cliente_table"
        const val COLUMN_ID = "id"
        const val COLUMN_NOMBRE = "nombre"
        const val COLUMN_DIRECCION = "direccion"
        const val COLUMN_POBLACION = "poblacion"
        const val COLUMN_TELEFONO = "telefono"
    }

    operator fun invoke():String = "CREATE TABLE $NOMBRE_TABLA_CLIENTE (" +
            "$COLUMN_ID INTEGER PRIMARY KEY," +
            "$COLUMN_NOMBRE TEXT," +
            "$COLUMN_DIRECCION TEXT," +
            "$COLUMN_POBLACION TEXT," +
            "$COLUMN_TELEFONO INTEGER)"
}