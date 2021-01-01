package com.ynov.demo.concession.controller;

import com.ynov.demo.concession.domain.Vehicle;
import com.ynov.demo.concession.service.ConcessionService;
import org.junit.jupiter.api.BeforeEach;
import org.junit.jupiter.api.Test;
import org.mockito.Mockito;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.boot.test.context.SpringBootTest;
import org.springframework.boot.test.mock.mockito.MockBean;
import org.springframework.web.server.ResponseStatusException;


import static org.junit.jupiter.api.Assertions.*;
import static org.mockito.Mockito.when;

@SpringBootTest
class ConcessionControllerTest {

    @Autowired
    ConcessionController concessionController;

    @MockBean
    ConcessionService concessionService;

    @BeforeEach
    void setUp() {
        Vehicle vehicle = new Vehicle();
        vehicle.setRegistration("AA555BB");
        when(concessionService.getVehicle(Mockito.any(String.class))).thenReturn(vehicle);
        when(concessionService.getVehicle("AA888DD")).thenReturn(null);

    }

    @Test
    void getVehicle() {
        Vehicle vehicle = new Vehicle();
        vehicle.setRegistration("AA555BB");
        assertEquals(concessionController.getVehicle("AA55BB"),vehicle);
    }

    @Test
    void getVehicleNull() {

        assertThrows(ResponseStatusException.class, () -> concessionController.getVehicle("AA888DD"));
    }
}
