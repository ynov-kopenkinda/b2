#ifndef DBMANAGER_H
#define DBMANAGER_H

#include <QSqlDatabase>
#include <QSqlQuery>
#include <QSqlError>
#include <QSqlRecord>
#include <QVector>
#include <QDebug>
#include <contact.h>


class ContactsDBManager
{
public:
    ContactsDBManager();
    void changePath(const QString& path);

    /* Contact Stuff */
    QVector<Contact*> getAll();
    void addContact(Contact *contact);
    void bulkUpdate(QVector<Contact *> contacts);
    QVector<Contact*> mockDB();

private:
    QSqlDatabase m_DB;
};

#endif // DBMANAGER_H
