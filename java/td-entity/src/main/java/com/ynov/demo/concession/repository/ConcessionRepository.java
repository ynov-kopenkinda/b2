package com.ynov.demo.concession.repository;

import com.ynov.demo.concession.domain.Concession;
import com.ynov.demo.concession.domain.ConcessionDto;
import com.ynov.demo.concession.domain.VehicleDto;
import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.data.jpa.repository.Query;
import org.springframework.stereotype.Repository;

import java.util.List;
import java.util.Set;

@Repository
public interface ConcessionRepository extends JpaRepository<Concession, Long> {

    @Query(value = "SELECT c FROM Concession c JOIN FETCH c.vehicles ")
    List<Concession> getConcessionWhithVehicles();

    @Query(value = "SELECT NEW com.ynov.demo.concession.domain.ConcessionDto(c.name, count(v)) FROM Concession c LEFT JOIN c.vehicles v GROUP BY c.id")
    List<ConcessionDto> getConcessionWhithNbVehicle();
}
