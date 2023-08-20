package paquete;

import java.util.Random;

public record Filosofo (
		String name,
		Tenedor left,
		Tenedor right
		) implements Runnable {
	
	/**
	 * Una forma de evitar el interbloqueo
	 * @see Fork.acquire(); 
	 */
	@Override
	public void run() {
		while (true) {
			if (left.acquire()) {
				System.out.println(this.name+" takes the left fork");
				if (right.acquire()) {
					System.out.println(this.name+" takes the right fork");
					eat();
					right.acquire();
					System.out.println(this.name+" releases the right fork");
				}
				left.realase();
				System.out.println(this.name+" releases the left fork");
				sleep();
			}
		}
	}
	
	void eat() {
		System.out.println(this.name+" starts eating");
		int eatingTime = (new Random().nextInt(2)+1)*1000;
		try { Thread.sleep(eatingTime); } catch (InterruptedException e) {}
		System.out.println(this.name+" ends eating at "+eatingTime/1000+" seconds");
	}
	
	void sleep() {
		System.out.println(this.name+" goes to sleep");
		try { Thread.sleep(2000); } catch (InterruptedException e) {}
	}
}
