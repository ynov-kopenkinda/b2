#ifndef LOGGER_H
#define LOGGER_H

#include <iostream>
#include <vector>
#include <string>

class Logger
{
private:
    Logger();
    ~Logger();
    std::vector<std::string> m_Logs;

public:
    static Logger& get();
    Logger(Logger const &) = delete;
    void operator=(Logger const &) = delete;
    void log(std::string messaage);
    void dump();
};

#endif // LOGGER_H
