package com.ynov.controller;

import com.ynov.model.Vehicle;

public class Main {
    public static void main(String[] args) {
        Vehicle vehicle = null;
        if (args.length > 2 || args.length == 1) {
            System.out.println("Wrong number og parameters");
        }
        if (args.length == 2) {
            vehicle = new Vehicle(Integer.parseInt(args[0]), args[1]);
        } else {
            vehicle = new Vehicle();
        }
        System.out.println(vehicle);
    }
}
