package com.example.a20221024apps.ui.view

import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import androidx.activity.viewModels
import com.example.a20221024apps.R
import com.example.a20221024apps.databinding.ActivityConfigBinding
import com.example.a20221024apps.ui.viewmodel.ViewModelConfig
import dagger.hilt.android.AndroidEntryPoint
import kotlinx.coroutines.runBlocking

@AndroidEntryPoint
class ConfigActivity : AppCompatActivity() {

    private lateinit var binding: ActivityConfigBinding
    private val config: ViewModelConfig by viewModels()

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        binding = ActivityConfigBinding.inflate(layoutInflater)
        setContentView(binding.root)
        crearBackground()

        binding.btn1.setOnClickListener{
            runBlocking { config.guardarConfig(R.style.Tema1) }
            crearBackground()
        }
        binding.btn2.setOnClickListener{
            runBlocking { config.guardarConfig(R.style.Tema1) }
            crearBackground()
        }
        binding.btn3.setOnClickListener{
            runBlocking { config.guardarConfig(R.style.Tema1) }
            crearBackground()
        }
    }
    private fun crearBackground() = setTheme( runBlocking { config.createBackground() })
}