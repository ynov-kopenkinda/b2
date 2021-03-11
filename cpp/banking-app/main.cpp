#include <iostream>

#include <account.h>

int main()
{
    Account a1;
    Account a2;
    a1.addFunds(10);
    a2.addFunds(10);
    a1.addFunds(10);
    a1.pay(30);
    a1.pay(5);
    a1.transfer(a2, 15);
    Logger::get().dump();
    return 0;
}
