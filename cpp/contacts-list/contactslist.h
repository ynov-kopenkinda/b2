#ifndef CONTACTSLIST_H
#define CONTACTSLIST_H

#include <QVector>
#include <contact.h>

class ContactsList
{
private:
    QVector<Contact *> m_Contacts;
public:
    ContactsList();
    void addContact(Contact *newContact);
    void removeContact(int i);
    QVector<Contact *> getAll(const QString &search);
    Contact *get(int i);
    int lastIndex();
    void clear();
};

#endif // CONTACTSLIST_H
