#ifndef CONTACTLIST_H
#define CONTACTLIST_H

#include <QDebug>
#include <QVector>
#include <QString>
#include <QFile>
#include <QTextStream>
#include "contact.h"


class ContactList
{
    QString m_ContactsFilename;
    QVector<Contact> m_Contacts;
public:
    ContactList(QString filename);
    void add(Contact contact);
    void load();
};

#endif // CONTACTLIST_H
