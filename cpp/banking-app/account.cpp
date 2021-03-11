#include "account.h"

int Account::count = 0;

bool Account::hasEnough(float amount)
{
    if (this->m_Balance >= amount) {
        return true;
    } else {
        Logger::get().log("[ ID: " + std::to_string(this->id) + " ] Could not proceed transaction. Reason: Insufficent funds.");
        return false;
    }
}

Account::Account()
{
    this->m_Balance = 0.0f;
    this->count += 1;
    this->id = this->count;
    Logger::get().log("[ ID: " + std::to_string(this->id) + " ] Account successfully created");
}

void Account::addFunds(float amount)
{
    this->m_Balance += amount;
    Logger::get().log("[ ID: " + std::to_string(this->id) + " ] Successfully added " + std::to_string(amount) + "$.");
}

void Account::pay(float amount)
{
    if (this->hasEnough(amount)) {
        this->m_Balance -= amount;
        Logger::get().log("[ ID: " + std::to_string(this->id) + " ] Successfully paid " + std::to_string(amount) + "$.");
    }
}

void Account::transfer(Account &to, float amount)
{
    if (this->hasEnough(amount)) {
        this->m_Balance -= amount;
        to.addFunds(amount);
        Logger::get().log(
            "[ ID: " + std::to_string(this->id) + " ] Successfully transferred " +
            std::to_string(amount) +
            "$ to [ ID: " + std::to_string(to.id) +
            " ]."
        );
    }
}
