#include "notifier.h"

Notifier::Notifier() {}
Notifier::~Notifier() {}

Notifier &Notifier::get()
{
    static Notifier instance;
    return instance;
}
