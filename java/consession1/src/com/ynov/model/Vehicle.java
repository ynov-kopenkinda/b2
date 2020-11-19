package com.ynov.model;

public class Vehicle {
    protected String color = "white";
    private int numberOfWheels = 4;

    public Vehicle() {}
    public Vehicle(int numberOfWheels, String color) {
        this.numberOfWheels = numberOfWheels;
        this.color = color;
    }


    public String toString(){
        return "number of wheels :" + numberOfWheels + ", Colour :" + color;
    }
}
