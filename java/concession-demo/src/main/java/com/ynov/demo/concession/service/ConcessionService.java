package com.ynov.demo.concession.service;

import com.ynov.demo.concession.domain.Concession;
import com.ynov.demo.concession.domain.ConcessionDto;
import com.ynov.demo.concession.domain.Vehicle;
import com.ynov.demo.concession.domain.VehicleDto;
import com.ynov.demo.concession.repository.ConcessionRepository;
import com.ynov.demo.concession.repository.VehicleRepository;
import org.slf4j.Logger;
import org.slf4j.LoggerFactory;
import org.springframework.stereotype.Service;

import javax.transaction.Transactional;
import java.util.HashSet;
import java.util.List;

@Service
public class ConcessionService {
    private static final Logger LOGGER = LoggerFactory.getLogger(ConcessionService.class);
    private final VehicleRepository vehicleRepository;
    private ConcessionRepository concessionRepository;

    public ConcessionService(VehicleRepository vehicleRepository,
                             ConcessionRepository concessionRepository) {
        this.vehicleRepository = vehicleRepository;
        this.concessionRepository = concessionRepository;
    }

    public List<Vehicle> getVehicles() {
        return vehicleRepository.findAll();
    }

    public Vehicle getVehicle(String id) {

        return vehicleRepository.findByRegistration(id);
    }

    public void generateVehicles() {
        Vehicle vehicle = new Vehicle();
        vehicle.setRegistration("AA888BB");
        vehicleRepository.save(vehicle);

        vehicle = new Vehicle();
        vehicle.setRegistration("AA999DD");
        vehicleRepository.save(vehicle);
    }

    // @Transactional
    public void generateConcession() {
        Concession concession = new Concession();
        concession.setName("Peugeot_" + Math.random());
        concessionRepository.save(concession);
        concession.setVehicles(new HashSet<>());
        Vehicle vehicle = new Vehicle();
        vehicle.setRegistration("AA888BB-" + Math.random());
        vehicleRepository.save(vehicle);
        concession.getVehicles().add(vehicle);
        vehicle = new Vehicle();
        vehicle.setRegistration("AA999DD-" + Math.random());
        vehicleRepository.save(vehicle);
        concession.getVehicles().add(vehicle);
        concessionRepository.save(concession);
        LOGGER.debug("Save done.");
        LOGGER.warn("Save done.");
    }

    public List<Concession> getConcessions() {
        return concessionRepository.getConcessionWhithVehicles();
    }
    public List<ConcessionDto> getConcessionsWhithNbVehicle() {
        return concessionRepository.getConcessionWhithNbVehicle();
    }

    public List<VehicleDto> getVehicleDto() {
        List<VehicleDto> allVehicleDto = vehicleRepository.findAllVehicleDto();
        allVehicleDto.stream().forEach(System.out::println);
        return allVehicleDto;
    }
}
