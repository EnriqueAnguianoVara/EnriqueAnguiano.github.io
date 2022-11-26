package com.example.a20221024apps.ui.view

import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import androidx.activity.viewModels
import androidx.lifecycle.lifecycleScope
import com.example.a20221024apps.databinding.ActivityModificarBinding
import com.example.a20221024apps.domain.model.ClienteItem
import com.example.a20221024apps.ui.viewmodel.ViewModelConfig
import com.example.a20221024apps.ui.viewmodel.ViewModelModificar
import dagger.hilt.android.AndroidEntryPoint
import kotlinx.coroutines.Dispatchers
import kotlinx.coroutines.launch
import kotlinx.coroutines.runBlocking
import kotlinx.coroutines.withContext

@AndroidEntryPoint
class ModificarActivity : AppCompatActivity() {

    private lateinit var binding: ActivityModificarBinding
    private val viewModel: ViewModelModificar by viewModels()
    private val config: ViewModelConfig by viewModels()

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        binding = ActivityModificarBinding.inflate(layoutInflater)
        setContentView(binding.root)

        binding.background.setBackgroundResource( runBlocking { config.createBackground() })

        binding.btnGuardar.setOnClickListener {
            lifecycleScope.launch(Dispatchers.IO) {
                viewModel(
                    withContext(Dispatchers.Main) {
                        ClienteItem(
                            binding.etId.text.toString(),
                            binding.etNombre.text.toString(),
                            binding.etDireccion.text.toString(),
                            binding.etPoblacion.text.toString(),
                            binding.etTelefono.text.toString()
                        )
                    }
                )
            }
        }
    }
}