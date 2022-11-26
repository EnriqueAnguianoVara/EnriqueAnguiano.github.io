package com.example.a20221024apps.domain

import com.example.a20221024apps.data.ClienteRepository
import com.example.a20221024apps.domain.model.ClienteItem
import javax.inject.Inject

class UseCaseCrear @Inject constructor(
    private val clienteRepository: ClienteRepository
){
     operator fun invoke(cliente: ClienteItem){
       if(cliente.id!="*") clienteRepository.insertarCliente(cliente)
       else clienteRepository.insertarClienteleAutoIncrement(cliente)
    }
}