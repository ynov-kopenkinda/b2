#ifndef NOTIFIER_H
#define NOTIFIER_H

#include <QStatusBar>

class Notifier
{
private:
    Notifier();
    ~Notifier();
    static QStatusBar *m_Statusbar;

public:
    static void setStatusbar(QStatusBar* bar);
    static void notify(const QString &message);
    Notifier(Notifier const &) = delete;
    void operator=(Notifier const &) = delete;
};

#endif // NOTIFIER_H
