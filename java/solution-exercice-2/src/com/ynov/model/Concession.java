package com.ynov.model;

public class Concession {
    public Vehicle[] getVehicules() {
        return vehicles;
    }

    private int numberOfVehicles = 0;

    private Vehicle[] vehicles = new Vehicle[10];

    private String name;

    public void addVehicle(Vehicle vehicle) {
        vehicles[numberOfVehicles++] = vehicle;
    }

    public int getNumberOfVehicles() {
        return numberOfVehicles;
    }

    public String getName() {
        return name;
    }

    public void setName(String name) {
        this.name = name;
    }
}
