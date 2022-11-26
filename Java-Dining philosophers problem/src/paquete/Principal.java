package paquete;

import java.util.List;
import java.util.concurrent.Semaphore;
import java.util.stream.IntStream;


/**
 * @author enriq
 * Dining philosophers problem / Problema de la cena de los filósofos
 */
public class Principal {
	
	static List<Fork> phi = List.of(
			new Fork(new Semaphore(1)),
			new Fork(new Semaphore(1)),
			new Fork(new Semaphore(1)),
			new Fork(new Semaphore(1)),
			new Fork(new Semaphore(1))
			);
	
	/**
	 * @param args
	 * I could use the Thread method setName() instead of create an atribute in Philosopher
	 */
	public static void main(String[] args) {
		IntStream.range(0, phi.size()).forEach(index->{
			new Thread(new Philosopher(
					String.valueOf("Philosopher "+index),
					phi.get(index % phi.size()),
					phi.get((index+1) % phi.size())
			)).start();
		});
		
	}
	
}