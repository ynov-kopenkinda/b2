#ifndef ATTACKFACTORY_H
#define ATTACKFACTORY_H

#include <QMap>
#include <attack.h>

typedef Attack *(*CreateAttackFn)(QString, int, int, int);

struct AttackMeta {
    CreateAttackFn fn;
    AttackValues damages;
};

class AttackFactory
{
private:
    QMap<QString, AttackMeta> m_RegisteredFunctions;
    QVector<Attack *> m_CreatedAttacks;
    void AutoRegister();
public:
    AttackFactory();
    void Register(QString type, CreateAttackFn fn, int physicalDmg, int magicalDmg, int trapDmg);
    Attack *Create(QString type);
    QVector<Attack *> CreatedAttacks() const;
    void CreateAll();
};

#endif // ATTACKFACTORY_H
