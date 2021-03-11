#include "contact.h"

Contact::Contact(QString name, QString email) {
    this->m_Name = name;
    this->m_Email = email;
}

QString Contact::toString()
{
    return this->m_Name + " <" + this->m_Email + ">";
};
