package com.ynov.demo.concession.service;

import com.ynov.demo.concession.domain.Vehicle;
import org.springframework.stereotype.Service;

import java.util.ArrayList;
import java.util.List;

@Service
public class ConcessionService {
    List<Vehicle> vehicles = new ArrayList<>();

    public ConcessionService() {
        Vehicle vehicle =new Vehicle();
        vehicle.setRegistration("AA888BB");
        vehicles.add(vehicle);

        vehicle =new Vehicle();
        vehicle.setRegistration("AA999DD");
        vehicles.add(vehicle);
    }
    public List<Vehicle> getVehicles() {
        return vehicles;
    }

    public Vehicle getVehicle(String id) {
        return vehicles.stream().filter(vehicle -> vehicle.getRegistration().equals(id)).findFirst().orElseThrow();
    }
}
