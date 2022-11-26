package com.example.a20221024apps.ui.viewmodel

import androidx.lifecycle.ViewModel
import com.example.a20221024apps.domain.UseCaseConfig
import dagger.hilt.android.lifecycle.HiltViewModel
import javax.inject.Inject

@HiltViewModel
class ViewModelConfig @Inject constructor (
    private val useCaseConfig: UseCaseConfig
    ) : ViewModel(){

    suspend fun guardarConfig(color:Int ) = useCaseConfig.guardarConfig(color)

    suspend fun createBackground() = useCaseConfig.createBackground()
}
