package com.example.a20221024apps.data

import com.example.a20221024apps.data.dao.ClienteDao
import com.example.a20221024apps.domain.model.ClienteItem
import javax.inject.Inject

class ClienteRepository @Inject constructor(
    private val clienteDao: ClienteDao
){
     fun getClientePorId(id:Int): ClienteItem = clienteDao.getClientesPorId(id).toItem()

     fun getClientePorNombre(nombre:String):ClienteItem = clienteDao.getClientesPorNombre(nombre).toItem()

     fun insertarCliente(cliente:ClienteItem) = clienteDao.insert(cliente.toContentValues())

     fun insertarClienteleAutoIncrement(cliente:ClienteItem) = clienteDao.insert(cliente.toAutoIncrementContentValues())

     fun borrarCliente(id:Int):Boolean = clienteDao.delete(id)

     fun modificarCliente(cliente:ClienteItem) = clienteDao.update(cliente.toContentValues())
}