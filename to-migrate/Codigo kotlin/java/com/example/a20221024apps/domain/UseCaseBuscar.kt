package com.example.a20221024apps.domain

import com.example.a20221024apps.data.ClienteRepository
import com.example.a20221024apps.domain.model.ClienteItem
import javax.inject.Inject

class UseCaseBuscar @Inject constructor(
    private val clienteRepository: ClienteRepository
){
    operator fun invoke(id: Int): ClienteItem = clienteRepository.getClientePorId(id)

    operator fun invoke(nombre: String): ClienteItem = clienteRepository.getClientePorNombre(nombre)
}