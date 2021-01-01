package com.ynov.model;

import java.io.Serializable;

public abstract class Vehicle implements Serializable {

    protected String color = "white";
    private int numberOfWheels = 4;

    private String registration;

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

    public String getRegistration() {
        return registration;
    }

    public void setRegistration(String registration) {
        this.registration = registration;
    }

    public String toString(){
        return getClass().getName() + ", number of wheels :" + numberOfWheels + ", Colour :" + color;
    }

    @Override
    public boolean equals(Object obj) {
        if (obj instanceof Vehicle) {
            Vehicle v = (Vehicle)obj;
            return this.color.equals(v.color) && this.numberOfWheels == v.numberOfWheels && this.registration.equals(v.registration);
        } else {
            return false;
        }
    }
}
