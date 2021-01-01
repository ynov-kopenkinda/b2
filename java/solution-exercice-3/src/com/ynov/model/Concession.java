package com.ynov.model;

import com.ynov.util.Walker;

import java.util.ArrayList;
import java.util.List;

public class Concession {
    public Walker<Vehicle> getVehicules() {
        return new Walker<Vehicle>() {
            int index = 0;
            @Override
            public boolean hasNext() {
                return index < numberOfVehicles;
            }

            @Override
            public Vehicle next() {
                return vehicles[index++];
            }
        };
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

    
    public Walker<Vehicle> getVehicules2() {
        return new WalkerOfVehicle();
    }

    private class WalkerOfVehicle implements Walker<Vehicle> {

        int index = 0;
        @Override
        public boolean hasNext() {
            return index < numberOfVehicles;
        }

        @Override
        public Vehicle next() {
            return vehicles[index++];
        }
    }

}
