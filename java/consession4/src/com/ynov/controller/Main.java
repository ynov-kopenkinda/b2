package com.ynov.controller;

import com.ynov.model.Car;

public class Main {
    public static void main(String[] args) {

        Car car1 = new Car(5, "black");
        car1.setRegistration("AA888AA");
        Car car2 = car1;
        Car car3 = new Car(5, "black");
        car3.setRegistration("AA888AA");
        Car car4 = new Car(5, "black");
        car4.setRegistration("AA888BB");

        equality(car1, "car1", car2, "car2");
        equality(car1, "car1", car3, "car3");
        equality(car1, "car1", car4, "car4");
    }
    private static void equality(Car car1, String car1Label, Car car2, String car2Label) {
        if (car1 == car2) {
            System.out.println("égalité stricte entre " + car1Label + " et " + car2Label);
        } else {
            System.out.println("pas d'égalité stricte entre " + car1Label + " et " + car2Label);
        }
        if (car1.equals(car2)) {
            System.out.println(car1Label + " equals " + car2Label);
        } else {
            System.out.println(car1Label + " not equals " + car2Label);
        }
    }
}
