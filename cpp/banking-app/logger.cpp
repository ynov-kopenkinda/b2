#include "logger.h"

Logger::Logger() { }

void Logger::log(std::string message)
{
    this->m_Logs.push_back(message);
}

Logger::~Logger() { }

Logger &Logger::get()
{
    static Logger me;
    return me;
}

void Logger::dump() {
    for (const std::string &log : this->m_Logs) {
        std::cout << log << std::endl;
    }
    this->m_Logs.clear();
}
