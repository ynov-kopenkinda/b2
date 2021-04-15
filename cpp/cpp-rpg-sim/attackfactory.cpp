#include "attackfactory.h"

#include <QDebug>

template<typename T>
Attack *TAttack<T>::Create(QString name, int physicalDamage, int magicalDamage, int trapDamage)
{
    T* newClass = new T;

    newClass->setName(name);
    newClass->setPhysicalDamage(physicalDamage);
    newClass->setMagicalDamage(magicalDamage);
    newClass->setTrapDamage(trapDamage);

    return newClass;
}

#define CREATE_ATTACK_CLASS(A) \
    class A : public TAttack<A> {};

CREATE_ATTACK_CLASS(PoisonedArrow);
CREATE_ATTACK_CLASS(SwordSlash);
CREATE_ATTACK_CLASS(FireballThrow);
CREATE_ATTACK_CLASS(FireWristKick);

AttackFactory::AttackFactory()
{
    AutoRegister();
}

void AttackFactory::Register(QString name, CreateAttackFn fn, int physicalDmg, int magicalDmg, int trapDmg)
{
    m_RegisteredFunctions[name] = {
        .fn =  fn,
        .damages = {
           .physical = physicalDmg,
           .magical = magicalDmg,
           .trap = trapDmg
        },
    };
}

Attack *AttackFactory::Create(QString name)
{
    Attack *newAttack;
    CreateAttackFn fn = m_RegisteredFunctions[name].fn;
    AttackValues damages = m_RegisteredFunctions[name].damages;
    if (fn != nullptr) {
        newAttack = fn(
                    name,
                    damages.physical,
                    damages.magical,
                    damages.trap
                    );
        m_CreatedAttacks.push_back(newAttack);
        return newAttack;
    }
    qDebug() << "Attack \"" << name << "\" doesn't exist, please verify the AttackFactory::AutoRegister() method.";
    return nullptr;
}

void AttackFactory::AutoRegister()
{
    Register("Poisoned Arrow", &PoisonedArrow::Create, 1, 0, 4);
    Register("Sword Slash", &SwordSlash::Create, 4, 0, 0);
    Register("Fireball Throw", &FireballThrow::Create, 2, 4, 0);
    Register("Fire Wrist Kick", &FireWristKick::Create, 4, 4, 0);
}

QVector<Attack *> AttackFactory::CreatedAttacks() const
{
    return m_CreatedAttacks;
}

void AttackFactory::CreateAll()
{
    Create("Poisoned Arrow");
    Create("Sword Slash");
    Create("Fireball Throw");
    Create("Fire Wrist Kick");
}


