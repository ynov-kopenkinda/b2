package com.ynov.demo.concession.repository;

import com.ynov.demo.concession.domain.Vehicle;
import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.data.jpa.repository.Query;
import org.springframework.stereotype.Repository;

@Repository
public interface VehicleRepository extends JpaRepository<Vehicle, Long> {
    Vehicle findByRegistration(String id);

    @Query(value = "SELECT v FROM Vehicle v WHERE v.registration = :id")
    Vehicle findByMyValue(String id);
}
