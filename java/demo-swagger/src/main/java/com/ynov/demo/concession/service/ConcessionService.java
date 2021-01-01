package com.ynov.demo.concession.service;

import com.ynov.demo.concession.domain.Vehicle;
import com.ynov.demo.concession.repository.VehicleRepository;
import org.springframework.stereotype.Service;

import java.util.List;

@Service
public class ConcessionService {
    private final VehicleRepository vehicleRepository;

    public ConcessionService(VehicleRepository vehicleRepository) {
        this.vehicleRepository = vehicleRepository;
    }
    public List<Vehicle> getVehicles() {
        return vehicleRepository.findAll();
    }

    public Vehicle getVehicle(String id) {
        return vehicleRepository.findByRegistration(id);
    }

    public void generateVehicles() {
        Vehicle vehicle =new Vehicle();
        vehicle.setRegistration("AA888BB");
        vehicleRepository.save(vehicle);

        vehicle =new Vehicle();
        vehicle.setRegistration("AA999DD");
        vehicleRepository.save(vehicle);
    }
}
