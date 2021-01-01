package com.ynov.demo.concession.controller;

import com.ynov.demo.concession.domain.Vehicle;
import com.ynov.demo.concession.service.ConcessionService;
import org.springframework.http.HttpStatus;
import org.springframework.web.bind.annotation.*;
import org.springframework.web.server.ResponseStatusException;

import java.util.List;

@RestController
@RequestMapping("/rest/concession")
public class ConcessionController {

    ConcessionService concessionService;
    public ConcessionController(ConcessionService concessionService) {
        this.concessionService = concessionService;
    }

    @GetMapping("/vehicle")
    @ResponseStatus(HttpStatus.OK)
    public List<Vehicle> getVehicles() {
        return concessionService.getVehicles();
    }

    @GetMapping("/vehicle/{id}")
    @ResponseStatus(HttpStatus.OK)
    public Vehicle getVehicle(@PathVariable String id) {
        try {
            return concessionService.getVehicle(id);
        } catch(Exception e) {
            throw new ResponseStatusException(HttpStatus.NOT_FOUND, "Vehicle not found");
        }
    }

}

