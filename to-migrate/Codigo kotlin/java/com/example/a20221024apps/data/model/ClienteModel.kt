package com.example.a20221024apps.data.model

import android.database.Cursor
import android.util.Log
import com.example.a20221024apps.data.entities.ClienteEntity.Companion.COLUMN_DIRECCION
import com.example.a20221024apps.data.entities.ClienteEntity.Companion.COLUMN_ID
import com.example.a20221024apps.data.entities.ClienteEntity.Companion.COLUMN_NOMBRE
import com.example.a20221024apps.data.entities.ClienteEntity.Companion.COLUMN_POBLACION
import com.example.a20221024apps.data.entities.ClienteEntity.Companion.COLUMN_TELEFONO
import com.example.a20221024apps.domain.model.ClienteItem
import kotlinx.coroutines.selects.whileSelect
import java.util.stream.IntStream

data class ClienteModel (
        val id: Int?,
        val nombre: String,
        val direccion: String?,
        val poblacion: String?,
        val telefono: String?
    ) {

    fun toItem() = ClienteItem(id.toString(), nombre, direccion, poblacion, telefono)

    companion object {
        fun cursorParseCliente(cursor: Cursor): ClienteModel {
            with(cursor) {
                return if (moveToFirst() && count==1) {
                     ClienteModel(
                        getInt(getColumnIndexOrThrow(COLUMN_ID)),
                        getString(getColumnIndexOrThrow(COLUMN_NOMBRE)),
                        getString(getColumnIndexOrThrow(COLUMN_DIRECCION)),
                        getString(getColumnIndexOrThrow(COLUMN_POBLACION)),
                        getString(getColumnIndexOrThrow(COLUMN_TELEFONO))
                    )
                } else ClienteModel(count,"","","","")
            }
        }
    }
}
