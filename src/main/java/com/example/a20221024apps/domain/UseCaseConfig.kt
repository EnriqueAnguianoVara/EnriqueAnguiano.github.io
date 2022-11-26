package com.example.a20221024apps.domain

import android.content.Context
import androidx.datastore.preferences.core.edit
import androidx.datastore.preferences.core.intPreferencesKey
import androidx.datastore.preferences.preferencesDataStore
import com.example.a20221024apps.R
import dagger.hilt.android.qualifiers.ApplicationContext
import kotlinx.coroutines.flow.*
import javax.inject.Inject


private val Context.dataStore by preferencesDataStore("settings")

class UseCaseConfig @Inject constructor(@ApplicationContext private val context:Context){

    companion object{
        val BACKGROUND = intPreferencesKey("background")
    }

     private fun getBackground() = context.dataStore.data.map{it[BACKGROUND]}

     suspend fun guardarConfig(color:Int){
        context.dataStore.edit{
            it[BACKGROUND] = color
        }
    }

     suspend fun createBackground() : Int {
        return getBackground().map {
            it ?: R.style.Tema1
        }.first()
    }
}