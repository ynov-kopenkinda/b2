package com.ynov.model;

import java.util.*;

public class Concession {
    public Iterator<Vehicle> getVehicules() {
        return vehicles.iterator();
    }

    private int numberOfVehicles = 0;

    private List<Vehicle> vehicles = new ArrayList<>();

    private HashMap<String, Vehicle> vehicleByRegistration = new HashMap<>();

    private String name;

    public void addVehicle(Vehicle vehicle) {
        vehicles.add(vehicle);
        vehicleByRegistration.put(vehicle.getRegistration(), vehicle);
    }

    public Set<String> getRegistrations() {
        return vehicleByRegistration.keySet();
    }

    public Vehicle getVehicleByRegistration(String registration) {
        return vehicleByRegistration.get(registration);
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
