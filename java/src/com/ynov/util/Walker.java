package com.ynov.util;

public interface Walker<T> {
    boolean hasNext();
    T next();
    default public int test() {
        return 5;
    };
}
