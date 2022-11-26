package com.example.a20221024apps.ui.view

import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.widget.Toast
import androidx.activity.viewModels
import androidx.lifecycle.lifecycleScope
import com.example.a20221024apps.databinding.ActivityCrearBinding
import com.example.a20221024apps.domain.model.ClienteItem
import com.example.a20221024apps.ui.viewmodel.ViewModelConfig
import com.example.a20221024apps.ui.viewmodel.ViewModelCrear
import dagger.hilt.android.AndroidEntryPoint
import kotlinx.coroutines.Dispatchers
import kotlinx.coroutines.launch
import kotlinx.coroutines.runBlocking
import kotlinx.coroutines.withContext

@AndroidEntryPoint
class CrearActivity : AppCompatActivity(){

    private lateinit var binding: ActivityCrearBinding
    private val viewModel: ViewModelCrear by viewModels()
    private val config: ViewModelConfig by viewModels()

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        binding = ActivityCrearBinding.inflate(layoutInflater)
        setContentView(binding.root)
        binding.background.setBackgroundResource( runBlocking { config.createBackground() })

        binding.btnGuardar.setOnClickListener {
            lifecycleScope.launch(Dispatchers.IO) {
                if(!viewModel(
                    withContext(Dispatchers.Main) {
                        ClienteItem(
                            binding.etId.text.toString(),
                            binding.etNombre.text.toString(),
                            binding.etDireccion.text.toString(),
                            binding.etPoblacion.text.toString(),
                            binding.etTelefono.text.toString()
                        )
                    }
                )) withContext(Dispatchers.Main){ sacarToast("Por favor rellena todos los datos") }
                else withContext(Dispatchers.Main){ sacarToast("Datos guradados")}

            }
        }
    }

    private fun sacarToast(mensaje: String) {
        Toast.makeText(this, mensaje, Toast.LENGTH_SHORT).show()
    }
}