package com.example.a20221024apps.data.database

import android.content.Context
import android.database.sqlite.SQLiteDatabase
import android.database.sqlite.SQLiteOpenHelper
import com.example.a20221024apps.data.entities.ClienteEntity
import com.example.a20221024apps.data.entities.ClienteEntity.Companion.NOMBRE_TABLA_CLIENTE
import dagger.hilt.android.qualifiers.ApplicationContext
import javax.inject.Inject
import javax.inject.Singleton


/**
 * Los requerimientos de este programa era hacer la bbdd con SQLite
 * Preferiblemente si no existiera este requerimiento lo haría con ROOM
 */

@Singleton
class Database @Inject constructor(
    @ApplicationContext context: Context,
    val clienteEntity: ClienteEntity
): SQLiteOpenHelper(context, NOMBRE_BBDD, null,1){

    companion object{
        const val NOMBRE_BBDD = "clientesBBDD.db"
    }

    override fun onCreate(db: SQLiteDatabase?) = db!!.execSQL(clienteEntity())

    override fun onUpgrade(db: SQLiteDatabase?, oldVersion: Int, newVersion: Int) {
        db!!.execSQL("DROP TABLE IF EXISTS $NOMBRE_TABLA_CLIENTE")
        onCreate(db)
    }

}