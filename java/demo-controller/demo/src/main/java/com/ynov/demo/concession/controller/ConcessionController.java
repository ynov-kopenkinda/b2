package com.ynov.demo.concession.controller;

import com.ynov.demo.concession.domain.Vehicle;
import org.springframework.http.HttpStatus;
import org.springframework.web.bind.annotation.*;

import java.util.ArrayList;
import java.util.List;

@RestController
@RequestMapping("/rest/concession")
public class ConcessionController {

    public ConcessionController() {
    }

    @GetMapping("/vehicle")
    @ResponseStatus(HttpStatus.OK)
    public List<Vehicle> getVehicles() {
        List<Vehicle> vehicles = new ArrayList<>();
        Vehicle vehicle =new Vehicle();
        vehicle.setRegistration("AA888AA");
        vehicles.add(vehicle);
        return vehicles;
    }

    @GetMapping("/vehicle/{id}")
    @ResponseStatus(HttpStatus.OK)
    public Vehicle getVehicle(@PathVariable String id) {
        Vehicle vehicle =new Vehicle();
        vehicle.setRegistration(id);
        return vehicle;
    }
}

