package com.example.a20221024apps.ui.viewmodel

import androidx.lifecycle.ViewModel
import com.example.a20221024apps.domain.UseCaseBuscar
import dagger.hilt.android.lifecycle.HiltViewModel
import javax.inject.Inject

@HiltViewModel
class ViewModelBuscar @Inject constructor(
    private val useCaseBuscar: UseCaseBuscar
) : ViewModel(){
    operator fun invoke(id:Int) = useCaseBuscar(id)

    operator fun invoke(nombre: String) = useCaseBuscar(nombre)
}
