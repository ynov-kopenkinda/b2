package com.ynov.demo.concession.service;

import com.ynov.demo.concession.domain.Vehicle;
import com.ynov.demo.concession.repository.VehicleRepository;
import org.junit.jupiter.api.Test;
import org.junit.jupiter.api.extension.ExtendWith;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.boot.test.context.SpringBootTest;
import org.springframework.test.annotation.DirtiesContext;
import org.springframework.test.context.TestPropertySource;
import org.springframework.test.context.jdbc.Sql;
import org.springframework.test.context.junit.jupiter.SpringExtension;

import static org.junit.jupiter.api.Assertions.*;

@ExtendWith(SpringExtension.class)
@SpringBootTest
@DirtiesContext(classMode = DirtiesContext.ClassMode.BEFORE_EACH_TEST_METHOD)
@TestPropertySource(locations = "classpath:application.properties")
@Sql(scripts = {"concession.sql"})class ConcessionServiceTest {

    @Autowired
    VehicleRepository vehicleRepository;

    @Autowired
    ConcessionService concessionService;

    public ConcessionServiceTest() {

    }
    @Test
    void getVehicules() {
        assertEquals("AA888BB", concessionService.getVehicles().get(0).getRegistration());
    }

    @Test
    void getConcession() {
        assertEquals("AA888BB", ((Vehicle)concessionService.getConcessions().get(0).getVehicles().toArray()[0]).getRegistration());
    }
}
