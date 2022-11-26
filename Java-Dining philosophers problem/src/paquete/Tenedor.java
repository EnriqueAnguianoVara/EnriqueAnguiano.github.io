package paquete;

import java.util.concurrent.Semaphore;

record Tenedor(Semaphore fork_semaphore) {
	/**
	 * @return true -> Philosopher coje el Fork , false -> Fork ya tiene asignado Philosopher 
	 */
	boolean acquire() { return fork_semaphore.tryAcquire(); }
	void realase() { fork_semaphore.release(); }
	
}