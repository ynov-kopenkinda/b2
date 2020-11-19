package com.ynov.controller;

import com.ynov.model.Car;
import com.ynov.model.Concession;
import com.ynov.model.Motorcycle;

public class Main {
    public static void main(String[] args) {
        Car car = new Car();
        System.out.println(car);

        Motorcycle motorBike = new Motorcycle();
        System.out.println(motorBike);

        Concession concession = new Concession();
        System.out.println(concession);
    }
}
