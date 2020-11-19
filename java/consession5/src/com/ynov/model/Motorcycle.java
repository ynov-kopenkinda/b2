package com.ynov.model;

public class Motorcycle extends Vehicle {
    int saddelHeight = 820;

    public Motorcycle() {
        super(2, "black");
    }
    public Motorcycle(int saddelHeight, String color) {
        super(2, color);
        this.saddelHeight = saddelHeight;
    }
    public void setColor(String color) {
        this.color = color + "(tank)";
    }

    public int getSaddelHeight() {
        return saddelHeight;
    }

    public String toString(){
        return super.toString() + ", saddelHeight =" + saddelHeight;
    }
}
