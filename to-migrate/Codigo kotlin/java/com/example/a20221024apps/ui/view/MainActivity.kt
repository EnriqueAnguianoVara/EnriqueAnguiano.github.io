package com.example.a20221024apps.ui.view

import android.content.Intent
import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import androidx.activity.viewModels
import androidx.core.splashscreen.SplashScreen.Companion.installSplashScreen
import com.example.a20221024apps.R
import com.example.a20221024apps.databinding.ActivityMainBinding
import com.example.a20221024apps.ui.viewmodel.ViewModelConfig
import dagger.hilt.android.AndroidEntryPoint
import kotlinx.coroutines.runBlocking
import javax.inject.Inject

@AndroidEntryPoint
class MainActivity @Inject constructor() : AppCompatActivity() {

    private lateinit var binding:ActivityMainBinding
    private val config: ViewModelConfig by viewModels()

    override fun onCreate(savedInstanceState: Bundle?) {
        val screenSplash = installSplashScreen()
        super.onCreate(savedInstanceState)
        binding = ActivityMainBinding.inflate(layoutInflater)

        screenSplash.setKeepOnScreenCondition { false }

        setContentView(binding.root)

        setTheme(R.style.Tema1)

        binding.btnEliminarCliente.setOnClickListener { startActivity(Intent(this, BorrarActivity::class.java)) }

        binding.btnConfigCliente.setOnClickListener { startActivity(Intent(this, ConfigActivity::class.java)) }

        binding.btnNuevoCliente.setOnClickListener { startActivity(Intent(this, CrearActivity::class.java)) }

        binding.btnBuscarCliente.setOnClickListener { startActivity(Intent(this, BuscarActivity::class.java)) }

        binding.btnModificarCliente.setOnClickListener { startActivity(Intent(this, ModificarActivity::class.java)) }
        
    }

}