package com.ynov.controller;

import com.ynov.model.Car;
import com.ynov.model.Concession;
import com.ynov.model.Motorcycle;
import com.ynov.model.Vehicle;

import java.util.Iterator;
import java.util.Set;

public class Main2 {

    public static void main(String[] args) {
        Concession concession = new Concession();

        Car car = new Car(5, "black");
        car.setRegistration("AA111AA");
        concession.addVehicle(car);
        car = new Car(3, "red");
        car.setRegistration("AB222AA");
        concession.addVehicle(car);
        car = new Car(4, "white");
        car.setRegistration("AC333AA");
        concession.addVehicle(car);

        Motorcycle motorcycle = new Motorcycle(900, "blue");
        motorcycle.setRegistration("BB444AA");
        concession.addVehicle(motorcycle);
        motorcycle = new Motorcycle(850, "green");
        motorcycle.setRegistration("BC555AA");
        concession.addVehicle(motorcycle);

        Set<String> registrations = concession.getRegistrations();
        for (String registration: registrations){
            System.out.println(registration + ": " + concession.getVehicleByRegistration(registration));
        }
    }
}
