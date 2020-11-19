package com.ynov.demo.concession.domain;

import javax.persistence.Entity;
import javax.persistence.GeneratedValue;
import javax.persistence.GenerationType;
import javax.persistence.Id;

@Entity
public class Vehicle {
    public String getRegistration() {
        return registration;
    }

    public void setRegistration(String registration) {
        this.registration = registration;
    }

    private String registration;
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    private Long id;
}
