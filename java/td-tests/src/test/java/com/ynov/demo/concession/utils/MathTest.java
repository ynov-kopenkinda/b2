package com.ynov.demo.concession.utils;

import org.junit.jupiter.api.Test;

import static org.junit.jupiter.api.Assertions.*;

class MathTest {

    @Test
    void carre() {
        Float x = 2F;
        Float res = new Math().carre(x);
        assertEquals(4F, res);
    }
    @Test
    void carre3() {
        Float x = 3F;
        Float res = new Math().carre(x);
        assertEquals(9F, res);
    }
}
