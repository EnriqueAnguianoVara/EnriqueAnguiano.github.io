package com.example.a20221024apps.ui.view

import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.widget.Toast
import androidx.activity.viewModels
import androidx.datastore.preferences.core.intPreferencesKey
import androidx.lifecycle.lifecycleScope
import com.example.a20221024apps.databinding.ActivityMostrarBinding
import com.example.a20221024apps.domain.model.ClienteItem
import com.example.a20221024apps.ui.viewmodel.ViewModelConfig
import dagger.hilt.android.AndroidEntryPoint
import kotlinx.coroutines.Dispatchers
import kotlinx.coroutines.flow.map
import kotlinx.coroutines.launch
import kotlinx.coroutines.runBlocking
import kotlinx.coroutines.withContext

@AndroidEntryPoint
class MostrarActivity : AppCompatActivity() {

    private lateinit var binding: ActivityMostrarBinding
    private val config: ViewModelConfig by viewModels()
    private lateinit var cliente: ClienteItem

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        binding = ActivityMostrarBinding.inflate(layoutInflater)
        setContentView(binding.root)
        binding.background.setBackgroundResource( runBlocking { config.createBackground() })
        createCliente()
    }

    private fun createCliente() {
        cliente = intent.extras?.get("cliente") as ClienteItem
        with(cliente) {
            binding.tvId.text = id.toString()
            binding.tvDireccion.text = direccion
            binding.tvNombre.text = nombre
            binding.tvPoblacion.text = poblacion
            binding.tvTelefono.text = telefono.toString()
        }
    }
}