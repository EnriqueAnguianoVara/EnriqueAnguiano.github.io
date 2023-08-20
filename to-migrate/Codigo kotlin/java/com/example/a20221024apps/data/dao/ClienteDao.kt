package com.example.a20221024apps.data.dao

import android.content.ContentValues
import com.example.a20221024apps.data.database.Database
import com.example.a20221024apps.data.entities.ClienteEntity.Companion.COLUMN_ID
import com.example.a20221024apps.data.entities.ClienteEntity.Companion.COLUMN_NOMBRE
import com.example.a20221024apps.data.entities.ClienteEntity.Companion.NOMBRE_TABLA_CLIENTE
import com.example.a20221024apps.data.model.ClienteModel
import javax.inject.Inject
import javax.inject.Singleton


class ClienteDao @Inject constructor(
     @Singleton
    private val db: Database
){
     fun getClientesPorNombre(nombre: String): ClienteModel = ClienteModel.cursorParseCliente(db.readableDatabase.rawQuery("SELECT * FROM $NOMBRE_TABLA_CLIENTE WHERE $COLUMN_NOMBRE = '$nombre'", null))

     fun getClientesPorId(id: Int): ClienteModel = ClienteModel.cursorParseCliente(db.readableDatabase.rawQuery("SELECT * FROM $NOMBRE_TABLA_CLIENTE WHERE $COLUMN_ID = $id", null))

     fun insert(values: ContentValues) = db.writableDatabase.insert(NOMBRE_TABLA_CLIENTE,null,values)

     fun delete(id: Int):Boolean {
          return when(db.writableDatabase.delete(NOMBRE_TABLA_CLIENTE, "$COLUMN_ID = :id", arrayOf(id.toString()))){
               0-> false
               else->true
          }
     }

     fun update(values: ContentValues) = db.writableDatabase.update(NOMBRE_TABLA_CLIENTE,values, "$COLUMN_ID = :id", arrayOf(values.getAsString(COLUMN_ID)))

}