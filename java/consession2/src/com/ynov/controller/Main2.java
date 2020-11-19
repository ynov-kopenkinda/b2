package com.ynov.controller;

import com.ynov.model.Concession;
import com.ynov.model.Motorcycle;
import com.ynov.model.Car;


public class Main2 {
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

        for (int i =0; i < concession.getNumberOfVehicles(); i++) {
            System.out.println(concession.getVehicules()[i]);
        }
    }
}
