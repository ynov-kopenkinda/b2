#include "hero.h"

#include <QDebug>

Hero::Hero(): m_HP(10)
{}

bool Hero::IsAlive()
{
    return m_HP > 0;
}

QString Hero::Name() const
{
    return m_Name;
}

HeroClass Hero::Type() const
{
    return m_Type;
}

void Hero::setName(const QString &Name)
{
    m_Name = Name;
}

void Hero::setType(const HeroClass &Type)
{
    m_Type = Type;
}

int Hero::HP() const
{
    return m_HP;
}

void Hero::LogAttackResult(Attack *attack, int dmg)
{
    qDebug() << "Hero" << Name() << "(" << m_HP + dmg << ") gets attacked by" << attack->Name() << "for" << dmg << "dmg. He now has" << m_HP << "hp.";
}

void Hero::setHP(int hp)
{
    m_HP = hp;
}
