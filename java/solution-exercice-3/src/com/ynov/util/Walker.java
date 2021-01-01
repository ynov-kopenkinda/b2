package com.ynov.util;

public interface Walker<E> {
    boolean hasNext();
    E next();
}
