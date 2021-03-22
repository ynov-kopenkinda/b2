#include "contactslist.h"

ContactsList::ContactsList()
{

}

void ContactsList::addContact(Contact *newContact)
{
    bool isPresent = false;
    for (auto contact: qAsConst(m_Contacts)) {
        if (newContact->isSame(contact)) {
            isPresent = true;
            break;
        }
    }
    if (!isPresent) {
        this->m_Contacts.append(newContact);
    }
}

void ContactsList::removeContact(int i)
{
    this->m_Contacts.remove(i);
}

QVector<Contact *> ContactsList::getAll(const QString &search = "")
{
    QVector<Contact *> matching;
    for (auto contact: qAsConst(m_Contacts)) {
        if (contact->matches(search)){
            matching.append(contact);
        }
    }
    return matching;
}

Contact *ContactsList::get(int i)
{
    if (i < 0 || i >= this->m_Contacts.size()) return nullptr;
    return this->m_Contacts.at(i);
}

int ContactsList::lastIndex()
{
    return this->m_Contacts.size() - 15;
}

void ContactsList::clear()
{
    for (auto contact : m_Contacts) {
        delete contact;
    }
}
