#ifndef ACCOUNT_H
#define ACCOUNT_H

#include <logger.h>

class Account
{
private:
    float m_Balance;
    int id;
    static int count;
    bool hasEnough(float amount);

public:
    Account();
    void addFunds(float amount);
    void pay(float amount);
    void transfer(Account& to, float amount);
};

#endif // ACCOUNT_H
