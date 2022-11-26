package paquete;

import java.util.concurrent.Semaphore;

record Fork(Semaphore fork_semaphore) {
	/**
	 * @return true if it the philosopher object has the fork, false if anyone took it before
	 */
	boolean acquire() { return fork_semaphore.tryAcquire(); }
	void realase() { fork_semaphore.release(); }
	
}