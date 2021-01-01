package com.ynov.util;

public interface Walker<T> {
    boolean hasNext();
    T next();
}
