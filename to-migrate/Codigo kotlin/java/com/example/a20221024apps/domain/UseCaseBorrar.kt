package com.example.a20221024apps.domain

import com.example.a20221024apps.data.ClienteRepository
import javax.inject.Inject

class UseCaseBorrar @Inject constructor(
    private val clienteRepository: ClienteRepository
){
     operator fun invoke(id:Int): Boolean =clienteRepository.borrarCliente(id)
}