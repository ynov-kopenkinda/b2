#include <QCoreApplication>
#include <QDebug>
#include <QVector>


template<typename T>
T add(T a, T b) {
    qDebug() << __PRETTY_FUNCTION__ << a << b;
    return a + b;
}

void testAdd() {
    int i1 = 10;
    int i2 = 20;
    float f1 = 10.05;
    float f2 = 20.05;
    double d1 = 10.1;
    double d2 = 20.1;

    qDebug() << add(i1, i2);
    qDebug() << add(f1, f2);
    qDebug() << add(d1, d2);
    qDebug() << add<int>(d1, d2);
}

class Animal {
public:
    QString type() const;
    void setType(const QString &type);

    QString name() const;
    void setName(const QString &name);

    void Dump(){
        qDebug() << __PRETTY_FUNCTION__ << type() << name();
    }

    virtual void Yell() = 0;

private:
    QString m_type;
    QString m_name;

};

template <typename T>
class TAnimal : public Animal {
public:
    static Animal *create() {
        qDebug() << __PRETTY_FUNCTION__;
        return new T;
    };
    virtual void Yell() {
        qDebug() << "Pfftttt...";
    };
};

#define CREATE_ANIMAL_CLASS(animal) \
    class animal : public TAnimal<animal> {};


class Chicken : public TAnimal<Chicken> {
public:
    void Yell() {
        qDebug() << "qluck qluck qluck";
    }
};
class Sheep : public TAnimal<Sheep> {
public:
    void Yell() {
        qDebug() << "beeee";
    }
};
class Goat : public TAnimal<Goat> {
public:
    void Yell() {
        qDebug() << "ez";
    }
    void Kick() {
        qDebug() << "ouch";
    }
};

CREATE_ANIMAL_CLASS(Snake)
CREATE_ANIMAL_CLASS(Pigeon)

typedef Animal *(*CreateAnimalFn)();

/* Classe permet de creer diverts types d'animaux: poules chevres moutons */
class AnimalFactory
{
public:
    QVector<Animal *> created;
    AnimalFactory(){};


    QMap<QString, CreateAnimalFn> registeredFunctions;

    void Register(QString type, CreateAnimalFn fn) {
        qDebug() << __PRETTY_FUNCTION__ << type;
        registeredFunctions[type] = fn;
    };

    void Dump() {
        qDebug() << __PRETTY_FUNCTION__;
        for (auto animal : qAsConst(created)) {
            animal->Dump();
        }
        qDebug() << "There are" << QString::number(created.size()) << "animals";
    }

    void KillThemAll(){
        qDebug() << __PRETTY_FUNCTION__;
        for (auto animal : qAsConst(created)) {
            delete animal;
        }
    }

    void Yell() {
        for (auto animal : qAsConst(created)) {
           animal->Yell();
        }
    }

    ~AnimalFactory() {
        KillThemAll();
    }

    Animal *Create(QString type, QString name) {
        qDebug() << __PRETTY_FUNCTION__ << type << name;
        Animal *a;
        CreateAnimalFn fn = registeredFunctions[type];
        if (fn != nullptr) {
            a = fn();
            a->setType(type);
            a->setName(name);
            created.push_back(a);
            return a;
        }
        qDebug() << "unsupported type" << type;
        return nullptr;
    }
};

void testFactory() {
    AnimalFactory factory;
    factory.Register("chicken", &Chicken::create);
    factory.Register("sheep", &Sheep::create);
    factory.Register("goat", &Goat::create);
    factory.Register("snake", &Snake::create);
    factory.Register("pigeon", &Pigeon::create);
    Animal *betty = factory.Create("chicken", "Betty");
    Animal *josie = factory.Create("sheep", "Josie");
    Animal *john = factory.Create("goat", "Jonathan");
    Animal *robdolph = factory.Create("pigeon", "Robdolph");
    Animal *louis = factory.Create("snake", "Louis");
    factory.Dump();
    factory.Yell();
    dynamic_cast<Goat *>(john)->Kick();
}

int main(int argc, char *argv[])
{
    QCoreApplication a(argc, argv);

    testAdd();
    testFactory();

    return a.exec();
}

QString Animal::type() const
{
    return m_type;
}

void Animal::setType(const QString &type)
{
    m_type = type;
}

QString Animal::name() const
{
    return m_name;
}

void Animal::setName(const QString &name)
{
    m_name = name;
}
