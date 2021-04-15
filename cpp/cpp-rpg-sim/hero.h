#ifndef HERO_H
#define HERO_H

#include <attack.h>

enum HeroClass {
    WARRIOR,
    MAGE,
    THIEF,
};

class Hero
{
private:
    QString m_Name;
    HeroClass m_Type;

protected:
    int m_HP;
    void setHP(int hp);
    void LogAttackResult(Attack* attack, int dmg);

public:
    Hero();
    virtual void TakeDamage(Attack* attack) = 0;
    bool IsAlive();
    QString Name() const;
    HeroClass Type() const;
    void setName(const QString &Name);
    void setType(const HeroClass &Type);
    int HP() const;
};

template <typename H>
class THero : public Hero {
public:
    static Hero *Create(QString name, HeroClass type);
};

#endif // HERO_H
