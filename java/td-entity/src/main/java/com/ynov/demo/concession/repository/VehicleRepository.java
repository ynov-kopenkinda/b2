package com.ynov.demo.concession.repository;

import com.ynov.demo.concession.domain.Vehicle;
import com.ynov.demo.concession.domain.VehicleDto;
import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.data.jpa.repository.Query;
import org.springframework.stereotype.Repository;

import java.util.List;

@Repository
public interface VehicleRepository extends JpaRepository<Vehicle, Long> {
    Vehicle findByRegistration(String id);

    @Query(value = "SELECT v FROM Vehicle v WHERE v.registration = :id")
    Vehicle findByMyValue(String id);

    @Query(value = "SELECT NEW com.ynov.demo.concession.domain.VehicleDto(v.registration, c.name) FROM Concession c LEFT JOIN c.vehicles v group by v.id")
    List<VehicleDto> findAllVehicleDto();
}
