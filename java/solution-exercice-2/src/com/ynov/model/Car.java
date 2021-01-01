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

}
