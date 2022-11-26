package com.example.a20221024apps.ui.view

import android.content.Intent
import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.widget.Toast
import androidx.activity.viewModels
import com.example.a20221024apps.databinding.ActivityBuscarBinding
import com.example.a20221024apps.domain.model.ClienteItem
import com.example.a20221024apps.ui.viewmodel.ViewModelBuscar
import com.example.a20221024apps.ui.viewmodel.ViewModelConfig
import dagger.hilt.android.AndroidEntryPoint
import kotlinx.coroutines.runBlocking

@AndroidEntryPoint
class BuscarActivity : AppCompatActivity() {

    private lateinit var binding: ActivityBuscarBinding
    private val viewModelBuscar: ViewModelBuscar by viewModels()
    private val config: ViewModelConfig by viewModels()

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        binding = ActivityBuscarBinding.inflate(layoutInflater)
        setContentView(binding.root)
        binding.background.setBackgroundResource( runBlocking { config.createBackground() })

        binding.btnBusquedaId.setOnClickListener {
            runBlocking {
               mandarCliente(viewModelBuscar(binding.etBusquedaId.text.toString().toInt()))
            }
        }

        binding.btnBusquedaNombre.setOnClickListener {
            runBlocking {
                mandarCliente(viewModelBuscar(binding.etBusquedaNombre.text.toString()))
            }
        }
    }

    private fun mandarCliente(cliente: ClienteItem){
        with(cliente){
            if(nombre.isNotBlank()) enviarCliente(cliente)
            else enviarToast("Error: Se han encontrado $id clientes con ese parámetro")
        }
    }

    private fun enviarToast(mensaje: String) {
        Toast.makeText(this,mensaje, Toast.LENGTH_SHORT).show()
    }

    private fun enviarCliente(cliente: ClienteItem) {
        startActivity(
            Intent(this, MostrarActivity::class.java).apply{
                putExtra("cliente",cliente)
            }
        )
    }
}