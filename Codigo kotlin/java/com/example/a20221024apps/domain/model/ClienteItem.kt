package com.example.a20221024apps.domain.model

import android.content.ContentValues
import com.example.a20221024apps.data.entities.ClienteEntity.Companion.COLUMN_DIRECCION
import com.example.a20221024apps.data.entities.ClienteEntity.Companion.COLUMN_ID
import com.example.a20221024apps.data.entities.ClienteEntity.Companion.COLUMN_NOMBRE
import com.example.a20221024apps.data.entities.ClienteEntity.Companion.COLUMN_POBLACION
import com.example.a20221024apps.data.entities.ClienteEntity.Companion.COLUMN_TELEFONO
import java.io.Serializable

data class ClienteItem (
    val id:String?,
    val nombre:String,
    val direccion:String?,
    val poblacion:String?,
    val telefono: String?
        ): Serializable{

    fun toContentValues(): ContentValues = ContentValues().apply {
            put(COLUMN_ID, id)
            put(COLUMN_NOMBRE, nombre)
            put(COLUMN_DIRECCION, direccion)
            put(COLUMN_POBLACION, poblacion)
            put(COLUMN_TELEFONO, telefono)
        }

    fun toAutoIncrementContentValues(): ContentValues = ContentValues().apply {
            put(COLUMN_NOMBRE, nombre)
            put(COLUMN_DIRECCION, direccion)
            put(COLUMN_POBLACION, poblacion)
            put(COLUMN_TELEFONO, telefono)
        }

}