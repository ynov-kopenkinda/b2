#ifndef ATTACK_H
#define ATTACK_H

#include <QString>

struct AttackValues{
    int physical;
    int magical;
    int trap;
};

class Attack
{
private:
    AttackValues m_Damage;
    QString m_Name;

public:
    Attack(QString name, float physicalDamage, float magicalDamage, float trapDamage);
    Attack();
    QString Name();
    int PhysicalDamage();
    int MagicalDamage();
    int TrapDamage();
    void setName(const QString &Name);
    void setPhysicalDamage(int damage);
    void setMagicalDamage(int damage);
    void setTrapDamage(int damage);
};

template<typename E>
class TAttack : public Attack {
public:
    static Attack* Create(QString name, int physicalDamage = 0, int magicalDamage = 0, int trapDamage = 0);
};


#endif // ATTACK_H
