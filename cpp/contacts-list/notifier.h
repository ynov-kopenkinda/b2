#ifndef NOTIFIER_H
#define NOTIFIER_H


class Notifier
{
private:
    Notifier();
    ~Notifier();

public:
    static Notifier &get();
    Notifier(Notifier const &) = delete;
    void operator=(Notifier const &) = delete;
};

#endif // NOTIFIER_H
