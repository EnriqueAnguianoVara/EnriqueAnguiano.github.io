package com.example.a20221024apps.ui.view

import android.content.Intent
import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.widget.Toast
import androidx.activity.viewModels
import com.example.a20221024apps.databinding.ActivityBorrarBinding
import com.example.a20221024apps.ui.viewmodel.ViewModelBorrar
import com.example.a20221024apps.ui.viewmodel.ViewModelConfig
import dagger.hilt.android.AndroidEntryPoint
import kotlinx.coroutines.*

@AndroidEntryPoint
class BorrarActivity : AppCompatActivity() {

    private lateinit var binding: ActivityBorrarBinding
    private val viewModel: ViewModelBorrar by viewModels()
    private val config: ViewModelConfig by viewModels()

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        binding = ActivityBorrarBinding.inflate(layoutInflater)
        setContentView(binding.root)

        setTheme(runBlocking { config.createBackground()})

        binding.btnEliminarId.setOnClickListener{
                if(viewModel(binding.etEliminarId.text.toString().toInt())) borradoOk()
                else borradoNoTanOk()
        }
    }

    private fun borradoOk() {
        crearToast("Cliente borrado correctamente")
        startActivity(Intent(this, MainActivity::class.java))
    }

    private fun borradoNoTanOk() = crearToast("ERROR CON LA ID")

    private fun crearToast(mensaje: String) = Toast.makeText(this,mensaje,Toast.LENGTH_SHORT).show()
}
