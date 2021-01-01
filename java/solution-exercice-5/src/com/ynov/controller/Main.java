package com.ynov.controller;

import com.ynov.model.Car;
import com.ynov.model.Concession;
import com.ynov.model.Motorcycle;
import com.ynov.model.Vehicle;

import java.util.Iterator;

public class Main {

    public static void main(String[] args) {
        Concession concession = new Concession();

        Car car = new Car(5, "black");
        concession.addVehicle(car);
        car = new Car(3, "red");
        concession.addVehicle(car);
        car = new Car(4, "white");
        concession.addVehicle(car);

        Motorcycle motorcycle = new Motorcycle(900, "blue");
        concession.addVehicle(motorcycle);
        motorcycle = new Motorcycle(850, "green");
        concession.addVehicle(motorcycle);

        Iterator<Vehicle> vehicleWalker = concession.getVehicules();
        while (vehicleWalker.hasNext()){
            Vehicle vehicle = vehicleWalker.next();
            System.out.println(vehicle);
        }
    }
}
