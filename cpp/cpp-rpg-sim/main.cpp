#include <QCoreApplication>
#include <herofactory.h>
#include <attackfactory.h>
#include <QDebug>

auto roll = [](int min, int max) { return rand() % max + min; };

int main()
{
    srand(time(0));

    HeroFactory heroFactory;
    AttackFactory attackFactory;

    heroFactory.CreateAll();
    QVector<Hero *> heroes = heroFactory.CreatedHeroes();

    attackFactory.CreateAll();
    QVector<Attack *> attacks = attackFactory.CreatedAttacks();

    qDebug() << "Starting the simulation" << Qt::endl << Qt::endl;

    int round = 0;
    while (true) {
        ++round;
        Attack *thisRoundsAttack = attacks.at(roll(0, attacks.size()));
        qDebug()                                              <<
                    "This round's(" << round << ") attack is" <<
                    thisRoundsAttack->Name()                  <<
                    "{"                                       <<
                    thisRoundsAttack->PhysicalDamage()        <<
                    ", "                                      <<
                    thisRoundsAttack->MagicalDamage()         <<
                    ", "                                      <<
                    thisRoundsAttack->TrapDamage()            <<
                    "}";
        int currentlyAlive = 0;
        for (auto& hero : heroes) {
            if (hero->IsAlive()) {
                hero->TakeDamage(thisRoundsAttack);
                if (!hero->IsAlive()) {
                    qDebug() << hero->Name() << "just died, [F].";
                    continue;
                }
                currentlyAlive++;
            }
        }
        if (currentlyAlive == 1) {
            for (auto hero : qAsConst(heroes)) {
                if (hero->IsAlive()) {
                    qDebug() << Qt::endl << hero->Name() << "is the last hero alive, he's won the simultaion" << Qt::endl << "Congratulations!";
                    break;
                }
            }
            break;
        }
        if (currentlyAlive == 0) {
            qDebug() << Qt::endl  << "Everyone is dead!";
            break;
        }
        qDebug() << Qt::endl;
    }

    qDebug() << Qt::endl << Qt::endl << "Finished the simulation";

    return 0;
}
