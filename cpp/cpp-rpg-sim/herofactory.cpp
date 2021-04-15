#include "herofactory.h"
#include <QDebug>

template<typename H>
Hero *THero<H>::Create(QString name, HeroClass type)
{
    H* newHero = new H;

    newHero->setName(name);
    newHero->setType(type);

    return newHero;
}

#define CREATE_HERO_CLASS(H) \
class H : public THero<H> { \
public: \
    void TakeDamage(Attack *attack); \
};

CREATE_HERO_CLASS(Warrior);
CREATE_HERO_CLASS(Mage);
CREATE_HERO_CLASS(Thief);

void Warrior::TakeDamage(Attack* attack) {
    if (IsAlive()) {
        int damageRecieved =
                ((attack->PhysicalDamage() - 2 > 0) ? attack->PhysicalDamage() - 2 : 0) +
                attack->MagicalDamage() * 2 +
                attack->TrapDamage();
        setHP(m_HP - damageRecieved);
        LogAttackResult(attack, damageRecieved);
    }
}

void Mage::TakeDamage(Attack* attack) {
    if (IsAlive()) {
        int damageRecieved =
                ((attack->MagicalDamage() - 2 > 0) ? attack->MagicalDamage() - 2 : 0) +
                attack->PhysicalDamage() * 2 +
                attack->TrapDamage();
        setHP(m_HP - damageRecieved);
        LogAttackResult(attack, damageRecieved);
    }
}

void Thief::TakeDamage(Attack* attack) {
    if (IsAlive()) {
        int damageRecieved =
                ((attack->TrapDamage() - 2 > 0) ? attack->TrapDamage() - 2 : 0) +
                attack->MagicalDamage() * 2 +
                attack->PhysicalDamage();
        setHP(m_HP - damageRecieved);
        LogAttackResult(attack, damageRecieved);
    }
}


HeroFactory::HeroFactory()
{
    AutoRegister();
}

void HeroFactory::Register(QString name, CreateHeroFn fn, HeroClass type)
{
    m_RegisteredFunctions[name] = {
        .fn = fn,
        .params = {
            .name = name,
            .type = type,
        }
    };
}

Hero *HeroFactory::Create(QString name)
{
    Hero *newHero;
    CreateHeroFn fn = m_RegisteredFunctions[name].fn;
    HeroParams params = m_RegisteredFunctions[name].params;
    if (fn != nullptr) {
        newHero = fn(params.name, params.type);
        m_CreatedHeroes.push_back(newHero);
        return newHero;
    }
    qDebug() << "Hero with name " << name << "was not registered, pleasy check HeroFactory::AutoRegister() method.";
    return nullptr;
}

void HeroFactory::CreateAll()
{
    Create("Pierre Da Silva");
    Create("Theo Arnal");
    Create("Dmitrii Kopenkin");
}

QVector<Hero *> HeroFactory::CreatedHeroes() const
{
    return m_CreatedHeroes;
}

void HeroFactory::AutoRegister()
{
    Register("Pierre Da Silva", Warrior::Create, WARRIOR);
    Register("Theo Arnal", Mage::Create, MAGE);
    Register("Dmitrii Kopenkin", Thief::Create, THIEF);
}
