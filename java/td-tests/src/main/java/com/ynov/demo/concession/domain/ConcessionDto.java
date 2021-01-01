package com.ynov.demo.concession.domain;

public class ConcessionDto {
    private String name;
    private long nbVehicle;

    public String getName() {
        return name;
    }

    public void setName(String name) {
        this.name = name;
    }

    public long getNbVehicle() {
        return nbVehicle;
    }

    public void setNbVehicle(int nbVehicle) {
        this.nbVehicle = nbVehicle;
    }


    public ConcessionDto(String name, long nbVehicle) {
        this.name = name;
        this.nbVehicle = nbVehicle;
    }
}
