package com.example.a20221024apps.ui.viewmodel

import androidx.lifecycle.ViewModel
import com.example.a20221024apps.domain.UseCaseCrear
import com.example.a20221024apps.domain.model.ClienteItem
import dagger.hilt.android.lifecycle.HiltViewModel
import javax.inject.Inject

@HiltViewModel
class ViewModelCrear @Inject constructor(
    private val useCaseCrear: UseCaseCrear
): ViewModel() {
     operator fun invoke(cliente: ClienteItem) : Boolean{
         return with(cliente){
             if(nombre.isNotBlank() && (id?.toIntOrNull()!=null || id=="*")) {
                useCaseCrear(cliente)
                true
             } else false
         }
     }
}