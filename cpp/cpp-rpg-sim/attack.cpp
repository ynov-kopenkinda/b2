#include "attack.h"

Attack::Attack(QString name, float physicalDamage, float magicalDamage, float trapDamage)
{
    m_Name = name;
    m_Damage.physical = physicalDamage;
    m_Damage.magical = magicalDamage;
    m_Damage.trap = trapDamage;
}

Attack::Attack()
{}

QString Attack::Name()
{
    return m_Name;
}

int Attack::PhysicalDamage()
{
    return m_Damage.physical;
}

int Attack::MagicalDamage()
{
    return m_Damage.magical;
}

int Attack::TrapDamage()
{
    return m_Damage.trap;
}

void Attack::setName(const QString &Name)
{
    m_Name = Name;
}

void Attack::setPhysicalDamage(int damage)
{
    m_Damage.physical = damage;
}

void Attack::setMagicalDamage(int damage)
{
    m_Damage.magical = damage;
}

void Attack::setTrapDamage(int damage)
{
    m_Damage.trap = damage;
}

