package com.example.a20221024apps.ui.viewmodel

import androidx.lifecycle.ViewModel
import com.example.a20221024apps.domain.UseCaseBorrar
import dagger.hilt.android.lifecycle.HiltViewModel
import javax.inject.Inject

@HiltViewModel
class ViewModelBorrar @Inject constructor(
    private val useCaseBorrar: UseCaseBorrar
): ViewModel() {
     operator fun invoke(id:Int): Boolean = useCaseBorrar(id)
}