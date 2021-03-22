#include "notifier.h"

QStatusBar *Notifier::m_Statusbar = nullptr;

Notifier::Notifier() {}
Notifier::~Notifier() {}

void Notifier::setStatusbar(QStatusBar *bar)
{
    Notifier::m_Statusbar = bar;
}

void Notifier::notify(const QString &message)
{
    if (Notifier::m_Statusbar !=  nullptr) {
        Notifier::m_Statusbar->showMessage(message);
    }
}
