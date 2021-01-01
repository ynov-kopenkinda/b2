package com.ynov.demo.concession.domain;

import javax.persistence.*;

@Entity
@Table(uniqueConstraints={@UniqueConstraint(columnNames={"registration"})})
public class Vehicle {
    public String getRegistration() {
        return registration;
    }

    public void setRegistration(String registration) {
        this.registration = registration;
    }

    private String registration;
    @Id
    @GeneratedValue(strategy = GenerationType.TABLE)
    private Long id;


}
