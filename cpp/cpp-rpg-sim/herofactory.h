#ifndef HEROFACTORY_H
#define HEROFACTORY_H

#include <hero.h>
#include <QMap>

typedef Hero *(*CreateHeroFn)(QString, HeroClass);

struct HeroParams {
    QString name;
    HeroClass type;
};

struct HeroMeta {
    CreateHeroFn fn;
    HeroParams params;
};

class HeroFactory
{
private:
    QMap<QString, HeroMeta> m_RegisteredFunctions;
    QVector<Hero *> m_CreatedHeroes;
    void AutoRegister();
public:
    HeroFactory();
    void Register(QString name, CreateHeroFn dn, HeroClass type);
    Hero *Create(QString name);
    void CreateAll();
    QVector<Hero *> CreatedHeroes() const;
};

#endif // HEROFACTORY_H
