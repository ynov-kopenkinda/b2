package com.ynov.model;

public abstract class Vehicle {

    protected String color = "white";
    private int numberOfWheels = 4;
    public Vehicle() {}
    public Vehicle(int numberOfWheels, String color) {
        this.numberOfWheels = numberOfWheels;
        this.color = color;
    }

    public int getNumberOfWheels() {
        return numberOfWheels;
    }

    public String getColor() {
        return color;
    }

    public String toString(){
        return getClass().getName() + ", number of wheels :" + numberOfWheels + ", Colour :" + color;
    }
}
