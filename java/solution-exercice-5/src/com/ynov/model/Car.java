package com.ynov.model;

public class Car extends Vehicle {
    private int numberOfDoors = 4;

    public Car() {
        super();
    }

    public Car(int numberOfDoors, String color) {
        super(4, color);
        this.numberOfDoors = numberOfDoors;
    }

    public int getNumberOfDoors() {
        return numberOfDoors;
    }

    public String toString(){
        return super.toString() + ", number of doors =" + numberOfDoors;
    }

    @Override
    public boolean equals(Object obj) {
        if (obj instanceof Car) {
            Car c = (Car)obj;
            return super.equals(obj) && this.numberOfDoors == c.numberOfDoors;
        } else return false;
    }
}
