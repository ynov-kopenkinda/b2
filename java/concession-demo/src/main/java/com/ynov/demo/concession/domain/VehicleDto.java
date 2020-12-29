package com.ynov.demo.concession.domain;

public class VehicleDto {
    public String getRegistration() {
        return registration;
    }

    public void setRegistration(String registration) {
        this.registration = registration;
    }

    public String getConcessionName() {
        return concessionName;
    }

    public void setConcessionName(String concessionName) {
        this.concessionName = concessionName;
    }

    private String registration;
    private String concessionName;
    public VehicleDto(String registration, String concessionName){
        this.registration = registration;
        this.concessionName = concessionName;
    }
}
