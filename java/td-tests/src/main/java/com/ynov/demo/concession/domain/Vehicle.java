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

    @Override
    public boolean equals(Object o) {
        if (this == o) return true;
        if (o == null || getClass() != o.getClass()) return false;

        Vehicle vehicle = (Vehicle) o;

        if (registration != null ? !registration.equals(vehicle.registration) : vehicle.registration != null)
            return false;
        return id != null ? id.equals(vehicle.id) : vehicle.id == null;
    }

    @Override
    public int hashCode() {
        int result = registration != null ? registration.hashCode() : 0;
        result = 31 * result + (id != null ? id.hashCode() : 0);
        return result;
    }
}
