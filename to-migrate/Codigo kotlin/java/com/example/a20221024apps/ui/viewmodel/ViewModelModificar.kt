package com.example.a20221024apps.ui.viewmodel

import androidx.lifecycle.ViewModel
import com.example.a20221024apps.domain.UseCaseModificar
import com.example.a20221024apps.domain.model.ClienteItem
import dagger.hilt.android.lifecycle.HiltViewModel
import javax.inject.Inject

@HiltViewModel
class ViewModelModificar @Inject constructor(
    private val useCaseModificar: UseCaseModificar
): ViewModel(){
     operator fun invoke(cliente:ClienteItem):Boolean {
         return if (cliente.nombre!="" && cliente.id?.toIntOrNull() !=null) {
             useCaseModificar(cliente)
             true
         } else false
     }
}