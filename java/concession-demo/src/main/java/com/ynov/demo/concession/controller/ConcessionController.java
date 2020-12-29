package com.ynov.demo.concession.controller;

import com.ynov.demo.concession.domain.Concession;
import com.ynov.demo.concession.domain.ConcessionDto;
import com.ynov.demo.concession.domain.Vehicle;
import com.ynov.demo.concession.domain.VehicleDto;
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

    @GetMapping("/concession")
    @ResponseStatus(HttpStatus.OK)
    public List<Concession> getConcessions() {
        return concessionService.getConcessions();
    }

    @GetMapping("/concession-nb-vehicle")
    @ResponseStatus(HttpStatus.OK)
    public List<ConcessionDto> getConcessionsWithNbVehicles() {
        return concessionService.getConcessionsWhithNbVehicle();
    }

    @GetMapping("/vdto")
    @ResponseStatus(HttpStatus.OK)
    public List<VehicleDto> getVehicleDto() {
        return concessionService.getVehicleDto();
    }

    @GetMapping("/vehicle/{id}")
    @ResponseStatus(HttpStatus.OK)
    public Vehicle getVehicle(@PathVariable String id) {
        Vehicle vehicle = concessionService.getVehicle(id);
        if (vehicle == null) {
            throw new ResponseStatusException(HttpStatus.NOT_FOUND, "Vehicle not found");
        }
        return vehicle;
    }

    @GetMapping("/vehicle/generate")
    @ResponseStatus(HttpStatus.OK)
    public void generateVehicles() {
        concessionService.generateVehicles();
    }

    @GetMapping("/concession/generate")
    @ResponseStatus(HttpStatus.OK)
    public void generateConcession() {
        concessionService.generateConcession();
    }

}

